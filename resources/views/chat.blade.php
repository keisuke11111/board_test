@extends("layouts.Telun")
@section("content")
<body>
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- 自分やユーザーの情報 -->
    <br>
    <div id="your_container">
    
        <!-- チャットの外側部分① -->
        <div id="bms_messages_container">
            <!-- ヘッダー部分② -->
            <div id="bms_chat_header">
                <!--ステータス-->
                <div id="bms_chat_user_status">
                    <!--ステータスアイコン-->
                    <div id="bms_status_icon">●</div>
                    <!--ユーザー名-->
                    <div id="bms_chat_user_name" value="">{{$join_op}}
                    </div>
                </div>
            </div>

            <!-- タイムライン部分③ -->
            <div id="bms_messages">

                <!--メッセージ１（左側j）自分以外が送った言葉-->
                <!-- <div class="bms_message bms_left">
                    <div class="bms_message_box">
                
                    </div>
                </div>
                 

                <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->

                <!--メッセージ２（右側）自分が送った文字-->
                <!-- <div class="bms_message bms_right">
                    <div class="bms_message_box">
                        
                    </div>
                </div>  -->
            
            @foreach($messages as $messages)
            <div class="mt-4">

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$messages->message}}"  required autofocus readonly />
            </div>
            @endforeach
                <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
            </div>

            <!-- テキストボックス、送信ボタン④ -->
            
            <form action="/Userjoin2" enctype="multipart/form-data" method="get"> 
            <div id="bms_send">
            
            
                <textarea id="bms_send_message"  name='message'></textarea>
                <button type="submit" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md" id="bms_send_btn" value="{{$id}}"name="id">送信</button>
                
            </div>
            </form>
           
        </div>
    
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$.ajaxSetup({
            timeout: 3000,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
$('#submit').on('click' , function(){
    $.ajax({
            method : 'get',
                url : '/Userjoin2',
                    data : {
                        message: $("#message").val(),
                        id: $("#id").val(),

                        }
                    
           });
           return false;
                        
         });
    
    

     window.Echo.channel('telun')
    .listen('MessageCreated', (e) => {
        console.log(e.message2.message)
        var element = document.getElementById('bms_message bms_right');
        var classNames = element.classList;
        var bmsMessageContent = document.createElement('div');
        bmsMessageContent.classList.add('bms_message_content');

        var bmsMessageText = document.createElement('div');
       bmsMessageText.classList.add('bms_message_text');
       bmsMessageText.textContent = e.recruit.message;

       bmsMessageContent.appendChild(bmsMessageText);
       classNames.appendChild(bmsMessageContent);

        

      // 時間のセルを作成してデータを追加
    });
</script>

</body>
@endsection
