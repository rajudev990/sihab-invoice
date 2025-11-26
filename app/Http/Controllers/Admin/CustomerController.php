<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::latest()->get();
        return view('admin.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if($image){
            $data['image'] = $image;
        }
        Customer::create($data);
        return redirect()->route('admin.customers.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Customer::findOrFail($id);

         $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

            if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
            }

        $input = $request->all();

         if($image){
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.customers.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Customer::findOrFail($id);
         if  ($data->image){
            Storage::disk('public')->delete($data->image);
            }

        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
