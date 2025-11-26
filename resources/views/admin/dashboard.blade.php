@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    {{ session('locale', 'en') == 'ar' 
                            ? \App\Helpers\TranslateHelper::toArabic('Dashboard') 
                            : 'Dashboard' 
                            }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                        {{ session('locale', 'en') == 'ar' 
                            ? \App\Helpers\TranslateHelper::toArabic('Home') 
                            : 'Home' 
                            }}
                    </a></li>
                    <li class="breadcrumb-item active">
                        {{ session('locale', 'en') == 'ar' 
                            ? \App\Helpers\TranslateHelper::toArabic('Dashboard') 
                            : 'Dashboard' 
                            }}
                  </li>
                </ol>
            </div>
        </div>
    </div>
</div>



<section class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Employ -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{ $employee }}</h3>
                        <p>
                            {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Employee') : 'Employee' }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
            </div>

            <!-- Customer -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $customers }}</h3>
                        <p>
                            {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Customer') : 'Customer' }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <!-- Department -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $department }}</h3>
                        <p>
                            {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Department') : 'Department' }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
            </div>

            <!-- Total Payable -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-indigo">
                    <div class="inner">
                        <h3 class="text-light">{{ $total }}</h3>
                        <p class="text-light">
                             {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Total Payable') : 'Total Payable' }}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 card">
                <div class="card-header text-right" style="background: white !important;">
                    <a href="{{ route('admin.salary.report.pdf') }}" class="btn btn-primary"><i class="fa fa-print"></i> 
                     {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Print') : 'Print' }}
                </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('#') : '#' }}</th>
                                <th>{{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Department') : 'Department' }}</th>
                                <th>{{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Employee') : 'Employee' }}</th>
                                <th>{{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Total') : 'Total' }}</th>
                            </tr>
                        </thead>
                        <tbody>

                         @php
                            $grand_total = 0;
                        @endphp
                            @foreach($departments as $item)

                            @php
                                $dept_total = $item->users->sum(function($u){
                                    return $u->salary->sum('paid') + $u->salary->sum('advanced');
                                });

                                $grand_total += $dept_total;
                            @endphp

                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$item->name }}</td>
                                <td>{{$item->users->count() }}</td>
                                <td>
                                   {{ number_format(
                                        $item->users->sum(function($u){
                                            return $u->salary->sum('paid') + $u->salary->sum('advanced');
                                        }), 2
                                    ) }}

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">{{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Grand Total') : 'Grand Total' }}:</th>
                                <th>{{ number_format($grand_total,2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</section>


@endsection