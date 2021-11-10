@extends('dashboard.layouts.app')
@section('page_title')  @lang('site.add_product')
@endsection

@section('content')
{{--    {{dd($sizes)}}--}}
    <form class="card col-md-6 col-12" style="margin: auto" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body text-right">



            <div class="form-group">
                <div class="col-md-6 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="new" value="1" id="new" >

                        <label class="form-check-label" for="new">
                                          @lang('site.new')
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-md-6 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="appearance" value="1" id="appearance" {{ old('appearance') ? 'checked' : '' }}>

                        <label class="form-check-label" for="appearance">
                            @lang('site.appear')
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured" {{ old('featured') ? 'checked' : '' }}>

                        <label class="form-check-label" for="featured">
                            @lang('site.featured')
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="basic_category_id">
                    @lang('site.basic_cat')

                </label>

                <select name="basic_category_id"    class="form-control @error('basic_category_id') is-invalid @enderror" id="basic_category_id">
                    <option value="">
                        @lang('site.choose_cat')
                    </option>
                    @foreach($basic_categories as $basic_category)


                        <option value="{{$basic_category->id}}">
                            {{$basic_category->name_ar}}
                        </option>


                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">
                    @lang('site.cat')
                </label>

                <select name="category_id"    class="form-control @error('category_id') is-invalid @enderror" id="category_id" >
                    {{--@foreach($categories as $category)--}}


                        <option value=""></option>


                    {{--@endforeach--}}
                </select>
            </div>


            <div class="form-group">
                <label for="title_ar">
                    @lang('site.title_ar')

                </label>
                <input value="{{ old('title_ar') }}"  type="text" name="title_ar"
                       class="form-control @error('title_ar') is-invalid @enderror" id="title_ar">
            </div>

            <div class="form-group">
                <label for="title_en">

                    @lang('site.title_en')

                </label>
                <input value="{{ old('title_en') }}"  type="text" name="title_en"
                       class="form-control @error('title_en') is-invalid @enderror" id="title_en">
            </div>

            <div class="form-group">
                <label for="name">

                    @lang('site.description_ar')
                </label>
                <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar">{{ old('description_ar') }}</textarea>
            </div>


            <div class="form-group">
                <label for="name">

                    @lang('site.description_en')
                </label>
                <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" id="description_ar">{{ old('description_en') }}</textarea>

            </div>

            <div class="form-group">
                <label for="price">

                    @lang('site.price')


                </label>
                <input value="{{ old('price') }}"  type="text" name="price"
                       class="form-control @error('price') is-invalid @enderror" id="price">
            </div>

            <div class="form-group">
                <label for="photo">

                    @lang('site.img')
                </label>
                <input type="file" name="photo"
                       class="form-control">
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="size_photo">--}}

                    {{--@lang('site.size_img')--}}
                {{--</label>--}}
                {{--<input type="file" name="size_photo"--}}
                       {{--class="form-control">--}}
            {{--</div>--}}


{{--            <div class="form-group">--}}
{{--                <label for="delivery_period">--}}

{{--                    @lang('site.ship_period')--}}

{{--                </label>--}}
{{--                <input value="{{ old('delivery_period') }}"  type="number" name="delivery_period"--}}
{{--                       class="form-control @error('delivery_period') is-invalid @enderror" id="delivery_period">--}}
{{--            </div>--}}


            <ul class="align-content-right" style="list-style-type: none">
                @foreach($sizes as $size)
                <li style="margin: 5px 5px 15px 5px">

                    <div class="form-group">

                        <div class="col-md-6 ">
                            <div class="form-check">

                                <label class="form-check-label" for="name" style="font-weight: bold">
                                    {{$size->name}}
                                </label>
                                <input class="form-check-input" type="checkbox" value="{{$size->id}}"
                                       style="margin-left: 15px"
                                       name="size[]">
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-left"  style="flex-wrap: wrap;margin: 5px">
                        @foreach($heights as $height)

                        <div class="form-check" style="margin: 10px">
                            <input class="form-check-input" type="checkbox" name="{{$size->id}}height[]" id="height" value="{{$height->id}}">
                            <label class="form-check-label" for="height">{{$height->name}}
                            </label>

                            <input type="number"
                                   style="border: 1px solid rgba(0,0,0,0.1) ; border-radius: 10px;padding: 5px;width: 70px" placeholder="الكميه"
                                   name="{{$size->id}}{{$height->id}}quantity" value="" >

                        </div>
                            @endforeach

                    </div>

                </li>
                @endforeach

            </ul>


        </div>

            <button type="submit" class="btn btn-primary">
@lang('site.save')
            </button>

    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        console.log('ss');
        $('#basic_category_id').on('change',function (e) {

            console.log(e);
            var cat_id= e.target.value;


            $.get('/ajax-subcat?cat_id='+cat_id,function (data) {
                $('#category_id').empty();
                $.each(data,function (index,subcatObj) {
                    $('#category_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
                })
            })

        });

        // when page is ready
        $(document).ready(function() {
            // on form submit
            $("#form").on('submit', function() {
                // to each unchecked checkbox
                $(this + 'input[type=checkbox]:not(:checked)').each(function () {
                    // set value 0 and check it
                    $(this).attr('checked', true).val(0);
                });
            })
        })
    </script>


@endsection
