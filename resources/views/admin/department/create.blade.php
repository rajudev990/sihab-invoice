@extends('admin.layouts.app')

@section('title')
Add Department
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Department</h3>

                        <a href="{{ route('admin.department.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{route('admin.department.store') }}">
                        @csrf
                        @method('POST')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
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