@extends('admin.layouts.app')

@section('title')
Employe List
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Employe List</h3>
                        <a href="{{ route('admin.staff.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add Employe</a>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Staff</th>
                                    <th>Employee</th>
                                    <th>Basic Salary</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                               
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        
                                        <p class="mb-0"><b>ID :</b>#{{ $item->staff_id }}</p>
                                        <p class="mb-0"><b>Department :</b>{{ $item->department?->name }}</p>
                                        <p class="mb-0"><b>Position :</b>{{ $item->position?->name }}</p>

                                    </td>
     
                                    <td>
                                        <p class="mb-0"><b>Name :</b>{{ $item->name }}</p>
                                        <p class="mb-0"><b>Email :</b>{{ $item->email }}</p>
                                        <p class="mb-0"><b>Phone :</b>{{ $item->phone }}</p>
                                    </td>
                                    <td>
                                        <b class="text-success">{{ $item->basic_salary }}</b>
                                    </td>
                                   <td>
                            
                                    <span class="badge bg-success">{{ $item->country}}</span>
                                      
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.staff.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.staff.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf @method('DELETE')
                                        </form>
                                        <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                       
                                    </td>
                                </tr>
                                
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection