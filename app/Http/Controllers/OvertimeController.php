<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overtime;
use App\Models\Employee;
use App\Http\Requests\StoreOvertimeRequest;

class OvertimeController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){
            $pagination = false;
            $overtime = Overtime::with('employee')->orderBy('created_at', 'desc')->paginate(10);
        }else{
            $pagination = true;
            $overtime = Overtime::with('employee')->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('pages.overtime.overtime-management', compact('overtime','pagination'));
    }

    public function store(StoreOvertimeRequest $request)
    {
        $validated = $request->validated();
        $employee = Employee::where('generated_id', $validated['generated_id'])->first();
        if($employee){
            $date = $validated['date_overtime'];
            $hours = $validated['hours'] + ($validated['mins']/60);
            $rate = $validated['rate'];
            $overtime = Overtime::create([
                'employee_id' => $employee->id,
                'date_overtime' => $date,
                'hours' => $hours,
                'rate' => $rate,
            ]);
            if($overtime){
                toast('Employee overtime has been save!','success');
                return redirect()->back();
            }
            toast('Employee overtime has been failed to saved!','error');
            return redirect()->back();
        }
        toast('Employee ID not found!','error');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $date = $request->date_overtime;
        $hours = $request->hours + ($request->mins/60);
        $rate = $request->rate;
        $overtime = Overtime::findorFail($request->id);
        $overtime->date_overtime = $date;
        $overtime->hours = $hours;
        $overtime->rate = $rate;
        $overtime->update();
        toast('Employee overtime successfully updated!','info');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $overtime = Overtime::findorFail($request->id);
        if($overtime){
            $overtime->delete();
        }
        toast('Employee overtime successfully deleted!','info');
        return redirect()->back();
    }
}
