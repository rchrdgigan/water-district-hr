@extends('../../layouts.admin')

@section('title')
Deductions Management
@endsection

@section('breadcrumbs')
Deductions
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
    <h2 class="intro-y text-lg font-medium mr-5 text-center">Deductions Management</h2>
        <div class="intro-x text-center xl:text-left">
            <button class="custom__button w-full text-white text-center hover:bg-blue-400 bg-theme-1 xl:mr-3 flex" type="submit"><i data-feather="plus"></i>New</button>
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
                    <th class="custom__bg__theme text-white" style="border-top-left-radius: 20px;">Description</th>
                    <th class="custom__bg__theme text-white">Amount</th>
                    <th class="custom__bg__theme text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">Pag-Ibig</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">200</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <button class="custom__button w-30 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></button>
                            <button class="custom__button w-30 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">Phil-Health</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">300</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <button class="custom__button w-30 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></button>
                            <button class="custom__button w-30 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">SSS</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">100</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <button class="custom__button w-30 text-white hover:bg-blue-400 bg-theme-9 xl:mr-3 flex"><i data-feather="edit"></i></button>
                            <button class="custom__button w-30 text-white hover:bg-blue-400 bg-theme-6 xl:mr-3 flex"><i data-feather="delete"></i></button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection