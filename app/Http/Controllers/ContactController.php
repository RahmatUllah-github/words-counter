<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            Mail::to('rahmatul0799@gmail.com')->send(new ContactUsMail($request->all()));
            ContactUs::create($request->all());

            return response()->json(['message' => 'Message sent successfully..']);
        } catch (Throwable $e) {
            Log::info($e->getLine());
            Log::error($e->getMessage());
            return response()->json(['message' => 'Something went wrong. Please try again.'], 500);
        }
    }





    /*
    --------------------------------
        Admin Methods
    --------------------------------
    */
    public function adminContact()
    {

    }
}
