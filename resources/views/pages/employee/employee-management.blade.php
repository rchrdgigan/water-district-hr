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
            Employee Management
        </h2>
        <div class="intro-x xl:mt-8 text-center xl:text-left mb-5">
            <button class="custom__button w-full mb-5 text-white text-center custom__bg__theme xl:mr-3 flex" type="submit"><i data-feather="plus"></i><i data-feather="users"></i> New</button>
        </div>
        
    </div>
    
</div>
@endsection