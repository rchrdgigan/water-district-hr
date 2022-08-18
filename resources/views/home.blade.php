@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('breadcrumbs')
Dashboard
@endsection

@section('content')
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Dashboard
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="users" class="text-theme-10"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">0</div>
                    <div class="text-base text-gray-600 mt-1">Total of Employees</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="pie-chart" class="text-theme-11"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">100%</div>
                    <div class="text-base text-gray-600 mt-1">On Time Percentage</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="clock" class="text-theme-9"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">0</div>
                    <div class="text-base text-gray-600 mt-1">On Time Today</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="alert-triangle" class="text-theme-6"></i>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6">0</div>
                    <div class="text-base text-gray-600 mt-1">Late Today</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-span-12 lg:col-span-6 mt-8">
    <div class="intro-y block sm:flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Monthly Attendance Report
        </h2>
    </div>
    <div class="intro-y box p-5 mt-12 sm:mt-5">
        <div id="chart" style="height: 300px;"></div>
    </div>
</div>
@endsection