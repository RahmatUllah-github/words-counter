@extends('layouts.app')

@section('content')
    <section class="container p-5">
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mb-3">
                <ul class="m-0">
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
        @endif

        <form action="{{ route('contactus') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control pb-2" id="message" cols="30" rows="8" placeholder="Type your message here...">{{ old('message') }}</textarea>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary mt-5 mx-auto submit-btn" value="Send">
            </div>
        </form>
    </section>
@endsection
