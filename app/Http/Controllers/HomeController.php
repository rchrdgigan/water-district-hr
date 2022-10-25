<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Charts\AttendanceReportChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $datenow = Carbon::parse(Now())->format('Y-m-d');
        $count_emp = Employee::count();
        $count_ontime = Attendance::where('status','Ontime')->where('date', $datenow)->count();
        $count_late = Attendance::where('status','Late')->where('date', $datenow)->count();
        if($count_emp <> 0){
            $decimal_ontime = $count_ontime / $count_emp;
            $count_percent_ontime = $decimal_ontime * 100;
        }else{
            $count_percent_ontime=0;
        }

        $current_yr = Carbon::parse(Now())->format('Y');
        $current_yr_jan = Carbon::parse($current_yr.'-01')->format('Y-m');
        $current_yr_feb = Carbon::parse($current_yr.'-02')->format('Y-m');
        $current_yr_mar = Carbon::parse($current_yr.'-03')->format('Y-m');
        $current_yr_apr = Carbon::parse($current_yr.'-04')->format('Y-m');
        $current_yr_may = Carbon::parse($current_yr.'-05')->format('Y-m');
        $current_yr_jun = Carbon::parse($current_yr.'-06')->format('Y-m');
        $current_yr_jul = Carbon::parse($current_yr.'-07')->format('Y-m');
        $current_yr_aug = Carbon::parse($current_yr.'-08')->format('Y-m');
        $current_yr_sept = Carbon::parse($current_yr.'-09')->format('Y-m');
        $current_yr_oct = Carbon::parse($current_yr.'-10')->format('Y-m');
        $current_yr_nov = Carbon::parse($current_yr.'-11')->format('Y-m');
        $current_yr_dev = Carbon::parse($current_yr.'-12')->format('Y-m');

        $jan_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_jan.'%')->count();
        $feb_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_feb.'%')->count();
        $mar_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_mar.'%')->count();
        $apr_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_apr.'%')->count();
        $may_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_may.'%')->count();
        $jun_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_jun.'%')->count();
        $jul_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_jul.'%')->count();
        $aug_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_aug.'%')->count();
        $sept_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_sept.'%')->count();
        $oct_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_oct.'%')->count();
        $nov_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_nov.'%')->count();
        $dec_ontime = Attendance::where('status','Ontime')->where('date','LIKE', '%'.$current_yr_dev.'%')->count();
        
        $jan_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_jan.'%')->count();
        $feb_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_feb.'%')->count();
        $mar_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_mar.'%')->count();
        $apr_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_apr.'%')->count();
        $may_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_may.'%')->count();
        $jun_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_jun.'%')->count();
        $jul_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_jul.'%')->count();
        $aug_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_aug.'%')->count();
        $sept_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_sept.'%')->count();
        $oct_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_oct.'%'.'%')->count();
        $nov_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_nov.'%')->count();
        $dec_Late = Attendance::where('status','Late')->where('date','LIKE', '%'.$current_yr_dev.'%')->count();
        $chart = new AttendanceReportChart;

        $chart->labels([
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec",
        ]);
        $chart->dataset('Late', 'bar', [$jan_Late, $feb_Late, $mar_Late, $apr_Late, $may_Late, $jun_Late, $jul_Late, $aug_Late, $sept_Late, $oct_Late, $nov_Late, $dec_Late]);
        $chart->dataset('Ontime', 'bar', [$jan_ontime, $feb_ontime, $mar_ontime, $apr_ontime, $may_ontime, $jun_ontime, $jul_ontime, $aug_ontime, $sept_ontime, $oct_ontime, $nov_ontime, $dec_ontime]);
        
        return view('home', compact('count_emp','count_ontime','count_late','count_percent_ontime','chart'));
    }
}
