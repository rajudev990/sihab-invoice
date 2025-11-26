@extends('admin.layouts.app')

@section('title', 'Add Salary')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Salary</h3>
                        <a href="{{ route('admin.staff.index') }}" class="btn btn-success float-right">
                            <i class="fa fa-angle-left"></i> Back
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.salary.store') }}" enctype="multipart/form-data" id="quickForm">
                        @csrf

                        <div class="card-body row">

                            <!-- Employee -->
                            <div class="form-group col-lg-6">
                                <label>Employee</label>
                                <select class="form-control select2" name="user_id" id="user_id" required>
                                    <option value="">Select Employee</option>
                                    @foreach($users as $item)
                                    <option value="{{ $item->id }}" data-salary="{{ $item->basic_salary }}">
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>

                            <!-- Customers -->
                            <div class="form-group col-lg-6">
                                <label>Customers</label>
                                <select class="form-control select2" name="customer_id" id="customer_id" required>
                                    @foreach($customers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Name -->
                            <div class="form-group col-lg-6">
                                <label>Basic Salary(Amount)<span class="text-danger">*</span></label>
                                <input type="text" id="basic_salary" class="form-control" readonly>
                            </div>



                            <!-- Staff ID -->
                            <div class="form-group col-lg-6">
                                <label>Attendance(days)</label>
                                <input type="text" id="attendance" name="attendance" value="{{ old('attendance') }}" class="form-control" placeholder="30" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Over Time(Amount)</label>
                                <input type="text" id="over_time" name="over_time" value="{{ old('over_time') }}" class="form-control" placeholder="2000" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Advanced(Amount)</label>
                                <input type="text" id="advanced" name="advanced" value="{{ old('advanced') }}" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Paid(Amount)</label>
                                <input type="text" id="paid" name="paid" value="{{ old('paid') }}" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Salary Date</label>
                                <input type="date" name="salary_date" value="{{ old('salary_date') }}" class="form-control" required>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Save
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
$(document).ready(function() {

    // Employee change এ Basic salary show
    $('#user_id').on('change', function () {
        var salary = $(this).find(':selected').data('salary');
        $('#basic_salary').val(salary ? salary : '');
        calculateSalary();
    });

    // যেকোনো field change হলে salary re-calc
    $('#attendance, #over_time, #advanced').on('input', function () {
        calculateSalary();
    });

    function calculateSalary() {

        var basic_salary = parseFloat($('#basic_salary').val()) || 0;
        var attendance = parseFloat($('#attendance').val()) || 0;
        var over_time = parseFloat($('#over_time').val()) || 0;
        var advanced = parseFloat($('#advanced').val()) || 0;

        // Per day salary
        var per_day = basic_salary / 30;

        // Attendance salary
        var attendance_salary = per_day * attendance;

        // Final salary = attendance salary + overtime - advance
        var final_paid = attendance_salary + over_time - advanced;

        $('#paid').val(final_paid.toFixed(2));
    }

    // Page load হলে employee salary দেখাবে
    $('#user_id').trigger('change');

});
</script>

@endsection