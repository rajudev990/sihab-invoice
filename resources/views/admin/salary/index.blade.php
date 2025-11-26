@extends('admin.layouts.app')

@section('title')
Salary List
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Salary List</h3>
                        <a href="{{ route('admin.salary.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add Salary</a>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Employee</th>
                                    <th>Customer</th>
                                    <th>Department</th>
                                    <th>Salary</th>
                                    <th>Attendance</th>
                                    <th>Over Time</th>
                                    <th>Advanced</th>
                                    <th>Paid</th>
                                    <th>Salary Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                               
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{ $item->user->department->name }}</td>
                                    <td>{{ $item->user->basic_salary }}</td>
                                    <td>{{ $item->attendance }}(days)</td>
                                    <td>{{ $item->over_time }}</td>
                                    <td>{{ $item->advanced }}</td>
                                    <td>{{ $item->paid }}</td>
                                    <td>{{ $item->salary_date }}</td>
                                 
                               
                                    <td class="text-center">
                                        <a href="{{ route('admin.salary.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.salary.destroy', $item->id) }}" method="POST" style="display: none;">
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