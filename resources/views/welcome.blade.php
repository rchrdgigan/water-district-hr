@extends('layouts.app')
@section('title')
Employee Attendance | Information Management System for HR
@endsection
@section('content')
<form action="{{route('store.attendance')}}" method="post">
    @csrf
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height:80vh">
            <div class="col-12 col-md-6">
                <div class="card border__radius box">
                    <div class="text-center text-dark mb-3" style="background:url({{asset('img/waterdistrict_logo.png')}}); background-repeat:no-repeat; background-position-x: center; background-position-y: center; height: 130px; background-size:800px; border-top-left-radius:30px; border-top-right-radius:30px; padding-top:20px;">
                        <img src="{{asset('img/waterdistrict_logo.png')}}" class="rounded-pill" height="150" alt="" srcset="">
                    </div>
                    <div class="card-body pt-4">
                        <div class="box-date" id="date"></div>
                        <div class="box-time" id="clock"></div>
                        <div class="form-group" id="inputID">
                            <input id="id__no" type="number" name="id_no" class="form-control border__radius text-center mt-2" required placeholder="Enter Your ID Number" type="text" />
                        </div>
                        <div class="cont__qr" id="scanner">
                            <video id="preview" class="qrscanner" style="height:100%; z-index:997;" ></video>
                            <div class="horizontal__line"></div>
                            <div class="vertical__line"></div>
                        </div>
                        <div class="col-12 text-center mt-4 mb-4">
                            <input type="submit" id="sub_btn" class="btn btn-sm text-white rounded-pill custom__bg__theme" value="Submit" />
                            <input type="button" id="btn" class="btn btn-sm rounded-pill btn-success" onclick="return showScanner();" value="QR-Code Scanner" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>    
@endsection
@push('custom-scripts')
<script src="{{asset('./js/welcome.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    scanner.addListener('scan', function (i) {
    // passing parameter value of QR ID to qrstr
    const qrstr = i;
        $("#qrstr").val(qrstr);
        if(i.length > 0){
            var url = '{{ route("store.qrcode",[$emp_id = ":id"]) }}';
            url = url.replace(':id', i);
            window.location.href = url;
        }
    });
    // Camera On
    Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        // Cameras 0 is equal sa frontcamera
        // Cameras 1 is equal sa rearcamera
        scanner.start(cameras[0]);
    } else {
        console.error('No cameras found.');
    }
    }).catch(function (e) {
    console.error(e);
    });
</script>
@endpush