<x-app-layout>
    <x-slot name="header">
    </x-slot>
</x-app-layout>

<link href="{{asset('css/op_home.css')}}" rel="stylesheet">
@foreach($recruits as $recruits)

@php
   $count=1;
   $recruits = session('recruits');
@endphp

<div class="box11">
<img src="{{asset('/storage/image/'.$recruits->img_path)}}"id="img_path">
<div class="title"><a href= "{{route( 'admin.op_home.show', $recruits->id )}}">{{$recruits->title}}</a></div>
<div class="coment"><p>{{$recruits->coment}}</p></div>
</div>
<p>{{$count}}</p>
@php 
  $count++;
@endphp
{{$count}}
@endforeach