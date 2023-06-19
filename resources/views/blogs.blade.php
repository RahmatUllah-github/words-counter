@extends('layouts.master')

@section('meta')
    <meta name="keywords"
        content="{{ $setting->blogs_page_meta_keywords ?? '' }}" />
    <meta name="description"
        content="{{ $setting->blogs_page_meta_description ?? '' }}" />
    <meta property="og:title" content="{{ $setting->blogs_page_title ?? '' }}" />
    <meta property="og:description" content="{{ $setting->blogs_page_meta_description }}" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:image" content="{{ asset('images/logos/logo.png') }}" />
    <link rel="canonical" href="{{ config('app.url') }}" />

    <title>{{ $setting->blogs_page_title ?? '' }}</title>
@endsection

@section('content')
@php
    use Illuminate\Support\Str;
@endphp
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog mt-4">
        <div class="container">
            <div class="row mb-4 d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" placeholder="Have a question? Ask Now">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="container" data-aos="fade-up">
            <div class="row gy-4 posts-list">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6">
                        <article>
                            <div class="post-img">
                                <img src="{{ $blog->image }}" alt="" class="img-fluid w-100">
                            </div>
                            <p class="post-category">{{ $blog->category->name }}</p>
                            <h1 class="title mb-1">
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    {{ Str::limit(strip_tags($blog->title), 100) }}
                                </a>
                            </h1>
                            <div>
                                {{ Str::limit(strip_tags($blog->description), 100) }}
                            </div>
                        </article>
                    </div>
                @endforeach
                <!-- End post list item -->

            </div>
            <!-- End blog posts list -->

            <div class="float-end">
                {!! $blogs->links() !!}
            </div>
            <!-- End blog pagination -->

        </div>
    </section><!-- End Blog Section -->
@endsection
