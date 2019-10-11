<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use App\OrdersProduct;
use DB;

class ReportController extends Controller
{
	public function salesReport()
    {
    	$sales= OrdersProduct::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
					->get();
        $chart = Charts::database($sales, 'bar', 'highcharts')
					->title("Monthly Product Sales")
					->elementLabel("Total ordres")
					->dimensions(700, 500)
					->groupByMonth(date('Y'), true);
		return view('reports.sales',compact('chart'));
	}

    public function customerReport()
    {
    	$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
					->title("Monthly New Register Users")
					->elementLabel("Total Users")
					->dimensions(700, 500)
					->groupByMonth(date('Y'), true);
        return view('reports.users',compact('chart'));
    }

    public function couponsReport()
    {

    }
}
