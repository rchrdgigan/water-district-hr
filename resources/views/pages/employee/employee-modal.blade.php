
<!-- View Employee -->
<div class="modal" id="view">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Employee Information</h2> 
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-12 mx-auto mb-2"><a id="linkImage" target="_blank"><img id="image" width="200" class="mr-3" alt="" srcset=""></a></div>
           
            <div class="col-span-12 sm:col-span-4"> <label>First Name</label> <input type="text" readonly name="fname" id="fname" class="input w-full border mt-2 flex-1" placeholder="Input First Name"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Middle Name</label> <input type="text" readonly name="mname" id="mname" class="input w-full border mt-2 flex-1" placeholder="Input Middle Name"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Lastname</label> <input type="text" readonly name="lname" id="lname" class="input w-full border mt-2 flex-1" placeholder="Input Last Name"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Gender</label>  <input type="text" readonly name="gender" id="gender" class="input w-full border mt-2 flex-1" placeholder="Input Gender"></div>
            <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" readonly name="address" id="address" class="input w-full border mt-2 flex-1" placeholder="Input Address"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" readonly name="birthdate" id="birthdate" class="input w-full border mt-2 flex-1" placeholder="Input Date of Birth"> </div>
            <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" readonly name="contact" id="contact" class="input w-full border mt-2 flex-1" placeholder="Input Contact Number"> </div>
            <div class="col-span-12 sm:col-span-3"> <label>Time-In AM</label> <input type="time" readonly name="time_in_am" id="time_in_am" class="input w-full border mt-2 flex-1" value="08:00:00"> </div>
            <div class="col-span-12 sm:col-span-3"> <label>Time-Out AM</label> <input type="time" readonly name="time_out_am" id="time_out_am" class="input w-full border mt-2 flex-1" value="12:00:00"> </div>
            <div class="col-span-12 sm:col-span-3"> <label>Time-In PM</label> <input type="time" readonly name="time_in_pm" id="time_in_pm" class="input w-full border mt-2 flex-1" value="13:00:00"> </div>
            <div class="col-span-12 sm:col-span-3"> <label>Time-Out PM</label> <input type="time" readonly name="time_out_pm" id="time_out_pm" class="input w-full border mt-2 flex-1" value="17:00:00"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>SSS</label> <input type="number" name="sss" readonly id="sss" class="input w-full border mt-2 flex-1" placeholder="Input SSS Amount"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>PhilHealth</label> <input type="number" readonly name="philhealth" id="philhealth" class="input w-full border mt-2 flex-1" placeholder="Input PhilHealth Amount"> </div>
            <div class="col-span-12 sm:col-span-4"> <label>Pag-IBIG</label> <input type="number" readonly name="pagibig" id="pagibig" class="input w-full border mt-2 flex-1" placeholder="Input Pag-IBIG Amount"> </div>
            <div class="col-span-12 sm:col-span-6"> <label>Position</label> <input type="text" readonly name="position" id="position" class="input w-full border mt-2 flex-1" placeholder="Input Position"> </div>
            <div class="col-span-12 sm:col-span-3"> <label>Rate Per Day</label> <input type="number" readonly name="rate_per_day" id="rate_per_day" class="input w-full border mt-2 flex-1" placeholder="Input Rate Per Day"> </div>
            <div class="col-span-12 sm:col-span-3 mx-auto">
                <div id="qrcode"></div>
                <a type="button" id="downloadbtn" class="button w-full bg-theme-1 text-white mt-2">Download QR</a>
            </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Close</button>
        </div>
    </div>
</div>

<!-- Add Employee -->
<div class="modal" id="add">
    <div class="modal__content modal__content--xl p-5">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Add New Employee</h2> 
        </div>
        <form action="{{route('employee.store')}}" name="addForm" onsubmit="return validateAddForm()" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="add_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeAddAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-4"> <label>First Name</label> <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="fname" id="fname" class="input w-full border mt-2 flex-1 @error('fname') border-theme-6 @enderror" value="{{old('fname')}}" placeholder="Input First Name">
                    @error('fname')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>Middle Name</label> <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="mname" id="mname" class="input w-full border mt-2 flex-1 @error('mname') border-theme-6 @enderror" value="{{old('mname')}}" placeholder="Input Middle Name">
                    @error('mname')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>Lastname</label> <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="lname" id="lname" class="input w-full border mt-2 flex-1 @error('lname') border-theme-6 @enderror" value="{{old('lname')}}" placeholder="Input Last Name">
                    @error('lname')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>Gender</label> <select  name="gender" id="gender" class="input w-full border mt-2 flex-1 @error('gender') border-theme-6 @enderror">
                        @if(old('gender'))
                        <option>{{old('gender')}}</option>
                        @endif
                        <option value="">--Select--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    @error('gender')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                    
                <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" name="address" id="address" class="input w-full border mt-2 flex-1 @error('address') border-theme-6 @enderror" value="{{old('address')}}" placeholder="Input Address">
                    @error('address')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" name="birthdate" id="birthdate" class="input w-full border mt-2 flex-1 @error('birthdate') border-theme-6 @enderror" value="{{old('birthdate')}}" placeholder="Input Date of Birth">
                    @error('birthdate')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" name="contact" minlength="11" maxlength="11" id="contact" class="input w-full border mt-2 flex-1 @error('contact') border-theme-6 @enderror" value="{{old('contact')}}" placeholder="Input Contact Number"> 
                    @error('contact')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
               
                <div class="col-span-12 sm:col-span-3"> <label>Time-In AM</label> <input type="time" name="time_in_am" id="time_in_am" class="input w-full border mt-2 flex-1 @error('time_in_am') border-theme-6 @enderror" value="08:00:00">
                    @error('time_in_am')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-3"> <label>Time-Out AM</label> <input type="time" name="time_out_am" id="time_out_am" class="input w-full border mt-2 flex-1 @error('time_out_am') border-theme-6 @enderror" value="12:00:00">
                    @error('time_out_am')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-3"> <label>Time-In PM</label> <input type="time" name="time_in_pm" id="time_in_pm" class="input w-full border mt-2 flex-1 @error('time_in_pm') border-theme-6 @enderror" value="13:00:00">
                    @error('time_in_pm')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-3"> <label>Time-Out PM</label> <input type="time" name="time_out_pm" id="time_out_pm" class="input w-full border mt-2 flex-1 @error('time_out_pm') border-theme-6 @enderror" value="17:00:00">
                    @error('time_out_pm')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>SSS</label> <input type="number" name="sss" id="sss" class="input w-full border mt-2 flex-1" placeholder="Input SSS Amount @error('sss') border-theme-6 @enderror" value="{{old('sss')}}">
                    @error('sss')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>PhilHealth</label> <input type="number" name="philhealth" id="philhealth" class="input w-full border mt-2 flex-1 @error('philhealth') border-theme-6 @enderror" value="{{old('philhealth')}}" placeholder="Input PhilHealth Amount">
                    @error('philhealth')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
               
                <div class="col-span-12 sm:col-span-4"> <label>Pag-IBIG</label> <input type="number" name="pagibig" id="pagibig" class="input w-full border mt-2 flex-1 @error('pagibig') border-theme-6 @enderror" value="{{old('pagibig')}}" placeholder="Input Pag-IBIG Amount">
                    @error('pagibig')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-span-12 sm:col-span-4"> <label>Position</label> <select  name="position" id="position" class="input w-full border mt-2 flex-1 @error('position') border-theme-6 @enderror" value="{{old('position')}}">
                        @if(old('position'))
                            <option>{{old('position')}}</option>
                        @endif
                        <option value="">--Select--</option>
                        <option>Water Sewerage Maintenance Man B (6/2)</option>
                        <option>Administrative Services Aide (4/1)</option>
                        <option>Administration Services Asst.B (10/2)</option>
                        <option>Property/Supply Assitant B (8/3)</option>
                        <option>Water Sewerage Maintenance Man A (8/2)</option>
                        <option>Water Resources Facilities Operator B (6/2)</option>
                        <option>Utilities/Customers Services Assistant C (8/2)</option>
                        <option>Administrative/General Services Officer A (16/3)</option>
                        <option>General Manager C (26/4)</option>
                        <option>Water/Sewerage Maintenance Man A (8/2)</option>
                        <option>Water Resources Facilities Tender B (4/2)</option>
                        <option>Administrative Services Aide (4/2)</option>
                        <option>Water Resources Facilities Tender B (4/1)</option>
                        <option>Clerk Processor B (6/1)</option>
                        <option>Water/Sewerage Maintenance Man C (4/2)</option>
                        <option>Utilities/Customers Services Assistant D (6/2)</option>
                        <option>Water/Sewerage Maintenance Man C (4/2)</option>
                        <option>Utilities/Customers Services Assistant C (8/2)</option>
                        <option>Administrative Services Aide (4/1)</option>
                        <option>Senior Corporate Accountant B (17/1)</option>
                        <option>Water/Sewerage Maintenance Man C (4/1)</option>
                        <option>Engineering Assistant A (10/1)</option>
                        <option>Water/Sewerage Maintenance Man A (8/3)</option>
                        <option>Utilities/Customers Services Assistant D (6/2)</option>
                    </select>
                    @error('position')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                    
                <div class="col-span-12 sm:col-span-4"> <label>Rate Per Day</label> <input type="number" name="rate_per_day" id="rate_per_day" class="input w-full border mt-2 flex-1 @error('rate_per_day') border-theme-6 @enderror" value="{{old('rate_per_day')}}" placeholder="Input Rate Per Day">
                @error('rate_per_day')
                    <div class="text-theme-6 mt-2">{{$message}}</div>
                @enderror
                </div>
                
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
        <form action="{{route('employee.update')}}" name="editForm" onsubmit="return validateEditForm()" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <input type="hidden" name="id" id="id" />
                <div class="col-span-12 sm:col-span-12 text-center" style="display:none;" id="edit_err"><div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> All fields must be filled out! <i data-feather="x" onclick="return closeEditAlert();" class="w-4 h-4 ml-auto"></i> </div></div>
                <div class="col-span-12 sm:col-span-4"> <label>First Name</label> <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)"  name="fname" id="fname" class="input w-full border mt-2 flex-1 @error('fname') border-theme-6 @enderror" value="{{old('fname')}}" placeholder="Input First Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Middle Name</label> <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="mname" id="mname" class="input w-full border mt-2 flex-1 @error('mname') border-theme-6 @enderror" value="{{old('mname')}}" placeholder="Input Middle Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Lastname</label> <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" name="lname" id="lname" class="input w-full border mt-2 flex-1 @error('lname') border-theme-6 @enderror" value="{{old('lname')}}" placeholder="Input Last Name"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Gender</label> <select  name="gender" id="gender" class="input w-full border mt-2 flex-1">
                        <option value="">--Select--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select> </div>
                <div class="col-span-12 sm:col-span-8"> <label>Address</label> <input type="text" name="address" id="address" class="input w-full border mt-2 flex-1 @error('address') border-theme-6 @enderror" value="{{old('address')}}" placeholder="Input Address"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Date of Birth</label> <input type="date" name="birthdate" id="birthdate" class="input w-full border mt-2 flex-1 @error('birthdate') border-theme-6 @enderror" value="{{old('birthdate')}}" placeholder="Input Date of Birth"> </div>
                <div class="col-span-12 sm:col-span-8"> <label>Contact No.</label> <input type="text" minlength="11" maxlength="11" name="contact" id="contact" class="input w-full border mt-2 flex-1 @error('contact') border-theme-6 @enderror" value="{{old('contact')}}" placeholder="Input Contact Number">
                    @error('contact')
                        <div class="text-theme-6 mt-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-12 sm:col-span-3"> <label>Time-In AM</label> <input type="time" name="time_in_am" id="time_in_am" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Time-Out AM</label> <input type="time" name="time_out_am" id="time_out_am" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Time-In PM</label> <input type="time" name="time_in_pm" id="time_in_pm" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-3"> <label>Time-Out PM</label> <input type="time" name="time_out_pm" id="time_out_pm" class="input w-full border mt-2 flex-1"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>SSS</label> <input type="number" name="sss" id="sss" class="input w-full border mt-2 flex-1 @error('sss') border-theme-6 @enderror" value="{{old('sss')}}" placeholder="Input SSS Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>PhilHealth</label> <input type="number" name="philhealth" id="philhealth" class="input w-full border mt-2 flex-1 @error('philhealth') border-theme-6 @enderror" value="{{old('philhealth')}}" placeholder="Input PhilHealth Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Pag-IBIG</label> <input type="number" name="pagibig" id="pagibig" class="input w-full border mt-2 flex-1 @error('pagibig') border-theme-6 @enderror" value="{{old('pagibig')}}" placeholder="Input Pag-IBIG Amount"> </div>
                <div class="col-span-12 sm:col-span-4"> <label>Position</label> <select  name="position" id="position" class="input w-full border mt-2 flex-1">
                        <option value="">--Select--</option>
                        <option>Water Sewerage Maintenance Man B (6/2)</option>
                        <option>Administrative Services Aide (4/1)</option>
                        <option>Administration Services Asst.B (10/2)</option>
                        <option>Property/Supply Assitant B (8/3)</option>
                        <option>Water Sewerage Maintenance Man A (8/2)</option>
                        <option>Water Resources Facilities Operator B (6/2)</option>
                        <option>Utilities/Customers Services Assistant C (8/2)</option>
                        <option>Administrative/General Services Officer A (16/3)</option>
                        <option>General Manager C (26/4)</option>
                        <option>Water/Sewerage Maintenance Man A (8/2)</option>
                        <option>Water Resources Facilities Tender B (4/2)</option>
                        <option>Administrative Services Aide (4/2)</option>
                        <option>Water Resources Facilities Tender B (4/1)</option>
                        <option>Clerk Processor B (6/1)</option>
                        <option>Water/Sewerage Maintenance Man C (4/2)</option>
                        <option>Utilities/Customers Services Assistant D (6/2)</option>
                        <option>Water/Sewerage Maintenance Man C (4/2)</option>
                        <option>Utilities/Customers Services Assistant C (8/2)</option>
                        <option>Administrative Services Aide (4/1)</option>
                        <option>Senior Corporate Accountant B (17/1)</option>
                        <option>Water/Sewerage Maintenance Man C (4/1)</option>
                        <option>Engineering Assistant A (10/1)</option>
                        <option>Water/Sewerage Maintenance Man A (8/3)</option>
                        <option>Utilities/Customers Services Assistant D (6/2)</option>
                    </select></div>
                <div class="col-span-12 sm:col-span-4"> <label>Rate Per Day</label> <input type="number" name="rate_per_day" id="rate_per_day" class="input w-full border mt-2 flex-1 @error('rate_per_day') border-theme-6 @enderror" value="{{old('rate_per_day')}}" placeholder="Input Rate Per Day"> </div>
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