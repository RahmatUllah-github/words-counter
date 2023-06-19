<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Throwable;

class CategoryController extends Controller
{
    /*
    --------------------------------
        Admin Methods
    --------------------------------
    */
    public function adminIndex(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::query();
            return DataTables::eloquent($categories)
                ->addColumn('action', function ($row) {
                    return $row->id;
                })
                ->addIndexColumn()
                ->make(true);
        }

        // This is not an AJAX call
        return view('admin.categories', [
            'page' => 'Category'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            Category::create([
                'name' => ucfirst($request->name)
            ]);

            return response()->json([
                'message' => 'Category added successfully.'
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|string',
            'name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            Category::find($request->id)->update([
                'name' => ucfirst($request->name)
            ]);

            return response()->json([
                'message' => 'Category updated successfully.'
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                $category->delete();
            }

            return response()->json([
                'message' => 'Category deleted successfully.'
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
