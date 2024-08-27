@extends('website.layouts.app')
@section('content')
    <div class="container-fluid p-0">
       <!-- slider start -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            {{-- @foreach ($slider as $item) --}}
            <div class="carousel-indicators">
             @foreach ($slider as $item)
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
              @endforeach
            </div>

            <div class="carousel-inner ">
                @foreach ($slider as $item)
              <div class="carousel-item auto_spare_parts {{ $loop->first ? 'active' : '' }} " style="background-image: url({{ asset($item->image) }}) !important">
                <div class=" m-0 p-0">
                    <div class="container  pt-5">
                        <div class="col-md-6 text-center pt-5">
                            <h1 class="animate__animated animate__bounceInLeft">{{ $item->title }}</h1>
                            <h5 class="animate__animated animate__bounceInLeft animate__delay-1s">{{ $item->subtitle }}</h5>
                            <a href="{{ route('get_a_quote') }}" style="text-decoration: none;"><button class=" get_a_quote_btn animate__animated animate__bounceInLeft animate__delay-2s"
                                    type="submit">Get a Quote</button></a>

                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
              </div>
              @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            {{-- @endforeach --}}

        </div>


        <!-- slider end -->

        <!-- second 2 section start -->

        <div class="container-fluid quality_parts">
            <div class="container">
               <div class="row">
                <div class="col-md-4 quality_parts_left pt-5 pb-5">
                    <h5>QUALITY PARTS</h5>
                    <p>
                        We are committed to providing the best quality parts. Many of the parts we offer come from ISO9000 registered manufacturers and are certified to meet or exceed OEM specifications set by CAPA. Whether you are looking for collision replacement parts or that aftermarket bumper or spoiler, we have what you need.
                    </p>
                </div>
                <div class="col-md-8 quality_parts_right pt-5 pb-5">
                    <h5>INNOVATION</h5>
                    <p>
                        In today's fast paced market, we understand the power of technology and innovation and it is our pleasure to announce that Tiger Auto Parts is one of the first Auto parts supplier which offers 100% computerized and online shopping. With our online technology option, our customers can gain access to our inventory, Price list, profile, Approved or Pending Orders, Return parts and much more at anytime anyway. Through our fascinating website our customers also can address our top management to express any concern or complaint.
                    </p>
                </div>
               </div>
            </div>
        </div>

        <!-- second 2 section end -->

        <!-- second section start -->
        <div class="container-fluid bransdd pb-5">
            <div class="container pt-5">
                <div class="row">
                    <h1 class="border-bottom brands_parts pb-2">Brands & parts <div class="btns">
                            <div class="customNextBtn2"><i class="fa-solid fa-angle-right"></i></div>
                            <div class="customPreviousBtn2"><i class="fa-solid fa-angle-left"></i></div>
                        </div>
                    </h1>
                    <ul class="nav nav-pills mb-3 mt-2" id="pills-tab" role="tablist">
                        @foreach($category as $categoryName)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $categoryName->name }}" data-bs-toggle="pill"
                                    data-bs-target={{ "#".$categoryName->name }} type="button" role="tab" aria-controls={{ "#".$categoryName->name }}
                                    aria-selected="true">{{ $categoryName->name??"" }}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($category as $item)
                        <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id={{ $item->name }} role="tabpanel"
                            aria-labelledby="pills-contact-tab21">
                            <div class="home-demo">
                                <div class="row">
                                @foreach ($item->products as $productsItem)
                                <div class="col-lg-2 col-md-3">
                                    <a href="{{ route('products_details', $productsItem->id) }}" style="text-decoration: none;">
                                        <div class="item_owl item_owl_4  py-3" style=" background-color: white; background-size: 100%; border-radius: 10px; position: relative; transition: all 0.5s; height: 150px;">
                                            <img src="{{ asset("uploads/".$productsItem->image->id."/".$productsItem->image->file_name) }}" alt="">
                                            <h5>{{ $productsItem->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- second section end -->

        <!-- thrid section start -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('asstes/images/parts.png') }}" alt="" width="90%" data-aos="fade-right"
                        data-aos-duration="500">
                </div>
                <div class="col-md-6 about_us">
                    <h5>About Us</h5>
                    <h1>Auto spare Parts</h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour.</p>
                    <ul>
                        <li><img src="asstes/images/box_check.png" alt="" width="20px">&nbsp; At vero eos et accusamus
                            et iusto odio.</li>
                        <li><img src="asstes/images/box_check.png" alt="" width="20px">&nbsp; Established fact that a
                            reader will be distracted.</li>
                        <li><img src="asstes/images/box_check.png" alt="" width="20px">&nbsp; Sed ut perspiciatis unde
                            omnis iste natus sit.</li>
                        <li><img src="asstes/images/box_check.png" alt="" width="20px">&nbsp; Established fact that a
                            reader will be distracted.</li>
                        <li><img src="asstes/images/box_check.png" alt="" width="20px">&nbsp; Sed ut perspiciatis unde
                            omnis iste natus sit.</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- thrid section start -->

        <!-- Fourth section start -->
        <div class="container-fluid Special_Product mt-5">
            <div class="container pt-4">
                <h1 class="brands_parts pb-2" style="border-bottom: 1px solid rgb(151, 151, 151);">Special Product
                    <div class="btns">
                        <div class="customNextBtn1"><i class="fa-solid fa-angle-right"></i></div>
                        <div class="customPreviousBtn1"><i class="fa-solid fa-angle-left"></i></div>
                    </div>
                </h1>
                <div class="home-demo mt-5 pb-5">
                    <div class="owl-carousel owl-theme brands_parts_slider">
                        @foreach ($products as $item)
                        {{-- {{ dd() }} --}}
                         <div class="item_owll item_owll_3 px-4 pb-3">
                            <img src="{{ asset("uploads/".$item->image->id."/".$item->image->file_name) }}" alt="">
                            <h5 class="">{{ $item->name }}</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{ route('get_a_quote') }}"><button class="get_a_quote_btn1 mt-2" type="submit">Get a Quote</button></a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('products_details',$item->id) }}"><button class="get_a_quote_btn12  mt-2" type="submit">View Details</button></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- fourth section start -->


        <!-- sixth section start -->
        <div class="container pt-4">
            <h1 class="brands_parts pb-2" style="border-bottom: 1px solid rgb(151, 151, 151);">What Our Clients Say <div
                    class="btns">
                    <div class="customNextBtn4"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="customPreviousBtn4"><i class="fa-solid fa-angle-left"></i></div>
                </div>
            </h1>
            <div class="home-demo mt-5 pb-5">
                <div class="owl-carousel owl-theme brands_parts_slider4">
                    @foreach ($review as $item)
                    <div class="item_owll1 px-4 pb-3 pt-3">
                        <p class="lorem_p">{{ $item->content }}</p>
                        <div class="row mt-2">
                            <div class="col-2">
                                <img src="{{ asset($item->image) }}" alt="" style="width: 50px;">
                            </div>
                            <div class="col-8">
                                <h5 class="john_h5 mt-2">{{ $item->name  }}</h5>
                                <p class="john_p">

                                    @php $rating = $item->rating; @endphp

                                    @foreach(range(1,5) as $i)
                                        <span class="fa-stack" style="width:1em">
                                            <i class="far fa-star fa-stack-1x"></i>

                                            @if($rating >0)
                                                @if($rating >0.5)
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                @else
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                @endif
                                            @endif
                                            @php $rating--; @endphp
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- sixth section end -->


        <!-- seven section start -->

        <div class="container-fluid pt-5 pb-5 ">
            <div class="container pt-4">
                <h1 class="brands_parts pb-2 text-dark" style="border-bottom: 1px solid rgb(151, 151, 151);">Our
                    Clients <div class="btns">
                        <div class="customNextBtn3"><i class="fa-solid fa-angle-right"></i></div>
                        <div class="customPreviousBtn3"><i class="fa-solid fa-angle-left"></i></div>
                    </div>
                </h1>
                <div class="home-demo mt-5 pb-5">
                    <div class="owl-carousel owl-theme brands_parts_slider3" id="owl2">
                        @foreach ($myClient as $item)
                            <div class="item_owll1w px-4 pb-3 pt-3">
                               <a href="{{ $item->url??"" }}" target="_blank"> <img src="{{ asset($item->image) }}" alt=""></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
