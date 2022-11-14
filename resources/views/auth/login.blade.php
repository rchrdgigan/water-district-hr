@extends('layouts.auth')
@section('title')
Login | Information Management System for HR
@endsection
@section('content')
<div class="logo2">
    <img src="{{asset('img/waterdistrict_logo.png')}}" class="mx-auto" alt="" srcset="">
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Sign in to your account and manage all employees in one place</div>
    <div class="intro-x mt-8">
        <input type="text" class="intro-x login__input input input--lg border border-gray-300 block  @error('email') border-theme-6 @enderror" placeholder="Email" name="email"  autocomplete="email">
            @error('email')
                <div class="text-theme-6 mt-2">{{$message}}</div>
            @enderror
        <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('password') border-theme-6 @enderror" placeholder="Password" name="password" autocomplete="current-password">
            @error('password')
                <div class="text-theme-6 mt-2">{{$message}}</div>
            @enderror
    </div>
    <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
        <div class="flex items-center mr-auto">
            <input type="checkbox"  name="remember" class="input border mr-2" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="cursor-pointer select-none" for="remember">Remember me</label>
        </div>
        <a href="{{ route('password.request') }}">Forgot Password?</a>
    </div>
    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
        <button class="custom__button w-full xl:w-32 text-white custom__bg__theme xl:mr-3 align-top" type="submit">Login</button>
        <a href="{{url('/')}}" type="button" class="custom__button w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Back</a>
    </div>
</form>
@endsection