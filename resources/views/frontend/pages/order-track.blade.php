@extends('frontend.layouts.master')

@php
    $title=Helper::settings()->title;
@endphp
@section('title',$title .  ' || تتبع الشحنة' )

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">الرئيسية<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">تتبع طلبيتك</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>تتبع طلبيتك  بوضع رقم الطلبية .</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="Enter your order number">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">تتبع الطلبية</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
