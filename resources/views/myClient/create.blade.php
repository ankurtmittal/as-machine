@extends('layouts.app')
@section('title')
    {{__('messages.slider.add_slider')}}
@endsection
@section('header_toolbar')
@endsection
@section('content')
    @php $styleCss = 'style'; @endphp
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('myClients.index') }}">{{ __('messages.common.back') }}</a>
                </div>

                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['route' => 'myClients.store','files' => 'true']) }}
                        @include('myClient.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::hidden('default_image_url', asset('images/default-product.jpg') ,['id' => 'defaultImageUrl']) }}
@endsection
