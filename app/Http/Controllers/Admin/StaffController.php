<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::latest()->get();
        return view('admin.staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $position = Position::where('status',1)->get();
        $department = Department::where('status',1)->get();
        return view('admin.staff.create',compact('position','department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if($image){
            $data['image'] = $image;
        }
        User::create($data);
        return redirect()->route('admin.staff.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrFail($id);
         $position = Position::where('status',1)->get();
        $department = Department::where('status',1)->get();
        return view('admin.staff.edit', compact('data','position','department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = User::findOrFail($id);
        $position = Position::where('status',1)->get();
        $department = Department::where('status',1)->get();
        return view('admin.staff.edit', compact('data','position','department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::findOrFail($id);

         $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

            if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
            }

        $input = $request->all();

        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        } else {
            unset($input['password']); // password empty হলে overwrite হবে না
        }

         if($image){
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.staff.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
         if  ($data->image){
            Storage::disk('public')->delete($data->image);
            }

        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
