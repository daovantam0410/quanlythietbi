<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\BillModel;

class ReportController extends Controller
{
    public function getReport(){
    	$month_now = carbon::now()->format('m');
		$year_now = carbon::now()->format('Y');
		for($i=1; $i<=$month_now; $i++){
			$dl['Tháng '.$i]=BillModel::where('status',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_now)->sum('total_price');
		}
		$data['dl']=$dl;
    	return view('admin/report/index',compact('data','dl'));
    }
}
