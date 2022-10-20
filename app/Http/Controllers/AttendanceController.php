<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\Employee;
use DateTime;
use DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search') && $request->filled('search_date')){
            $pagination = false;
            if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])$/", request('search_date'))){
                toast('Search date input has error in format!','error');
            }
            $employee = Employee::where(DB::raw("CONCAT(fname, ' ', mname, ' ', lname)"), request('search'))->orWhere('fname', request('search'))->orWhere('generated_id', request('search'))->first();
            if($employee == null){
                toast('Employee ID or name not found!','error');
            }
            $attendance = Attendance::with('employee')->where('date', 'LIKE', '%'.request('search_date').'%')->where('employee_id', '=', $employee->id ?? "")->orderBy('date', 'desc')->get();
        }else if($request->filled('search_date')){
            $pagination = false;
            if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])$/", request('search_date'))){
                toast('Search date input has error in format!','error');
            }
            $attendance = Attendance::with('employee')->where('date', 'LIKE', '%'.request('search_date').'%')->orderBy('date', 'desc')->get();
        }else if($request->filled('search')){
            $pagination = false;
            $searchString = request('search');
            $attendance = Attendance::whereHas('employee', function ($query) use ($searchString){
                $query->where('fname', 'like', '%'.$searchString.'%')
                ->orWhere('mname', 'like', '%'.$searchString.'%')
                ->orWhere('lname', 'like', '%'.$searchString.'%')
                ->orWhere('generated_id', 'like', '%'.$searchString.'%')
                ->orWhere(DB::raw("CONCAT(fname, ' ', mname, ' ', lname)"), 'LIKE', "%".$searchString."%");
            })
            ->with(['employee' => function($query) use ($searchString){
                $query->where('fname', 'like', '%'.$searchString.'%')
                ->orWhere('mname', 'like', '%'.$searchString.'%')
                ->orWhere('lname', 'like', '%'.$searchString.'%')
                ->orWhere('generated_id', 'like', '%'.$searchString.'%')
                ->orWhere(DB::raw("CONCAT(fname, ' ', mname, ' ', lname)"), 'LIKE', "%".$searchString."%");
            }])->orderBy('date', 'desc')->get();
        }else{
            $pagination = true;
            $attendance = Attendance::with('employee')->orderBy('date', 'desc')->paginate(10);
        }
        return view('pages.attendance.attendance-management', compact('attendance','pagination'));
    }

    public function store(StoreAttendanceRequest $request)
    {
        $validated = $request->validated();
        $employee = Employee::where('generated_id', $validated['employee_id'])->first();
        if($employee){
            $is_date_exist = Attendance::where('employee_id', $employee->id)->where('date', $validated['date'])->first();
            if(!$is_date_exist){
                $logstatusam = ($validated['time_in_am'] > $employee->time_in_am) ? 0 : 1;
                $logstatuspm = ($validated['time_in_pm'] > $employee->time_in_pm) ? 0 : 1;

                if($employee->time_in_am > $validated['time_in_am']){
                    $time_in_am = $employee->time_in_am;
                }else{
                    $time_in_am = $validated['time_in_am'];
                }

                if($employee->time_out_am < $validated['time_out_am']){
                    $time_out_am = $employee->time_out_am;
                }else{
                    $time_out_am = $validated['time_out_am'];
                }

                $time_in_am = new DateTime($time_in_am);
                $time_out_am = new DateTime($time_out_am);
                $interval_am = $time_in_am->diff($time_out_am);
                $hrs_am = $interval_am->format('%h');
                $mins_am = $interval_am->format('%i');
                $mins_am = $mins_am/60;
                $int_am = $hrs_am + $mins_am;
                if($int_am > 4){
                    $int_am = $int_am - 1;
                }

                if($employee->time_in_pm > $validated['time_in_pm']){
                    $time_in_pm = $employee->time_in_pm;
                }else{
                    $time_in_pm = $validated['time_in_pm'];
                }

                if($employee->time_out_pm < $validated['time_out_pm']){
                    $time_out_pm = $employee->time_out_pm;
                }else{
                    $time_out_pm = $validated['time_out_pm'];
                }

                $time_in_pm = new DateTime($time_in_pm);
                $time_out_pm = new DateTime($time_out_pm);
                $interval_pm = $time_in_pm->diff($time_out_pm);

                $hrs_pm = $interval_pm->format('%h');
                $mins_pm = $interval_pm->format('%i');
                $mins_pm = $mins_pm/60;
                $int_pm = $hrs_pm + $mins_pm;
                if($int_pm > 4){
                    $int_pm = $int_pm - 1;
                }

                $sum_am_pm = $int_pm + $int_am;

                $attendance = Attendance::create([
                    'employee_id' => $employee->id,
                    'date' => $validated['date'],
                    'time_in_am' => $validated['time_in_am'],
                    'status_am' => $logstatusam,
                    'time_out_am' => $validated['time_out_am'],
                    'time_in_pm' => $validated['time_in_pm'],
                    'status_pm' => $logstatuspm,
                    'time_out_pm' => $validated['time_out_pm'],
                    'num_hr' => $sum_am_pm,
                ]);
                if($attendance){
                    toast('Employee Attendance has been saved!','success');
                    return redirect()->back();
                }
                toast('Employee Attendance Information has been failed to saved!','error');
                return redirect()->back();
            }
            toast('Employee attendance for the day exist!','error');
            return redirect()->back();
        }
        toast('Employee ID not found!','error');
        return redirect()->back();
       
    }

    public function update(Request $request)
    {
        $employee = Employee::where('generated_id', $request->generated_id)->first();
        if($employee){
            $logstatusam = ($request->time_in_am > $employee->time_in_am) ? 0 : 1;
            $logstatuspm = ($request->time_in_pm > $employee->time_in_pm) ? 0 : 1;

            if($employee->time_in_am > $request->time_in_am){
                $time_in_am = $employee->time_in_am;
            }else{
                $time_in_am = $request->time_in_am;
            }

            if($employee->time_out_am < $request->time_out_am){
                $time_out_am = $employee->time_out_am;
            }else{
                $time_out_am = $request->time_out_am;
            }

            $time_in_am = new DateTime($time_in_am);
            $time_out_am = new DateTime($time_out_am);
            $interval_am = $time_in_am->diff($time_out_am);
            $hrs_am = $interval_am->format('%h');
            $mins_am = $interval_am->format('%i');
            $mins_am = $mins_am/60;
            $int_am = $hrs_am + $mins_am;
            if($int_am > 4){
                $int_am = $int_am - 1;
            }

            if($employee->time_in_pm > $request->time_in_pm){
                $time_in_pm = $employee->time_in_pm;
            }else{
                $time_in_pm = $request->time_in_pm;
            }

            if($employee->time_out_pm < $request->time_out_pm){
                $time_out_pm = $employee->time_out_pm;
            }else{
                $time_out_pm = $request->time_out_pm;
            }

            $time_in_pm = new DateTime($time_in_pm);
            $time_out_pm = new DateTime($time_out_pm);
            $interval_pm = $time_in_pm->diff($time_out_pm);

            $hrs_pm = $interval_pm->format('%h');
            $mins_pm = $interval_pm->format('%i');
            $mins_pm = $mins_pm/60;
            $int_pm = $hrs_pm + $mins_pm;
            if($int_pm > 4){
                $int_pm = $int_pm - 1;
            }

            $sum_am_pm = $int_pm + $int_am;

            $attendance = Attendance::findorFail($request->id);
            $attendance->date = $request->date;
            $attendance->time_in_am = $request->time_in_am;
            $attendance->status_am = $logstatusam;
            $attendance->time_out_am = $request->time_out_am;
            $attendance->time_in_pm = $request->time_in_pm;
            $attendance->status_pm = $logstatuspm;
            $attendance->time_out_pm = $request->time_out_pm;
            $attendance->num_hr = $sum_am_pm;
            $attendance->update();
            
            if($attendance){
                toast('Employee attendance has been successfully update!','success');
                return redirect()->back();
            }
            toast('Employee attendance Information has been failed to saved!','error');
            return redirect()->back();
        }
        toast('Employee ID not found!','error');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $attendance = Attendance::findorFail($request->id);
        if($attendance){
            $attendance->delete();
        }
        toast('Employee attendance successfully deleted!','info');
        return redirect()->back();
    }

    public function storeAttendance(Request $request){
        date_default_timezone_set("Asia/Manila");
        $lognow = date('H:i:s');

        $employee = Employee::where('generated_id', $request->id_no)->first();
        if($employee){
            $is_in_am = Attendance::where('employee_id', $employee->id)->where('date', Carbon::parse(Now())->format('Y-m-d'))->where('time_in_am', '<>', null)->first();
            if(!$is_in_am){
                if($lognow <= Carbon::parse($employee->time_in_am)->format('H:i:s')){
                    $attendance = Attendance::create([
                        'employee_id' => $employee->id,
                        'date' => date('Y-m-d'),
                        'time_in_am' => ($lognow > $employee->time_in_am) ? 0 : 1, 
                        'status_am' => $logstatus,
                    ]);
                    toast($employee->fname.' '.$employee->lname.' timed in this morning.','success');
                    return redirect()->back();
                }else if($lognow >= Carbon::parse($employee->time_out_pm)->format('H:i:s')){
                    toast('Business working hour is not available this time! Please contact the admin for more info.','info');
                    return redirect()->back();
                }else{
                    toast('Employee too late to time in for working hours!','error');
                    return redirect()->back();
                } 
            }else{
                $is_out_am = Attendance::where('employee_id', $employee->id)->where('date', Carbon::parse(Now())->format('Y-m-d'))->where('time_out_am', null)->first();
                if($is_out_am){
                    if($lognow >= Carbon::parse($employee->time_out_am)->format('H:i:s')){
                        $is_out_am->time_out_am = $lognow;
                        $is_out_am->update();
                        toast($employee->fname.' '.$employee->lname.' timed out this noon break.','success');
                        return redirect()->back();
                    }else{
                        toast('Employee already timed in!','info');
                        return redirect()->back();
                    }
                }else{
                    $is_in_pm = Attendance::where('employee_id', $employee->id)->where('date', Carbon::parse(Now())->format('Y-m-d'))->where('time_in_pm', null)->first();
                    if($is_in_pm){
                        if($lognow <= Carbon::parse($employee->time_in_pm)->format('H:i:s')){
                            $is_in_pm->time_in_pm = $lognow;
                            $is_in_pm->status_pm = ($lognow > $employee->time_in_pm) ? 0 : 1;
                            $is_in_pm->update();

                            toast($employee->fname.' '.$employee->lname.' timed in this afternoon.','success');
                            return redirect()->back();
                        }else{
                            toast('Employee already timed in this afternoon!','info');
                            return redirect()->back();
                        }
                    }else{
                        $is_out_pm = Attendance::where('employee_id', $employee->id)->where('date', Carbon::parse(Now())->format('Y-m-d'))->where('time_out_pm', null)->first();
                        if($is_out_pm){
                            if($lognow >= Carbon::parse($employee->time_out_pm)->format('H:i:s')){

                                if($employee->time_in_am > $is_out_pm->time_in_am){
                                    $time_in_am = $employee->time_in_am;
                                }else{
                                    $time_in_am = $is_out_pm->time_in_am;
                                }
                    
                                if($employee->time_out_am < $is_out_pm->time_out_am){
                                    $time_out_am = $employee->time_out_am;
                                }else{
                                    $time_out_am = $is_out_pm->time_out_am;
                                }
                    
                                $time_in_am = new DateTime($time_in_am);
                                $time_out_am = new DateTime($time_out_am);
                                $interval_am = $time_in_am->diff($time_out_am);
                                $hrs_am = $interval_am->format('%h');
                                $mins_am = $interval_am->format('%i');
                                $mins_am = $mins_am/60;
                                $int_am = $hrs_am + $mins_am;
                                if($int_am > 4){
                                    $int_am = $int_am - 1;
                                }
                    
                                if($employee->time_in_pm > $is_out_pm->time_in_pm){
                                    $time_in_pm = $employee->time_in_pm;
                                }else{
                                    $time_in_pm = $is_out_pm->time_in_pm;
                                }
                    
                                if($employee->time_out_pm < $lognow){
                                    $time_out_pm = $employee->time_out_pm;
                                }else{
                                    $time_out_pm = $lognow;
                                }
                    
                                $time_in_pm = new DateTime($time_in_pm);
                                $time_out_pm = new DateTime($time_out_pm);
                                $interval_pm = $time_in_pm->diff($time_out_pm);
                    
                                $hrs_pm = $interval_pm->format('%h');
                                $mins_pm = $interval_pm->format('%i');
                                $mins_pm = $mins_pm/60;
                                $int_pm = $hrs_pm + $mins_pm;
                                if($int_pm > 4){
                                    $int_pm = $int_pm - 1;
                                }
                    
                                $sum_am_pm = $int_pm + $int_am;
                    
                                $is_out_pm->time_out_pm = $lognow;
                                $is_out_pm->num_hr = $sum_am_pm;
                                $is_out_pm->update();
    
                                toast($employee->fname.' '.$employee->lname.' timed out this afternoon.','success');
                                return redirect()->back();
                            }else{
                                toast('Employee already timed out this afternoon!','info');
                                return redirect()->back();
                            }
                        }else{
                            toast('Employee already timed out this afternoon! Try again tommorow, Dont be late.','info');
                            return redirect()->back();
                        }
                    }
                }
            }
        }
        toast('Employee ID not found!','error');
        return redirect()->back();
    }
}
