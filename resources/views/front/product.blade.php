@extends('layouts.front')
@section('title')
    @lang('site.home')

@endsection
@section('content')
    <!-----start  --->
    <br><br>
    <div class="container">
        <div class="row dir-rtl">
            <div class="col-md-6 product pad-0">
                {{--<div class="  heart ">--}}
                {{--<i class="far fa-heart "></i></div>--}}

                {{--<div class="   ">--}}
                <a href="#"  class="heart addToWishList text-white" data-product-id="{{$product->id}}">
                    <i class="far fa-heart "></i>
                </a>
                {{--</div><!---->--}}


                <div id="carouselExampleIndicators" class="carousel slide carousel1 " data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="  zoom "><a href=""  data-toggle="modal" data-target="#zoom"><i class="fas fa-expand-alt"></i></a></div>

                            <img src="{{asset('/storage/'.$product->img)}}" class="d-block w-100 h-img" alt="..." data-toggle="modal" data-target="#staticBackdrop">
                        </div>
                        {{--<div class="carousel-item">--}}
                        {{--<img src="{{asset('/storage/'.$product->height_img)}}" class="d-block w-100 h-img" alt="..." data-toggle="modal" data-target="#staticBackdrop">--}}
                        {{--<div class="  zoom "><a href=""  data-toggle="modal" data-target="#zoom2"><i class="fas fa-expand-alt"></i></a></div>--}}

                        {{--</div>--}}

                        @if($product->images->count() > 0)
                            @foreach($product->images as $img)
                                <div class="carousel-item">
                                    <img src="{{asset($img->img)}}" class="d-block w-100 h-img" alt="..." data-toggle="modal" data-target="#staticBackdrop">
                                    <div class="  zoom "><a href=""  data-toggle="modal" data-target="#zoom3"><i class="fas fa-expand-alt"></i></a></div>

                                </div>


                            @endforeach
                        @endif


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"  style="bottom: 25%!important">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">@lang('site.previous')</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="bottom: 25%!important">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">@lang('site.next')</span>
                    </a>
                </div>

                <ol class=" position-relative navbar" style="width:100%;margin-top:10px;z-index: 10;list-style: none;justify-content:center">
                    <br>



                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="">
                        <img src=" {{asset('/storage/'.$product->img)}}"  class="img">
                    </li><br>
                    {{--<li data-target="#carouselExampleIndicators" data-slide-to="1" class="">--}}
                    {{--<img src=" {{asset('/storage/'.$product->height_img)}}"  class="img">--}}
                    {{--</li><br>--}}
                    @if($product->images->count() > 0)
                        @foreach($product->images as $img)

                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index +2}}" class="">
                                <img src="{{asset($img->img)}}"  class="img">
                            </li><br>

                        @endforeach
                    @endif
                </ol>

            </div>

            <div class="col-sm-5 ml-auto product-dir">
                {{--<nav class="navbar navbar-expand pad-0 " >--}}
                    {{--<ul class="navbar-nav">--}}
                        {{--<li class="nav-item "><a class="nav-link "style="margin-left: -7px" href="{{route('/')}}">HOME  /</a></li>--}}
                        {{--<li class="nav-item "><a class="nav-link " href="{{route('category' , [1 , $product->basic_category->id])}}">--}}
                                {{--@if(Lang::locale()=='ar')--}}
                                    {{--{{ $product->basic_category->name_ar}}  /--}}

                                {{--@else--}}
                                    {{--{{ $product->basic_category->name_en}}  /--}}


                                {{--@endif--}}

                            {{--</a></li>--}}
                        {{--<li class="nav-item "><a class="nav-link " href="{{route('category' , [2 , $product->category->id])}}">--}}

                                {{--@if(Lang::locale()=='ar')--}}
                                    {{--{{ $product->category->name_ar}}--}}

                                {{--@else--}}
                                    {{--{{ $product->category->name_en}}--}}


                                {{--@endif--}}

                            {{--</a></li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
                <h2 class="text-dir"><a href="" class="cursor-no">

                        @if(Lang::locale()=='ar')
                            {{ $product->basic_category->name_ar}}
                            -
                            {{ $product->category->name_ar}}
                        @else
                            {{ $product->basic_category->name_en}}
                            -
                            {{ $product->category->name_en}}

                        @endif

                    </a></h2>
                {{--<div class="is-divider"></div>--}}
                <br>
                <h6 class="text-dir  h6-product">
                    @if(Lang::locale()=='ar')
                    {{$product->title_ar}}
                @else
                {{$product->title_en}}

                @endif


                </h6>
                <br>
                <h6 class="text-dir" style="font-size: 17px">
                    @if (Lang::locale()=='ar')
                    {{$product->description_ar}}
                    @else
                    {{$product->description_en}}
                    @endif

                </h6>
                {{--<div class="is-divider"></div>--}}
                <br>
                {{--<a href="{{asset('front/img/size.jpeg')}}"> <img src="{{asset('front/img/size.jpeg')}}"--}}
                {{--onerror="this.onerror=null;this.src='{{asset('front/img/5.jpg')}}'"--}}
                {{--class="w-100">  </a>--}}
                <h6 class="text-dir h6-product">

                    @guest()
                        @if(Cookie::get('name') )
                            {{number_format($product->price / App\Country::find(Cookie::get('name'))->currency->rate,2)}}
                            {{App\Country::find(Cookie::get('name'))->currency->code}}

                        @else
                            {{$product->price}}
                            @lang('site.kwd')
                        @endif

                        @else
                            {{Auth::user()->getPrice($product->price)}}
                            {{ Auth::user()->country->currency->code}}
                            @endguest
                </h6>

                <br>
                <div id="colors">
                    <div id="s" class="color-blocks" style="">
                        <span>@lang('site.size') :</span>

                        @if($product->product_sizes->count() > 0)
                        <div class="d-flex rtl-margin">
                            @foreach($product->product_sizes as $size)

                                <div class="radio-inline color">
                                    <input type="radio" name="size" value="{{$size->id}}"  id="size-{{$size->id}}">
                                    <label for="size-{{$size->id}}" >{{$size->size->name}}</label>
                                </div>


                            @endforeach
                        </div>
                        @else
                            المنتج غير متوفر
                        @endif
                    </div></div>
                <br>
                <br>



                <div id="heights">

                </div>

                {{-- <br>
                <h6 style="font-weight:600 " class="textarea-dir" >@lang('site.note')</h6>

                <textarea  class="w-100  " rows="5"></textarea> --}}
                <br><br>
                <form class=" product-count float-right d-none">
                    <a rel="nofollow" class="btn btn-default btn-minus" href="#" title="Subtract">&ndash;</a>
                    <input type="text" disabled="" size="2" autocomplete="off"
                           class="cart_quantity_input form-control grey count" value="1" name="quantity">
                    <a rel="nofollow" class="btn btn-default btn-plus" href="#" title="Add" style="margin: -9px;">+</a>
                </form>

                <a id="add_cart" class="btn bg-main " style="width: 100%;background: #000000 !important;">@lang('site.add_to_cart')</a>
                <a id="add_cart" class="btn bg-main addToWishList" data-product-id="{{$product->id}}" style="margin:10px 0px;width: 100%;background: #ec7d23 !important;">@lang('site.add_to_wishlist')</a>


            </div>
        </div>

    </div>
    <!--- end  ---><br>
    <div class="container ">
        {{--<hr>--}}
        {{--@if($product->product_hights->count() > 0)--}}
            {{--<div class="row">--}}
                {{--<h5 class="col-md-2">@lang('site.height')</h5>--}}
                {{--<p class="col-md-10">--}}
                    {{--@foreach($product->product_hights as $height)--}}
                        {{--@if($height->quantity > 0)--}}
                            {{--{{$height->height->name}},--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<hr>--}}
        {{--@endif--}}
        {{--@if($product->product_sizes->count() > 0)--}}
            {{--<div class="row">--}}
                {{--<h5 class="col-md-2 " >@lang('site.size')</h5>--}}
                {{--<p class="col-md-10">--}}
                    {{--@foreach($product->product_sizes as $height)--}}
                        {{--{{$height->size->name}},--}}
                    {{--@endforeach--}}

                {{--</p>--}}
            {{--</div>--}}

        {{--@endif--}}

        {{--<hr>--}}
        <h3 class="text-center ">@lang('site.related_products')
        </h3>
        <br>

        <div class="row text-dir">

            <div class="col-12">
                <ul class="tablinks  row MyServices mr-0 pad-0 text-center justify-content-center">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                    @if(\App\BasicCategory::find($product->basic_category_id)->products->count() > 0)
                        @foreach(\App\BasicCategory::find($product->basic_category_id)->products as $p)
                            @if($p->id != $product->id)
                            <div class="swiper-slide" data-swiper-autoplay="2000">
                                <div class=" product relative">
                                    <div class="  heart ">
                                        <a href="#" class="addToWishList text-white" data-product-id="{{$p->id}}">
                                            <i class="far fa-heart "></i>
                                        </a>

                                    </div>
                                    <div style="flex-direction: column;display: flex">
                                    <div >
                                        <a href="{{route('product',$p->id)}}" class="test">

                                            <img src="{{ asset(  '/storage/'.$p->img)}}"
                                                 onerror="this.onerror=null;this.src='{{asset('front/img//3.jpg')}}'"
                                                 width="100%" class="show-img">
                                           @if( $img= App\ProdImg::where('product_id',$p->id)->first() )
                                                <img src="{{asset($img->img)}}"
                                                     width="100%" class="hide-img">
                                            @else
                                                <img src="{{asset('/storage/'.$p->img)}}"
                                                     width="100%" class="hide-img">
                                            @endif
                                        </a>
                                    </div>

                                    <div class="text-dir">
                                        <p class="mr-0">
                                            <a href="{{route('product' , $p->id)}}">
                                                @if(Lang::locale()=='ar')
                                                    {{$p->title_ar}}

                                                @else

                                                    {{$p->title_en}}

                                                @endif


                                            </a>
                                        </p>
                                        <h6><a href="{{route('product' ,$p->id)}}">


                                            @if(Lang::locale()=='ar')
                                                {{-- {{$p->basic_category->name_ar}}
                                                -
                                                {{$p->category->name_ar}} --}}
                                                <?php $pieces = explode(" ", $p->description_ar);
                                                  $first_part = implode(" ", array_splice($pieces, 0, 4));  ?>
                                        {{$first_part}}
                                            @else

                                                {{-- {{$p->basic_category->name_en}}
                                                -
                                                {{$p->category->name_en}} --}}
                                                <?php $pieces = explode(" ", $p->description_en);
                                                  $first_part = implode(" ", array_splice($pieces, 0, 4));  ?>
                                        {{$first_part}}
                                            @endif


                                        </a></h6>
                                        <h5>


                                            @auth()
                                                {{Auth::user()->getPrice($p->price )}} {{ Auth::user()->country->currency->code}}
                                            @endauth
                                            @guest()
                                                @if(Cookie::get('name') )
                                                    {{number_format($p->price / App\Country::find(Cookie::get('name'))->currency->rate,2) }}
                                                    {{App\Country::find(Cookie::get('name'))->currency->code}}
                                                @else
                                                    {{$p->price}}
                                                    @lang('site.kwd')
                                                @endif
                                            @endguest

                                        </h5>
                                    </h5>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                </div>
                    @else
                        لا يوجد
                    @endif

                </ul>
            </div>
        </div>
        <br><br>
    </div>


    <!--- end  --->

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#heights').hide();
            let sizeVal;

            $('input[name="size"]').on('click' , function () {

                $('#heights').hide();
                // console.log($(this).val())
                //TODO :: ON CLICK IF CHECKED VIEW THE HEIGHTS ELSE MAKE CONTAINER HIDDEN

                if($('input[name=size]').is(':checked')) {
                    var card_type = $("input[name=size]:checked").val();
                    sizeVal = card_type;
                    getHeights(sizeVal);
                }
            });
            //TODO :: GET #S ->CONTENT
            $('#add_cart').on('click' , function () {


                //GET PRODUCT ID
                //GET QUANTITY
                //GET SIZE ID
                //GET HEIGHT ID


                let size =0 ;
                let height = 0;
                let product = '{{$product->id}}';
                let quantity  = $("input[name=quantity]").val();;

                //TODO :: IF NOT SELECTED HEIGHT OR SIZE ASK TO CHOOSE

                if($('input[name=size]').is(':checked')) {
                    size = $("input[name=size]:checked").val();
                }

                if($('input[name=height]').is(':checked')) {
                    height = $("input[name=height]:checked").val();
                }

                if((size == 0) || (height == 0)){
                    Swal.fire({
                        icon: 'error',
                        title: 'يرجي إختيار الحجم والمقاس ',
                    })
                } else {
                    addToCart(product , quantity , height , size);
                }

            });

            function addToCart( productId, quantity, heightId ,sizeId){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('add.to.cart') }}",
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        quantity:quantity,
                        product_id:productId,
                        product_size_id:sizeId,
                        product_height_id:heightId,
                    },
                    success: function(result){
                        //CHECK SIZE VALUES
                        //CHECK HEIGHTS VALUE
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'تمت الإضافه الي السله',
                            animation: false,
                            position: 'bottom',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    });
                        // console.log(result);

                        location.reload();


                    },
                    error:function (error) {


                        // console.log(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'لم تكتمل العمليه ',
                        })
                    }
                });
            }
            function getHeights(sizeId){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('get.heights') }}",
                    method: 'get',
                    data: {
                        size_id: sizeId
                    },
                    success: function(result){
                        //CHECK SIZE VALUES
                        //CHECK HEIGHTS VALUE
                        // console.log(result);
                        $('#heights').html(result);
                        $('#heights').show();
                    }});
            }
            //TODO :: WHEN CHOOSE SIZE SHOW HEIGHT
            //TODO :: REFRESH CHECKOUT CART
            //TODO :: ADD & REMOVE FROM CART
        })

        $(document).on('click','.addToWishList',function (e) {

            e.preventDefault();
            @guest()
            //                    $('.not-loggedin-modal').css('display','block');
            //                    console.log('You are guest'

            {{--            {{\RealRashid\SweetAlert\Facades\Alert::error('error', 'Please Login first!')}}--}}
            Swal.fire({
                icon: 'error',
                title:'Login first!',
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
