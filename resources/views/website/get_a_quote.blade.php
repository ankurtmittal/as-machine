@extends('website.layouts.app')
@section('content')

    <div class="container-fluid main_heading mt-2 mb-5">
        <div class="row text-center">
            <h1 class="pt-4 main_heading_h5">Get a Quote</h1>
            <p class="main_heading_p pb-4"><a href="{{ route('home') }} " style="text-decoration: none; color:#555555">Home  </a>> Get a Quote</p>
        </div>
    </div>

    <div class="container">
        <div class="row pt-2">
            <div class="col-lg-12 col-md-6 col-sm-12">
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
                <form method="Post" action="{{ route('getAQuoteSave') }}">
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
                        <textarea placeholder="Message..." name="message" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="px-5 my-4 get">Submit</button>
                </form>
            </div>
          
        </div>

@endsection