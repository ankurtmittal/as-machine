@extends('website.layouts.app')
@section('content')
    </div>
    <div class="container-fluid animate__animated animate__fadeInRight">
        <div class="container-fluid main_heading mt-2 mb-5">
            <div class="row text-center">
                <h1 class="pt-4 main_heading_h5">Contact us</h1>
                <p class="main_heading_p pb-4"><a href="{{ route('home') }} " style="text-decoration: none; color:#555555">Home  </a>> Contact us</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card pt-5 mb-5">
                        <img class="mx-auto" src="{{ asset('asstes/images/Group 1.png') }}" alt="" height="50px" width="50px">
                        <div class="card-body text-center">
                            <h3>Address</h3>
                            <p>
                                <b>{{ $address->value??"" }}</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card pt-5 mb-5">
                        <img class="mx-auto" src="{{ asset('asstes/images/Group 4.png') }}" alt="" height="50px" width="50px">
                        <div class="card-body text-center">
                            <h3>Email Address</h3>
                            <p>
                                <b>{{ $email->value??"" }}</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card pt-5 mb-5">
                        <img class="mx-auto" src="{{ asset('asstes/images/Group 5.png') }}" alt="" height="50px" width="50px">

                        <div class="card-body text-center">
                            <h3>Phone Number</h3>
                            <p>
                                <b>{{ $phone->value??"" }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pt-2">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endforeach
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="mb-2">Contact Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                    </p>
                    <form method="post" action="{{ route('contactUsSave') }}">
                        @csrf
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-12  formrow mb-5 ps-0">
                                <input type="text" placeholder="Name" name="name" class="input1" required>
                            </div>
                            <div class="col-lg-6  formrow mb-5 pe-0">
                                <input type="email" placeholder="Email" name="email" class="input1" required>
                            </div>
                        </div>
                        <div class="row  formrow">
                            <input type="text" placeholder="Subject" name="subject" class="input1" required>
                        </div>
                        <div class="row mt-5">
                            <textarea placeholder="Message..." name="message" cols="30" rows="10" required></textarea>
                        </div>
                        <button type="submit" class="px-4 my-4 get">Get a Quote</button>
                    </form>
                </div>
               {{-- Google MAP --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d110404.96057660846!2d74.11841587417972!3d30.146983717692073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x3917a79154f86721%3A0x4ce09ae52bb2fd93!2sAbohar%2C%20Punjab!3m2!1d30.146860999999998!2d74.2008185!4m0!5e0!3m2!1sen!2sin!4v1682533879682!5m2!1sen!2sin"
                        width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
@endsection
