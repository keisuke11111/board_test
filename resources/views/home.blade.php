@extends("layouts.Telun")
{{-- @section("link","{{ asset('css/home.css')}} ") --}}
@section("pageTitle","home")
@section("box")

{{-- action="{{ asset('css/home.css')}}" --}}

@endsection
@section("content")
    @foreach ($recruits as $recruits)
        <div id = "contents">
            <h2>
                {{-- ,['id' => '$volunteer['id']'] --}}
                <a href="{{ route('user.home.show', $recruits->id) }}">{{$recruits['title']}}</a>            </h2>
            <div id="image">
                <img src="{{asset('storage/image/'.$recruits->img_path)}}" id="img">                </div>
                <div id="recepi">
                    <p id="tag">募集期間</p>
                    {{$recruits->b_boshu}}
                </div>
                <div>
                    <p id="tag">開催期間</p>
                    {{$recruits->period}}
                </div>
        </div>
    @endforeach
@endsection


<style>
    a{
        text-decoration: none;
        color:inherit;
        position: relative;
        font-size: 20px;
        width: 100%;
        height: 100%;
    }
    a::before {
        content: "";
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        bottom: -1px;
    }
    h2{
        display-inline: block;
    }
     li{
        list-style: none;
    }
    #tag{
        font-size: 18px;
        margin: 10px;
    }
    #contents{
        background-color: #f8f8f8;
        /* 320*450 */
        width: 320px;
        height: 450px;
        border-radius: 5px;
    }
    #contents:hover{
        opacity: 0.7;
    }
    img{
        width: 300px;
        height: 200px;
        object-fit: cover;
    }
    #contents{
        margin: 10px;
        padding: 10px;
        float: left;
    }


</style>
