<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class SiteSettingsController extends Controller
{
    /*
    --------------------------------
        Admin Methods
    --------------------------------
    */
    public function adminSiteSettings()
    {
        $setting = SiteSetting::with('user:id,name,image')->first();

        return view('admin.site-setting', [
            'setting' => $setting,
            'page' => 'Setting'
        ]);
    }

    public function saveSetting(Request $request)
    {
        $rules = [
            'home_page_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'page_text' => 'required',
            'blogs_page_title' => 'required',
            'blogs_page_meta_keywords' => 'required',
            'blogs_page_meta_description' => 'required',
            'blogs_per_page' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            $userId = auth()->user()->id;
            $setting = SiteSetting::first();
            if (!$setting) {
                $setting = new SiteSetting();
            }
            $setting->user_id = $userId;
            $setting->home_page_title = $request->home_page_title;
            $setting->meta_keywords = $request->meta_keywords;
            $setting->meta_description = $request->meta_description;
            $setting->page_text = $request->page_text;
            $setting->blogs_page_title = $request->blogs_page_title;
            $setting->blogs_page_meta_keywords = $request->blogs_page_meta_keywords;
            $setting->blogs_page_meta_description = $request->blogs_page_meta_description;
            $setting->blogs_per_page = $request->blogs_per_page;
            $setting->save();

            return response()->json([
                'message' => 'Settings updated successfully.'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
