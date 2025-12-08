@extends('frontend::layouts.master')

@section('content')
    <x-frontend.gift-section />
    <x-frontend.services-section :services="$services" :categories="$categories" />
    <x-frontend.premium-packages-section :packages="$packages" />
    <x-frontend.discount />
    <x-frontend.learn-about-section />
    <style>
    .ellipse-1092 {
        height: 789px !important;
        left: 0;
        position: absolute;
        top: -242px !important;
        width: 100%;
    }
    </style>
@endsection
