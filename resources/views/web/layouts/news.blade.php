@extends('web.master.master')
@section('content')

<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>News</h2>
                            <p> <a href="/">Home</a> <span>-</span>News</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--::industries start::-->
    <section class="our_industries padding_top">
        <div class="container">
            <div class="row">
                @foreach ($datas as $data)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_industries">
                        <img src="{{ url('assets/images/news/' .  $data->image) }}" alt="">
                        <h3> <a href="#">{{ $data->name }}</a></h3>
                        <p>{{ $data->desc }}</p>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-4 col-sm-6">
                    <div class="single_industries">
                        <img src="img/gal2.jpeg" alt="">
                        <h3> <a href="#">Pelatihan Dasar Hukum</a></h3>
                        <p>Set sea kind own creeping a subdue creature signs lights reserved down said joker maid </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_industries">
                        <img src="img/gal1.jpeg" alt="">
                        <h3><a href="#">Pelatihan Dasar Hukum</a></h3>
                        <p>Set sea kind own creeping a subdue creature signs lights reserved down said joker maid </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_industries">
                        <img src="img/gal2.jpeg" alt="">
                        <h3><a href="#">Pelatihan Dasar Hukum</a></h3>
                        <p>Set sea kind own creeping a subdue creature signs lights reserved down said joker maid </p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--::industries end::-->

@endsection