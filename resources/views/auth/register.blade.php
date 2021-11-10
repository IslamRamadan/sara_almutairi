
@extends('layouts.front')
@section('title')
    @lang('site.home')

@endsection
@section('content')
    <!-----start  --->
    <div class="container-fluid pad-0 mt-3">
        <h1 class="title text-center">@lang('site.my_account') </h1>
    </div>

    <!-----  ----->
    <div class="container ">
        <br>
        <div class="row dir-rtl">
{{--            <div class="col-md-6">--}}
{{--                <h2> sign in</h2>--}}
{{--                <form method="POST" action="{{ route('login') }}" class="account " style="text-transform: capitalize">--}}
{{--                    @csrf--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('E-Mail Address') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                            @error('email')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Password') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                            @error('password')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div class="form-group row">--}}
{{--                        <div class="col-md-6 offset-md-4">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" name="remember"   id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                <label class="form-check-label" for="remember">--}}
{{--                                    {{ __('Remember Me') }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div class="form-group row mb-0">--}}
{{--                        <div class="col-md-8 offset-md-4">--}}

{{--                            <button type="submit" class="btn btn-dark" style="margin: auto;">--}}
{{--                                {{ __('Login') }}--}}
{{--                            </button>--}}


{{--                            --}}{{--                                @if (Route::has('password.request'))--}}
{{--                            --}}{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                            --}}{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                            --}}{{--                                    </a>--}}
{{--                            --}}{{--                                @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                --}}{{--                <form >--}}
{{--                --}}{{--                    <div class="form-group">--}}
{{--                --}}{{--                        <label for="exampleInputEmail1">user name or email *</label>--}}
{{--                --}}{{--                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <div class="form-group">--}}
{{--                --}}{{--                        <label for="exampleInputPassword1">password *</label>--}}
{{--                --}}{{--                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <div class="form-check">--}}
{{--                --}}{{--                        <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                --}}{{--                        <label class="form-check-label" for="exampleCheck1" style="padding-right: 20px"> Remember me--}}
{{--                --}}{{--                        </label>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <a class="float-right active" href="" data-target="#password"  data-toggle="modal">Forgot your password?</a>--}}
{{--                --}}{{--                    <br><br>--}}
{{--                --}}{{--                    <button type="submit" class="btn btn-dark">sign in</button>--}}
{{--                --}}{{--                </form>--}}


{{--            </div>--}}
            <div class="col-lg-6 col-md-8" style="margin: auto">
                <h2 class="text-dir">@lang('site.signup')</h2>

                <form method="POST" action="{{ route('register') }}" class="account " style="background: #e9ecef;">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold font-weight-bold text-dir">@lang('site.name')</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    {{--<div class="form-group row" hidden>--}}
                        {{--<label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('E-Mail Address') }}</label>--}}

                        {{--<div class="col-md-6">--}}
                            {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="noMail"  autocomplete="email">--}}

                            {{--@error('email')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                            {{--@enderror--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<br>--}}

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right font-weight-bold text-dir">@lang('site.phone')</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <span class="text-center">
                                                    </span>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right font-weight-bold text-dir">@lang('site.country')</label>

                        <div class="col-md-6">

                            <select class="form-control @error('country') is-invalid @enderror"  name="country" id="country">
                                @foreach(\App\Country::all() as $c)

                                    <option value="{{$c->id}}">
                                        {{$c->name_ar}}  -  {{$c->name_en}}
                                    </option>

                                @endforeach
                            </select>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold text-dir">@lang('site.password')</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <i class="far fa-eye pass_icon" id="togglePassword" ></i>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right font-weight-bold text-dir">@lang('site.confirm_password')</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <br>

                    <div class="form-group row mb-0"  style="justify-content: center;">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-danger">
                                @lang('site.signup')
                            </button>
                        </div>
                    </div>
                </form>
                {{--                <form class="account " style="text-transform: capitalize">--}}
                {{--                    <div class="form-group">--}}
                {{--                        <label for="exampleInputEmail1">   country *</label>--}}
                {{--                        <select  class="form-control" name="Clients[country_id]" id="Clients_country_id">--}}
                {{--                            <option value="1">الكويت</option>--}}
                {{--                            <option value="2">الامارات العربية المتحدة</option>--}}
                {{--                            <option value="3">المملكة العربية السعودية</option>--}}
                {{--                            <option value="4">قطر</option>--}}
                {{--                            <option value="5">عمان</option>--}}
                {{--                            <option value="6">البحرين</option>--}}
                {{--                            <option value="7">امريكا</option>--}}
                {{--                            <option value="8">أستراليا</option>--}}
                {{--                            <option value="9">السويد</option>--}}
                {{--                            <option value="10">انجلترا</option>--}}
                {{--                            <option value="11">مصر</option>--}}
                {{--                            <option value="12">هولندا</option>--}}
                {{--                            <option value="13">الاردن</option>--}}
                {{--                        </select>--}}
                {{--                    </div>--}}
                {{--                    <div class="form-group">--}}
                {{--                        <label for="exampleInputEmail1">   user name *</label>--}}
                {{--                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">--}}
                {{--                    </div>--}}
                {{--                    <div class="form-group">--}}
                {{--                        <label for="exampleInputEmail1">  email *</label>--}}
                {{--                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">--}}
                {{--                    </div>--}}
                {{--                    <div class="form-group">--}}
                {{--                        <label for="exampleInputPassword1">password *</label>--}}
                {{--                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">--}}
                {{--                    </div>--}}

                {{--                    <button type="submit" class="btn btn-dark">Sign Up</button>--}}
                {{--                </form>--}}


            </div>
        </div>
    </div>
    <!-----  ----->
    <!--- end  --->

@endsection





