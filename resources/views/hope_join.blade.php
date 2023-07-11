@extends("layouts.Telun")
@section("content")
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>   
<table id="table">
    <tr>
      <th id="name">名前</th>
      <th id="time">時間</th>
    </tr>
    @foreach($joins as $joins)
    <tr>
      <td><a href="{{route('admin.join2.show',$joins->user_id)}}">{{$joins->name}}</a></td>
      <td>{{$joins->created_at}}</td>
    </tr>
    @endforeach 
</table>



<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    window.Echo.channel('telun')
    .listen('Joined', (e) => {

      var newRow = document.createElement('tr');
      
      // 名前のセルを作成してデータを追加
      var nameCell = document.createElement('td');
      var nameLink = document.createElement('a');
      nameLink.href = "{{ route('admin.op_home.show', ':userId') }}".replace(':userId', e.join.user_id);
      nameLink.textContent = e.join.name;
      nameCell.appendChild(nameLink);
      newRow.appendChild(nameCell);

      // 時間のセルを作成してデータを追加
      var timeCell = document.createElement('td');
      timeCell.textContent = new Date(e.join.created_at).toLocaleString();
      newRow.appendChild(timeCell);

      // テーブルに新しい行を追加
      document.getElementById('table').appendChild(newRow);
    });
      // 新しい行を作成
      // var newRow = document.createElement('tr');
      
      // var Year = now.getFullYear();
      // var Month = now.getMonth()+1;
      // var Date = now.getDate();
      // var Hour = now.getHours();
      // var Min = now.getMinutes();
      // var newRow = document.createElement('tr');
      // var text=Year + "-" + Month + "-" + Date  + Hour + ":" + Min + ":" + Sec;
      // // 新しいセルを作成してデータを追加
      // var nameCell = document.createElement('td');
      // nameCell.textContent = e.join.name;
      // newRow.appendChild(nameCell);

      // var timeCell = document.createElement('td');
      // timeCell.textContent = text;
      // newRow.appendChild(timeCell);

      // // テーブルに新しい行を追加
      // document.getElementById('table').appendChild(newRow);
    
 
</script> 
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



