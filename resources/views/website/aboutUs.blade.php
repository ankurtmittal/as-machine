@extends('website.layouts.app')
@section('content')

       <div class="container-fluid main_heading mt-2 mb-5">
            <div class="row text-center">
                <h1 class="pt-4 main_heading_h5">About Us</h1>
                <p class="main_heading_p pb-4"><a href="{{ route('home') }} " style="text-decoration: none; color:#555555">Home </a> > About us</p>
            </div>
        </div>

        <!-- thrid section start -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('asstes/images/Rectangled39.png') }}" alt="" width="90%" data-aos="fade-right"
                        data-aos-duration="500">
                </div>
                <div class="col-md-6 about_us">
                    <h5>About Us</h5>
                    <h1>Who We Are</h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour.</p>
                    <ul>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; At vero eos et accusamus
                            et iusto odio.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Established fact that a
                            reader will be distracted.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Sed ut perspiciatis unde
                            omnis iste natus sit.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Established fact that a
                            reader will be distracted.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Sed ut perspiciatis unde
                            omnis iste natus sit.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row pt-5">

                <div class="col-md-6 about_us">
                    <h5>What can Tiger Auto Parts do for you? </h5>
                    <h1>Excellent service:</h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour.</p>

                    <ul>
                      <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; At vero eos et accusamus
                            et iusto odio.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Established fact that a
                            reader will be distracted.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Sed ut perspiciatis undeomnis iste natus sit.</li>
                   <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Established fact that a
                            reader will be distracted.</li>
                        <li><img src="{{ asset('asstes/images/box_check.png') }}" alt="" width="20px">&nbsp; Sed ut perspiciatis unde
                            omnis iste natus sit.</li>
                            
                    </ul>
  </div>
                <div class="col-md-6">
                    <img src="{{ asset('asstes/images/Rectangle44.png') }}" alt="" width="90%" data-aos="fade-right"
                        data-aos-duration="500">
                </div>
            </div>
        </div>
        <br/>

    @endsection
