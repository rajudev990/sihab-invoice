<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Salary;
use App\Models\Setting;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function taxInvoice()
    {
        return view('admin.report.tax-invoice');
    }
    public function taxInvoiceCreate()
    {
        $customers = Customer::all();
        return view('admin.report.tax-invoice-create',compact('customers'));
    }


    public function vat_tax()
    {
        $customers = Customer::all();
        $salaries = [];

        return view('admin.report.vat', [
            'customers' => $customers,
            'salaries'  => $salaries
        ]);
    }


    public function reportsFilter(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
        ]);

        $customers = Customer::all();

        $query = Salary::with(['user', 'customer']);

        if ($request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('salary_date', [$request->start_date, $request->end_date]);
        } elseif ($request->start_date) {
            $query->whereDate('salary_date', '>=', $request->start_date);
        } elseif ($request->end_date) {
            $query->whereDate('salary_date', '<=', $request->end_date);
        }

        $salaries = $query->orderBy('id', 'ASC')->get();

        return view('admin.report.vat', [
            'customers' => $customers,
            'salaries'  => $salaries
        ]);
    }

    public function print(Request $request)
    {
        $q = Salary::query();

        if ($request->customer_id) {
            $q->where('customer_id', $request->customer_id);
        }

        if ($request->start_date) {
            $q->whereDate('salary_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $q->whereDate('salary_date', '<=', $request->end_date);
        }

        $salaries = $q->orderBy('id', 'DESC')->get();
        $customer = Customer::find($request->customer_id);
        $setting = Setting::first(); // company info, vat_tax, etc.

        // Subtotal (Paid + Advanced)
        $subtotal = $salaries->sum(function ($item) {
            return $item->paid + $item->advanced;
        });

        // VAT / Tax
        $tax = ($subtotal * $setting->vat_tax) / 100;

        // Total Amount
        $total = $subtotal + $tax;

        return view('admin.report.print', compact('salaries', 'customer', 'setting', 'subtotal', 'tax', 'total'));
    }
}
