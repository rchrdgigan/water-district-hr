@extends('../../layouts.print')

@section('title')
Payroll List
@endsection

@section('breadcrumbs')
Payroll
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><img class="w-20 mx-auto" src="{{asset('img/waterdistrict_logo.png')}}" style="border-radius:30px;"></tr>
        <tr>
            <th colspan="8" class="text-center" style="border-radius:30px; position:relative;">BULAN WATER DISTRICT<br>De Vera St., Zone 4, Bulan, Sorsogon<br><b>OFFICE OF THE HUMAN RESOURCES MANAGEMENT SECTION</b></th>
        </tr>
        <tr>
            <th colspan="8" class="text-center"><b class="text-lg">Payslip</b></th>
        </tr>
    </thead>
</table>
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="flex col-span-6"> 
        <b class="ml-auto">Date of joining : </b> 
        <p class="text-sm ml-2 mr-auto">{{Carbon\Carbon::parse($employees->created_at)->format('M d, Y')}}</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Employee ID :</b> 
        <p class="text-sm ml-2 mr-auto">{{$employees->generated_id}}</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Pay Period : </b> 
        <p class="text-sm ml-2 mr-auto">{{Carbon\Carbon::parse($from)->format('M d, Y').' to '.Carbon\Carbon::parse($to)->format('M d, Y')}}</p>
   </div>

   <div class="flex col-span-6"> 
        <b class="ml-auto">Employee Name : </b> 
        <p class="text-sm ml-2 mr-auto">{{$employees->fname.' '.$employees->lname}}</p>
   </div>

   <?php
    $time_in_am = new DateTime($employees->time_in_am);
    $time_out_am = new DateTime($employees->time_out_am);
    $interval_am = $time_in_am->diff($time_out_am);
    $hrs_am = $interval_am->format('%h');
    $mins_am = $interval_am->format('%i');
    $mins_am = $mins_am/60;
    $int_am = $hrs_am + $mins_am;
    // if($int_am > 4){
    //     $int_am = $int_am - 1;
    // }
    $time_in_pm = new DateTime($employees->time_in_pm);
    $time_out_pm = new DateTime($employees->time_out_pm);
    $interval_pm = $time_in_pm->diff($time_out_pm);
    $hrs_pm = $interval_pm->format('%h');
    $mins_pm = $interval_pm->format('%i');
    $mins_pm = $mins_pm/60;
    $int_pm = $hrs_pm + $mins_pm;
    // if($int_pm > 4){
    //     $int_pm = $int_pm - 1;
    // }
    $total_hr  = $int_am + $int_pm;
    $rate_per_hour = $employees->rate_per_day / $total_hr;
    //Gross
    $gross_inc = $employees->rate_per_day * $ct_attend_days + $overtime_amount;
    //Deduction
    $deduction = $employees->sss + $employees->philhealth + $employees->pagibig;
    //Late hours
    $late_hr = $employees->num_hr * $rate_per_hour;
    $total_late = $employees->rate_per_day * $ct_attend_days - $late_hr;
    //Total Deduction
    $total_deduct = $deduction+$total_late;
    //Net Pay
    $net_pay = $gross_inc - $total_deduct;
   ?>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Working Hours : </b> 
        <p class="text-sm ml-2 mr-auto">{{$total_hr}}-hours</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Designation: </b>
        <p class="text-sm ml-2 mr-auto">{{$employees->position}}</p>
   </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th class="text-xs border border-b-2 dark:border-dark-5 whitespace-no-wrap">Earnings</th>
            <th class="text-xs border border-b-2 dark:border-dark-5 whitespace-no-wrap">Amount</th>
            <th class="text-xs border border-b-2 dark:border-dark-5 whitespace-no-wrap">Deductions</th>
            <th class="text-xs border border-b-2 dark:border-dark-5 whitespace-no-wrap">Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-xs border">Basic Pay Per Day</td>
            <td class="text-xs border text-right">{{$employees->rate_per_day}}</td>
            <td class="text-xs border">SSS</td>
            <td class="text-xs border text-right">{{$employees->sss}}</td>
        </tr>
        <tr>
            <td class="text-xs border">Worked Days</td>
            <td class="text-xs border text-right">{{$ct_attend_days}}</td>
            <td class="text-xs border">Philhealth</td>
            <td class="text-xs border text-right">{{$employees->philhealth}}</td>
        </tr>
        <tr>
            <td class="text-xs border">Overtime</td>
            <td class="text-xs border text-right">{{$overtime_amount}}</td>
            <td class="text-xs border">Pag-Ibig</td>
            <td class="text-xs border text-right">{{$employees->pagibig}}</td>
        </tr>
        <tr>
            <td class="text-xs border"></td>
            <td class="text-xs border"></td>
            <td class="text-xs border">Late</td>
            <td class="text-xs border text-right">{{$total_late}}</td>
        </tr>
        <tr>
            <td class="text-xs border text-right">Total Earnings</td>
            <td class="text-xs border text-right">{{$gross_inc}}</td>
            <td class="text-xs border text-right">Total Deductions</td>
            <td class="text-xs border text-right">{{$total_deduct}}</td>
        </tr>
        <tr>
            <td class="text-xs border"></td>
            <td class="text-xs border"></td>
            <td class="text-xs border text-right">Net Pay</td>
            <td class="text-xs border text-right">{{$net_pay}}</td>
        </tr>
    </tbody>
</table>

<div class="p-10 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-6 text-center"> 
        <b>Employer Signature</b><br><br><br><br>
        <p>__________________________________</p>
   </div>
   <div class="col-span-6 text-center"> 
        <b>Employee Signature</b><br><br><br><br>
        <p>__________________________________</p>
   </div>
   <div class="col-span-12 text-center"> 
   <br><br><b>This is system generated payslip</b>
   </div>
</div>
@endsection
@push('custom-scripts')
<script>
window.onafterprint = function(){
    window.location.href = '{{ url()->previous() }}';
}
</script>
@endpush