@extends('admin.layouts.app')

@section('title', 'Add Employee')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Employee</h3>
                        <a href="{{ route('admin.staff.index') }}" class="btn btn-success float-right">
                            <i class="fa fa-angle-left"></i> Back
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data" id="quickForm">
                        @csrf

                        <div class="card-body row">

                            <!-- Name -->
                            <div class="form-group col-lg-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
                            </div>


                             <!-- Staff ID -->
                            <div class="form-group col-lg-6">
                                <label>Staff ID</label>
                                <input type="text" name="staff_id" value="{{ old('staff_id') }}" class="form-control" placeholder="Staff ID">
                            </div>


                            
                            <!-- Department -->
                            <div class="form-group col-lg-6">
                                <label>Department</label>
                                <select class="form-control" name="department_id" id="department_id">
                                    @foreach($department as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Position -->
                            <div class="form-group col-lg-6">
                                <label>Position</label>
                                <select class="form-control" name="position_id" id="position_id">
                                    @foreach($position as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
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

                            
                            <!-- Password -->
                            <div class="form-group col-lg-6">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                             <!-- Date of Birth -->
                            <div class="form-group col-lg-6">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
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
                            <div class="form-group col-lg-4">
                                <label>State</label>
                                <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="State">
                            </div>

                            <!-- City -->
                            <div class="form-group col-lg-4">
                                <label>City</label>
                                <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="City">
                            </div>

                            <!-- Postal Code -->
                            <div class="form-group col-lg-4">
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


                            <!-- nationality -->
                            <div class="form-group col-lg-6">
                                <label>Nationality</label>
                                <input type="text" name="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="nationality">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Level</label>
                                <input type="text" name="level" value="{{ old('level') }}" class="form-control" placeholder="level">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Joining Date</label>
                                <input type="date" name="join_date" value="{{ old('join_date') }}" class="form-control" placeholder="join_date">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>ID / Iqan</label>
                                <input type="text" name="iqan" value="{{ old('iqan') }}" class="form-control" placeholder="iqan">
                            </div>

                            <!-- Basic Salary -->
                            <div class="form-group col-lg-6">
                                <label>Basic Salary</label>
                                <input type="number" step="0.01" name="basic_salary" value="{{ old('basic_salary') }}" class="form-control" placeholder="Basic Salary">
                            </div>
                            
                            
                            <!-- Image -->
                            <div class="form-group col-lg-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control p-1" id="image">
                                <div class="mt-2">
                                    <img id="preview-image" src="" width="120" height="120" style="object-fit: cover; border-radius: 8px; display:none;">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group col-lg-6">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status',1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('image').addEventListener('change', function(e){
    let reader = new FileReader();
    reader.onload = function(e){
        let preview = document.getElementById('preview-image');
        preview.src = e.target.result;
        preview.style.display = "block";
    }
    reader.readAsDataURL(this.files[0]);
});
</script>
@endsection
