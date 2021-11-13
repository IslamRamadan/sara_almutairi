@extends('layouts.front')
@section('title')
    @lang('site.home')

@endsection
@section('content')
    <?php use App\User; ?>
    {{-- {{ dd(Auth::user()->country->name_ar)}} --}}

    <div class="text-dir new1 " style="">

        <h1 class="c-w">
            
        </h1>
        <p class="c-w ">
            
        </p>

    </div>

    <!-----start carousel --->
    <div id="carouselExampleIndicators" class="carousel slide relative" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <?php
            $i = 0;
            ?>
            @foreach ($sliders as $one)
                <div class="carousel-item  @if ($i == 0) active @endif ">
                    <img class=" w-100 h " src="{{ asset('storage/' . $one->img) }}" alt="1 slide" style="height: 70vh">
                    @if (app()->getLocale() == 'en')
                        <div class="abs w-100">
                            <p class="c-w mr-0">{{ $one->description_en }}</p>
                            <h1 class=""> {{ $one->name_en }}</h1>
                            <button class=" btn btn-danger">@lang('site.shop_now') <i class="far fa-heart"></i></button>
                    </div> @else
                        <div class="abs w-100">
                            <p class="c-w mr-0">{{ $one->description_ar }}</p>
                            <h1 class=""> {{ $one->name_ar }}</h1>
                            <button class=" btn btn-danger">@lang('site.shop_now') <i class="far fa-heart"></i></button>
                        </div>
                    @endif


                </div>
                <?php
                $i++;
                ?>
            @endforeach


        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--- end head --->
    <br>

    <div class="container pad-0 ">

        <br>
        <h2 class="text-center  d-flex justify-content-between">
            <b></b>
            <span>
                @lang('site.basic_categories')
            </span>
            <b></b>
        </h2>
        <br><br>

        <div class="row">

            <div class="col-12 pad-0">
                <ul class="tablinks  row MyServices mr-0 pad-0 text-center"
                    style="list-style-type: none;justify-content: center;flex-wrap:wrap">

                    @if ($system_basic_categories->count() > 0)

                        @foreach ($system_basic_categories as $b)


                            <li class="in active col-md-6 col-6 col-lg-4">
                                <div class=" product relative">
                                    {{-- <div class="  heart "><i class="far fa-heart "></i></div> --}}

                                    <a href="{{ route('category', [1, $b->id]) }}" class="">
                                        <img src="{{ asset('/storage/' . $b->image_url) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('front/img/5.jpg') }}'"
                                            width="100%" class="show-img">
                                        <img src="{{ asset('/storage/' . $b->image_url) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('front/img/5.jpg') }}'"
                                            width="100%" class="hide-img">

                                    </a>
                                    {{-- <p class="mr-0"> --}}
                                    {{--  --}}
                                    {{-- </p> --}}
                                    {{-- <h6>  <a href="{{route('product' ,$b->id)}}">   {{$b->basic_category->name_en}} --}}
                                    {{-- - --}}
                                    {{-- {{$b->category->name_en}}</a></h6> --}}
                                    <h5 style="padding: 10px ;background: black;
        color: white;">
                                        @if (app()->getLocale() == 'en')
                                            {{ $b->name_en }}
                                        @else
                                            {{ $b->name_ar }}
                                        @endif

                                    </h5>
                                </div>
                            </li>


                        @endforeach

                    @endif
                </ul>
            </div>
        </div>
        <br><br>
    </div>


    <div class="container pad-0 ">

        <br>
        <h2 class="text-center  d-flex justify-content-between">
            <b></b>
            <span>@lang('site.fashion_world')

            </span>
            <b></b>
        </h2>
        <br><br>

        <div class="row dir-rtl">

            <div class="col-lg-4 col-md-4 col-sm-12 pad-0 fashion text-dir">
                <br>
                <h1>@lang('site.new_arrival')</h1>

                <p>@lang('site.discover_new') </p>
                <button class="gq gr gs dg ck dh di cn gt c gu gv cq p cr gw gx gy">
                    <div class="text-center">@lang('site.new_in')</div>
                </button>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12   pad-0">
                {{-- <ul class="tablinks  row MyServices mr-0 pad-0 text-center">
                    <li class="in active col-12 col-lg-12">
                        <div class=" product relative">
                            <div class="  heart "><i class="far fa-heart "></i></div>

                            <a href="product.html" class="">
                                <img src="{{ asset('front/img/6.jpg') }}" width="100%" class="show-img">
                                <img src="{{ asset('front/img/5.jpg') }}" width="100%" class="hide-img">

                            </a>
                            <p class="mr-0">hhhhh</p>
                            <h6> <a href="product.html">CH-L1 </a></h6>
                            <h5>30.000 KWD
                            </h5>
                        </div>
                    </li>
                    <li class="col-6 col-lg-4">
                        <div class=" product relative">
                            <div class="  heart "><i class="far fa-heart "></i></div>

                            <a href="product.html" class="">
                                <img src="{{ asset('front/img/3.jpg') }}" width="100%" class="show-img">
                                <img src="{{ asset('front/img/5.jpg') }}" width="100%" class="hide-img">

                            </a>
                            <p class="mr-0">abayat</p>
                            <h6> <a href="product.html">CH-L1 </a></h6>
                            <h5>30.000 KWD
                            </h5>
                        </div>
                    </li>
                    <li class="col-6 col-lg-4">
                        <div class=" product relative">
                            <div class="  heart "><i class="far fa-heart "></i></div>

                            <a href="product.html" class="">
                                <img src="{{ asset('front/img/6.jpg') }}" width="100%" class="show-img">
                                <img src="{{ asset('front/img/4.jpg') }}" width="100%" class="hide-img">

                            </a>
                            <p class="mr-0">abayat</p>
                            <h6> <a href="product.html">CH-L1 </a></h6>
                            <h5>30.000 KWD
                            </h5>
                        </div>
                    </li>
                    <li class="col-6 col-lg-4">
                        <div class=" product relative">
                            <div class="  heart "><i class="far fa-heart "></i></div>

                            <a href="product.html" class="">
                                <img src="{{ asset('front/img/3.jpg') }}" width="100%" class="show-img">
                                <img src="{{ asset('front/img/5.jpg') }}" width="100%" class="hide-img">

                            </a>
                            <p class="mr-0">abayat</p>
                            <h6> <a href="product.html">CH-L1 </a></h6>
                            <h5>30.000 KWD
                            </h5>
                        </div>
                    </li>
                    <li class="col-6 col-lg-4">
                        <div class=" product relative">
                            <div class="  heart "><i class="far fa-heart "></i></div>

                            <a href="product.html" class="">
                                <img src="{{ asset('front/img/6.jpg') }}" width="100%" class="show-img">
                                <img src="{{ asset('front/img/4.jpg') }}" width="100%" class="hide-img">

                            </a>
                            <p class="mr-0">abayat</p>
                            <h6> <a href="product.html">CH-L1 </a></h6>
                            <h5>30.000 KWD
                            </h5>
                        </div>
                    </li>
                    <li class="col-6 col-lg-4">
                        <div class=" product relative">
                            <div class="  heart "><i class="far fa-heart "></i></div>

                            <a href="product.html" class="">
                                <img src="{{ asset('front/img/3.jpg') }}" width="100%" class="show-img">
                                <img src="{{ asset('front/img/5.jpg') }}" width="100%" class="hide-img">

                            </a>
                            <p class="mr-0">abayat</p>
                            <h6> <a href="product.html">CH-L1 </a></h6>
                            <h5>30.000 KWD
                            </h5>
                        </div>

                    </li>
                </ul> --}}
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @for ($i=0;$i<5;$i++)

                        <div class="swiper-slide">
                            <div class=" product relative">
                                <div class="  heart "><i class="far fa-heart "></i></div>
                                <div style="flex-direction: column;display: flex">
                                <div>
                                <a href="product.html" class="">
                                    <img src="{{ asset('front/img/3.jpg') }}" width="100%" class="show-img">
                                    <img src="{{ asset('front/img/5.jpg') }}" width="100%" class="hide-img">

                                </a>
                                </div>

                                <div>
                                <p class="mr-0">abayat</p>
                                <h6> <a href="product.html">CH-L1 </a></h6>
                                <h5>30.000 KWD
                                </h5>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endfor

                    </div>

                    {{-- <div class="swiper-pagination"></div> --}}
                </div>











            </div>

        </div>
        <br><br>
    </div>

    <div class="container dir-rtl" style="max-width: 1000px">

        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <!-- <h2 class="sub-title">#The world talk about fasion</h2> -->
                    <h1>@lang('site.discover_new')</h1>
                    <a href="product.html" class="btn bg-main mt-5">@lang('site.read_more')</a>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="{{asset('front/img/4.jpg')}}" alt="Image" class="img-fluid" data-pagespeed-url-hash="799042288" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </div>
        </div>
    </div>
    <br><br>



    <div class="container dir-rtl" style="max-width: 1000px">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <!-- <h2 class="sub-title">#The world talk about fasion</h2> -->
                    <h1>@lang('site.discover_new')</h1>
                    <a href="product.html" class="btn bg-main mt-5">@lang('site.read_more')</a>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="{{asset('front/img/5.jpg')}}" alt="Image" class="img-fluid" data-pagespeed-url-hash="799042288" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </div>
        </div>
    </div>
    <br><br>



    <div class="container dir-rtl" style="max-width: 1000px">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <!-- <h2 class="sub-title">#The world talk about fasion</h2> -->
                    <h1>@lang('site.discover_new')</h1>
                    <a href="product.html" class="btn bg-main mt-5">@lang('site.read_more')</a>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="{{asset('front/img/6.jpg')}}" alt="Image" class="img-fluid" data-pagespeed-url-hash="799042288" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </div>
        </div>
    </div>



    <br><br>

    <div class="container ">

        <br><br>
        <div class="container1 shadow pad-0 ">
            <div id="carouselExample" class="carousel slide dir-rtl" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExample" data-slide-to="1"></li>
                    <li data-target="#carouselExample" data-slide-to="2"></li>
                    <li data-target="#carouselExample" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item  active">
                        <div class="row">
                            <div class="col-sm-6 pad-0">
                                <a href="product.html"> <img class="w-100" src="{{asset('front/img/11.jpg')}}"></a>

                            </div>
                            <div class="col-sm-6 text-center p-3">

                                <h3 class="text-right"><a href="product.html" class="main-color">@lang('site.week_fasion') </a>
                                </h3>
                                <div class="is-divider"></div>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>

                                <a href="product.html" class="btn bg-main text-center mt-5">@lang('site.read_more')</a><br><br> <br><br>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item  ">
                        <div class="row">
                            <div class="col-sm-6 pad-0">
                                <a href="product.html"> <img class="w-100" src="{{asset('front/img/11.jpg')}}"></a>
                            </div>
                            <div class="col-sm-6 text-center p-3">

                                <h3 class="text-right"><a href="product.html" class="main-color">@lang('site.week_fasion') </a>
                                </h3>
                                <div class="is-divider"></div>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>

                                <a href="product.html" class="btn bg-main text-center mt-5">@lang('site.read_more')</a><br><br> <br><br>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item  ">
                        <div class="row">
                            <div class="col-sm-6 pad-0">
                                <a href="product.html"> <img class="w-100" src="{{asset('front/img/11.jpg')}}"></a>
                            </div>
                            <div class="col-sm-6 text-center p-3">

                                <h3 class="text-right"><a href="product.html" class="main-color">@lang('site.week_fasion') </a>
                                </h3>
                                <div class="is-divider"></div>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>

                                <a href="product.html" class="btn bg-main text-center mt-5">@lang('site.read_more')</a><br><br> <br><br>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item  ">
                        <div class="row">
                            <div class="col-sm-6 pad-0">
                                <a href="product.html"> <img class="w-100" src="{{asset('front/img/11.jpg')}}"></a>
                            </div>
                            <div class="col-sm-6 text-center p-3">

                                <h3 class="text-right"><a href="product.html" class="main-color">@lang('site.week_fasion') </a>
                                </h3>
                                <div class="is-divider"></div>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>
                                <h4 class="text-right">@lang('site.shop_now')</h4>

                                <a href="product.html" class="btn bg-main text-center mt-5">@lang('site.read_more')</a><br><br> <br><br>
                            </div>
                        </div>
                    </div>


                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div> <br><br><br>
    </div>
    <!-----start  --->


















    <script>
        $(document).on('click', '.addToWishList', function(e) {

            e.preventDefault();
            @guest()
                // $('.not-loggedin-modal').css('display','block');
                // console.log('You are guest'

                {{-- {{\RealRashid\SweetAlert\Facades\Alert::error('error', 'Please Login first!')}} --}}
                Swal.fire({
                icon: 'error',
                title: 'Login first!',
                })
            @endguest
            @auth
                $.ajax({
                type: 'get',
                url:"{{ route('wishlist.store') }}",
                data:{
                'productId':$(this).attr('data-product-id'),
                },
                success:function (data) {
                if (data.message){
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Added successfully!',
                showConfirmButton: false,
                timer: 1500
                })
                {{-- {{\RealRashid\SweetAlert\Facades\Alert::error('ok', 'ok!')}} --}}

                }
                else {
                // alert('This product already in you wishlist');
                Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'This product already in you wishlist',
                showConfirmButton: false,
                timer: 1500
                })

                {{-- {{\RealRashid\SweetAlert\Facades\Alert::error('no', 'this product added already!')}} --}}

                }
                }
                });
            @endauth


        });
    </script>
@endsection
