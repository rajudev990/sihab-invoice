@extends('admin.layouts.app')

@section('title')
Add Customer
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Customer</h3>
            
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{route('admin.customers.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="card-body row">
                          <!-- Name -->
                            <div class="form-group col-lg-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                            </div>

                            <!-- Phone -->
                            <div class="form-group col-lg-6">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone">
                            </div>

                             <div class="form-group col-lg-6">
                                <label>Company ID</label>
                                <input type="text" name="company_id" value="{{ old('company_id') }}" class="form-control" placeholder="2442424">
                            </div>

                             <div class="form-group col-lg-6">
                                <label>Trn Number</label>
                                <input type="text" name="trn_no" value="{{ old('trn_no') }}" class="form-control" placeholder="444414">
                            </div>

                             <div class="form-group col-lg-6">
                                <label>Vat Number</label>
                                <input type="text" name="vat_no" value="{{ old('vat_no') }}" class="form-control" placeholder="44444">
                            </div>

                            <!-- Address -->
                            <div class="form-group col-lg-6">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Address">
                            </div>

                            <!-- Country -->
                            <div class="form-group col-lg-6">
                                <label>Country</label>
                                <input type="text" name="country" value="{{ old('country') }}" class="form-control" placeholder="Country">
                            </div>

                            <!-- State -->
                            <div class="form-group col-lg-6">
                                <label>State</label>
                                <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="State">
                            </div>

                            <!-- City -->
                            <div class="form-group col-lg-6">
                                <label>City</label>
                                <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="City">
                            </div>

                            <!-- Postal Code -->
                            <div class="form-group col-lg-6">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" placeholder="Postal Code">
                            </div>

                            <!-- Gender -->
                            <div class="form-group col-lg-6">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="form-group col-lg-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>

                            <!-- Image -->
                            <div class="form-group col-lg-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control p-1" id="image">
                                <div class="mt-2">
                                    <img id="preview-image" src="" alt="Customer Image" width="120" height="120" style="object-fit: cover; border-radius: 8px; display:none;">
                                </div>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection