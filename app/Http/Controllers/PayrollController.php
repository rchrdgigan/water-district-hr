<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use DateTime;
use Carbon\Carbon;
use DB;

class PayrollController extends Controller
{
   
    public function index(Request $request)
    {
        $from = Carbon::now()->firstOfMonth()->format('Y-m-d');
        $to = Carbon::now()->format('Y-m-d'); 
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

    public function printPayslip()
    {
        return view('pages.payroll.print-payslip');
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
