<!DOCTYPE html>
<html>

<head>
    <title>{{trans('site.al-dhafra')}} </title>
    <link rel="stylesheet" href="{{ asset('site/css/ar-style.css')}}">

    @if(Lang::locale() == 'en')
        <link rel="stylesheet" href="{{ asset('site/css/en-style.css')}}">
    @endif


    <script src="{{ asset('site/css/jquery-3.4.1.min.js') }}"></script>

    <style>
        .alert {
            padding: 20px;
            background-color: #f8d7da;
            color: #721c24;
        }
        @media (min-width: 300px) and (max-width: 800px) {
            .container-mobile {
                display: unset;
            }

            .dafra-img-mobile {
                width: 100%;
                height: 30%;
            }

            .form-mobile {
                width: 100%;
            }

            form.mobile {
                font-size: 21px;
            }

            input.mobile {
                height: 50px;
                font-size: 22px;
            }

            .signup-mobile {
                height: 60px;
                font-size: 32px;
            }
        }
    </style>



</head>

<body lang="ar" dir="rtl">
<div class="container container-mobile">
    <div class="dafra-img dafra-img-mobile">
        <img style="height: -webkit-fill-available;" src="{{ asset('site/imgs/black.png')}}" alt="" width="100%" height="100%">
    </div>
    <div class="form login form-mobile">
        <center>
            <h1>{{trans('site.login')}} </h1>
            <a href="{{route('site.signup')}}"> {{trans('site.add-new-customer')}}</a>
        </center>

        @if($message = Session::get('error'))
            <div style="text-align: center">
                <strong style="color: red">{{ $message }}</strong>
            </div>
        @endif

        <form action="{{route('site.getLogin')}}" method="POST" class="mobile">
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

            <div class="feild">
                <div class="valid">
                    <label for="">{{trans('site.email')}}</label>
                    @if($errors->first('email'))
                        <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                    @endif
                </div>
                <input class="mobile" type="email" name="email" value="{{ old('email') }}" placeholder="{{trans('site.email')}}">
            </div>
            <div class="feild">
                <div class="valid">
                    <label for="">{{trans('site.password')}} </label>
                    @if($errors->first('password'))
                        <img src="{{ asset('site/imgs/sad.png')}}" alt="">
                    @endif
                </div>
                <input class="mobile" type="password" name="password" value="{{ old('password') }}" placeholder="{{trans('site.password')}}">
            </div>
            <input class="btn signup signup-mobile" type="submit" value="{{trans('site.login')}}  ">
        </form>
    </div>
</div>
</body>

</html>
