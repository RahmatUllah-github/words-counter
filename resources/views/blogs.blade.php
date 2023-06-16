@extends('layouts.master')

@section('content')
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
                <div class="col-xl-4 col-md-6">
                    <article>
                        <div class="post-img">
                            <img src="{{ asset('images/logos/android-chrome-192x192.png') }}" alt="" class="img-fluid">
                        </div>
                        <p class="post-category">Politics</p>
                        <h2 class="title">
                            <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <p class="p_para">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic, neque! Eos ut
                                fugiat ad</p>
                        </div>
                    </article>
                </div>
                <!-- End post list item -->

            </div>
            <!-- End blog posts list -->

            <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
            </div>
            <!-- End blog pagination -->

        </div>
    </section><!-- End Blog Section -->
@endsection
