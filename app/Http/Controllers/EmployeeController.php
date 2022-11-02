<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('search')){
            $pagination = false;
            $employees = Employee::search($request->search)->get();
        }else{
            $pagination = true;
            $employees = Employee::paginate(10);
        }
        return view('pages.employee.employee-management', compact('employees','pagination'));
    }

    public function schedule(Request $request)
    {
        if($request->filled('search')){
            $pagination = false;
            $employees = Employee::search($request->search)->get();
        }else{
            $pagination = true;
            $employees = Employee::paginate(10);
        }
        return view('pages.employee.schedule', compact('employees','pagination'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/employee_image/',$fileToStore);
        }
        else
        {
            $fileToStore = 'noimage.png';
        }

        $employees = Employee::get();
        $count_employees = $employees->count() + 1;
        $generated_id = date('myis').''.$count_employees;

        $employee = Employee::create([
            'generated_id' => $generated_id,
            'fname' => $validated['fname'],
            'mname' => $validated['mname'],
            'lname' => $validated['lname'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
            'birthdate' => $validated['birthdate'],
            'contact' => $validated['contact'],
            'time_in_am' => $validated['time_in_am'],
            'time_out_am' => $validated['time_out_am'],
            'time_in_pm' => $validated['time_in_pm'],
            'time_out_pm' => $validated['time_out_pm'],
            'sss' => $validated['sss'],
            'philhealth' => $validated['philhealth'],
            'pagibig' => $validated['pagibig'],
            'position' => $validated['position'],
            'rate_per_day' => $validated['rate_per_day'],
            'image' => $fileToStore,
        ]);
        if($employee){
            toast('Employee Information has been saved!','success');
            return redirect()->back();
        }
        toast('Employee Information has been failed to saved!','error');
        return redirect()->back();
    }

    public function updateImage(Request $request){
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
        ]);
        $employee = Employee::findorFail($request->id);
        if($request->hasFile('image'))
        {
            $location = 'storage/employee_image/'.$employee->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/employee_image/',$fileToStore);
            $employee->image = $fileToStore;
        }
        $employee->update();
        toast('Employee Image has been updated!','success');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
            'contact' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        ]);
        $employee = Employee::findorFail($request->id);
        $employee->fname = $request->fname;
        $employee->mname = $request->mname;
        $employee->lname = $request->lname;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->birthdate = $request->birthdate;
        $employee->contact = $request->contact;
        $employee->time_in_am = $request->time_in_am;
        $employee->time_out_am = $request->time_out_am;
        $employee->time_in_pm = $request->time_in_pm;
        $employee->time_out_pm = $request->time_out_pm;
        $employee->sss = $request->sss;
        $employee->philhealth = $request->philhealth;
        $employee->pagibig = $request->pagibig;
        $employee->position = $request->position;
        $employee->rate_per_day = $request->rate_per_day;
        $employee->update();
        toast('Employee information successfully updated!','info');
        return redirect()->back();
    }

    public function updateSchedule(Request $request)
    {
        $employee = Employee::findorFail($request->id);
        $employee->time_in_am = $request->time_in_am;
        $employee->time_out_am = $request->time_out_am;
        $employee->time_in_pm = $request->time_in_pm;
        $employee->time_out_pm = $request->time_out_pm;
        $employee->update();
        toast('Employee schedule successfully updated!','info');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $employee = Employee::findorFail($request->id);
        if($employee){
            $location = 'storage/employee_image/'.$employee->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $employee->delete();
        }
        toast('Employee information successfully deleted!','info');
        return redirect()->back();
    }

    public function schedulePrint(){
        $employees = Employee::get();
        return view('pages.employee.print-schedule', compact('employees'));
    }
}
