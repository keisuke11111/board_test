@extends("layouts.Telun")
{{-- @section("link","{{ asset('css/home.css')}} ") --}}
@section("pageTitle","home")
@section("box")

{{-- action="{{ asset('css/home.css')}}" --}}

@endsection
@section("content")
    @foreach ($recruits as $recruits )
        <div id = "contents">
            <h2><a href="{{ route('user.home.show', $recruits->id) }}">{{$recruits['title']}}</a></h2>
            <ul>
                <li>
                    <img src="{{asset('storage/image/'.$recruits->img_path)}}" id="img">
                    
                </li>
                <li>
                    <p id="tag">募集</p>
                    {{$recruits->b_boshu}}
                </li>
                <li>
                    <p id="tag">開催期間</p>
                    {{$recruits->period}}
                </li>

            </ul>

        </div>
    @endforeach
@endsection
<style>
    li{
        list-style: none;
    }
    #tag{
        font-size: 18px;
        margin: 10px;
    }
    #img{
        width: 300px;
    }
    


</style>
