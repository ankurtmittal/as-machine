@extends('website.layouts.app')
@section('content')

<div class="container-fluid animate__animated animate__fadeInRight">
    <div class="container-fluid main_heading mt-2 mb-5">
        <div class="row text-center">
            <h1 class="pt-4 main_heading_h5">Categories</h1>
            <p class="main_heading_p pb-4"><a href="{{ route('home') }} " style="text-decoration: none; color:#555555">Home  </a>> Categories</p>
        </div>
    </div>
    <div class="container-fluid p-0">

        <!-- second section start -->
        <div class="container-fluid  pb-5">
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
                                    <a href="{{ route('products_details',$productsItem->id) }}" style="text-decoration: none;">
                                        <div class="item_owl py-3" style=" background-color: #F2F2F7; background-size: 100%; border-radius: 10px; position: relative; transition: all 0.5s; height: 150px;">
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
    </div>
</div>

@endsection
