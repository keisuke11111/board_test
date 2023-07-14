@extends('layouts.Telun')
@section('content')
    <h1 class="title">掲示板</h1>
    <br>
    <div class = "bodyWrapper">
        @foreach ($user_join as $data)
            <div class = "messageRow">
                <div class = "message">
                    <div class = "user_message">
                       <a href="{{route( 'user.userjoin.index', $data->id )}}"> <h1>{{ $data -> title }}</h1></a>
                    </div>
                    <!-- <div class = "timestamp">
                        <p>{{ $data -> created_at }}</p>
                    </div> -->
                </div>
            </div>
        @endforeach
        <br>
    </div>
@endsection

<style>

    .title {
        font-weight: bold;
    }
    .add_form {
        /* border: solid 2px white;
        border-radius: 20px; */
        padding: 30px 45px;
    }

    .message {
        padding: 0.5em 1em;
        margin: 2em 0;
        color: #5d627b;
        background: white;
        border-left: solid 15px #ffc93b;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
    }

    .messageRow {
        margin: 15px;
    }

    .user_id {
        font-size: 10px;
        display: flex;
        gap: 10px;
    }

    .user_message {
        margin-left: 5%;
    }

    .user_delete {
        text-align: right;
    }
    
    .delete_btn {
        font-size: 12px;
        border: solid 0px white;
        background-color: white;
        color: #808080;
    }

    .delete_btn:hover {
        color: black;
        font-size: 14px;
        transition: 0.8s;
    }
    
    .btnWrapper {
        width: 100%;
    }
    
    .add-btn {
        width: 100%;
        
    }

    /* .message p {
        margin: 0;
        padding: 0;
    } */
</style>