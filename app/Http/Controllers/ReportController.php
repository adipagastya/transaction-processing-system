<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function transactionsReport()
    {
        return view('dashboard.reports.transactionsreport', [
            'title' => 'Laporan Transaksi',
            'transactions' => Transaction::all(),
            'items' => Item::all(),
        ]);
    }

    public function itemsReport()
    {
        return view('dashboard.reports.itemsreport', [
            'title' => 'Laporan Stok Barang',
            'items' => Item::all(),
        ]);
    }

    public function salesReport()
    {
        $transacitons = DB::table('transactions')->distinct()->get(['year']);

        return view('dashboard.reports.salesreport', [
            'title' => 'Laporan Penjualan',
            'transactions' => $transacitons,
        ]);
    }

    public function salesReportDetail($year)
    {
        return view('dashboard.reports.salesreportdetail', [
            'title' => 'Laporan Penjualan '.$year,
            'transactions' => Transaction::where('year', $year)->get(),
            'total' => Transaction::where('year', $year)->sum('total'),
            'items' => Item::all(),
        ]);
    }
}
