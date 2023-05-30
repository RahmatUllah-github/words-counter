<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new ContactUsMail($data));
            ContactUs::create($data);

            return redirect()->back()->withSuccess('Message sent successfully.');
        } catch (Throwable $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }



    }
}
