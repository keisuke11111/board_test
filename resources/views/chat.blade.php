@extends("layouts.Telun")
@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">

<body>
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if(isset(Auth('users')->user()->id))
@php
$user=Auth('users')->user()->id
@endphp
@else
@php
$user=0
@endphp
@endif

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
                    <div id="bms_chat_user_name" value="">{{$join_op}}</div>
                </div>
            </div>
            <dl class="faq_area">
              <div>
                @foreach($messages as $messages)
        
                <dt>
                    @if($speak_id != $user)
                      @if(isset($messages))
                         {{$messages->message}}
                      @endif
                    @else
                    <script>
                        const dtElements = document.getElementsByTagName('dt');
                        function removeDtElement() {
                            // 要素が存在する場合にのみ削除する
                              if (dtElements.length > 0) {
                                 dtElements[0].remove();
                                
                               }
                           }  

                            // 例：最初のdt要素を削除する
                      removeDtElement();
                    </script>
                    @endif
                </dt>
                 
                               
                <dd>
                    @if($speak_id == $user)
                        @if(isset($messages))
                           {{$messages->message}}
                        @endif
                    @else
                    <script>
                        const ddElements = document.getElementsByTagName('dd');
                        function removeDdElement() {
                            // 要素が存在する場合にのみ削除する
                              if (ddElements.length > 0) {
                                 ddElements[0].remove();
                                
                               }
                           }  

                            // 例：最初のdt要素を削除する
                      removeDdElement();
                    </script>
                    @endif
                </dd>
               
            
                
                @endforeach
            </div>
            
            </dl>

            

                <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
            </div>

            <!-- テキストボックス、送信ボタン④ -->
            
            <form action="" enctype="multipart/form-data" method="post"> 
              @csrf
                 <div id="bms_send" class="flex justify-center items-center w-full">
                        <textarea id="bms_send_message" name="message" class="w-4/5 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"></textarea>
                        <button type="submit" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md" id="submit">送信</button>
                 </div> 
            </form>


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
                        
                            method:'POST',
                                url : '/Userjoin2',
                                  data : {
                                      message: $("#bms_send_message").val(),
                                      id: "{{$id}}"
                                    }
                     
                         });
                         return false;
                        
                    });
    
    

      window.Echo.channel('telun')
     .listen('MessageCreated', (e) => {
         console.log(e.message2.message)
    //     var element = document.getElementById('bms_message bms_right');
    //     var classNames = element.classList;
    //     var bmsMessageContent = document.createElement('div');
    //     bmsMessageContent.classList.add('bms_message_content');

    //     var bmsMessageText = document.createElement('div');
    //    bmsMessageText.classList.add('bms_message_text');
    //    bmsMessageText.textContent = e.recruit.message;

    //    bmsMessageContent.appendChild(bmsMessageText);
    //    classNames.appendChild(bmsMessageContent);

        

    //   // 時間のセルを作成してデータを追加
     });
</script>
</form>
</div>
</body>
@endsection
