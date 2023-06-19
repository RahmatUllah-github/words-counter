@extends('layouts.admin.master')

@section('content')
    <add-edit-blog-component categories="{{ $categories }}" action="{{ $action }}" blog="{{ $blog ?? '' }}"></add-edit-blog-component>
@endsection
