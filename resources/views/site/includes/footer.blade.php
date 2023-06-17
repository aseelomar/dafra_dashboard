
@push('head')

    <style>
        .policy {
            display: inline;
            border: white solid 1px;
            padding: 5px;
            border-radius: 10px;
            position: relative;
            top: 28px;
        }
    </style>
@endpush


<footer>
    <div class="footer-sections footer1">
        <p>
        <h2 class="footer-title dafra">{{trans('site.al-dhafra')}}</h2>
        {{ settings('FOOTER_DESCRIPTION') }}
        </p>
    </div>
    <div class="footer-sections">
        <p class="footer-title">{{trans('site.download-al-dhafra-app')}}</p>
        <p>
            {{ settings('FOOTER_APPS') }}
        </p>
        <br>
        <div class="stores">
            <a href=" {{ settings('APPLE_STORE') }}">
                <img src="{{ asset('site/imgs/appstore.png') }}" alt="">
            </a>
            <a href=" {{ settings('GOOGLE_PLAY') }}">
                <img src="{{ asset('site/imgs/googleplay.png') }}" alt="">
            </a>
        </div>
    </div>
    <div class="footer-sections freq" style="width: 18%;">
        <p class="footer-title">{{trans('site.follow-us-via-frequency')}} </p>
        <small>
            {{ settings('FREQUENCY') }}
        </small>

        <a class="policy" href="{{ route('site.policy') }}">
            {{ trans('site.policy') }}
        </a>

        <a  class="policy about" href="{{ route('site.about') }}">
            {{ trans('site.about') }}
        </a>

        <div class="social">
            <a href="{{ settings('FACEBOOK_ACCOUNT') }}"><img src="{{ asset('site/imgs/fb.png') }}" alt=""></a>
            <a href="{{ settings('TWITTER_ACCOUNT') }}"><img src="{{ asset('site/imgs/twitter.png') }}" alt=""></a>
            <a href="{{ settings('INSTAGRAM_ACCOUNT') }}"><img src="{{ asset('site/imgs/insta.png') }}" alt=""></a>
            <a href="{{ settings('YOUTUBE_ACCOUNT') }}"><img src="{{ asset('site/imgs/youtube-icon-small-23.jpg') }}" alt=""></a>
        </div>


    </div>
    <div class="footer-sections con">
        <p class="footer-title">{{trans('site.connect-us')}} </p>
        <ul class="contact">
            <li>
                <img src="{{ asset('site/imgs/phone-3.png') }}" alt="">
                <div class="content">
                    <small>{{trans('site.phone')}}</small>
                    <small>{{ settings('SUPPORT_NUMBER') }}</small>
                </div>
            </li>
            <li>
                <img src="{{ asset('site/imgs/email.png') }}" alt="">
                <div class="content">
                    <small>{{trans('site.email')}}</small>
                    <small>{{ settings('SUPPORT_EMAIL') }}</small>
                </div>
            </li>
            <li>
                <img src="{{ asset('site/imgs/location.png') }}" alt="">
                <div class="content">
                    <small>{{trans('site.address')}}</small>
                    <small> {{ settings('ADDRESS') }}</small>
                </div>
            </li>

        </ul>

    </div>
</footer>
<center style="font-family:'Cairo';color:white;background-color: #2D2D2D;font-size: 15px;padding:15px;">{{ settings('RIGHT_RESERVED') }}</center>

