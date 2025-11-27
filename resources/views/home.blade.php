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

            <div class="col-12 card">

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('#')
                                    : '#'
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
                                    ? \App\Helpers\TranslateHelper::toArabic('Attendance')
                                    : 'Attendance'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Over Time')
                                    : 'Over Time'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Advanced')
                                    : 'Advanced'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Paid')
                                    : 'Paid'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Salary Date')
                                    : 'Salary Date'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Status')
                                    : 'Status'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Total')
                                    : 'Total'
                                    }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grand_total = 0; @endphp
                            @foreach ($salary as $item)
                            @php
                            $total = $item->paid + $item->advanced;
                            $grand_total += $total;
                            @endphp
                            <tr>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic($loop->iteration) : $loop->iteration }}</td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic(number_format($item->user->basic_salary,2)) :
                                    number_format($item->user->basic_salary,2) }}</td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic($item->attendance).' (days)' :
                                    $item->attendance.' (days)' }}</td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic(number_format($item->over_time,2)) :
                                    number_format($item->over_time,2) }}</td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic(number_format($item->advanced,2)) :
                                    number_format($item->advanced,2) }}</td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic(number_format($item->paid,2)) :
                                    number_format($item->paid,2) }}</td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic($item->salary_date) : $item->salary_date }}
                                </td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Paid') :
                                        'Paid' }}
                                    </span>
                                </td>
                                <td>{{ session('locale') == 'ar' ?
                                    \App\Helpers\TranslateHelper::toArabic(number_format($total,2)) :
                                    number_format($total,2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="8" class="text-end">
                                    {{ session('locale', 'en') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic('Grand Total')
                                    : 'Grand Total'
                                    }}
                                </th>
                                <th>
                                    {{ session('locale') == 'ar'
                                    ? \App\Helpers\TranslateHelper::toArabic(number_format($grand_total,2))
                                    : number_format($grand_total,2)
                                    }}
                                </th>
                            </tr>
                        </tfoot>

                    </table>
                </div>


            </div>
        </div>



    </div>
</section>


@endsection