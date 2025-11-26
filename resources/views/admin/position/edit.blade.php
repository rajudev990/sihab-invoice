@extends('admin.layouts.app')

@section('title')
Update Position
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Position</h3>
            
                        <a href="{{ route('admin.position.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{route('admin.position.update',$data->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{$data->name}}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$data->status==1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$data->status==0 ? 'selected' : ''}}>Deactive</option>
                                </select>
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