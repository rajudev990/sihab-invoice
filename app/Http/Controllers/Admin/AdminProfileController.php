<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Salary;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;


class AdminProfileController extends Controller
{

    public function dashboard()
    {
        $employee = User::count();
        $customers = Customer::count();
        $department = Department::count();

        $total_paid = Salary::sum('paid');
        $total_over_time = Salary::sum('over_time');
        $total_advanced = Salary::sum('advanced');
        $total = $total_paid +  $total_advanced;

        $departments = Department::with('users','users.salary')->where('status',1)->get();
        $setting = Setting::first();

        return view('admin.dashboard',compact('employee','customers','department','total','departments','setting'));
    }

    public function salaryReportPdf()
    {
        $departments = Department::with('users.salary')->get();

        $grand_total = 0;

        foreach ($departments as $item) {
            $dept_total = $item->users->sum(function ($u) {
                return $u->salary->sum('paid') + $u->salary->sum('advanced');
            });

            $grand_total += $dept_total;
        }

        $setting = Setting::first();

        return view('admin.reports.department_pdf',compact('departments','grand_total','setting'));

    }

    // public function salaryReportPdf()
    // {
    //     $departments = Department::with('users.salary')->get();

    //     $grand_total = 0;

    //     foreach ($departments as $item) {
    //         $dept_total = $item->users->sum(function ($u) {
    //             return $u->salary->sum('paid') + $u->salary->sum('advanced');
    //         });

    //         $grand_total += $dept_total;
    //     }

    //     $setting = Setting::first();

    //     $logoPath = public_path('storage/' . $setting->header_logo);
    //     $banklogo = public_path('storage/' . $setting->bank_logo);

    //     $pdf = PDF::loadView('admin.reports.salary_pdf', [
    //         'departments' => $departments,
    //         'grand_total' => $grand_total,
    //         'setting'     => $setting,
    //         'logoPath'    => $logoPath,
    //         'banklogo'    => $banklogo,
    //     ]);

    //     return $pdf->stream('salary-report.pdf');
    //     // return $pdf->download('salary-report.pdf');
    // }

    public function settings()
    {
        return view('admin.auth.settings');
    }
    public function changePassword()
    {
        return view('admin.auth.change-password');
    }
    public function updateSettings(Request $request)
    {
        $admin = auth('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
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
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $admin = auth('admin')->user();

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
