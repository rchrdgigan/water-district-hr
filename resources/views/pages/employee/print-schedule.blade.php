@extends('../../layouts.print')

@section('title')
Schedule List
@endsection

@section('breadcrumbs')
Schedule
@endsection

@section('content')
<div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 text-center">
        <h1 class="text-xl"><b>Schedule List</b></h1>
    </div>
</div>
<div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-b-2 text-xs dark:border-dark-5 whitespace-no-wrap">#</th>
                    <th class="border-b-2 text-xs dark:border-dark-5 whitespace-no-wrap">ID Number</th>
                    <th class="border-b-2 text-xs dark:border-dark-5 whitespace-no-wrap">Employee Name</th>
                    <th class="border-b-2 text-xs dark:border-dark-5 whitespace-no-wrap">Position</th>
                    <th class="border-b-2 text-xs dark:border-dark-5 whitespace-no-wrap">Schedule</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @forelse($employees as $data)
                <tr>
                    <td class="border-b text-xs dark:border-dark-5">{{$i++}}</td>
                    <td class="border-b text-xs dark:border-dark-5">{{$data->generated_id}}</td>
                    <td class="border-b text-xs dark:border-dark-5">{{$data->fname.' '.$data->lname}}</td>
                    <td class="border-b text-xs dark:border-dark-5">{{$data->position}}</td>
                    <td class="border-b text-xs dark:border-dark-5">{{Carbon\Carbon::parse($data->time_in_am)->format('h:i A').' - '.Carbon\Carbon::parse($data->time_out_am)->format('h:i A').' | '.Carbon\Carbon::parse($data->time_in_pm)->format('h:i A').' - '.Carbon\Carbon::parse($data->time_out_pm)->format('h:i A')}}</td>
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