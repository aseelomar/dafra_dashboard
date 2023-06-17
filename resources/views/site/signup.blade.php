<!DOCTYPE html>
<html>

<head>
    <title>{{trans('site.sign-up')}} </title>

        <link rel="stylesheet" href="{{ asset('site/css/ar-style.css')}}">
    @if(Lang::locale() == 'en')
        <link rel="stylesheet" href="{{ asset('site/css/en-style.css')}}">
    @endif
    <script src="site/css/jquery-3.4.1.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    {!! NoCaptcha::renderJs() !!}

    <style>
        .alert {
            padding: 20px;
            background-color: #f8d7da;
            color: #721c24;
        }

        </style>

</head>

<body lang="ar" dir="rtl" id="ar">
<div class="container">
    <div class="dafra-img">
        <img style="height: -webkit-fill-available;" src="{{ asset('site/imgs/black.png')}}" alt="" width="100%" height="115%">
    </div>
    <div class="form">
        <center>
            <h1>{{trans('site.add-new-customer')}} </h1>
            <small>{{trans('site.do-you-have-account')}} <a href="{{route('site.login')}}"> {{trans('site.login')}}</a></small>
            {{--<div class="btn">--}}
                {{--<img src="{{ asset('site/imgs/facebook.png')}}" alt="" width="20" height="20">--}}
                {{--{{trans('site.login-facebook')}}--}}
            {{--</div>--}}
        </center>
        <form action="{{route('site.register')}}" method="POST">
            @csrf
            <div class="card-body feild">
                @if ($errors->any())
                    <div class="alert" role="alert">

                        <ul>

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
            </div>

            <div class="first-block" align="right" class="feild">
                <div align="right">
                    <div class="valid">
                        <label for="">{{trans('site.first-name')}}</label>
                        @if($errors->first('firstName'))
                            <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                        @endif


                    </div>
                    <input type="text" name="firstName" value="{{ old('firstName') }}" placeholder="{{trans('site.first-name')}}">
                </div>
                <div align="right">
                    <div class="valid">
                        <label for="">{{trans('site.family-name')}} </label>
                        @if($errors->first('familyName'))
                            <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                        @endif
                    </div>
                    <input type="text" name="familyName"  value="{{ old('familyName') }}" placeholder="{{trans('site.family-name')}}">
                </div>
            </div>
            <div class="feild">
                <div class="valid">
                    <label for="">{{trans('site.email')}} </label>
                    @if($errors->first('email'))
                        <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                    @endif
                </div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="{{trans('site.email')}} ">
            </div>
            <div class="feild">
                <div class="valid">
                    <label for=""> {{trans('site.password')}} </label>
                    @if($errors->first('password'))
                        <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                    @endif
                </div>
                <input type="password" name="password" value="{{ old('password') }}" placeholder="{{trans('site.password')}}">
            </div>
            <div class="feild">
                <div class="valid">
                    <label for=""> {{trans('site.password')}} </label>

                    @if($errors->first('password_confirmation'))
                        <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                    @endif

                </div>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{trans('site.password_confirmation')}}">
            </div>
            <div class="feild">
                <div class="valid">
            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                {{--<label class="col-md-4 control-label">Google Captcha</label>--}}
                <div class="col-md-6 pull-center">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
                </div>
            </div>
            <input class="btn signup" type="submit" value="{{trans('site.add-new-customer')}} ">
            <center>
                <h5>.{{trans('site.agree-Privacy-Policy')}} </h5>
            </center>
        </form>
    </div>
</div>

</body>

</html>
