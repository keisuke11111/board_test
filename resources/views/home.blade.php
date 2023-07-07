@extends("layouts.Telun")
{{-- @section("link","{{ asset('css/home.css')}} ") --}}
@section("pageTitle","home")
@section("box")

{{-- action="{{ asset('css/home.css')}}" --}}

@endsection
@section("content")
    @foreach ($volunteer as $volunteer)
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
    li{
        list-style: none;
    }
    #tag{
        font-size: 18px;
        margin: 10px;
    }
    #contents{
        /* background-color: rgb(242, 242, 242); */
        /* box-shadow: 0 10 25px rgba(0,0,0,0.5); */
    }
    img{
        width: 300px;
    }


</style>
