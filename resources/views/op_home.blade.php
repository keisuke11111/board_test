<link href="{{asset('css/op_home.css')}}" rel="stylesheet">

@foreach($recruits as $recruits)

<div class="box11">
<img src="{{asset('/storage/image/'.$recruits->img_path)}}"id="img_path">
<div class="title"><p>{{$recruits->title}}</p></div>
<div class="coment">{{$recruits->coment}}</div>
</div>

@endforeach