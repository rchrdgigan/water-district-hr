@extends('../../layouts.admin')

@section('title')
Employee List
@endsection

@section('breadcrumbs')
Employee Attendance
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Employees Schedule List</h2>
        <div class="intro-x text-center xl:text-left">
            <button class="custom__button w-36 text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex" type="submit"><i data-feather="printer"></i>Print</button>
        </div>
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <form method="GET">
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-full xl:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="input w-full xl:w-56 box pr-10 placeholder-theme-13" style="padding:10px; border-radius: 20px;" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
            </div>
        </div>
        </form>
    </div>
</div>
<div class="col-span-12 lg:col-span-6">
    <div class="intro-y overflow-auto xxxl:overflow-visible sm:mt-8">
        <table class="table table-report sm:mt-2">
            <thead>
                <tr>
                    <th class="custom__bg__theme text-xs text-white" style="border-top-left-radius: 20px;">ID Number</th>
                    <th class="custom__bg__theme text-xs text-white">Name</th>
                    <th class="custom__bg__theme text-xs text-white">Position</th>
                    <th class="custom__bg__theme text-xs text-white">Schedule</th>
                    <th class="custom__bg__theme text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($employees as $data)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->generated_id}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->fname.' '.$data->mname.' '.$data->lname}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->position}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{Carbon\Carbon::parse($data->time_in_am)->format('h:i A').' - '.Carbon\Carbon::parse($data->time_out_am)->format('h:i A').' | '.Carbon\Carbon::parse($data->time_in_pm)->format('h:i A').' - '.Carbon\Carbon::parse($data->time_out_pm)->format('h:i A')}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;" data-toggle="modal" data-target="#edit"
                                data-id="{{$data->id}}"
                                data-time_in_am="{{$data->time_in_am}}"
                                data-time_out_am="{{$data->time_out_am}}"
                                data-time_in_pm="{{$data->time_in_pm}}"
                                data-time_out_pm="{{$data->time_out_pm}}"
                                data-gen_emp="{{$data->generated_id.' - '.$data->fname.' '.$data->lname}}"
                                class="edit-dialog custom__button w-35 text-white bg-theme-9 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="edit"></i></a>
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
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Employee -->
<div class="modal" id="edit">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Edit Schedule</h2> 
            <p id="gen_emp"></p>
        </div>
        <form action="{{route('employee.update.schedule')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <input type="hidden" name="generated_id" id="generated_id" />
                <div class="col-span-12 sm:col-span-6"> <label>Time-In AM</label> <input type="time" require name="time_in_am" id="time_in_am" required class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>Time-Out AM</label> <input type="time" require name="time_out_am" id="time_out_am" required class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>Time-In PM</label> <input type="time" require name="time_in_pm" id="time_in_pm" required class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>Time-Out PM</label> <input type="time" require name="time_out_pm" id="time_out_pm" required class="input w-full border mt-2 flex-1"> </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button> 
            </div>
        </form>
        
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
$(document).on("click", ".edit-dialog", function () {
    var id = $(this).data('id');
    var gen_emp = $(this).data('gen_emp');
    var time_in_am = $(this).data('time_in_am');
    var time_out_am = $(this).data('time_out_am');
    var time_in_pm = $(this).data('time_in_pm');
    var time_out_pm = $(this).data('time_out_pm');
    $('.modal__content #id').val(id);
    document.getElementById("gen_emp").innerText = gen_emp;
    $('.modal__content #time_in_am').val(time_in_am);
    $('.modal__content #time_out_am').val(time_out_am);
    $('.modal__content #time_in_pm').val(time_in_pm);
    $('.modal__content #time_out_pm').val(time_out_pm);
});

$(document).on("click", ".delete-dialog", function () {
    var id = $(this).data('id');
    $('.modal__content #data_id').val(id);
});
</script>
@endpush