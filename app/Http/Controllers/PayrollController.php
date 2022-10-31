<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Overtime;
use DateTime;
use Carbon\Carbon;
use DB;

class PayrollController extends Controller
{
   
    public function index(Request $request)
    {
        $from = Carbon::now()->firstOfMonth()->format('Y-m-d');
        $to = Carbon::now()->format('Y-m-d'); 
        if($request->filled('search')){
            $employees = Attendance::whereBetween('date', [$from, $to])->join('employees', 'employees.id', '=', 'attendances.employee_id')
                ->select(
                    'employees.id',
                    'employees.generated_id as generated_id',
                    'employees.fname as fname',
                    'employees.lname as lname',
                    'employees.time_in_am as time_in_am',
                    'employees.time_out_am as time_out_am',
                    'employees.time_in_pm as time_in_pm',
                    'employees.time_out_pm as time_out_pm',
                    'employees.rate_per_day as rate_per_day',
                    'employees.sss as sss',
                    'employees.philhealth as philhealth',
                    'employees.pagibig as pagibig',
                    DB::raw("SUM(attendances.num_hr) as num_hr")
                )
                ->groupBy('employees.sss','employees.philhealth','employees.pagibig','employees.rate_per_day', 'employees.id','employees.generated_id','employees.fname', 'employees.lname', 'employees.time_in_am', 'employees.time_out_am', 'employees.time_in_pm', 'employees.time_out_pm')
                ->where(DB::raw("CONCAT(fname, ' ', mname, ' ', lname)"), request('search'))
                ->orWhere('generated_id', request('search'))
                ->get();
        }else{
            $employees = Attendance::whereBetween('date', [$from, $to])->join('employees', 'employees.id', '=', 'attendances.employee_id')
                ->select(
                    'employees.id',
                    'employees.generated_id as generated_id',
                    'employees.fname as fname',
                    'employees.lname as lname',
                    'employees.time_in_am as time_in_am',
                    'employees.time_out_am as time_out_am',
                    'employees.time_in_pm as time_in_pm',
                    'employees.time_out_pm as time_out_pm',
                    'employees.rate_per_day as rate_per_day',
                    'employees.sss as sss',
                    'employees.philhealth as philhealth',
                    'employees.pagibig as pagibig',
                    DB::raw("SUM(attendances.num_hr) as num_hr")
                )
                ->groupBy('employees.sss','employees.philhealth','employees.pagibig','employees.rate_per_day', 'employees.id','employees.generated_id','employees.fname', 'employees.lname', 'employees.time_in_am', 'employees.time_out_am', 'employees.time_in_pm', 'employees.time_out_pm')
                ->get();
        }
        return view('pages.payroll.payroll-management', compact('employees','from','to'));
    }

    public function listFilteredDate($from_date,$to_date)
    {
        $from = $from_date;
        $to = $to_date; 
        $employees = Attendance::whereBetween('date', [$from, $to])->join('employees', 'employees.id', '=', 'attendances.employee_id')
            ->select(
                'employees.id',
                'employees.generated_id as generated_id',
                'employees.fname as fname',
                'employees.lname as lname',
                'employees.time_in_am as time_in_am',
                'employees.time_out_am as time_out_am',
                'employees.time_in_pm as time_in_pm',
                'employees.time_out_pm as time_out_pm',
                'employees.rate_per_day as rate_per_day',
                'employees.sss as sss',
                'employees.philhealth as philhealth',
                'employees.pagibig as pagibig',
                DB::raw("SUM(attendances.num_hr) as num_hr")
            )
            ->groupBy('employees.sss','employees.philhealth','employees.pagibig','employees.rate_per_day', 'employees.id','employees.generated_id','employees.fname', 'employees.lname', 'employees.time_in_am', 'employees.time_out_am', 'employees.time_in_pm', 'employees.time_out_pm')
            ->get();

        return view('pages.payroll.payroll-management', compact('employees','from','to'));
    }

    public function printPayroll($from_date,$to_date)
    {
        $from = $from_date;
        $to = $to_date; 
        $employees = Attendance::whereBetween('date', [$from, $to])->join('employees', 'employees.id', '=', 'attendances.employee_id')
            ->select(
                'employees.id',
                'employees.generated_id as generated_id',
                'employees.fname as fname',
                'employees.lname as lname',
                'employees.time_in_am as time_in_am',
                'employees.time_out_am as time_out_am',
                'employees.time_in_pm as time_in_pm',
                'employees.time_out_pm as time_out_pm',
                'employees.rate_per_day as rate_per_day',
                'employees.sss as sss',
                'employees.philhealth as philhealth',
                'employees.pagibig as pagibig',
                DB::raw("SUM(attendances.num_hr) as num_hr")
            )
            ->groupBy('employees.sss','employees.philhealth','employees.pagibig','employees.rate_per_day', 'employees.id','employees.generated_id','employees.fname', 'employees.lname', 'employees.time_in_am', 'employees.time_out_am', 'employees.time_in_pm', 'employees.time_out_pm')
            ->get();

        return view('pages.payroll.print-payroll-list', compact('employees'));
    }

    public function printPayslip($id,$from_date,$to_date)
    {
        $from = $from_date;
        $to = $to_date;

        $overtime_val = Overtime::whereBetween('date_overtime', [$from, $to])->where('employee_id', $id)->get();
        foreach($overtime_val as $data){
            $mult_o[] = $data->hours * $data->rate;
        }
        $overtime_amount = (isset($mult_o)) ? array_sum($mult_o) : 0 ;
        $employees = Attendance::whereBetween('date', [$from, $to])->join('employees', 'employees.id', '=', 'attendances.employee_id')
        ->select(
            'employees.id',
            'employees.generated_id as generated_id',
            'employees.fname as fname',
            'employees.lname as lname',
            'employees.time_in_am as time_in_am',
            'employees.time_out_am as time_out_am',
            'employees.time_in_pm as time_in_pm',
            'employees.time_out_pm as time_out_pm',
            'employees.rate_per_day as rate_per_day',
            'employees.sss as sss',
            'employees.philhealth as philhealth',
            'employees.pagibig as pagibig',
            'employees.position as position',
            'employees.created_at as created_at',
            DB::raw("SUM(attendances.num_hr) as num_hr")
        )
        ->groupBy('employees.position','employees.sss','employees.philhealth','employees.pagibig','employees.rate_per_day', 'employees.id','employees.generated_id','employees.fname', 'employees.lname', 'employees.time_in_am', 'employees.time_out_am', 'employees.time_in_pm', 'employees.time_out_pm','employees.created_at')
        ->where('employees.id', $id)->first();
        
        $ct_attend_days = Attendance::where('employee_id', $id)->count();
        return view('pages.payroll.print-payslip',compact('employees','from','to','ct_attend_days','overtime_amount'));
    }
  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
