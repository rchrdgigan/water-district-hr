@extends('../../layouts.admin')

@section('title')
Attendance Management
@endsection

@section('breadcrumbs')
Attendance
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Attendance Management</h2>
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
                    <th class="custom__bg__theme text-center text-white" style="border-top-left-radius: 20px;">Date</th>
                    <th class="custom__bg__theme text-center text-white">ID Number</th>
                    <th class="custom__bg__theme text-center text-white">Name</th>
                    <th class="custom__bg__theme text-center text-white border-l">AM Time-In</th>
                    <th class="custom__bg__theme text-center text-white border-r">AM Time-Out</th>
                    <th class="custom__bg__theme text-center text-white border-l">PM Time-In</th>
                    <th class="custom__bg__theme text-center text-white border-r">PM Time-Out</th>
                    <th class="custom__bg__theme text-center text-white">Status</th>
                    <th class="custom__bg__theme text-center text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">Aug 20, 2022</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">4422144</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">Brad Feet</p>
                        </div>
                    </td>
                    <td class="w-40 border-l">
                        <div class="flex justify-center">
                            <p class="font-small">08:00AM</p>
                        </div>
                    </td>
                    <td class="w-40 border-r">
                        <div class="flex justify-center">
                            <p class="font-small">12:00PM</p>
                        </div>
                    </td>
                    <td class="w-40 border-l">
                        <div class="flex justify-center">
                            <p class="font-small">01:00PM</p>
                        </div>
                    </td>
                    <td class="w-40 border-r">
                        <div class="flex justify-center">
                            <p class="font-small">05:00PM</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small bg-green-500 custom__button text-white">Ontime</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <button class="custom__button w-35 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></button>
                            <button class="custom__button w-35 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">Aug 20, 2022</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">4422133</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">Brad Er</p>
                        </div>
                    </td>
                    <td class="w-40 border-l">
                        <div class="flex justify-center">
                            <p class="font-small">08:00AM</p>
                        </div>
                    </td>
                    <td class="w-40 border-r">
                        <div class="flex justify-center">
                            <p class="font-small">12:00PM</p>
                        </div>
                    </td>
                    <td class="w-40 border-l">
                        <div class="flex justify-center">
                            <p class="font-small">01:00PM</p>
                        </div>
                    </td>
                    <td class="w-40 border-r">
                        <div class="flex justify-center">
                            <p class="font-small">05:00PM</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small bg-red-500 custom__button text-white">Late</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <button class="custom__button w-35 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></button>
                            <button class="custom__button w-35 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">Aug 17, 2022</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">4422122</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small">Brad Or</p>
                        </div>
                    </td>
                    <td class="w-40 border-l">
                        <div class="flex justify-center">
                            <p class="font-small">08:00AM</p>
                        </div>
                    </td>
                    <td class="w-40 border-r">
                        <div class="flex justify-center">
                            <p class="font-small">12:00PM</p>
                        </div>
                    </td>
                    <td class="w-40 border-l">
                        <div class="flex justify-center">
                            <p class="font-small">01:00PM</p>
                        </div>
                    </td>
                    <td class="w-40 border-r">
                        <div class="flex justify-center">
                            <p class="font-small">05:00PM</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <p class="font-small bg-green-500 custom__button text-white">Ontime</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex justify-center">
                            <button class="custom__button w-35 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></button>
                            <button class="custom__button w-35 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></button>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>

<!-- Add Employee -->
<div class="modal" id="add">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Add Employee Attendance</h2> 
            <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700 dark:text-gray-600"></i> </a>
                <div class="dropdown-box w-40">
                    <div class="dropdown-box__content box dark:bg-dark-1 p-2"> <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </div>
                </div>
            </div>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-12"> <label>Employee ID</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Input Employee ID"> </div>
            <div class="col-span-12 sm:col-span-12"> <label>Date</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Input Date"> </div>
            <div class="col-span-12 sm:col-span-6"> <label>Time-In</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Input Time-In"> </div>
            <div class="col-span-12 sm:col-span-6"> <label>Time-Out</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Input Time-Out"> </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="button" class="button w-20 bg-theme-1 text-white">Save</button> </div>
    </div>
</div>
@endsection