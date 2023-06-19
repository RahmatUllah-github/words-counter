@extends('layouts.admin.master')

@section('content')
    <profile-component user="{{ $user }}"></profile-component>
@endsection
