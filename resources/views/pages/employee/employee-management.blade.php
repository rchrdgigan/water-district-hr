@extends('../../layouts.admin')

@section('title')
Employee List
@endsection

@section('breadcrumbs')
Employee
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Employee Management</h2>
        <div class="intro-x text-center xl:text-left">
            <a href="javascript:;" data-toggle="modal" data-target="#add" class="custom__button w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex"><i data-feather="plus"></i><i data-feather="users"></i></a>
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
                    <th class="custom__bg__theme text-xs text-white">Photo</th>
                    <th class="custom__bg__theme text-xs text-white">Name</th>
                    <th class="custom__bg__theme text-xs text-white">Position</th>
                    <th class="custom__bg__theme text-xs text-white">Schedule</th>
                    <th class="custom__bg__theme text-xs text-white">Employed Since</th>
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
                        @if($data->image != 'noimage.png')
                            <img src="{{asset('/storage/employee_image/'.$data->image)}}" style="height:40px;" class="mr-3">
                        @else
                            <img src="{{asset('./img/profile.png')}}"  style="height:40px;" class="mr-3">
                        @endif
                            <a href="javascript:;" data-toggle="modal" data-target="#editImage" data-id="{{$data->id}}" data-emp="{{$data->generated_id.' - '.$data->fname.' '.$data->lname}}" class="edit-image-dialog custom__button w-35 text-white text-center bg-theme-1 xl:mr-3  hover:bg-blue-400 flex"><i data-feather="upload"></i>Upload</a>
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
                            <p class="text-xs">{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <a href="javascript:;" data-toggle="modal" data-target="#view"
                                data-id="{{$data->id}}" 
                                data-fname="{{$data->fname}}" 
                                data-mname="{{$data->mname}}" 
                                data-lname="{{$data->lname}}"
                                data-gender="{{$data->gender}}"
                                data-address="{{$data->address}}"
                                data-birthdate="{{Carbon\Carbon::parse($data->birthdate)->format('Y-m-d')}}"
                                data-contact="{{$data->contact}}"
                                data-time_in_am="{{$data->time_in_am}}"
                                data-time_out_am="{{$data->time_out_am}}"
                                data-time_in_pm="{{$data->time_in_pm}}"
                                data-time_out_pm="{{$data->time_out_pm}}"
                                data-sss="{{$data->sss}}"
                                data-philhealth="{{$data->philhealth}}"
                                data-pagibig="{{$data->pagibig}}"
                                data-position="{{$data->position}}"
                                data-rate_per_day="{{$data->rate_per_day}}"
                                @if($data->image != 'noimage.png')
                                    data-image="{{asset('/storage/employee_image/'.$data->image)}}"
                                @else
                                    data-image="{{asset('./img/profile.png')}}"
                                @endif
                                data-gen_emp="{{$data->generated_id.' - '.$data->fname.' '.$data->lname}}"
                                class="view-dialog custom__button w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="eye"></i></a>

                            <a href="javascript:;" data-toggle="modal" data-target="#edit"
                                data-id="{{$data->id}}" 
                                data-fname="{{$data->fname}}" 
                                data-mname="{{$data->mname}}" 
                                data-lname="{{$data->lname}}"
                                data-gender="{{$data->gender}}"
                                data-address="{{$data->address}}"
                                data-birthdate="{{Carbon\Carbon::parse($data->birthdate)->format('Y-m-d')}}"
                                data-contact="{{$data->contact}}"
                                data-time_in_am="{{$data->time_in_am}}"
                                data-time_out_am="{{$data->time_out_am}}"
                                data-time_in_pm="{{$data->time_in_pm}}"
                                data-time_out_pm="{{$data->time_out_pm}}"
                                data-sss="{{$data->sss}}"
                                data-philhealth="{{$data->philhealth}}"
                                data-pagibig="{{$data->pagibig}}"
                                data-position="{{$data->position}}"
                                data-rate_per_day="{{$data->rate_per_day}}"
                                data-gen_emp="{{$data->generated_id.' - '.$data->fname.' '.$data->lname}}"
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
{!! $employees->links() !!} 
@endif
<!-- include modal -->
@include('pages.employee.employee-modal')

@endsection
@push('custom-scripts')
<script src="{{asset('js/employee.js')}}"></script>
@endpush