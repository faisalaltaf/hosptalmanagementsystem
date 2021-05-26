@extends('dashboard.user.layout.main')

@section('content')


<h1>{{Auth::guard('web')->user()->name}}</h1>      
    <p>{{Auth::guard('web')->user()->email}}</p>



    @endsection