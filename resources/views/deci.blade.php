@extends("layouts.op_telun")
@section("content")
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>   
<table id="table">
    <tr>
      <th id="name">名前</th>
      <th id="time">時間</th>
    </tr>
    @foreach($deci as $deci)
    <tr>
      <td><a href="{{ route('user.deci.info',['user_id' => $deci->user_id, 'created_at' => $deci->created_at]) }}">{{$deci->name}}</a></td>
      <td>{{$deci->created_at}}</td>
    </tr>
    @endforeach 
    
</table>


</body>
@endsection




<style>
   table{
  width: 100%;
  border-collapse:separate;
  border-spacing: 0;
}

table th:first-child{
  border-radius: 5px 0 0 0;
}

table th:last-child{
  border-radius: 0 5px 0 0;
  border-right: 1px solid #3c6690;
}
table th{
  text-align: center;
  color:white;
  background: linear-gradient(#829ebc,#225588);
  border-left: 1px solid #3c6690;
  border-top: 1px solid #3c6690;
  border-bottom: 1px solid #3c6690;
  box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
  width: 25%;
  padding: 10px 0;
}

table td{
  text-align: center;
  border-left: 1px solid #a8b7c5;
  border-bottom: 1px solid #a8b7c5;
  border-top:none;
  box-shadow: 0px -3px 5px 1px #eee inset;
  width: 25%;
  padding: 10px 0;
}

table td:last-child{
  border-right: 1px solid #a8b7c5;
}
table tr:last-child td:first-child {
  border-radius: 0 0 0 5px;
}

table tr:last-child td:last-child {
  border-radius: 0 0 5px 0;
}
    


</style>



