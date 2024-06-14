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
        $sumTotal = 0;
        $dataTotal = [];
        $dataDate = [];
        return view('AdminPages.AdminStatistics', compact('path', 'dataTotal', 'dataDate', 'sumTotal'));
    }

    public function statistic_get_data(Request $request){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/statistics';
        $date = $request->FromDateToDate;
        $EndDate = substr($date, strpos($date,' - ') + 3, strlen($date));
        $EndDate = date_format(date_create($EndDate), 'Y-m-d');
        $StartDate = substr($date, 0 , strpos($date,' - '));
        $StartDate = date_format(date_create($StartDate), 'Y-m-d');
        $a = DB::table('orders')
            ->whereDate('orders.created_at', '>=', $StartDate)
            ->whereDate('orders.created_at', '<=', $EndDate)
            ->where('orders.status', '=', 'COMPLETED');
        $b = DB::table($a)
            ->selectRaw('SUM(total) AS total, date(created_at) AS date')
            ->groupBy('date')->get();
        $sumTotal = $a->selectRaw('SUM(total) AS total')->first()->total;
        $num = 0;
        $dataTotal = [];
        $dataDate = [];
        foreach ($b as $obj) {
            $num++;
            $dataTotal[] = [$num, $obj->total];
            $dataDate[] = [$num, date_format(date_create($obj->date), 'd-m-Y')];
        }
//        dd($dataTotal, $dataDate);
        return view('AdminPages.AdminStatistics', compact('dataTotal', 'dataDate', 'path', 'sumTotal'));
    }
}
