<?php

namespace App\Http\Controllers;


use App\Models\Setting;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function home()
    {
        $setting = Setting::first();
        return view('frontend.index', compact('setting'));
    }
    
}
