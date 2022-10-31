@extends('../../layouts.print')

@section('title')
Payroll List
@endsection

@section('breadcrumbs')
Payroll
@endsection

@section('content')
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 text-center">
        <h1 class="text-xl"><b>Payroll List</b></h1>
    </div>
</div>
<div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Employee Name</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Gross</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Deduction</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Net Pay</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @forelse($employees as $data)
                <tr>
                    <td class="border-b dark:border-dark-5">{{$i++}}</td>
                    <td class="border-b dark:border-dark-5">{{$data->fname.' '.$data->lname}}</td>
                    <?php
                        $time_in_am = new DateTime($data->time_in_am);
                        $time_out_am = new DateTime($data->time_out_am);
                        $interval_am = $time_in_am->diff($time_out_am);
                        $hrs_am = $interval_am->format('%h');
                        $mins_am = $interval_am->format('%i');
                        $mins_am = $mins_am/60;
                        $int_am = $hrs_am + $mins_am;
                        // if($int_am > 4){
                        //     $int_am = $int_am - 1;
                        // }
                        $time_in_pm = new DateTime($data->time_in_pm);
                        $time_out_pm = new DateTime($data->time_out_pm);
                        $interval_pm = $time_in_pm->diff($time_out_pm);
                        $hrs_pm = $interval_pm->format('%h');
                        $mins_pm = $interval_pm->format('%i');
                        $mins_pm = $mins_pm/60;
                        $int_pm = $hrs_pm + $mins_pm;
                        // if($int_pm > 4){
                        //     $int_pm = $int_pm - 1;
                        // }
                        $total_hr  = $int_am + $int_pm;
                        $rate_per_hour = $data->rate_per_day / $total_hr;
                        //Gross
                        $gross_inc = $rate_per_hour * $data->num_hr;
                        //Deduction
                        $deduction = $data->sss + $data->philhealth + $data->pagibig;
                        //Net Pay
                        $net_pay = $gross_inc - $deduction;
                    ?>
                    <td class="border-b dark:border-dark-5">{{$gross_inc}}</td>
                    <td class="border-b dark:border-dark-5">{{$deduction}}</td>
                    <td class="border-b dark:border-dark-5">{{$net_pay}}</td>
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
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@push('custom-scripts')
<script>
window.onafterprint = function(){
    window.location.href = '{{ url()->previous() }}';
}
</script>
@endpush