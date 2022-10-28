@extends('../../layouts.admin')

@section('title')
Payroll Management
@endsection

@section('breadcrumbs')
Payroll
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Payroll Management</h2>
        <div class="intro-x text-center xl:text-left flex">
            <a href="{{route('payroll.print',[$from,$to])}}" class="custom__button w-36 text-white text-center hover:bg-blue-400 bg-theme-9 xl:mr-3 flex" type="submit"><i data-feather="printer"></i>Payroll</a>
        </div>
        <div class="mx-auto text-gray-600">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form method="GET">
                <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                    <?php 
                    $startDate = Carbon\Carbon::parse($from)->format('m/d/Y');
                    $firstDay = Carbon\Carbon::parse($to)->format('m/d/Y'); 
                    ?>
                    <input type="text" value="{{ $startDate .' - '. $firstDay }}" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" id="daterange" style="padding:10px; border-radius: 20px;" name="dates" />
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </div>
            </form>
            </div>
        </div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
            </div>
        </div>
    </div>
</div>
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="custom__bg__theme text-xs text-white" style="border-top-left-radius: 20px;">Employee Name</th>
                    <th class="custom__bg__theme text-xs text-white">Employee ID</th>
                    <th class="custom__bg__theme text-xs text-white">Gross</th>
                    <th class="custom__bg__theme text-xs text-white">Deduction</th>
                    <th class="custom__bg__theme text-xs text-white">Net Pay</th>
                    <th class="custom__bg__theme text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $data)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->fname.' '.$data->lname}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->generated_id}}</p>
                        </div>
                    </td>
                    <?php
                        $time_in_am = new DateTime($data->time_in_am);
                        $time_out_am = new DateTime($data->time_out_am);
                        $interval_am = $time_in_am->diff($time_out_am);
                        $hrs_am = $interval_am->format('%h');
                        $mins_am = $interval_am->format('%i');
                        $mins_am = $mins_am/60;
                        $int_am = $hrs_am + $mins_am;
                        if($int_am > 4){
                            $int_am = $int_am - 1;
                        }
                        $time_in_pm = new DateTime($data->time_in_pm);
                        $time_out_pm = new DateTime($data->time_out_pm);
                        $interval_pm = $time_in_pm->diff($time_out_pm);
                        $hrs_pm = $interval_pm->format('%h');
                        $mins_pm = $interval_pm->format('%i');
                        $mins_pm = $mins_pm/60;
                        $int_pm = $hrs_pm + $mins_pm;
                        if($int_pm > 4){
                            $int_pm = $int_pm - 1;
                        }
                        $total_hr  = $int_am + $int_pm;
                        $rate_per_hour = $data->rate_per_day / $total_hr;
                        //Gross
                        $gross_inc = $rate_per_hour * $data->num_hr;
                        //Deduction
                        $deduction = $data->sss + $data->philhealth + $data->pagibig;
                        //Net Pay
                        $net_pay = $gross_inc - $deduction;
                    ?>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$gross_inc}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$deduction}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$net_pay}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <a  href="{{route('payroll.payslip')}}" class="custom__button w-36 text-white text-center hover:bg-blue-400 bg-theme-12 xl:mr-3 flex" type="submit"><i data-feather="printer"></i>Payslip</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs"></p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs"></p>
                        </div>
                    </td>
                    <td class="w-40 text-center">
                        <div class="flex justify-center">
                            <p class="text-xs">No Data Available!</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs"></p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs"></p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs"></p>
                        </div>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
$('input[name="dates"]').daterangepicker();
$('#daterange').on('apply.daterangepicker', function(ev, picker) {
    var url = '{{route("payroll.filtered",[$from = ":from", $to = ":to"])}}';
    url = url.replace(':from', picker.startDate.format('YYYY-MM-DD'));
    url = url.replace(':to', picker.endDate.format('YYYY-MM-DD'));
    window.location.href = url;
});
</script>
@endpush