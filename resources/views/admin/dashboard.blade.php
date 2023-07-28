@extends("layouts.op_telun")
@section("content")




<link href="{{asset('css/op_home.css')}}" rel="stylesheet">
@foreach($recruits as $recruits)



<div class="box11">
<img src="{{asset('/storage/image/'.$recruits->img_path)}}"id="img_path">
<div class="title"><a href= "{{route( 'admin.op_home.show', $recruits->id )}}">{{$recruits->title}}</a></div>
<div class="coment"><p>{{$recruits->coment}}</p></div>
</div>
@endforeach
@endsection