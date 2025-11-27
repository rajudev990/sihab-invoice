@extends('admin.layouts.app')
@section('title','Create Tax Invoice')
@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto mt-2">
                <div class="card card-cyan">

                    <div class="card-body row">

                        <!-- Customer -->
                        <div class="form-group col-lg-4">
                            <label>Customers</label>
                            <select class="form-control select2" name="customer_id" required>
                                <option value="">Select Customers</option>
                                @foreach($customers as $item)
                                <option value="{{ $item->id }}" {{ (old('customer_id', request('customer_id'))==$item->
                                    id) ?
                                    'selected' : '' }}>
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


                </div>
            </div>
        </div>
    </div>
</section>
@endsection