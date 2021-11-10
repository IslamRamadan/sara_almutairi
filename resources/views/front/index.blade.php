@extends('layouts.front')
@section('title')
    @lang('site.home')

@endsection
@section('content')
    <?php use App\User;?>
{{--    {{ dd(Auth::user()->country->name_ar)}}--}}
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
            @foreach($sliders as $one)
                <div class="carousel-item  @if($i==0) active @endif ">
                    <img class=" w-100 h " src="{{asset('storage/'.$one->img)}}" alt="1 slide" style="height: 70vh">
                    @if(app()->getLocale() == 'en')
                        <div class="abs w-100">
                            <p class="c-w mr-0">{{$one->description_en}}</p>
                            <h1 class="">  {{$one->name_en}}</h1>
                            <button class=" btn btn-danger">@lang('site.shop_now') <i class="far fa-heart"></i></button>
                        </div>                    @else
                        <div class="abs w-100">
                            <p class="c-w mr-0">{{$one->description_ar}}</p>
                            <h1 class="">  {{$one->name_ar}}</h1>
                            <button class=" btn btn-danger">@lang('site.shop_now') <i class="far fa-heart"></i></button>
                        </div>                    @endif


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
    <div class="container-fluid pad-0 ">
        <img src="{{asset('front/img/bg.png')}}" class="w-100">
    </div>

    <div class="container pad-0 ">

        <br>
        <h2 class="text-center  d-flex justify-content-between">
            <b></b>
            <span style="font-size: 20px">
                @lang('site.basic_categories')
            </span>
            <b></b>
        </h2>
        <br><br>

        <div class="row">

            <div class="col-12 pad-0">
                <ul class="tablinks  row MyServices mr-0 pad-0 text-center" style="list-style-type: none;justify-content: center;flex-wrap:wrap">

                    @if($system_basic_categories->count()  > 0)

                        @foreach($system_basic_categories as $b)


                            <li class="in active col-md-6 col-6 col-lg-4">
                                <div class=" product relative">
                                    {{--                                    <div class="  heart "><i class="far fa-heart "></i></div>--}}

                                    <a href="{{route('category' ,[1, $b->id])}}" class="">
                                        <img src="{{asset('/storage/'.$b->image_url)}}"
                                             onerror="this.onerror=null;this.src='{{asset('front/img/5.jpg')}}'"
                                             width="100%"  class="show-img">
                                        <img
                                            src="{{asset('/storage/'.$b->image_url)}}"
                                            onerror="this.onerror=null;this.src='{{asset('front/img/5.jpg')}}'"
                                            width="100%" class="hide-img">

                                    </a>
                                    {{--                                    <p class="mr-0">--}}
                                    {{--                                    --}}
                                    {{--                                    </p>--}}
                                    {{--                                    <h6>  <a href="{{route('product' ,$b->id)}}">   {{$b->basic_category->name_en}}--}}
                                    {{--                                            ---}}
                                    {{--                                            {{$b->category->name_en}}</a></h6>--}}
                                    <h5 style="padding: 10px ;background: black;
    color: white;">
                                        @if(app()->getLocale() == 'en')
                                            {{$b->name_en}}
                                        @else
                                            {{$b->name_ar}}
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
            <span style="font-size: 20px">@lang('site.best_prod')</span>
            <b></b>
        </h2>
        <br><br>

        <div class="row">

            <div class="col-12 pad-0">
                <ul class="tablinks  row MyServices mr-0 pad-0 text-center" style="list-style-type: none">

                    @if($best_selling->count()  > 0)

                        @foreach($best_selling as $b)


                            <li class="in active  col-md-6 col-6 col-lg-4">
                                <div class=" product relative">
                                    <a href="#"  class="heart addToWishList text-dark" data-product-id="{{$b->id}}">
                                        <i class="far fa-heart "></i>
                                    </a>
                                    <a href="{{route('product' , $b->product->id)}}" class="">
                                        <img src="{{asset('/storage/'.$b->product->img)}}"
                                             onerror="this.onerror=null;this.src='{{asset('front/img/5.jpg')}}'"
                                             width="100%" class="show-img">

                                        @if( $img= App\ProdImg::where('product_id',$b->product->id)->first() )
                                            <img src="{{asset($img->img)}}"
                                            width="100%" class="hide-img">
                                            @else
                                            <img src="{{asset('/storage/'.$b->product->img)}}"
                                                 width="100%" class="hide-img">
                                            @endif

                                    </a>
                                    <p class="mr-0">
                                        <a href="{{route('product' , $b->product->id)}}">
                                            {{$b->product->title_en}}

                                        </a>
                                    </p>

                                    @if(Lang::locale()=='ar')
                                        <h6><a href="{{route('product' ,$b->product->id)}}">   {{$b->product->basic_category->name_ar}}
                                                -
                                                {{$b->product->category->name_ar}}</a></h6>
                                    @else
                                        <h6><a href="{{route('product' ,$b->product->id)}}">   {{$b->product->basic_category->name_en}}
                                                -
                                                {{$b->product->category->name_en}}</a></h6>

                                    @endif


                                    {{--<h5>   {{$b->price}} KWD--}}
                                    {{--</h5>--}}
                                    @auth()
                                    <h5>   {{Auth::user()->getPrice($b->product->price)}} {{ Auth::user()->country->currency->code}}
                                    </h5>
                                            @endauth

                                            @guest()
                                                @if(Cookie::get('name') )
                                                    {{number_format( $b->product->price/ App\Country::find(Cookie::get('name'))->currency->rate,2)}}
                                                    {{App\Country::find(Cookie::get('name'))->currency->code}}
                                                @else
                                                    {{ $b->product->price}} KWD

                                                @endif
                                            @endguest
                                </div>
                            </li>


                        @endforeach

                    @endif
                </ul>
            </div>
        </div>

    </div>




    <!-----start  --->
    <br><br>
    <div class="container-fluid pad-0 ">
        <img src="{{asset('front/img/bg.png')}}" class="w-100">
    </div>
    <br>
    <div class="container ">
        <h2 class="text-center  d-flex justify-content-between">
            <b></b>
            <span style="font-size: 20px"> @lang('site.new_arrival')</span>
            <b></b></h2>
        <br><br>
        <div class="container1 shadow pad-0 ">
            <div id="carouselExample" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExample" data-slide-to="1"></li>
                    <li data-target="#carouselExample" data-slide-to="2"></li>
                    <li data-target="#carouselExample" data-slide-to="3"></li>
                </ol>
                {{--<div class="carousel-inner">--}}
                {{--@php--}}
                {{--$i = 0;--}}
                {{--@endphp--}}
                {{--@foreach($new_arrive as $one)--}}
                {{--<div class="carousel-item  @if($i==0) active @endif ">--}}
                {{--<div class="col-sm-6 pad-0">--}}
                {{--<a href="product.html">  <img class="w-100" src="{{asset('storage/'.$one->img)}}" ></a>--}}
                {{--<br><br> <br><br>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 ">--}}
                {{--<br><br><br>--}}
                {{--<h3 class="text-right"><a href="product.html" class="main-color">{{$one->title_ar}}}</a>--}}
                {{--</h3>--}}
                {{--<div class="is-divider"></div>--}}
                {{--<h4 class="text-right">{{$one->price}}}</h4>--}}
                {{--<a href="img.html"> <img src="{{asset('storage/'.$one->height_img)}}" class="w-100"></a>--}}
                {{--<a href="product.html" class="btn bg-main float-right">read more</a><br><br>  <br><br>--}}
                {{--</div>--}}


                {{--</div>--}}
                {{--@php--}}
                {{--$i ++;--}}
                {{--@endphp--}}
                {{--@endforeach--}}


                {{--</div>--}}
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    ?>
                    @foreach($new_arrive as $one)
                        <div class="carousel-item @if($i==0) active @endif ">
                            <div class="row">
                                <div class="col-sm-6 pad-0">
                                    <a href="{{route('product' , $one->id)}}">
                                        <img class="w-100" src="{{asset('storage/'.$one->img)}}"
                                             onerror="this.onerror=null;this.src='{{asset('front/img/5.jpg')}}'"
                                        ></a>
                                    <br><br> <br><br>
                                </div>
                                <div class="col-sm-6 ">
                                    <br><br><br>
                                    @if(app()->getLocale() == 'en')
                                        <h3 class="text-right"><a href="{{route('product' , $one->id)}}"
                                                                  class="main-color">
                                                {{$one->title_en}} </a>
                                        </h3>
                                    @else
                                        <h3 class="text-right"><a href="{{route('product' , $one->id)}}"
                                                                  class="main-color">{{$one->title_ar}} </a>
                                        </h3>
                                    @endif

                                    <div class="is-divider"></div>
                                    <h4 class="text-right">

                                        @auth()
                                               {{Auth::user()->getPrice($one->price)}} {{ Auth::user()->country->currency->code}}

                                        @endauth

                                        @guest()
                                            @if(Cookie::get('name') )
                                                {{number_format($one->price/ App\Country::find(Cookie::get('name'))->currency->rate,2)}}
                                                {{App\Country::find(Cookie::get('name'))->currency->code}}
                                            @else
                                                &nbsp;{{$one->price}}KWD

                                            @endif
                                        @endguest
                                    </h4>
                                    {{--<a href="{{asset('front/img/size.jpeg')}}">--}}
                                        {{--<img--}}
                                            {{--src="{{asset('front/img/size.jpeg')}}"--}}
                                            {{--class="w-100"></a>--}}
                                    <a href="{{route('product' , $one->id)}}" class="btn bg-main float-left">read
                                        more</a><br><br> <br><br>
                                </div>

                            </div>
                        </div>
                        <?php
                        $i++;
                        ?>
                    @endforeach

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
        </div>
        <br><br><br>
    </div>
    <!-----start  --->
    <div class="text-center new " style="">
        <h1 class="c-w"> NEWSLETTER
        </h1>
        <p class="c-w">Sign up for newsletter to get updates about new design and new products.</p>

        <a href="{{route('register')}}" class=" btn btn-danger">@lang('site.signup') </a>
    </div>

    <div class="country ">

        <div class="relative">

            <video class="h-100 w-100 " autoplay controls muted>
                <source src="{{asset('front/img/video.mp4')}}" type="video/mp4">
            </video>
            <div class="abs-shop text-center">
                <button class=" btn btn-danger close-country  ">shop now <i class="far fa-heart"></i></button>
            </div>

            <br>
        </div>
    </div>
<script>

    $(document).on('click','.addToWishList',function (e) {

        e.preventDefault();
        @guest()
        //                    $('.not-loggedin-modal').css('display','block');
        //                    console.log('You are guest'

        {{--            {{\RealRashid\SweetAlert\Facades\Alert::error('error', 'Please Login first!')}}--}}
        Swal.fire({
            icon: 'error',
            title: 'Login first!',
        })
        @endguest
        @auth
        $.ajax({
            type: 'get',
            url:"{{route('wishlist.store')}}",
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
                    {{--{{\RealRashid\SweetAlert\Facades\Alert::error('ok', 'ok!')}}--}}

                }
                else {
//                        alert('This product already in you wishlist');
                    Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'This product already in you wishlist',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    {{--                        {{\RealRashid\SweetAlert\Facades\Alert::error('no', 'this product added already!')}}--}}

                }
            }
        });
        @endauth


    });

</script>
@endsection
