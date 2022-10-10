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
                    <th class="custom__bg__theme text-white" style="border-top-left-radius: 20px;">ID Number</th>
                    <th class="custom__bg__theme text-white">Photo</th>
                    <th class="custom__bg__theme text-white">Name</th>
                    <th class="custom__bg__theme text-white">Position</th>
                    <th class="custom__bg__theme text-white">Schedule</th>
                    <th class="custom__bg__theme text-white">Employed Since</th>
                    <th class="custom__bg__theme text-white" style="border-top-right-radius: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($employees as $data)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{$data->generated_id}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <img src="{{asset('./img/profile.png')}}" width="40" class="mr-3" alt="" srcset="">
                            <a href="javascript:;" data-toggle="modal" data-target="#editImage" data-id="{{$data->id}}" data-emp="{{$data->generated_id.' - '.$data->fname.' '.$data->lname}}" class="edit-image-dialog custom__button w-35 text-white text-center bg-theme-1 xl:mr-3  hover:bg-blue-400 flex"><i data-feather="upload"></i>Upload</a>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{$data->fname.' '.$data->mname.' '.$data->lname}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{$data->position}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{Carbon\Carbon::parse($data->time_in_am)->format('h:i A').' - '.Carbon\Carbon::parse($data->time_out_am)->format('h:i A').' | '.Carbon\Carbon::parse($data->time_in_pm)->format('h:i A').' - '.Carbon\Carbon::parse($data->time_out_pm)->format('h:i A')}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <p class="font-small">{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</p>
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <button class="custom__button w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="eye"></i></button>
                            <a href="javascript:;" data-toggle="modal" data-target="#edit"
                                data-id="{{$data->id}}" 
                                data-fname="{{$data->fname}}" 
                                data-mname="{{$data->mname}}" 
                                data-lname="{{$data->lname}}"
                                data-gender="{{$data->gender}}"
                                data-address="{{$data->address}}"
                                data-birthdate="{{$data->birthdate}}"
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
                            <p class="font-small"></p>
                        </div>
                    </td>
                    <td class="w-40 text-center">
                        <div class="flex justify-center">
                            <p class="font-small">No Data Available!</p>
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

<!-- Add Employee -->
<div class="modal" id="add">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Add New Employee</h2> 
        </div>
        <form action="{{route('employee.store')}}" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-4"> <label>First Name</label> <input type="text" name="fname" id="fname" class="input w-full border mt-2 flex-1" placeholder="Input First Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Middle Name</label> <input type="text" name="mname" id="mname" class="input w-full border mt-2 flex-1" placeholder="Input Middle Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Lastname</label> <input type="text" name="lname" id="lname" class="input w-full border mt-2 flex-1" placeholder="Input Last Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Gender</label> <select  name="gender" id="gender" class="input w-full border mt-2 flex-1">
                        <option>--Select--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select> </div>
                <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" name="address" id="address" class="input w-full border mt-2 flex-1" placeholder="Input Address"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" name="birthdate" id="birthdate" class="input w-full border mt-2 flex-1" placeholder="Input Date of Birth"> </div>
                <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" name="contact" id="contact" class="input w-full border mt-2 flex-1" placeholder="Input Contact Number"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-In AM</label> <input type="time" name="time_in_am" id="time_in_am" class="input w-full border mt-2 flex-1" value="08:00:00"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-Out AM</label> <input type="time" name="time_out_am" id="time_out_am" class="input w-full border mt-2 flex-1" value="12:00:00"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-In PM</label> <input type="time" name="time_in_pm" id="time_in_pm" class="input w-full border mt-2 flex-1" value="13:00:00"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-Out PM</label> <input type="time" name="time_out_pm" id="time_out_pm" class="input w-full border mt-2 flex-1" value="17:00:00"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>SSS</label> <input type="number" name="sss" id="sss" class="input w-full border mt-2 flex-1" placeholder="Input SSS Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>PhilHealth</label> <input type="number" name="philhealth" id="philhealth" class="input w-full border mt-2 flex-1" placeholder="Input PhilHealth Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Pag-IBIG</label> <input type="number" name="pagibig" id="pagibig" class="input w-full border mt-2 flex-1" placeholder="Input Pag-IBIG Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Position</label> <input type="text" name="position" id="position" class="input w-full border mt-2 flex-1" placeholder="Input Position"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Rate Per Day</label> <input type="number" name="rate_per_day" id="rate_per_day" class="input w-full border mt-2 flex-1" placeholder="Input Rate Per Day"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Upload Photo</label> <input type="file" name="image" class="input w-full border mt-2 flex-1"> </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
            </div>
        </form>
        
    </div>
</div>

<!-- Edit Image -->
<div class="modal" id="editImage">
    <div class="modal__content">
        <form action="{{route('employee.update.image')}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto" id="genemp"></h2> 
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <div class="col-span-12 sm:col-span-12"> <label>Upload Photo</label> <input type="file" name="image" required class="input w-full border mt-2 flex-1"> 
                    @error('image')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
              
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> 
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-9 text-white">Update</button> 
            </div>
        </form>
    </div>
</div>

<!-- Edit Employee -->
<div class="modal" id="edit">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Edit Employee Information</h2> 
            <p id="gen_emp"></p>
        </div>
        <form action="{{route('employee.update')}}" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-4"> <label>First Name</label> <input type="text" name="fname" id="fname" class="input w-full border mt-2 flex-1" placeholder="Input First Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Middle Name</label> <input type="text" name="mname" id="mname" class="input w-full border mt-2 flex-1" placeholder="Input Middle Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Lastname</label> <input type="text" name="lname" id="lname" class="input w-full border mt-2 flex-1" placeholder="Input Last Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Gender</label> <select  name="gender" id="gender" class="input w-full border mt-2 flex-1">
                        <option>--Select--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select> </div>
                <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" name="address" id="address" class="input w-full border mt-2 flex-1" placeholder="Input Address"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" name="birthdate" id="birthdate" class="input w-full border mt-2 flex-1" placeholder="Input Date of Birth"> </div>
                <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" name="contact" id="contact" class="input w-full border mt-2 flex-1" placeholder="Input Contact Number"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-In AM</label> <input type="time" name="time_in_am" id="time_in_am" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-Out AM</label> <input type="time" name="time_out_am" id="time_out_am" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-In PM</label> <input type="time" name="time_in_pm" id="time_in_pm" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Punch-Out PM</label> <input type="time" name="time_out_pm" id="time_out_pm" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>SSS</label> <input type="number" name="sss" id="sss" class="input w-full border mt-2 flex-1" placeholder="Input SSS Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>PhilHealth</label> <input type="number" name="philhealth" id="philhealth" class="input w-full border mt-2 flex-1" placeholder="Input PhilHealth Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Pag-IBIG</label> <input type="number" name="pagibig" id="pagibig" class="input w-full border mt-2 flex-1" placeholder="Input Pag-IBIG Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Position</label> <input type="text" name="position" id="position" class="input w-full border mt-2 flex-1" placeholder="Input Position"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Rate Per Day</label> <input type="number" name="rate_per_day" id="rate_per_day" class="input w-full border mt-2 flex-1" placeholder="Input Rate Per Day"> </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Update</button>
            </div>
        </form>
        
    </div>
</div>

<!-- Delete Employee -->
<div class="modal" id="delete">
    <div class="modal__content">
        <form action="{{route('employee.destroy')}}" method="post">
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
    function validateForm() {
        let a = document.forms["myForm"]["fname"].value;
        let b = document.forms["myForm"]["mname"].value;
        let c = document.forms["myForm"]["lname"].value;
        let d = document.forms["myForm"]["gender"].value;
        let f = document.forms["myForm"]["address"].value;
        let g = document.forms["myForm"]["birthdate"].value;
        let h = document.forms["myForm"]["contact"].value;
        let x = document.forms["myForm"]["position"].value;
        let y = document.forms["myForm"]["rate_per_day"].value;
        var element = document.getElementById("fname");
        
        if (a == "" || b == "" || c == "" || d == "" || f == "" || g == "" || h == "" || x == "" || y == "") {  
            
            document.getElementById("_err").style.display = 'block';
            return false;
        }else{
            document.getElementById("_err").style.display = 'none';
        }
        
    } 
    function closeAlert() {
        document.getElementById("_err").style.display = 'none';
    }

    $(document).on("click", ".edit-image-dialog", function () {
        var id = $(this).data('id');
        var emp = $(this).data('emp');
        $('.modal__content #id').val(id);
        document.getElementById("genemp").innerText = emp;
    });
    
    $(document).on("click", ".edit-dialog", function () {
        var id = $(this).data('id');
        var fname = $(this).data('fname');
        var mname = $(this).data('mname');
        var lname = $(this).data('lname');
        var gender = $(this).data('gender');
        var address = $(this).data('address');
        var birthdate = $(this).data('birthdate');
        var contact = $(this).data('contact');
        var time_in_am = $(this).data('time_in_am');
        var time_out_am = $(this).data('time_out_am');
        var time_in_pm = $(this).data('time_in_pm');
        var time_out_pm = $(this).data('time_out_pm');
        var sss = $(this).data('sss');
        var philhealth = $(this).data('philhealth');
        var pagibig = $(this).data('pagibig');
        var position = $(this).data('position');
        var rate_per_day = $(this).data('rate_per_day');
        var gen_emp = $(this).data('gen_emp');
        
        document.getElementById("gen_emp").innerText = gen_emp;
        $('.modal__content #id').val(id);
        $('.modal__content #fname').val(fname);
        $('.modal__content #mname').val(mname);
        $('.modal__content #lname').val(lname);
        $('.modal__content #gender').val(gender);
        $('.modal__content #address').val(address);
        $('.modal__content #birthdate').val(birthdate);
        $('.modal__content #contact').val(contact);
        $('.modal__content #time_in_am').val(time_in_am);
        $('.modal__content #time_out_am').val(time_out_am);
        $('.modal__content #time_in_pm').val(time_in_pm);
        $('.modal__content #time_out_pm').val(time_out_pm);
        $('.modal__content #sss').val(sss);
        $('.modal__content #philhealth').val(philhealth);
        $('.modal__content #pagibig').val(pagibig);
        $('.modal__content #position').val(position);
        $('.modal__content #rate_per_day').val(rate_per_day);
    });

    $(document).on("click", ".delete-dialog", function () {
        var id = $(this).data('id');
        $('.modal__content #data_id').val(id);
    });


</script>
@endpush