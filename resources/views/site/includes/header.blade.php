<header>
    <!-- start of header-->
    <ul class="setting">
        <li>
            <a href="{{route('lang','ar')}}" class="ar"> عربي</a>
            <p style="margin-left:3px;"> | </p>
            <a href="{{route('lang','en')}}" class="lan"> English </a>
        </li>

        <li class="mode">
            <img src="{{ asset('site/imgs/darkicon.png') }}" alt="" id="dark">
            <img src="{{ asset('site/imgs/lighticon.png') }}" alt="" id="light">
        </li>
    </ul>
    <div class="nav-wrap">
        <div class="nav-section">
            <a href="/">
                <img id="logo" src="{{ asset('site/imgs/logo.png') }}" alt="" width="60px">
            </a>
        </div>
        <div class="nav-section part2">

            <div class="top-section">
                <form action="{{route('site.search')}}" method="POST" class="email-form">
                    @csrf
                    <input type="text" id="search" name="search" placeholder="{{ trans('site.search') }}">
                </form>


                @if(session('mode') == 'dark')
                    <img class="general general-mobile ll" width="90" height="100" src="{{ isset($logo[0]) ?  asset('storage/constant/' . $logo[0]->image ) : '' }}" alt="">
                 @elseif(session('mode') == 'day')
                    <img class="general general-mobile hh" width="90" height="100" src="{{ isset($logo[1]) ?  asset('storage/constant/' . $logo[1]->image ) : '' }}" alt="">
                @endif
            </div>


            <div class="bottom-section">
                <ul class="navbar">
                    <div class="items">
                        <li class="{{ request()->routeIs('site.home') ? 'active' : '' }}"><a href="{{route('site.home')}}">{{trans('site.home')}}</a></li>

                        <li class="{{ request()->routeIs('site.guide') ? 'active' : '' }}"> <a href="{{route('site.guide')}}">{{trans('site.schedule-of-programs')}}</a> </li>
                        <li class="dropdown {{ request()->routeIs('site.allVideo*') ? 'active' : '' }}">
                            {{trans('site.videos')}}
                            <img src="{{ asset('site/imgs/down-arrow.svg') }}" alt="" width="15" class="dropbtn">
                            <div class="dropdown-content">
                                <a href="{{ route('site.allVideo', 'series') }}">{{trans('site.series')}}</a>
                                <a href="{{ route('site.allVideo', 'programs') }}">{{trans('site.programs')}}</a>
                                <a href="{{ route('site.allVideo', 'movies') }}">{{trans('site.movies')}}</a>
                            </div>
                        </li>
                    </div>
                    <div class="live">
                        <li id="btn"><a href="{{ route('site.live') }}">{{trans('site.live')}}</a></li>
                        @if(auth()->guard('web')->user())
                            <li id="btn"><a href="{{ route('site.logout') }}"> {{trans('site.logout')}} </a></li>
                            @else
                            <li id="btn"><a href="{{ route('site.login') }}"> {{trans('site.login')}} </a></li>
                        @endif

                    </div>
                </ul>
            </div>
        </div>
    </div>

</header>
