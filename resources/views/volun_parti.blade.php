<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content = "IE = edge">
        <meta name = "viewpoint" content = "width = ,initial-scale = 1.0">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel = "stylesheet" href = "{{asset('/css/bbs.css')}}">
        <title>ひとこと掲示板</title>
    </head>
    <body>
        <h1>ボランティアの詳細</h1>
        <br>
        <div class = "bodyWrapper">
            @foreach ($detail as $data)
                <div class = "messageRow">
                    <div class = "message">
                        <div class = "user_id">
                            <p>NO.{{$data->id}}</p>
                        </div>
                        <div class = "user_name">
                            <p>NAME ：{{$data->view_name}}</p>
                        </div>
                        <div class = "user_message">
                            <p>メッセージ ：{{$data->message}}</p>
                        </div>
                        <div class = "timestamp">
                            <p>{{$data ->created_at}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <br>
        </div>
    </body>
</html>

<style>
    .message {
        padding: 0.5em 1em;
        margin: 2em 0;
        color: #5d627b;
        background: white;
        border-top: solid 5px #5d627b;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
    }

    .board {
        text-align : center;
    }

    .form-group {
        text-align : center;
    }

    h1 {
        text-align : center;
    }
</style>
