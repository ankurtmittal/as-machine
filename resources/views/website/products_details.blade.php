@extends('website.layouts.app')
@section('content')

    <div class="container-fluid main_heading mt-2 mb-5">
        <div class="row text-center">
            <h1 class="pt-4 main_heading_h5">Categories</h1>
            <p class="main_heading_p pb-4"><a href="{{ route('home') }} " style="text-decoration: none; color:#555555">Home </a> > Categories</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="tab-content" id="myTabContent">

                    @foreach ($product->allImage as $item)
                    <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="{{ $item->name }}" role="tabpanel" aria-labelledby="home-tab">
                        <img src="{{ asset("uploads/".$item->id."/".$item->file_name) }}" alt=""  width="80%">
                    </div>
                    @endforeach
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($product->allImage as $item)
                        <li class="nav-item mt-4 mx-auto navborder" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }} btnwidth" id="home-tab" data-bs-toggle="tab" data-bs-target="{{ "#". $item->name  }}"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                <img src="{{ asset("uploads/".$item->id."/".$item->file_name) }}" alt="" height="100%" width="100%"></button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 pt-5 ">
                <h2>{{ $product->name }}</h2>
                <h4 class="red">${{ $product->unit_price }} <span class="gray">-0%</span> </h4>
                <p>
                    @if(str_word_count($product->description) >= 350)
                        <p> {{ substr($product->description??"",0,600)."  "."!"}}</p>
                      @else
                        <p>{{$product->description??""}}</p>
                      @endif

                    </p>
                <hr/>
                <ul>
                    <li>SKU : {{ $product->code }}</li>
                </ul>
                <a href="{{ route('get_a_quote') }}"><button class="px-4 get">Get a Quote</button> </a>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-z active px-4  btnborder" id="home-tab" data-bs-toggle="tab"
                    data-bs-target="#Description" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-z px-4 btnborder" id="profile-tab" data-bs-toggle="tab" data-bs-target="#ShippingPolicy"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Shipping Policy</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="home-tab">
                <p><?php echo html_entity_decode($product->description )?>  </p>

            </div>
            <div class="tab-pane fade" id="ShippingPolicy" role="tabpanel" aria-labelledby="profile-tab">
                <p>{{ $product->shippingPolicy	  }} </p>
            </div>
        </div>
    </div>


    <div class="container-fluid Special_Product mt-5">
        <div class="container pt-4">
            <h1 class="brands_parts pb-2" style="border-bottom: 1px solid rgb(151, 151, 151);">Related Product
                <div class="btns">
                    <div class="customNextBtn1"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="customPreviousBtn1"><i class="fa-solid fa-angle-left"></i></div>
                </div>
            </h1>
            <div class="home-demo mt-5 pb-5">
                <div class="owl-carousel owl-theme brands_parts_slider">
                    @foreach ($relatedProducts as $item)
                    <div class="item_owll item_owll_2 px-4 pb-3">
                        <img src="{{ asset("uploads/".$item->image->id."/".$item->image->file_name) }}" alt="">
                        <h5 class="">{{ $item->name }}</h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endsection
