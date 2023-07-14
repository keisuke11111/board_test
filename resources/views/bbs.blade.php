@extends("layouts.Telun")
@section("content")
<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel = "stylesheet" href = "{{asset('/css/bbs.css')}}">
        <title>ひとこと掲示板</title>
    </head>
    <body>
        
            {{ $bbs_data -> links() }}

    <h1>掲示板</h1>
    <form method = "POST" action = "/bbs_add">
    @csrf
    <div class = "usernameWrapper">
        <div class = "form-group">
            <label for = "name">name</label><br>
            <input type = "text" id = "name" name = "name" class = "form-control username">
            @if (!empty($errors -> first('name')))
                <p class = "error_message">{{$errors -> first('name')}}</p>
            @endif
        </div>
    </div>
    <div class = "messageWrapper">
        <div class = "form-group">
            <label for = "message">message</label><br>
            <textarea name = "message" id = "messagi" class = "form-control"></textarea>
            @if (!empty($errors -> first('message')))
                <p class = "error_message">{{$errors -> first('message')}}</p>
            @endif
        </div>
    </div>
    <div class = "btnWrapper">
        <button type = "submit" class = "btn btn-primary">write</button>
    </div>
    </form>
    <br>
    <div class = "bodyWrapper">
        @foreach ($bbs_data as $data)
        <div class = "messageRow">
            <div class = "message">
                <div class = "user_id">
                    <p>NO.{{ $data -> id }}</p>
                </div>
                <div class = "user_name">
                    <p>NAME ：{{ $data -> view_name }}</p>
                </div>
                <div class = "user_message">
                    <p>{{ $data -> message }}</p>
                </div>
                <div class = "timestamp">
                    <p>{{ $data -> created_at }}</p>
                </div>
                <div class = "user_delete">
                    <button class = "btn btn-danger" onclick = "bbs_delete('{{$data -> id }}')">削除</button>
                </div>
            </div>
        </div>
        @endforeach
        <br>
        {{ $bbs_data -> links() }}
    </div>
@endsection
<script>
    function bbs_delete(id) {
        var bbs_id = id
        if(window.confirm('削除しますか')) {
            alert('削除しました。');
            location.href = "/delete/" + bbs_id;
        }
    }
</script>
