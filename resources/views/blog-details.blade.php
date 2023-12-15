@extends('layouts.master')

@section('meta')
    <meta name="keywords" content="{{ $blog->meta_keywords }}">
    <meta name="description" content="{{ $blog->meta_description }}">
    <meta property="og:title" content="{{ $blog->title }}" />
    <meta property="og:description" content="{{ $blog->meta_description }}" />
    <meta property="og:url" content="{{ config('app.url') }}/blog/{{ $blog->slug }}" />
    <meta property="og:image" content="{{ config('app.url') }}{{ $blog->image }}" />
    <link rel="canonical" href="{{ config('app.url') }}/blog/{{ $blog->slug }}" />
    <title>{{ $blog->page_title }}</title>
@endsection

@section('content')
@php
    use Illuminate\Support\Str;
@endphp
    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row g-5 mb-4">

                <div class="col-lg-8">

                    <article class="blog-details mb-4">

                        <div class="post-img">
                            <img src="{{ $blog->image }}" alt="" class="img-fluid rounded">
                        </div>

                        <p>
                            {{ $blog->category->name }}
                            <time class="time">({{ $blog->published_at->diffForHumans() }})</time>
                        </p>

                        <h2 class="title mt-3">{{ $blog->title }}</h2>

                        <div class="content mt-5">
                            {!! $blog->description !!}
                        </div>
                    </article><!-- End blog post -->

                    <h4>Share Blog</h4>
                    <share-component div-class="mt-3" blog-url="{{ Request::url() }}"></share-component>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">
                        {{-- <div class="search">
                            <input type="text" class="form-control">
                            <button class="btn btn-primary search_btn"><i style="top: 18px;"
                                    class="fa fa-search"></i></button>
                        </div> --}}

                        <div class="sidebar-item categories mt-4">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="mt-3">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category.blogs', $category->id) }}">{{ $category->name }} <span>({{ $category->blogs_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- End sidebar categories-->

                        @if ($recommends->count())
                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Recommended Posts</h3>

                                <div class="mt-3">
                                    @foreach ($recommends as $recommend)
                                        <div class="post-item mt-3">
                                            <img src="{{ $recommend->image }}" alt="">
                                            <div>
                                                <h5><a href="{{ route('blog.show', $recommend->slug) }}">{{ Str::limit($recommend->title, 40) }}</a></h5>
                                                <time class="time">{{ $recommend->created_at->diffForHumans() }}</time>
                                            </div>
                                        </div><!-- End recent post item-->
                                    @endforeach
                                </div>

                            </div><!-- End sidebar recommended posts-->
                        @endif

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Recent Posts</h3>

                            <div class="mt-3">
                                <div class="mt-3">
                                    @foreach ($recents as $recent)
                                        <div class="post-item mt-3">
                                            <img src="{{ $recent->image }}" alt="">
                                            <div>
                                                <h5><a href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 40) }}</a></h5>
                                                <time class="time">{{ $recent->created_at->diffForHumans() }}</time>
                                            </div>
                                        </div><!-- End recent post item-->
                                    @endforeach
                                </div>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End Blog Sidebar -->

                </div>
            </div>
        </div>
    </section><!-- End Blog Details Section -->
@endsection
