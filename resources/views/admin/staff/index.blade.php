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
                        <h3 class="card-title">
                            {{ session('locale', 'en') == 'ar' 
                                ? \App\Helpers\TranslateHelper::toArabic('Employe List') 
                                : 'Employe List' 
                            }}
                            </h3>
                        <a href="{{ route('admin.staff.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i>
                        {{ session('locale', 'en') == 'ar' 
                            ? \App\Helpers\TranslateHelper::toArabic('Add Employe') 
                            : 'Add Employe' 
                        }}
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        {{ session('locale', 'en') == 'ar' 
                                        ? \App\Helpers\TranslateHelper::toArabic('Sl') 
                                        : 'Sl' 
                                        }}
                                    </th>
                                    <th>
                                        {{ session('locale', 'en') == 'ar' 
                                        ? \App\Helpers\TranslateHelper::toArabic('Staff') 
                                        : 'Staff' 
                                        }}
                                    </th>
                                    <th>
                                        {{ session('locale', 'en') == 'ar' 
                                        ? \App\Helpers\TranslateHelper::toArabic('Employee') 
                                        : 'Employee' 
                                        }}
                                    </th>
                                    <th>
                                        {{ session('locale', 'en') == 'ar' 
                                        ? \App\Helpers\TranslateHelper::toArabic('Basic Salary') 
                                        : 'Basic Salary' 
                                        }}
                                    </th>
                                    <th>
                                        {{ session('locale', 'en') == 'ar' 
                                        ? \App\Helpers\TranslateHelper::toArabic('Country') 
                                        : 'Country' 
                                        }}
                                    </th>
                                    <th>
                                        {{ session('locale', 'en') == 'ar' 
                                        ? \App\Helpers\TranslateHelper::toArabic('Action') 
                                        : 'Action' 
                                        }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)

                                <tr>
                                   <td>
                                        {{ session('locale') == 'ar'
                                            ? \App\Helpers\TranslateHelper::toArabic($loop->iteration)
                                            : $loop->iteration }}
                                    </td>
                                    <td>
                                        <p class="mb-0">
                                            <b>
                                                {{ session('locale') == 'ar' 
                                                    ? \App\Helpers\TranslateHelper::toArabic('ID :') 
                                                    : 'ID :' }}
                                            </b>

                                            {{ session('locale') == 'ar' 
                                                ? \App\Helpers\TranslateHelper::toArabic('#' . $item->staff_id) 
                                                : '#' . $item->staff_id }}
                                        </p>

                                        <p class="mb-0">
                                            <b>
                                                {{ session('locale') == 'ar' 
                                                    ? \App\Helpers\TranslateHelper::toArabic('Department :') 
                                                    : 'Department :' }}
                                            </b>

                                            {{ session('locale') == 'ar' 
                                                ? \App\Helpers\TranslateHelper::toArabic($item->department?->name) 
                                                : $item->department?->name }}
                                        </p>

                                        <p class="mb-0">
                                            <b>
                                                {{ session('locale') == 'ar' 
                                                    ? \App\Helpers\TranslateHelper::toArabic('Position :') 
                                                    : 'Position :' }}
                                            </b>

                                            {{ session('locale') == 'ar' 
                                                ? \App\Helpers\TranslateHelper::toArabic($item->position?->name) 
                                                : $item->position?->name }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="mb-0">
                                            <b>
                                                {{ session('locale') == 'ar'
                                                    ? \App\Helpers\TranslateHelper::toArabic('Name :')
                                                    : 'Name :' }}
                                            </b>

                                            {{ session('locale') == 'ar'
                                                ? \App\Helpers\TranslateHelper::toArabic($item->name)
                                                : $item->name }}
                                        </p>

                                        <p class="mb-0">
                                            <b>
                                                {{ session('locale') == 'ar'
                                                    ? \App\Helpers\TranslateHelper::toArabic('Email :')
                                                    : 'Email :' }}
                                            </b>

                                            {{ session('locale') == 'ar'
                                                ? \App\Helpers\TranslateHelper::toArabic($item->email)
                                                : $item->email }}
                                        </p>

                                        <p class="mb-0">
                                            <b>
                                                {{ session('locale') == 'ar'
                                                    ? \App\Helpers\TranslateHelper::toArabic('Phone :')
                                                    : 'Phone :' }}
                                            </b>

                                            {{ session('locale') == 'ar'
                                                ? \App\Helpers\TranslateHelper::toArabic($item->phone)
                                                : $item->phone }}
                                        </p>
                                    </td>


                                    <td>
                                        <b class="text-success">
                                         {{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->basic_salary) : $item->basic_salary }}
                                        </b>
                                    </td>
                                    <td>

                                        <span class="badge bg-success">
                                        {{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->country) : $item->country }}
                                        </span>

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