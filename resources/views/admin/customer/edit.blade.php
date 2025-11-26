@extends('admin.layouts.app')

@section('title')
Update Customer
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Customer</h3>
            
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{route('admin.customers.update',$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                          <!-- Name -->
                            <div class="form-group col-lg-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{$data->name}}" class="form-control"  required>
                            </div>

                            <!-- Email -->
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="email" name="email" value="{{$data->email}}" class="form-control">
                            </div>

                            <!-- Phone -->
                            <div class="form-group col-lg-6">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{$data->phone}}" class="form-control">
                            </div>

                            <!-- Address -->
                            <div class="form-group col-lg-6">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$data->address}}" class="form-control" >
                            </div>

                            <!-- Country -->
                            <div class="form-group col-lg-4">
                                <label>Country</label>
                                <input type="text" name="country" value="{{$data->country}}" class="form-control" >
                            </div>

                            <!-- State -->
                            <div class="form-group col-lg-4">
                                <label>State</label>
                                <input type="text" name="state" value="{{$data->state}}" class="form-control">
                            </div>

                            <!-- City -->
                            <div class="form-group col-lg-4">
                                <label>City</label>
                                <input type="text" name="city" value="{{$data->city}}" class="form-control">
                            </div>

                            <!-- Postal Code -->
                            <div class="form-group col-lg-6">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" value="{{$data->postal_code}}" class="form-control">
                            </div>

                            <!-- Gender -->
                            <div class="form-group col-lg-6">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $data->gender== 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $data->gender== 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $data->gender== 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="form-group col-lg-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>

                           <div class="form-group col-lg-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control p-1" id="image">
                                <div class="mt-2">
                                    <img id="preview-image" src="{{Storage::url($data->image)}}" alt="Customer Image" width="120" height="120">
                                </div>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </form>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection