
@extends('layouts.master')
@section('content')
    @include('partials.welcome_section',['current_user',$current_user])
@endsection