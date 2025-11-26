@extends('admin.layouts.app')

@section('title', 'Edit Salary')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Edit Salary</h3>
                        <a href="{{ route('admin.salary.index') }}" class="btn btn-success float-right">
                            <i class="fa fa-angle-left"></i> Back
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.salary.update', $data->id) }}" enctype="multipart/form-data" id="quickForm">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">

                            <!-- Employee -->
                            <div class="form-group col-lg-6">
                                <label>Employee</label>
                                <select class="form-control select2" name="user_id" id="user_id" required>
                                    <option value="">Select Employee</option>
                                    @foreach($users as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        data-salary="{{ $item->basic_salary }}"
                                        {{ $item->id == $data->user_id ? 'selected':'' }}
                                    >
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
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $data->customer_id ? 'selected':'' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Basic Salary -->
                            <div class="form-group col-lg-6">
                                <label>Basic Salary (Amount)</label>
                                <input type="text" id="basic_salary" class="form-control" readonly>
                            </div>

                            <!-- Attendance -->
                            <div class="form-group col-lg-6">
                                <label>Attendance (days)</label>
                                <input type="text" id="attendance" name="attendance"
                                       value="{{ $data->attendance }}" class="form-control" required>
                            </div>

                            <!-- Overtime -->
                            <div class="form-group col-lg-6">
                                <label>Over Time (Amount)</label>
                                <input type="text" id="over_time" name="over_time"
                                       value="{{ $data->over_time }}" class="form-control" required>
                            </div>

                            <!-- Advanced -->
                            <div class="form-group col-lg-6">
                                <label>Advanced (Amount)</label>
                                <input type="text" id="advanced" name="advanced"
                                       value="{{ $data->advanced }}" class="form-control" required>
                            </div>

                            <!-- Paid -->
                            <div class="form-group col-lg-6">
                                <label>Paid (Amount)</label>
                                <input type="text" id="paid" name="paid"
                                       value="{{ $data->paid }}" class="form-control" required>
                            </div>

                            <!-- Salary Date -->
                            <div class="form-group col-lg-6">
                                <label>Salary Date</label>
                                <input type="date" name="salary_date"
                                       value="{{ $data->salary_date }}" class="form-control" required>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Update
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

        var per_day = basic_salary / 30;

        var attendance_salary = per_day * attendance;

        var final_paid = attendance_salary + over_time - advanced;

        $('#paid').val(final_paid.toFixed(2));
    }

    // Page load এ employee salary show হবে
    $('#user_id').trigger('change');

});
</script>
@endsection
