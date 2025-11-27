<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ session('locale') == 'ar'
        ? \App\Helpers\TranslateHelper::toArabic('Salary Report')
        : 'Salary Report'
        }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            width: 100%;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .invoice-wrapper {
            background: #ffffff;
            width: 90%;
            margin: auto;
            padding-bottom: 120px;

        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-top: 30px;
        }

        .header img {
            width: 120px;
        }

        .company-info {
            text-align: right;
        }

        .company-info h2 {
            margin: 0;
            color: #3f51b5;
        }

        .two-column {
            width: 100%;
            margin-top: 30px;
        }

        .two-column::after {
            content: "";
            display: block;
            clear: both;
        }

        .info-card {
            width: 45%;
            float: left;
            background: #f8f9ff;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e3e6ff;
            box-sizing: border-box;
            margin-right: 5%;
        }

        .info-card:last-child {
            margin-right: 0;
        }

        .info-card h3 {
            margin-top: 0;
            color: #3f51b5;
        }

        table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }

        table thead {
            background: #3f51b5;
            color: #fff;
        }

        table th,
        table td {
            padding: 12px;
            text-align: center;
        }
        table td {
            border: 1px solid #817f7f;
        }

        /* FIXED FOOTER */
    </style>
</head>

<body>

    <div class="invoice-wrapper">
        <div class="header">
            <img src="{{ $logoPath  }}" alt="Logo" />
            <div class="company-info">
                <h2>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($setting->company_name)
                    : $setting->company_name
                    }}
                </h2>

                <p>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($setting->address)
                    : $setting->address
                    }}
                </p>

                <p>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($setting->email_one)
                    : $setting->email_one
                    }}
                </p>

                <p>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($setting->phone_one)
                    : $setting->phone_one
                    }}
                </p>
            </div>

        </div>

        <table>
            <thead>
                <tr>
                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('#')
                        : '#'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Department')
                        : 'Department'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Employee')
                        : 'Employee'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Total')
                        : 'Total'
                        }}
                    </th>
                </tr>

            </thead>
            <tbody>
                @foreach($departments as $item)
                <tr>
                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($loop->iteration)
                        : $loop->iteration
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($item->name)
                        : $item->name
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($item->users->count())
                        : $item->users->count()
                        }}
                    </td>

                    <td>
                        @php
                        $total = number_format(
                        $item->users->sum(function ($u) {
                        return $u->salary->sum('paid') + $u->salary->sum('advanced');
                        }),
                        2
                        );
                        @endphp

                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($total)
                        : $total
                        }}
                    </td>
                </tr>

                @endforeach
                <tr>
                    <th colspan="3">
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Grand Total')
                        : 'Grand Total'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic(number_format($grand_total, 2))
                        : number_format($grand_total, 2)
                        }}
                    </th>
                </tr>

            </tbody>
        </table>



    </div>


    <!-- Footer -->
    <!-- Footer -->
    <div class="footer"
        style="background: #3f51b5; color: #fff; position: fixed; bottom: 0; left: 0; right: 0; width: 100%; padding: 10px 0;">
        <table style="width: 90%; margin: auto;">
            <tr style="border: none;">
                <td style="text-align: left; border: none;">
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Email:')
                        : 'Email:'
                        }}
                    </strong>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($setting->email_one)
                    : $setting->email_one
                    }}
                </td>

                <td style="text-align: right; border: none;">
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Address:')
                        : 'Address:'
                        }}
                    </strong>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($setting->address)
                    : $setting->address
                    }}
                </td>

            </tr>
        </table>
    </div>



</body>

</html>