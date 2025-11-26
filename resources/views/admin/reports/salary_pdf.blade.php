<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Salary Report</title>
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
            border: 1px solid #ddd;
            text-align: center;
        }

        /* FIXED FOOTER */
    </style>
</head>

<body>

    <div class="invoice-wrapper">
        <div class="header">
            <img src="{{ $logoPath  }}" alt="Logo" />
            <div class="company-info">
                <h2>{{$setting->company_name}}</h2>
                <p>{{$setting->address}}</p>
                <p>{{$setting->email_one}}</p>
                <p>{{$setting->phone_one}}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Department</th>
                    <th>Employee</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->users->count() }}</td>
                <td>
                    {{ number_format($item->users->sum(function($u){
                    return $u->salary->sum('paid') + $u->salary->sum('advanced');
                }), 2) }}
                </td>
            </tr>
            @endforeach
                <tr>
                    <th colspan="3">Grand Total</th>
                    <th>{{ number_format($grand_total,2) }}</th>
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
                <td style="text-align: left;border: none;"><strong>Email:</strong> {{$setting->email_one}}</td>
                <td style="text-align: right;border: none;"><strong>Address:</strong> {{$setting->address}}</td>
            </tr>
        </table>
    </div>



</body>

</html>