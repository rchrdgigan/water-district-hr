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
        <b class="ml-auto">Date of joining :</b> 
        <p class="text-sm mr-auto">Aug 20, 2021</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Employee ID :</b> 
        <p class="text-sm mr-auto">3123123123</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Pay Period : </b> 
        <p class="text-sm mr-auto">Aug 2021</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Employee Name : </b> 
        <p class="text-sm mr-auto">Employee Name</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Working Hours : </b> 
        <p class="text-sm mr-auto">12-hours</p>
   </div>
   <div class="flex col-span-6"> 
        <b class="ml-auto">Designation: </b>
        <p class="text-sm mr-auto">Employee Position Position Position  Position  Position</p>
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
            <td class="text-xs border text-right">1000</td>
            <td class="text-xs border">SSS</td>
            <td class="text-xs border text-right">100</td>
        </tr>
        <tr>
            <td class="text-xs border">Worked Days</td>
            <td class="text-xs border text-right">26</td>
            <td class="text-xs border">Philhealth</td>
            <td class="text-xs border text-right">100</td>
        </tr>
        <tr>
            <td class="text-xs border"></td>
            <td class="text-xs border"></td>
            <td class="text-xs border">Pag-Ibig</td>
            <td class="text-xs border text-right">100</td>
        </tr>
        <tr>
            <td class="text-xs border"></td>
            <td class="text-xs border"></td>
            <td class="text-xs border">Late</td>
            <td class="text-xs border text-right"></td>
        </tr>
        <tr>
            <td class="text-xs border text-right">Total Earnings</td>
            <td class="text-xs border text-right"></td>
            <td class="text-xs border text-right">Total Deductions</td>
            <td class="text-xs border text-right"></td>
        </tr>
        <tr>
            <td class="text-xs border"></td>
            <td class="text-xs border"></td>
            <td class="text-xs border text-right">Net Pay</td>
            <td class="text-xs border text-right"></td>
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