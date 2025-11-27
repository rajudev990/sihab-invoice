@extends('admin.layouts.app')

@section('title','Tax Invoice')

@section('content')
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
                           Tax Invoice List
                        </h3>
                        <a href="{{ route('admin.tax-invoice.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i>
                       Add Tax Invoice
                    </a>
                    </div>

                    <div class="card-body">
                        <table id="" class="table table-bordered table-striped">
                          
                        
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@endsection