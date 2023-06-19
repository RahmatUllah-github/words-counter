<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home', [
            'page' => 'Home',
        ]);
    }




    /*
    --------------------------------
        Admin Methods
    --------------------------------
    */
    public function adminProfile()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        return view('admin.profile', [
            'user' => $user,
            'page' => 'Profile',
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $rules = [
            'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:1024',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            $userId = auth()->user()->id;
            $user = User::find($userId);
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            if ($request->image) {
                User::deleteImage($user->getRawOriginal('image'));
                $user->update([
                    'image' => $request->image->store('users/images/', 'public')
                ]);
            }

            if ($request->password) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return response()->json([
                'message' => 'Profile updated successfully.'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
