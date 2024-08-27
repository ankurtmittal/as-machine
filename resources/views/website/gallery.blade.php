@extends('website.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
<div class="container">
    <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
        @foreach ($images as $item)
            <div class="col-12 col-md-6 col-lg-3">
                <img src="{{ asset( $item->image ) }}" data-target="#indicators" data-slide-to="{{ $item->id }}" alt="" />
            </div>
        @endforeach
   </div>
    <!-- Modal -->
    <div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close text-right p-2" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <div id="indicators" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        @foreach ($images as $item)
            <li data-target="#indicators" data-slide-to="{{ $item->id }}" class="active"></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach ($images as $item)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img class="modal_images" src="{{ asset($item->image) }}" alt="First slide">
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

        </div>
      </div>
    </div>

@endsection
