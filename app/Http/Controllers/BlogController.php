<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DataTables;
use Throwable;

class BlogController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first();
        $search = '';
        if (session('search') && session('search') != '') {
            $search = session('search');
            session()->forget('search');
            $blogs = Blog::published()->with('category')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%')
                      ->orWhere('slug', 'like', '%'.$search.'%')
                      ->orWhere('description', 'like', '%'.$search.'%');
            })
            ->orderBy('id', 'DESC')->paginate($setting->blogs_per_page ?? 12);
        } else {
            $blogs = Blog::published()->with('category')->orderBy('id', 'DESC')->paginate($setting->blogs_per_page ?? 12);
        }
        return view('blogs', compact('blogs', 'setting', 'search'));
    }

    public function show($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->with('category', 'user:id,name,image')->first();

        if (! $blog) {
            abort(404);
        }

        $recommends = Blog::published()->where('id', '!=', $blog->id)->where('category_id', $blog->category->id)->with('user:id,name,image', 'category')->limit(5)->get();
        $recents = Blog::published()->where('id', '!=', $blog->id)->with('user:id,name,image', 'category')->where('id', '!=', $blog->id)->orderBy('id', 'DESC')->limit(5)->get();
        $categories = Category::whereHas('blogs', function ($query) {
            $query->published();
        })
        ->withCount(['blogs' => function ($query) {
            $query->published();
        }])
        ->limit(10)
        ->get();

        return view('blog-details', [
            'blog' => $blog,
            'recommends' => $recommends,
            'recents' => $recents,
            'categories' => $categories
        ]);
    }

    public function categoryBlogs($id)
    {
        $setting = SiteSetting::first();
        $search = '';
        $blogs = Blog::published()->where('category_id', $id)->with('category')->orderBy('id', 'DESC')->paginate($setting->blogs_per_page ?? 12);
        return view('blogs', compact('blogs', 'setting', 'search'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        session(['search' => $request->search]);
        return redirect()->route('blogs.index');
    }


    /*
    --------------------------------
        Admin Methods
    --------------------------------
    */
    public function adminIndex(Request $request)
    {
        if ($request->ajax()) {
            $categories = Blog::with('category', 'user:id,name,image');
            return DataTables::eloquent($categories)
                ->addColumn('action', function ($row) {
                    return $row->id;
                })
                ->addIndexColumn()
                ->make(true);
        }

        // This is not an AJAX call
        return view('admin.blogs.index', [
            'page' => 'Blog'
        ]);
    }

    public function create()
    {
        return view('admin.blogs.add_edit', [
            'page' => 'Blog',
            'action' => 'Add',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:2048',
            'category' => 'required',
            'image_alt' => 'required',
            'title' => 'required',
            'page_title' => 'required',
            'description' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'is_published' => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            $userId = auth()->user()->id;
            $blog = Blog::create([
                'user_id' => $userId,
                'category_id' => $request->category,
                'image' => $request->image->store('/blogs/images', 'public'),
                'title' => $request->title,
                'image_alt' => $request->image_alt,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'published_at' => (boolean) $request->is_published ? Carbon::now() : Null,
            ]);

            return response()->json([
                'message' => 'Blog created successfully.'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->with('category')->first();
        return view('admin.blogs.add_edit', [
            'page' => 'Blog',
            'action' => 'Edit',
            'categories' => Category::all(),
            'blog' => $blog
        ]);
    }


    public function update(Request $request)
    {
        $rules = [
            'id' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:2048',
            'category' => 'required',
            'title' => 'required',
            'image_alt' => 'required',
            'page_title' => 'required',
            'description' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'is_published' => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            $userId = auth()->user()->id;
            $blog = Blog::find($request->id);
            $blog->update([
                'user_id' => $userId,
                'category_id' => $request->category,
                'title' => $request->title,
                'page_title' => $request->page_title,
                'image_alt' => $request->image_alt,
                'description' => $request->description,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'slug' => Str::slug($request->title),
                'published_at' => (boolean) $request->is_published ? Carbon::now() : Null,
            ]);
            if ($request->image) {
                Blog::deleteImage($blog->image);
                $blog->update([
                    'image' => $request->image->store('/blogs/images', 'public')
                ]);
            }

            return response()->json([
                'message' => 'Blog updated successfully.'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);

            if ($blog) {
                Blog::deleteImage($blog->getRawOriginal('image'));
                $blog->delete();
            }

            return response()->json([
                'message' => 'Blog deleted successfully.'
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
