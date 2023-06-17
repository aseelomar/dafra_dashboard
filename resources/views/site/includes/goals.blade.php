<div class="goals">
    <button class="accordion">
        <p>{{trans('site.our-goals')}}</p>
        <img id="top-arrow" src="{{ asset('site/imgs/Path 40.png') }}" />
    </button>
    <div class="panel">
        <div class="row">
            @foreach($goals->take(2) as $goal)
            <div class="goal">
                <img src="{{ asset('site/imgs/Icon.png') }}" alt="">
                <div>
                    <p>{{$goal->name }} </p>
                    <small>
                        {{$goal->description}}
                    </small>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            @foreach($goals->slice(2)->take(2) as $goal)
                <div class="goal">
                    <img src="{{ asset('site/imgs/Icon.png') }}" alt="">
                    <div>
                        <p>{{$goal->name }} </p>
                        <small>
                            {{$goal->description}}
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
        <center>
            <img id="bottom-arrow" src="{{ asset('site/imgs/Path 41.png') }}" />
        </center>
    </div>
</div>
