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

                    <form method="POST" action="{{ route('admin.salary.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">

                            <!-- Employee -->
                            <div class="form-group col-lg-6">
                                <label>Employee</label>
                                <select class="form-control select2" name="user_id" id="user_id" required>
                                    <option value="">Select Employee</option>
                                    @foreach($users as $item)
                                    <option value="{{ $item->id }}"
                                        data-salary="{{ $item->basic_salary }}"
                                        {{ $item->id == $data->user_id ? 'selected':'' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Customer -->
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

                            <!-- Month -->
                            <div class="form-group col-lg-6">
                                <label>Salary Month</label>
                                <select class="form-control select2" name="month" id="month" required>
                                    <option value="">Select Month</option>
                                    @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $m)
                                        <option value="{{ $m }}" {{ $m == $data->month ? 'selected':'' }}>{{ $m }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Attendance -->
                            <div class="form-group col-lg-6">
                                <label>Attendance (days)</label>
                                <input type="text" id="attendance" name="attendance"
                                    value="{{ $data->attendance }}" class="form-control" required>
                            </div>

                            <!-- Overtime -->
                            <div class="form-group col-lg-6">
                                <label>Over Time (hours)</label>
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

                            <!-- Status -->
                            <div class="form-group col-lg-6">
                                <label>Salary Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="0" {{ $data->status == 0 ? 'selected':'' }}>Pending</option>
                                    <option value="1" {{ $data->status == 1 ? 'selected':'' }}>Paid</option>
                                </select>
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

    // Month wise total days
    const monthDays = {
        "January": 31,
        "February": 28,
        "March": 31,
        "April": 30,
        "May": 31,
        "June": 30,
        "July": 31,
        "August": 31,
        "September": 30,
        "October": 31,
        "November": 30,
        "December": 31
    };

    // Employee select → basic salary show
    $('#user_id').on('change', function () {
        var salary = $(this).find(':selected').data('salary');
        $('#basic_salary').val(salary ? salary : '');
        calculateSalary();
    });

    // Month Changed
    $('#month').on('change', function () {
        calculateSalary();
    });

    // Fields change
    $('#attendance, #over_time, #advanced').on('input', function () {
        calculateSalary();
    });

    function calculateSalary() {

        var basic_salary = parseFloat($('#basic_salary').val()) || 0;
        var attendance = parseFloat($('#attendance').val()) || 0;
        var over_time_hours = parseFloat($('#over_time').val()) || 0;
        var advanced = parseFloat($('#advanced').val()) || 0;

        // Selected month set
        var month = $('#month').val();
        var total_days = monthDays[month] || 30;

        // Per day salary
        var per_day_salary = basic_salary / total_days;

        // Attendance salary
        var attendance_salary = per_day_salary * attendance;

        // Overtime salary (Rule: 1.5 × hourly rate)
        var hourly_rate = (basic_salary / total_days) / 10;
        var overtime_salary = over_time_hours * hourly_rate * 1.5;

        // Final salary
        var final_paid = attendance_salary + overtime_salary - advanced;

        $('#paid').val(final_paid.toFixed(2));
    }

    // Auto trigger on page load
    $('#user_id').trigger('change');

});
</script>
@endsection
