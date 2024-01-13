@extends('layouts.master')

@section('meta')
    <meta name="keywords" content="{{ $setting->blogs_page_meta_keywords ?? '' }}" />
    <meta name="description" content="{{ $setting->blogs_page_meta_description ?? '' }}" />
    <meta property="og:title" content="{{ $setting->blogs_page_title ?? '' }}" />
    <meta property="og:description" content="{{ $setting->blogs_page_meta_description }}" />
    <meta property="og:url" content="{{ config('app.url') }}blogs" />
    <meta property="og:image" content="{{ asset('images/logos/thewordscounter-logo.png') }}" />

    <link rel="canonical" href="{{ config('app.url') }}blogs" />
    <link rel="alternate" href="{{ config('app.url') }}blogs" hreflang="en" />

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
                    <form action="{{ route('blogs.search') }}" method="POST" class="search">
                        @csrf
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" name="search" value="{{ $search }}"
                            placeholder="Search Blog">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
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
                            <div class="d-flex justify-content-between">
                                <p class="post-category">{{ $blog->category->name }}</p>
                                <div class="d-flex">
                                    <a type="button" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $blog->id }}">
                                        <i class="fas fa-share" style="color: #c9c9c9;"></i>
                                    </a>
                                </div>
                            </div>
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

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $blog->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header share-modal">
                                    <h5 class="modal-title" id="exampleModalLabel">Share Blog</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <share-component div-class="justify-content-center" blog-url="{{ config('app.url').'blog/'.$blog->slug }}"></share-component>
                                </div>
                            </div>
                        </div>
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
