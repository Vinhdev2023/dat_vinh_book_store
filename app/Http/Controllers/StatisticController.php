<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\HttpKernel\Debug\push;

class StatisticController extends Controller
{
    public function statistic_view(){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/statistics';
        $a = DB::table('orders')
            ->where('orders.status', '=', 'COMPLETED');
        $date = DB::table($a)
            ->selectRaw('SUM(total) AS total, date(created_at) AS date')
            ->groupBy('date')->get();
        $month = DB::table($a)
            ->selectRaw('SUM(total) AS total, date(created_at) AS month, month(created_at) AS month_grouped')
            ->groupBy('month_grouped')->get();
        $sumTotal = $a->selectRaw('SUM(total) AS total')->first()->total;
        $num = 0;
        $dataDateTotal = [];
        $dataDate = [];
        foreach ($date as $obj) {
            $num++;
            $dataDateTotal[] = [$num, $obj->total];
            $dataDate[] = [$num, date_format(date_create($obj->date), 'd-m-Y').' '.number_format($obj->total).' VND'];
        }
        $num = 0;
        $dataMonthTotal = [];
        $dataMonth = [];
        foreach ($month as $obj){
            $num++;
            $dataMonthTotal[] = [$num, $obj->total];
            $dataMonth[] = [$num, date_format(date_create($obj->month), 'm-Y').' '.number_format($obj->total).' VND'];
        }
        return view('AdminPages.AdminStatistics', compact('path', 'dataMonthTotal', 'dataMonth', 'dataDateTotal', 'dataDate', 'sumTotal'));
    }

    public function statistic_get_data(Request $request){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/statistics';
        $dateInput = $request->FromDateToDate;
        $EndDate = substr($dateInput, strpos($dateInput,' - ') + 3, strlen($dateInput));
        $EndDate = date_format(date_create($EndDate), 'Y-m-d');
        $StartDate = substr($dateInput, 0 , strpos($dateInput,' - '));
        $StartDate = date_format(date_create($StartDate), 'Y-m-d');
        $a = DB::table('orders')
            ->whereDate('orders.created_at', '>=', $StartDate)
            ->whereDate('orders.created_at', '<=', $EndDate)
            ->where('orders.status', '=', 'COMPLETED');
        $date = DB::table($a)
            ->selectRaw('SUM(total) AS total, date(created_at) AS date')
            ->groupBy('date')->get();
        $month = DB::table($a)
            ->selectRaw('SUM(total) AS total, date(created_at) AS month, month(created_at) AS month_grouped')
            ->groupBy('month_grouped')->get();
        $sumTotal = $a->selectRaw('SUM(total) AS total')->first()->total;
        $num = 0;
        $dataDateTotal = [];
        $dataDate = [];
        foreach ($date as $obj) {
            $num++;
            $dataDateTotal[] = [$num, $obj->total];
            $dataDate[] = [$num, date_format(date_create($obj->date), 'd-m-Y').' '.number_format($obj->total).' VND'];
        }
        $num = 0;
        $dataMonthTotal = [];
        $dataMonth = [];
        foreach ($month as $obj){
            $num++;
            $dataMonthTotal[] = [$num, $obj->total];
            $dataMonth[] = [$num, date_format(date_create($obj->month), 'm-Y').' '.number_format($obj->total).' VND'];
        }
//        dd($dataTotal, $dataDate);
        return view('AdminPages.AdminStatistics', compact('path', 'dataMonthTotal', 'dataMonth', 'dataDateTotal', 'dataDate', 'sumTotal', 'dateInput'));
    }
}
