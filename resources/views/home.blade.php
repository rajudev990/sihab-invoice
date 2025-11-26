@extends('layouts.app')

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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">
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
                        <h3></h3>
                        <p>
                           
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
                        <h3></h3>
                        <p>
                            
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
                        <h3></h3>
                        <p>
                            
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
                        <h3 class="text-light"></h3>
                        <p class="text-light">
                             
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>

        </div>

       

    </div>
</section>


@endsection