@extends('dashboard.layouts.app')
@section('page_title')  Edit Product  : @lang('site.edit_prod'){{$product->title_ar}} @endsection

@section('style')
<style>
    .input{
        border: 5px solid black;
    }
</style>

@endsection
@section('content')
{{--    {{dd(count($height_products_array[0]))}}--}}
    <form class="card col-md-12 col-12" style="margin: auto"
          action="{{route('products.update.product',$product->id)}}"
          method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body text-right">

            <div class="d-flex justify-content-center">

            <div class="form-group">
                <div class="col-md-12 d-flex justify-content-center ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="new" value="1" id="new"
                            @if($product->new == 1 )  {{ "checked" }} @endif
                            >

                        <label class="form-check-label" for="new">
                            @lang('site.new_arrival')
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-md-12 d-flex justify-content-center ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="appearance" value="1" id="appearance"
                        @if($product->appearance == 1 )  {{ "checked" }} @endif

                        >

                        <label class="form-check-label" for="appearance">
                            @lang('site.appear')
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-md-12 d-flex justify-content-center ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="best_selling" value="1" id="best_selling"
                        @if($product->best_selling == 1 )  {{ "checked" }} @endif

                        >

                        <label class="form-check-label" for="best_selling">
                            @lang('site.best_selling')
                        </label>
                    </div>
                </div>
            </div>
            </div>



            <div class="d-flex flex-wrap">

            <div class="form-group col-6">
                <label for="basic_category_id">
                    @lang('site.basic_cat')
                </label>

                <select name="basic_category_id"    class="form-control @error('basic_category_id') is-invalid @enderror" id="basic_category_id">
                    <option value="">
                        @lang('site.choose_cat')
                    </option>
                    @foreach($basic_categories as $basic_category)


                        <option value="{{$basic_category->id}}"
                        @if($basic_category->id == $product->basic_category_id )  {{ "selected" }} @endif
                        >
                        {{$basic_category->name_en}} &nbsp; - &nbsp; {{$basic_category->name_ar}}
                        </option>


                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label for="category_id">
                    @lang('site.cat')
                </label>

                <select name="category_id"    class="form-control @error('category_id') is-invalid @enderror" id="category_id" >
                    @foreach($categories as $category)


                        <option value="{{$category->id}}"
                        @if($category->id == $product->category_id )  {{ "selected" }} @endif
                        >
                            {{$category->name_en}} &nbsp; - &nbsp; {{$category->name_ar}}
                        </option>


                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label for="title_ar">

                    @lang('site.title_ar')

                </label>
                <input value="{{$product->title_ar}}"  type="text" name="title_ar"
                       class="form-control @error('title_ar') is-invalid @enderror" id="title_ar">
            </div>

            <div class="form-group col-6">
                <label for="title_en">

                    @lang('site.title_en')

                </label>
                <input value="{{ $product->title_en }}"  type="text" name="title_en"
                       class="form-control @error('title_en') is-invalid @enderror" id="title_en">
            </div>

            <div class="form-group col-12">
                <label for="description_ar">

                    @lang('site.description_ar')
                </label>
                <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar">{{$product->description_ar}}</textarea>
            </div>

            <div class="form-group col-12">
                <label for="name">

                    @lang('site.description_en')
                </label>
                <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" id="description_ar">{{$product->description_ar}}</textarea>

            </div>

            <div class="form-group col-6">
                <label for="price">

                    @lang('site.price')

                </label>
                <input value="{{$product->price}}"  type="text" name="price"
                       class="form-control @error('price') is-invalid @enderror" id="price">
            </div>

            <div class="form-group col-6">
                <label for="photo">

                    @lang('site.img')
                </label>
                <input type="file" name="photo"
                       class="form-control">
            </div>
            </div>





            <ul class="align-content-right" style="list-style-type: none;">
                @foreach($sizes as $size)
                    <li style="margin-bottom: 15px">

                        <div class="form-group">

                            <div class="col-md-6 ">
                                <div class="form-check">

                                    <label class="form-check-label" for="name" style="font-weight: bold;">
                                        {{$size->name}}
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="{{$size->id}}"
                                           style="margin-left: 15px"
                                           name="size[]"
                                    @foreach($size_products as $size_product)
                                    @if($size_product == $size->id )  {{ "checked" }} @endif
                                    @endforeach
                                    >
                                </div>
                            </div>
                        </div>


                        <div class="d-flex justify-content-left" style="flex-wrap: wrap;margin: 5px">
                            @foreach($heights as $height)

                                <div class="form-check" style="margin: 5px">
                                    <input class="form-check-input" type="checkbox" name="{{$size->id}}height[]" id="height" value="{{$height->id}}"
                                    @for($i =0;$i<count($height_products_array );$i++)
                                        @for($j=0;$j<count($height_products_array[$i]);$j++)
{{--                                    {{dd($height_product->size_id)}}--}}
                                        @if($height_products_array[$i][$j]->size_id == $size->id &&$height_products_array[$i][$j]->height_id == $height->id)  {{ "checked" }} @endif
                                        @endfor
                                            @endfor

                                    >
                                    <label class="form-check-label" for="height">{{$height->name}}
                                    </label>


                                    <input type="number"
                                           style="border: 1px solid grey ; border-radius: 10px;padding: 5px;width: 70px" placeholder="الكميه"
                                           name="{{$size->id}}-{{$height->id}}-quantity"
                            <?php for($i =0;$i<count($height_products_array );$i++){
                            for($j=0;$j<count($height_products_array[$i]);$j++){
                                if (($height_products_array[$i][$j]->size_id == $size->id ) && ($height_products_array[$i][$j]->height_id == $height->id)){
                                ?>
                            value="{{trim($height_products_array[$i][$j]->quantity)}}"
                                                       <?php     }}}
                            ?> >
</div>
@endforeach

</div>

</li>
@endforeach

</ul>





<input type="hidden" value="{{$product->id}}" name="id">




</div>

<button type="submit" class="btn btn-primary col-6 m-auto mb-5">
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
$('#category_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_en+' - '+subcatObj.name_ar+'</option>');
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
