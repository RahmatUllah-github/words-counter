@extends('layouts.master')

@section('meta')
    <meta name="keywords"
        content="{{ $setting->meta_keywords ?? '' }}" />
    <meta name="description"
        content="{{ $setting->meta_description ?? '' }}" />
    <meta property="og:title" content="{{ $setting->home_page_title ?? '' }}" />
    <meta property="og:description" content="{{ $setting->meta_description }}" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:image" content="{{ asset('images/logos/logo.png') }}" />
    <link rel="canonical" href="{{ config('app.url') }}" />

    <title>{{ $setting->home_page_title ?? '' }}</title>
@endsection

@section('content')
    <counter-component page-text="{{ $setting->page_text ?? '' }}"></counter-component>
@endsection
