<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = Salary::latest()->get();
        return view('admin.salary.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('status',1)->get();
        $customers = Customer::where('status',1)->get();
        return view('admin.salary.create',compact('users','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'customer_id' => 'required',
            'attendance' => 'required|numeric',
            'over_time' => 'required|numeric',
            'advanced' => 'required|numeric',
            'paid' => 'required|numeric',
            'salary_date' => 'required|date',
        ]);
        
        $data = $request->all();
        Salary::create($data);
        return redirect()->route('admin.salary.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Salary::findOrFail($id);
        return view('admin.salary.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = Salary::findOrFail($id);
        $users = User::where('status',1)->get();
        $customers = Customer::where('status',1)->get();
        return view('admin.salary.edit',compact('data','users','customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $data = Salary::findOrFail($id);
    //     $input =$request->all();
    //     $data->update($input);
    //     return redirect()->route('admin.salary.index')->with('success', 'Data Update Successfully');

    // }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'customer_id' => 'required',
            'attendance' => 'required|numeric',
            'over_time' => 'required|numeric',
            'advanced' => 'required|numeric',
            'paid' => 'required|numeric',
            'salary_date' => 'required|date',
        ]);

        $salary = Salary::findOrFail($id);

        $salary->user_id = $request->user_id;
        $salary->customer_id = $request->customer_id;
        $salary->attendance = $request->attendance;
        $salary->over_time = $request->over_time;
        $salary->advanced = $request->advanced;
        $salary->paid = $request->paid;
        $salary->salary_date = $request->salary_date;

        $salary->save();

        return redirect()->route('admin.salary.index')->with('success','Salary updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Salary::findOrFail($id);
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
