@extends('../../layouts.admin')

@section('title')
Attendance Management
@endsection

@section('breadcrumbs')
Attendance
@endsection

@section('content')
<div class="col-span-12 lg:col-span-6 mt-8">
    <div class="intro-y block sm:flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Attendance Management
        </h2>
        <form method="GET">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 align-self-center flex">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="search" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search Children's Name..." name="search"  >
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
                <button class="button text-white bg-theme-1 shadow-md mx-2 custom__button" type="submit">Go</button>
                <a href="" class=" flex items-center block pr-5 pl-5 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Clear</a>
            </div>
        </form>
    </div>
</div>
@endsection