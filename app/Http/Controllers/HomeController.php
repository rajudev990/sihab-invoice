<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salary =  Salary::where('user_id', auth()->guard('web')->id())->get();
        return view('home',compact('salary'));
    }

    public function settings()
    {
        return view('auth.settings');
    }
    public function changePassword()
    {
        return view('auth.change-password');
    }
    public function updateSettings(Request $request)
    {
        $admin = auth('web')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
        ]);

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if ($request->hasFile('image') && $admin->image) {
            Storage::disk('public')->delete($admin->image);
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' =>  $image,
            'staff_id' => $request->staff_id,
            'address' => $request->address,
            'dob' => $request->dob,
            'country' => $request->country,
            'nationality' => $request->nationality,
            'level' => $request->level,
            'join_date' => $request->join_date,
            'iqan' => $request->iqan,
            'state' => $request->state,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $admin = auth('web')->user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!\Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        $admin->update([
            'password' => \Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }

}
