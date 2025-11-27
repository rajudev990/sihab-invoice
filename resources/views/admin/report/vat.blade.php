@extends('admin.layouts.app')
@section('title', 'Reports')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">

        <!-- FILTER FORM -->
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">
                    <form method="POST" action="{{ route('admin.reports-filter') }}">
                        @csrf

                        <div class="card-body row">

                            <!-- Customer -->
                            <div class="form-group col-lg-4">
                                <label>Customers</label>
                                <select class="form-control select2" name="customer_id" required>
                                    <option value="">Select Customers</option>
                                    @foreach($customers as $item)
                                    <option value="{{ $item->id }}" {{ (old('customer_id',
                                        request('customer_id'))==$item->id) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Start Date -->
                            <div class="form-group col-lg-4">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ old('start_date', request('start_date')) }}">
                            </div>

                            <!-- End Date -->
                            <div class="form-group col-lg-4">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ old('end_date', request('end_date')) }}">
                            </div>

                            <div class="form-group col-lg-12 text-right">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <!-- RESULTS TABLE -->
        @if(count($salaries) > 0)
        @php
        $total_advanced = $salaries->sum('advanced');
        $total_paid = $salaries->sum('paid');

        $grand_total = $total_advanced + $total_paid;

        $tax_percent = 15; // fixed tax 15%
        $tax_amount = ($grand_total * $tax_percent) / 100;

        $total_amount_with_tax = $grand_total + $tax_amount;
        @endphp

        <div class="row mt-3">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Filtered Salary Report</h4>
                    </div>

                    <div class="card-body">
                        <div class="text-right mb-3">
                            <a href="{{ route('admin.reports-print') }}?customer_id={{ request('customer_id') }}&start_date={{ request('start_date') }}&end_date={{ request('end_date') }}"
                            target="_blank"
                            class="btn btn-dark">
                                <i class="fa fa-print"></i> Print
                            </a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Invoice
                                        No') : 'Invoice No' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ?
                                        \App\Helpers\TranslateHelper::toArabic('Employee') : 'Employee' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Basic
                                        Salary') : 'Basic Salary' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ?
                                        \App\Helpers\TranslateHelper::toArabic('Attendance') : 'Attendance' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Over
                                        Time') : 'Over Time' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ?
                                        \App\Helpers\TranslateHelper::toArabic('Advanced') : 'Advanced' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Paid') :
                                        'Paid' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Salary
                                        Date') : 'Salary Date' }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($salaries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td>{{ session('locale') == 'ar' ?
                                        \App\Helpers\TranslateHelper::toArabic($item->user->name) : $item->user->name }}
                                    </td>
                                    <td>{{ number_format($item->user->basic_salary,2) }}</td>
                                    <td>{{ $item->attendance }} ({{ session('locale') == 'ar' ?
                                        \App\Helpers\TranslateHelper::toArabic('days') : 'days' }})</td>
                                    <td>{{ number_format($item->over_time,2) }} ({{ session('locale') == 'ar' ?
                                        \App\Helpers\TranslateHelper::toArabic('hours') : 'hours' }})</td>
                                    <td>{{ number_format($item->advanced,2) }}</td>
                                    <td>{{ number_format($item->paid,2) }}</td>
                                    <td>{{ $item->salary_date }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr class="bg-light">
                                    <th colspan="7" class="text-right">
                                        {{ session('locale') == 'ar'
                                        ? \App\Helpers\TranslateHelper::toArabic('Grand Total (Advanced + Paid)')
                                        : 'Grand Total (Advanced + Paid)' }}
                                    </th>
                                    <th colspan="3">{{ number_format($grand_total, 2) }}</th>
                                </tr>

                                <tr class="bg-light">
                                    <th colspan="7" class="text-right">
                                        {{ session('locale') == 'ar'
                                        ? \App\Helpers\TranslateHelper::toArabic('Tax (15%)')
                                        : 'Tax (15%)' }}
                                    </th>
                                    <th colspan="3">{{ number_format($tax_amount, 2) }}</th>
                                </tr>

                                <tr class="bg-info text-white">
                                    <th colspan="7" class="text-right">
                                        {{ session('locale') == 'ar'
                                        ? \App\Helpers\TranslateHelper::toArabic('Total Amount')
                                        : 'Total Amount' }}
                                    </th>
                                    <th colspan="3">{{ number_format($total_amount_with_tax, 2) }}</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>

                </div>

            </div>
        </div>
        @endif

    </div>
</section>
@endsection