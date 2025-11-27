<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ session('locale') == 'ar'
        ? \App\Helpers\TranslateHelper::toArabic('Salary Report #' . $data->user->staff_id)
        : 'Salary Report #' . $data->user->staff_id
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
            font-family: 'DejaVu Sans', sans-serif;
            direction: {{ session('locale') == 'ar' ? 'rtl' : 'ltr' }};
            text-align: {{ session('locale') == 'ar' ? 'right' : 'left' }};
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

        <div class="two-column">
            <div class="info-card">
                <h3>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic('Customer Information')
                    : 'Customer Information'
                    }}
                </h3>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Name:')
                        : 'Name:'
                        }}
                    </strong>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($data->customer->name)
                    : $data->customer->name
                    }}
                </p>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Address:')
                        : 'Address:'
                        }}
                    </strong>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($data->customer->address)
                    : $data->customer->address
                    }}
                </p>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Email:')
                        : 'Email:'
                        }}
                    </strong>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($data->customer->email)
                    : $data->customer->email
                    }}
                </p>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Phone:')
                        : 'Phone:'
                        }}
                    </strong>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($data->customer->phone)
                    : $data->customer->phone
                    }}
                </p>
            </div>


            <div class="info-card">
                <h3>
                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic('Invoice Details')
                    : 'Invoice Details'
                    }}
                </h3>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Invoice No:')
                        : 'Invoice No:'
                        }}
                    </strong>

                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic('INV-' . $data->id)
                    : 'INV-' . $data->id
                    }}
                </p>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Date:')
                        : 'Date:'
                        }}
                    </strong>

                    {{ session('locale') == 'ar'
                    ? \App\Helpers\TranslateHelper::toArabic($data->salary_date)
                    : $data->salary_date
                    }}
                </p>

                <p>
                    <strong>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Status:')
                        : 'Status:'
                        }}
                    </strong>

                    <span
                        style="font-weight: bold; background-color: green; color: white; padding: 2px 6px; border-radius: 4px;">
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Paid')
                        : 'Paid'
                        }}
                    </span>
                </p>
            </div>

        </div>

        <table>
            <thead>
                <tr>
                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('# ID')
                        : '# ID'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Name')
                        : 'Name'
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
                        ? \App\Helpers\TranslateHelper::toArabic('Position')
                        : 'Position'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Level')
                        : 'Level'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Basic Salary')
                        : 'Basic Salary'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Attendance')
                        : 'Attendance'
                        }}
                    </th>

                    <th>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic('Payable Salary')
                        : 'Payable Salary'
                        }}
                    </th>
                </tr>

            </thead>
            <tbody>

                <tr>
                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($data->user->staff_id)
                        : $data->user->staff_id
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($data->user->name)
                        : $data->user->name
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($data->user->department->name)
                        : $data->user->department->name
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($data->user->position->name)
                        : $data->user->position->name
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($data->user->level)
                        : $data->user->level
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic(number_format($data->user->basic_salary, 2))
                        : number_format($data->user->basic_salary, 2)
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic($data->attendance . '(days)')
                        : $data->attendance . '(days)'
                        }}
                    </td>

                    <td>
                        {{ session('locale') == 'ar'
                        ? \App\Helpers\TranslateHelper::toArabic(number_format($data->paid + $data->advanced, 2))
                        : number_format($data->paid + $data->advanced, 2)
                        }}
                    </td>
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