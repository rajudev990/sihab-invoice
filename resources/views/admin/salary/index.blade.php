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
                        <h3 class="card-title">
                            {{ session('locale') == 'ar' 
                            ? \App\Helpers\TranslateHelper::toArabic('Salary List') 
                            : 'Salary List' }}
                        </h3>
                        <a href="{{ route('admin.salary.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i>
                        {{ session('locale') == 'ar' 
                        ? \App\Helpers\TranslateHelper::toArabic('Add Salary') 
                        : 'Add Salary' }}
                    </a>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Sl') : 'Sl' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Employee') : 'Employee' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Customer') : 'Customer' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Department') : 'Department' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Salary') : 'Salary' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Attendance') : 'Attendance' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Over Time') : 'Over Time' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Advanced') : 'Advanced' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Paid') : 'Paid' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Salary Date') : 'Salary Date' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Action') : 'Action' }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                               
                                <tr>
                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($loop->iteration) : $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->user->name) : $item->user->name }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->customer->name) : $item->customer->name }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->user->department->name) : $item->user->department->name }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->user->basic_salary) : $item->user->basic_salary }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->attendance) : $item->attendance }}(days)
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->over_time) : $item->over_time }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->advanced) : $item->advanced }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->paid) : $item->paid }}
                                    </td>

                                    <td>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->salary_date) : $item->salary_date }}
                                    </td>

                                 
                               
                                    <td class="text-center">
                                        <a href="{{ route('admin.salary.print', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></a>
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