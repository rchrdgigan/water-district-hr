@extends('../../layouts.admin')

@section('title')
Overtime Management
@endsection

@section('breadcrumbs')
Overtime
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Overtime Management</h2>
        <div class="intro-x text-center xl:text-left">
            <a href="javascript:;" data-toggle="modal" data-target="#add" class="custom__button w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex" type="submit"><i data-feather="plus"></i><i data-feather="users"></i></a>
        </div>
        <div class="hidden md:block mx-auto text-gray-600"></div>
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
                    <th class="custom__bg__theme text-xs text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="custom__bg__theme text-xs text-white">ID Number</th>
                    <th class="custom__bg__theme text-xs text-white">Name</th>
                    <th class="custom__bg__theme text-xs text-white">No. of Hours</th>
                    <th class="custom__bg__theme text-xs text-white">Rate</th>
                    <th class="custom__bg__theme text-xs text-white">Total</th>
                    <th class="custom__bg__theme text-xs text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($overtime as $data)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->date_overtime}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->employee->generated_id}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->employee->fname.' '.$data->employee->mname.' '.$data->employee->lname}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{ number_format((float)$data->hours, 2, '.', '')}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->rate}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="text-xs">{{$data->rate * number_format((float)$data->hours, 2, '.', '')}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;" data-toggle="modal" data-target="#edit"
                                data-id="{{$data->id}}"
                                data-date="{{Carbon\Carbon::parse($data->date_overtime)->format('Y-m-d')}}"
                                data-decimal_hours="{{$data->hours}}"
                                data-rate="{{$data->rate}}"
                                class="edit-dialog custom__button w-35 text-white bg-theme-9 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="edit"></i></a>

                            <a href="javascript:;" data-toggle="modal" data-target="#delete"
                                data-id="{{$data->id}}"
                                class="delete-dialog custom__button w-35 text-white bg-theme-6 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="delete"></i></a>
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
@if($pagination <> false)
{!! $overtime->links() !!} 
@endif
<!-- Add Overtime -->
<div class="modal" id="add">
    <div class="modal__content">
        <form action="{{route('employee.overtime.store')}}" name="addForm" method="post">
            @csrf
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Add Employee Overtime</h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12"> <label>Employee ID</label> <input type="text" required name="generated_id" class="input w-full border mt-2 flex-1" placeholder="Input Employee ID"> </div>
                <div class="col-span-12 sm:col-span-12"> <label>Date</label> <input type="date" required name="date_overtime"  class="input w-full border mt-2 flex-1" placeholder="Input Date"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>No. Hours</label> <input type="number" required name="hours"  class="input w-full border mt-2 flex-1" placeholder="Input No. of Hours"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>No. Mins</label> <input type="number" required name="mins" class="input w-full border mt-2 flex-1" placeholder="Input No. Mins"> </div>
                <div class="col-span-12 sm:col-span-12"> <label>Rate</label> <input type="text" onkeypress="return validate();" required name="rate" id="rate" class="input w-full border mt-2 flex-1" placeholder="Input Rate Per Hour">
                    <div class="text-theme-6 mt-2" id="rate_err"></div>
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button> 
            </div>
        </form> 
    </div>
 </div>
 <!-- Edit Overtime -->
<div class="modal" id="edit">
    <div class="modal__content">
        <form action="{{route('employee.overtime.update')}}" name="editForm" method="post">
            @csrf
            @method('PUT')
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Update Overtime</h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" id="id" name="id"/>
                <div class="col-span-12 sm:col-span-12"> <label>Date</label> <input type="date" name="date_overtime" id="date_overtime" class="input w-full border mt-2 flex-1" placeholder="Input Date"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>No. Hours</label> <input type="text" name="hours" id="hours" class="input w-full border mt-2 flex-1" placeholder="Input No. of Hours"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>No. Mins</label> <input type="text" name="mins" id="mins" class="input w-full border mt-2 flex-1" placeholder="Input No. Mins"> </div>
                <div class="col-span-12 sm:col-span-12"> <label>Rate</label>  <input type="text" onkeypress="return validate();" required name="rate" id="rate" class="input w-full border mt-2 flex-1" placeholder="Input Rate Per Hour">
                    <div class="text-theme-6 mt-2" id="_rate_err"></div>
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button> 
            </div>
        </form> 
    </div>
 </div>
 <!-- Delete Overtime -->
<div class="modal" id="delete">
    <div class="modal__content">
        <form action="{{route('employee.overtime.destroy')}}" method="post">
            @csrf
            @method('DELETE')
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                <input type="hidden" id="data_id" name="id"/>
            </div>
            <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button> </div>
        </form>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
$(document).on("click", ".edit-dialog", function () {
    var id = $(this).data('id');
    var date = $(this).data('date');
    var decimal_hours = $(this).data('decimal_hours');
    var rate = $(this).data('rate');
    n = Math.abs(decimal_hours);
    var decimal = n - Math.floor(n);
    var mins = decimal * 60;
    $('.modal__content #id').val(id);
    $('.modal__content #date_overtime').val(date);
    $('.modal__content #hours').val(Math.floor(n));
    $('.modal__content #mins').val(Math.round(mins));
    $('.modal__content #rate').val(rate);
});

$(document).on("click", ".delete-dialog", function () {
    var id = $(this).data('id');
    $('.modal__content #data_id').val(id);
});

function validate() {

    let rate = document.forms["addForm"]["rate"].value;
    var rate_m = rate.match(/^\d{0,2}(?:\.\d{0,2}){0,1}$/);
    if (!rate_m) {
        document.getElementById("rate_err").innerHTML = "This rate is not valid. Rate must be a numeric.";
        return false;
    }

    let e_rate = document.forms["editForm"]["rate"].value;
    var rate_e = e_rate.match(/^\d{0,2}(?:\.\d{0,2}){0,1}$/);
    if (!rate_e) {
        document.getElementById("_rate_err").innerHTML = "This rate is not valid. Rate must be a numeric.";
        return false;
    }
}
</script>
@endpush