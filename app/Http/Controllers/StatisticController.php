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
        $dataDateTotal = [];
        $dataDate = [];
        return view('AdminPages.AdminStatistics', compact('path', 'dataDateTotal', 'dataDate'));
    }

    public function statistic_get_data(Request $request){
        if (!Auth::check() || Auth::user()->user_type!= 'admin') {
            Auth::logout();
            return redirect('/admin/login');
        }
        $path = '/admin/statistics/data';
        $dateInput = $request->FromDateToDate;
        $EndDate = substr($dateInput, strpos($dateInput,' - ') + 3, strlen($dateInput));
        $EndDate = date_format(date_create($EndDate), 'Y-m-d');
        $StartDate = substr($dateInput, 0 , strpos($dateInput,' - '));
        $StartDate = date_format(date_create($StartDate), 'Y-m-d');
        $a = DB::table('orders')
            ->whereDate('orders.created_at', '>=', $StartDate)
            ->whereDate('orders.created_at', '<=', $EndDate)
            ->where('orders.status', '=', 'COMPLETED');
        $data = DB::table($a)
            ->selectRaw('SUM(total) AS total, date(created_at) AS date')
            ->groupBy('date')->get();
//        dd($date);
        $sumTotal = $a->selectRaw('SUM(total) AS total')->first()->total;
        $num = 0;
        $dataDateTotal = [];
        $dataDate = [];
        $date = date_create($StartDate);
        while (date_format($date, 'Y-m-d') <= $EndDate) {
            $num++;
            $total = DB::table(
                DB::table(
                    DB::table('orders')
                        ->selectRaw('*, DATE(`orders`.`created_at`) AS orderDate')
                        ->where('orders.status', '=', 'COMPLETED'), 'a')
                    ->where('a.orderDate', '=', date_format($date, 'Y-m-d')), 'b')
                ->selectRaw('SUM(total) AS total')->first()->total;
            if($total == null){
                $total = 0;
            }
            $dataDateTotal[] = [$num, $total];
            $dataDate[] = [$num, date_format($date, 'd-m-Y')];
            $date = date_add($date, date_interval_create_from_date_string('1 day'));
        }
//        dd($dataDate, $dataDateTotal);
//        dd($data);
//        foreach ($data as $obj) {
//            $num++;
//            $dataDateTotal[] = [$num, $obj->total];
//            $dataDate[] = [$num, date_format(date_create($obj->date), 'd-m-Y')];
//        }
        return view('AdminPages.AdminStatistics', compact('path', 'dataDateTotal', 'dataDate', 'sumTotal', 'dateInput'));
    }
}
