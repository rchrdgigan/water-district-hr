<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.schedule.schedule-management', [
            'schedules' => DB::table('schedules')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $validated = $request->validated();
        $schedule = Schedule::create([
            'time_in_am' => $validated['time_in_am'],
            'time_out_am' => $validated['time_out_am'],
            'time_in_pm' => $validated['time_in_pm'],
            'time_out_pm' => $validated['time_out_pm'],
        ]);
        toast('Schedule has been saved!','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request)
    {
        $validated = $request->validated();
        $schedule = Schedule::where('id',$request->id)->update([
            'time_in_am' => $validated['time_in_am'],
            'time_out_am' => $validated['time_out_am'],
            'time_in_pm' => $validated['time_in_pm'],
            'time_out_pm' => $validated['time_out_pm'],
        ]);
        if($schedule){
            toast('Schedule has been updated!','success');
            return redirect()->back();
        }
        toast('Schedule has been failed to updated!','error');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $schedule = Schedule::findOrFail($request->id);
        if($schedule){
            $schedule->delete();
            toast('Schedule has been deleted!','info');
            return redirect()->back();
        }
        toast('Schedule has been failed to delete!','error');
        return redirect()->back();
    }
}
