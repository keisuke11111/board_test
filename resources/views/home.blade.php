@extends("layouts.Telun")
{{-- @section("link","{{ asset('css/home.css')}} ") --}}
@section("pageTitle","home")
@section("box")

{{-- action="{{ asset('css/home.css')}}" --}}

@endsection
@section("content")
    @foreach ($recruits as $recruits)
        <div id = "contents">
            <h2>{{$volunteer['title']}}</h2>
            <ul>
                <li>
                    <img src="image\{{$volunteer['picture']}}" alt="ボランティア写真">
                </li>
                <li>
                    <p id="tag">募集期間</p>
                    {{$volunteer['Recperi']}}
                </li>
                <li>
                    <p id="tag">開催期間</p>
                    {{$volunteer['holdperi']}}
                </li>

            </ul>
            <a href="{{ route('user.detail') }}">aaaa</a>
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
