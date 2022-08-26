@extends('../../layouts.admin')

@section('title')
Schedule Management
@endsection

@section('breadcrumbs')
Schedule
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Schedule Management</h2>
        <div class="intro-x text-center xl:text-left">
            <a href="javascript:;" data-toggle="modal" data-target="#add" class="custom__button w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex" type="submit"><i data-feather="plus"></i><i data-feather="clock"></i></a>
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
                    <th class="custom__bg__theme text-white" style="border-top-left-radius: 20px;">Time-In AM</th>
                    <th class="custom__bg__theme text-white">Time-Out AM</th>
                    <th class="custom__bg__theme text-white">Time-In PM</th>
                    <th class="custom__bg__theme text-white">Time-Out PM</th>
                    <th class="custom__bg__theme text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($schedules as $data)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{date("g:iA",strtotime($data->time_in_am))}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{date("g:iA",strtotime($data->time_out_am))}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{date("g:iA",strtotime($data->time_in_pm))}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{date("g:iA",strtotime($data->time_out_pm))}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;" data-toggle="modal" data-id="{{$data->id}}" data-target="#edit" data-time_in_am="{{$data->time_in_am}}" data-time_out_am="{{$data->time_out_am}}" data-time_in_pm="{{$data->time_in_pm}}"  data-time_out_pm="{{$data->time_out_pm}}" class="edit-dialog custom__button w-30 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></a>
                            <a href="javascript:;" data-toggle="modal" data-id="{{$data->id}}" data-target="#delete" class="delete-dialog custom__button w-30 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small"></p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small"></p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small justify-center">No Data Available!</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small"></p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small"></p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Schedule -->
<div class="modal" id="add">
    <div class="modal__content">
        <form action="{{route('schedule.store')}}" method="post">
        @csrf
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Add Schedule</h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-6 sm:col-span-6"> <label>Time-In AM</label> <input type="time" required name="time_in_am" class="input w-full border mt-2 flex-1" placeholder="Input Time-In AM">
                    @error('time_in_am')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6"> <label>Time-Out AM</label> <input type="time" required name="time_out_am" class="input w-full border mt-2 flex-1" placeholder="Input Time-out AM">
                    @error('time_out_am')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6"> <label>Time-In PM</label> <input type="time" required name="time_in_pm" class="input w-full border mt-2 flex-1" placeholder="Input Time-In PM">
                    @error('time_in_pm')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6"> <label>Time-Out PM</label> <input type="time" required name="time_out_pm" class="input w-full border mt-2 flex-1" placeholder="Input Time-out PM">
                    @error('time_out_pm')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button> </div>
        </form>
    </div>
</div>

<!-- Edit Schedule -->
<div class="modal" id="edit">
    <div class="modal__content">
        <form action="{{route('schedule.update')}}" method="post">
        @csrf
        @method('PUT')
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">Edit Schedule</h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="text" name="id" id="id" hidden />
                <div class="col-span-6 sm:col-span-6"> <label>Time-In AM</label> <input type="time" id="time_in_am" required name="time_in_am" class="input w-full border mt-2 flex-1" placeholder="Input Time-In AM">
                    @error('time_in_am')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6"> <label>Time-Out AM</label> <input type="time" id="time_out_am" required name="time_out_am" class="input w-full border mt-2 flex-1" placeholder="Input Time-out AM">
                    @error('time_out_am')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6"> <label>Time-In PM</label> <input type="time" id="time_in_pm" required name="time_in_pm" class="input w-full border mt-2 flex-1" placeholder="Input Time-In PM">
                    @error('time_in_pm')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6"> <label>Time-Out PM</label> <input type="time" id="time_out_pm" required name="time_out_pm" class="input w-full border mt-2 flex-1" placeholder="Input Time-out PM">
                    @error('time_out_pm')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
              
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="submit" class="button w-20 bg-theme-9 text-white">Update</button> </div>
        </form>
    </div>
</div>

<!-- Delete Schedule -->
<div class="modal" id="delete">
    <div class="modal__content">
        <form action="{{route('schedule.destroy')}}" method="post">
            @csrf
            @method('DELETE')
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
                <input type="text" id="data_id" name="id" hidden/>
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
        var time_in_am = $(this).data('time_in_am');
        var time_out_am = $(this).data('time_out_am');
        var time_in_pm = $(this).data('time_in_pm');
        var time_out_pm = $(this).data('time_out_pm');
        $('.modal__content #id').val(id);
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