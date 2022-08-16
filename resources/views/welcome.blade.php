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
@endsection
@push('custom-scripts')
<script src="{{asset('./js/welcome.js')}}"></script>
@endpush