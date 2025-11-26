@extends('admin.layouts.app')

@section('title', 'Update Employee')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Employee</h3>
                        <a href="{{ route('admin.staff.index') }}" class="btn btn-success float-right">
                            <i class="fa fa-angle-left"></i> Back
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.staff.update', $data->id) }}" enctype="multipart/form-data" id="quickForm">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">

                            <!-- Name -->
                            <div class="form-group col-lg-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Name" required>
                            </div>

                            <!-- Staff ID -->
                            <div class="form-group col-lg-6">
                                <label>Staff ID</label>
                                <input type="text" name="staff_id" value="{{ $data->staff_id }}" class="form-control" placeholder="Staff ID">
                            </div>

                            <!-- Department -->
                            <div class="form-group col-lg-6">
                                <label>Department</label>
                                <select class="form-control" name="department_id" id="department_id">
                                    @foreach($department as $item)
                                    <option value="{{$item->id}}" {{ $data->department_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Position -->
                            <div class="form-group col-lg-6">
                                <label>Position</label>
                                <select class="form-control" name="position_id" id="position_id">
                                    @foreach($position as $item)
                                    <option value="{{$item->id}}" {{ $data->position_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Email -->
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $data->email }}" class="form-control" placeholder="Email">
                            </div>

                            <!-- Phone -->
                            <div class="form-group col-lg-6">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{ $data->phone }}" class="form-control" placeholder="Phone">
                            </div>

                            <!-- Password -->
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter new password to change">
                                <small class="text-muted">Leave blank if you don't want to change password</small>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group col-lg-6">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" value="{{ $data->dob }}" class="form-control">
                            </div>

                            <!-- Address -->
                            <div class="form-group col-lg-6">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $data->address }}" class="form-control" placeholder="Address">
                            </div>

                            <!-- Country -->
                            <div class="form-group col-lg-6">
                                <label>Country</label>
                                <input type="text" name="country" value="{{ $data->country }}" class="form-control" placeholder="Country">
                            </div>

                            <!-- State -->
                            <div class="form-group col-lg-4">
                                <label>State</label>
                                <input type="text" name="state" value="{{ $data->state }}" class="form-control" placeholder="State">
                            </div>

                            <!-- City -->
                            <div class="form-group col-lg-4">
                                <label>City</label>
                                <input type="text" name="city" value="{{ $data->city }}" class="form-control" placeholder="City">
                            </div>

                            <!-- Postal Code -->
                            <div class="form-group col-lg-4">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" value="{{ $data->postal_code }}" class="form-control" placeholder="Postal Code">
                            </div>

                            <!-- Gender -->
                            <div class="form-group col-lg-6">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $data->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>


                            <!-- nationality -->
                            <div class="form-group col-lg-6">
                                <label>Nationality</label>
                                <input type="text" name="nationality" value="{{ $data->nationality }}" class="form-control" placeholder="nationality">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Level</label>
                                <input type="text" name="level" value="{{ $data->level }}" class="form-control" placeholder="level">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Joining Date</label>
                                <input type="date" name="join_date" value="{{ $data->join_date }}" class="form-control" placeholder="join_date">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>ID / Iqan</label>
                                <input type="text" name="iqan" value="{{ $data->iqan }}" class="form-control" placeholder="iqan">
                            </div>

                            <!-- Basic Salary -->
                            <div class="form-group col-lg-6">
                                <label>Basic Salary</label>
                                <input type="number" step="0.01" name="basic_salary" value="{{ $data->basic_salary }}" class="form-control" placeholder="Basic Salary">
                            </div>

                            <!-- Image -->
                            <div class="form-group col-lg-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control p-1" id="image">
                                <div class="mt-2">
                                    <img id="preview-image" src="{{ $data->image ? asset('storage/'.$data->image) : '' }}" width="120" height="120" style="object-fit: cover; border-radius: 8px; {{ $data->image ? '' : 'display:none;' }}">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group col-lg-6">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-edit"></i> Update
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
