@extends('admin.layouts.app')

@section('title')
Settings Update
@endsection

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <form id="quickForm" action="{{ route('admin.settings.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Settings Update</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="company_name">Website Name <span class="text-danger">*</span></label>
                                    <input value="{{$data->company_name}}" type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name">
                                    @error('company_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="address">Address <span class="text-black-50">(Optional)</span></label>
                                    <input value="{{$data->address}}" type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address">
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="phone_one">Phone Number (one)</label>
                                    <input value="{{$data->phone_one}}" type="text" name="phone_one" class="form-control @error('phone_one') is-invalid @enderror" id="phone_one">
                                    @error('phone_one')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="phone_two">Phone Number (two)</label>
                                    <input value="{{$data->phone_two}}" type="text" name="phone_two" class="form-control @error('phone_two') is-invalid @enderror" id="phone_two">
                                    @error('phone_two')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label for="email_one">Email (one)</label>
                                    <input value="{{$data->email_one}}" type="text" name="email_one" class="form-control @error('email_one') is-invalid @enderror" id="email_one">
                                    @error('email_one')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="email_two">Email (two)</label>
                                    <input value="{{$data->email_two}}" type="text" name="email_two" class="form-control @error('email_two') is-invalid @enderror" id="email_two">
                                    @error('email_two')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label for="facebook">Facebook</label>
                                    <input value="{{$data->facebook}}" type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook">
                                    @error('facebook')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="twitter">Twitter</label>
                                    <input value="{{$data->twitter}}" type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter">
                                    @error('twitter')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input value="{{$data->linkedin}}" type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin">
                                    @error('linkedin')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="youtube">Youtube</label>
                                    <input value="{{$data->youtube}}" type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="youtube">
                                    @error('youtube')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="instagram">Instagram</label>
                                    <input value="{{$data->instagram}}" type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram">
                                    @error('instagram')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="copyright">Copyright</label>
                                    <input value="{{$data->copyright}}" type="text" name="copyright" class="form-control @error('copyright') is-invalid @enderror" id="copyright">
                                    @error('copyright')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="google_maps">Google Maps</label>
                                    <textarea name="google_maps" id="google_maps" class="form-control" rows="3" cols="3">{!!$data->google_maps!!}</textarea>
                                    @error('google_maps')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <hr class="w-100">

                                <div class="col-lg-4 form-group">
                                    <label for="header_logo">Header Logo</label>
                                    <input value="{{$data->header_logo}}" type="file" name="header_logo" class="p-1 form-control @error('header_logo') is-invalid @enderror" id="header_logo">
                                    @error('header_logo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    @if($data->header_logo)
                                    <div class="mt-2">
                                        <img id="preview-header_logo" src="{{ Storage::url($data->header_logo) }}"
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <img id="preview-header_logo" src=""
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;display:none;">
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="footer_logo">Footer Logo</label>
                                    <input value="{{$data->footer_logo}}" type="file" name="footer_logo" class="p-1 form-control @error('footer_logo') is-invalid @enderror" id="footer_logo">
                                    @error('footer_logo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    @if($data->footer_logo)
                                    <div class="mt-2">
                                        <img id="preview-footer_logo" src="{{ Storage::url($data->footer_logo) }}"
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <img id="preview-footer_logo" src=""
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;display:none;">
                                    </div>
                                    @endif
                                </div>

                                <div class="col-lg-4 form-group">
                                    <label for="favicon">Favicon</label>
                                    <input value="{{$data->favicon}}" type="file" name="favicon" class="p-1 form-control @error('favicon') is-invalid @enderror" id="favicon">
                                    @error('favicon')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    @if($data->favicon)
                                    <div class="mt-2">
                                        <img id="preview-favicon" src="{{ Storage::url($data->favicon) }}"
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <img id="preview-favicon" src=""
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;display:none;">
                                    </div>
                                    @endif
                                </div>


                                <hr class="w-100">


                                <div class="col-lg-6 form-group">
                                    <label for="vat_tax">Vat Tax<span class="text-black-50">(%)</span></label>
                                    <input value="{{$data->vat_tax}}" type="text" name="vat_tax" class="form-control @error('vat_tax') is-invalid @enderror" id="vat_tax">
                                    @error('vat_tax')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="bank_name">Bank Name<span class="text-danger">*</span></label>
                                    <input value="{{$data->bank_name}}" type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name">
                                    @error('bank_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="bank_email">Bank Email</label>
                                    <input value="{{$data->bank_email}}" type="text" name="bank_email" class="form-control @error('bank_email') is-invalid @enderror" id="bank_email">
                                    @error('bank_email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="bank_phone">Bank Phone</label>
                                    <input value="{{$data->bank_phone}}" type="text" name="bank_phone" class="form-control @error('bank_phone') is-invalid @enderror" id="bank_phone">
                                    @error('bank_phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="bank_address">Bank Address</label>
                                    <input value="{{$data->bank_address}}" type="text" name="bank_address" class="form-control @error('bank_address') is-invalid @enderror" id="bank_address">
                                    @error('bank_address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="established_year">Established Year</label>
                                    <input value="{{$data->established_year}}" type="text" name="established_year" class="form-control @error('established_year') is-invalid @enderror" id="established_year">
                                    @error('established_year')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="bank_logo">Bank Logo</label>
                                    <input value="{{$data->bank_logo}}" type="file" name="bank_logo" class=" p-1 form-control @error('bank_logo') is-invalid @enderror" id="bank_logo">
                                    @error('email_one')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                    @if($data->bank_logo)
                                    <div class="mt-2">
                                        <img id="preview-bank_logo" src="{{ Storage::url($data->bank_logo) }}"
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <img id="preview-bank_logo" src=""
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;display:none;">
                                    </div>
                                    @endif
                                </div>

                                <!-- <div class="col-lg-12 form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input value="{{$data->meta_title}}" type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="">
                                    @error('meta_title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="5" cols="5">{!!$data->meta_description!!}</textarea>
                                    @error('meta_description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-lg-12 form-group">
                                    <label for="meta_keyword">Meta Keywords</label>
                                    <textarea name="meta_keyword" id="meta_keyword" class="form-control" rows="5" cols="5">{!!$data->meta_keyword!!}</textarea>
                                    @error('meta_keyword')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-lg-12 form-group">
                                    <label for="meta_image">Meta Image</label>
                                    <input value="{{$data->meta_image}}" type="file" name="meta_image" class="p-1 form-control @error('meta_image') is-invalid @enderror" id="meta_image">
                                    @error('meta_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    @if($data->meta_image)
                                    <div class="mt-2">
                                        <img id="preview-meta_image" src="{{ Storage::url($data->meta_image) }}"
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <img id="preview-meta_image" src=""
                                            alt="Current Profile Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;display:none;">
                                    </div>
                                    @endif
                                </div> -->


                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Image Preview Script --}}
@section('script')
<script>
    document.getElementById('header_logo').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-header_logo');
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
<script>
    document.getElementById('footer_logo').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-footer_logo');
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
<script>
    document.getElementById('favicon').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-favicon');
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
<script>
    document.getElementById('meta_image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-meta_image');
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
<script>
    document.getElementById('bank_logo').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-bank_logo');
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
@endsection