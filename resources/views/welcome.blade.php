@extends('layouts.app')

@section('content')
    <div class="logo">
        <img src="{{asset('img/waterdistrict_logo.png')}}" alt="" srcset="">
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="card margin__top border__radius box">
                    <div class="text-center text-white border__radius bg-primary header"><h1 class="h5 p-2">Employees Attendance</h1></div>
                    <div class="card-body padding__body">
                        <div class="box-date" id="date">Aug 13, 2022</div>
                        <div class="box-time" id="clock"></div>
                        <div class="form-group mt-2" id="inputID">
                            <label for="id__no" class="form-label">Input ID No. :</label>
                            <input id="id__no" class="form-control border__radius" placeholder="Enter Your ID Number" type="text" />
                        </div>
                        <div class="cont__qr" id="scanner">
                            <video class="qrscanner"></video>
                            <div class="horizontal__line"></div>
                            <div class="vertical__line"></div>
                        </div>
                        <div class="col-12 text-center mt-4 mb-4">
                            <input type="submit" id="sub_btn" class="btn text-white custom__button custom__bg__theme" value="Submit" />
                            <input type="submit" id="btn" class="btn custom__button btn-success" onclick="return showScanner();" value="QR-Code Scanner" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function showScanner(){
        var displayQr = document.getElementById('scanner');

        if(displayQr.style.display === 'block'){
            displayQr.style.display = 'none';
            document.getElementById('inputID').style.display = 'block';
            document.getElementById('btn').value = 'QR-Code Scanner';
            document.getElementById('sub_btn').disabled = false;
        }else{
            displayQr.style.display = 'block';
            document.getElementById('inputID').style.display = 'none';
            document.getElementById('btn').value = 'Manual Input ID No.';
            document.getElementById('sub_btn').disabled = true;
        }
    }

    function currentTime() {
        let date = new Date(); 
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        let session = "AM";

        if(hh === 0){
            hh = 12;
        }
        if(hh > 12){
            hh = hh - 12;
            session = "PM";
        }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;
            
        let time = hh + ":" + mm + ":" + ss + " " + session;

        document.getElementById("clock").innerText = time; 
        let t = setTimeout(function(){ currentTime() }, 1000);
    }

    currentTime();


    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    const months = {
        0: 'January',
        01: 'February',
        02: 'March',
        03: 'April',
        04: 'May',
        05: 'June',
        06: 'July',
        07: 'August',
        08: 'September',
        09: 'October',
        10: 'November',
        11: 'December'
    }

    today = ' ' + dd + ', ' + yyyy;
    concatDate = months[parseInt(mm)] + today;
    document.getElementById("date").innerText  = concatDate;
    
</script>
@endsection