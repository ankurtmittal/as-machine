@extends('layouts.app')
@section('title')
    {{__('messages.myClient')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column ">
            @include('flash::message')
            <livewire:review-table/>
        </div>
    </div>
    {{ Form::hidden('currency', getCurrencySymbol(),['id' => 'currency']) }}
@endsection
