function validateAddForm() {
    let a = document.forms["addForm"]["fname"].value;
    let b = document.forms["addForm"]["mname"].value;
    let c = document.forms["addForm"]["lname"].value;
    let d = document.forms["addForm"]["gender"].value;
    let f = document.forms["addForm"]["address"].value;
    let g = document.forms["addForm"]["birthdate"].value;
    let h = document.forms["addForm"]["contact"].value;
    let x = document.forms["addForm"]["position"].value;
    let y = document.forms["addForm"]["rate_per_day"].value;
    if (a == "" || b == "" || c == "" || d == "" || f == "" || g == "" || h == "" || x == "" || y == "") {  
        document.getElementById("add_err").style.display = 'block';
        return false;
    }else{
        document.getElementById("add_err").style.display = 'none';
    }
    
} 
function validateEditForm() {
    let a = document.forms["editForm"]["fname"].value;
    let b = document.forms["editForm"]["mname"].value;
    let c = document.forms["editForm"]["lname"].value;
    let d = document.forms["editForm"]["gender"].value;
    let f = document.forms["editForm"]["address"].value;
    let g = document.forms["editForm"]["birthdate"].value;
    let h = document.forms["editForm"]["contact"].value;
    let x = document.forms["editForm"]["position"].value;
    let y = document.forms["editForm"]["rate_per_day"].value;
    if (a == "" || b == "" || c == "" || d == "" || f == "" || g == "" || h == "" || x == "" || y == "") {  
        document.getElementById("edit_err").style.display = 'block';
        return false;
    }else{
        document.getElementById("edit_err").style.display = 'none';
    }
    
} 
function closeEditAlert() {
    document.getElementById("edit_err").style.display = 'none';
}
function closeAddAlert() {
    document.getElementById("add_err").style.display = 'none';
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
    $('.modal__content #contact').val('0'+contact);
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

var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 190,
    height : 190
});

$(document).on("click", ".view-dialog", function () {
    var id = $(this).data('id');
    var gen_id = $(this).data('gen_id');
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
    var image = $(this).data('image');
    
    document.getElementById("gen_emp").innerText = gen_emp;
    $('.modal__content #id').val(id);
    $('.modal__content #fname').val(fname);
    $('.modal__content #mname').val(mname);
    $('.modal__content #lname').val(lname);
    $('.modal__content #gender').val(gender);
    $('.modal__content #address').val(address);
    $('.modal__content #birthdate').val(birthdate);
    $('.modal__content #contact').val('0'+contact);
    $('.modal__content #time_in_am').val(time_in_am);
    $('.modal__content #time_out_am').val(time_out_am);
    $('.modal__content #time_in_pm').val(time_in_pm);
    $('.modal__content #time_out_pm').val(time_out_pm);
    $('.modal__content #sss').val(sss);
    $('.modal__content #philhealth').val(philhealth);
    $('.modal__content #pagibig').val(pagibig);
    $('.modal__content #position').val(position);
    $('.modal__content #rate_per_day').val(rate_per_day);
    $('#linkImage').attr('href',image);
    $('#image').attr('src',image);
    
    qrcode.makeCode(""+gen_id);
    const elem = document.querySelector("#qrcode");
    html2canvas(elem).then(function (canvas) {
        let cvs = document.querySelector("canvas");
        let btn = document.querySelector("#downloadbtn");
        btn.href = cvs.toDataURL("image/jpeg");
        btn.download = "qrdowloaded.jpeg";
    });

});

$(document).on("click", ".delete-dialog", function () {
    var id = $(this).data('id');
    $('.modal__content #data_id').val(id);
});