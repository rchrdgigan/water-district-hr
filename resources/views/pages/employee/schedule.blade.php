@extends('../../layouts.admin')

@section('title')
Employee List
@endsection

@section('breadcrumbs')
Employee
@endsection

@section('content')
<div class="col-span-12 lg:col-span-6 mt-8">
    <div class="intro-y block sm:flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5  mb-2">
            Employees Schedule List
        </h2>
        <div class="intro-x xl:mt-8 text-center xl:text-left">
            <button class="custom__button w-full mb-5 text-white text-center bg-theme-9 xl:mr-3 flex" type="submit"><i data-feather="printer"></i> Print</button>
        </div>
    </div>
  
</div>
@endsection