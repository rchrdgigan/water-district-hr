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
            <button class="custom__button w-36 text-white text-center hover:bg-blue-400 bg-theme-9 xl:mr-3 flex" type="submit"><i data-feather="printer"></i>Print Payroll</button>
            <button class="custom__button w-36 text-white text-center hover:bg-blue-400 bg-theme-12 xl:mr-3 flex" type="submit"><i data-feather="printer"></i>Print Payslip</button>
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
                    <th class="custom__bg__theme text-white" style="border-top-left-radius: 20px;">Employee Name</th>
                    <th class="custom__bg__theme text-white">Employee ID</th>
                    <th class="custom__bg__theme text-white">Gross</th>
                    <th class="custom__bg__theme text-white">Deduction</th>
                    <th class="custom__bg__theme text-white" style="border-top-right-radius: 20px;">Net Pay</th>
                </tr>
            </thead>
            <tbody>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">Brad Feet</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">4422144</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">1500</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">600</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">900</p>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection