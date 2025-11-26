@extends('layouts.app')
@section('title')
Profile Setting
@endsection

@section('content')

<section class="content py-5">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 m-auto">
                <div class="card card-cyan">

                    <div class="card-header">
                        <h3 class="card-title">Profile Settings</h3>
                    </div>

                    <form id="quickForm" action="{{ route('profile.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            @if ($errors->any())
                                <ul class="mb-3">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="row">

                                <!-- LEFT SIDE -->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="staff_id">Staff ID</label>
                                        <input type="text" class="form-control" name="staff_id" id="staff_id"
                                            value="{{ auth('web')->user()->staff_id }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name"
                                            value="{{ auth('web')->user()->name }}" required>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email"
                                            value="{{ auth('web')->user()->email }}" required>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone"
                                            value="{{ auth('web')->user()->phone }}" required>
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ auth('web')->user()->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="dob"
                                            value="{{ auth('web')->user()->dob }}">
                                    </div>

                                </div>

                                <!-- RIGHT SIDE -->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" id="country"
                                            value="{{ auth('web')->user()->country }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality"
                                            value="{{ auth('web')->user()->nationality }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <input type="text" class="form-control" name="level" id="level"
                                            value="{{ auth('web')->user()->level }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="join_date">Join Date</label>
                                        <input type="date" class="form-control" name="join_date" id="join_date"
                                            value="{{ auth('web')->user()->join_date }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="iqan">IQAN</label>
                                        <input type="text" class="form-control" name="iqan" id="iqan"
                                            value="{{ auth('web')->user()->iqan }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="basic_salary">Basic Salary</label>
                                        <input type="number" class="form-control" name="basic_salary" id="basic_salary"
                                            value="{{ auth('web')->user()->basic_salary }}">
                                    </div>

                                </div>

                                <!-- FULL WIDTH -->
                                <div class="col-md-12 mt-3">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" name="state" id="state"
                                                value="{{ auth('web')->user()->state }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" id="city"
                                                value="{{ auth('web')->user()->city }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="postal_code">Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code" id="postal_code"
                                                value="{{ auth('web')->user()->postal_code }}">
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="image">Profile Image</label>
                                        <input type="file"
                                            class="form-control p-1 @error('image') is-invalid @enderror"
                                            name="image"
                                            id="image"
                                            accept="image/*">
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        @if(auth('web')->user()->image)
                                        <div class="mt-2">
                                            <img id="preview-image"
                                                src="{{ Storage::url(auth('web')->user()->image) }}"
                                                alt="Current Profile Image"
                                                width="120" height="120"
                                                style="object-fit: cover; border-radius: 8px;">
                                        </div>
                                        @endif
                                    </div>

                                </div>

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
