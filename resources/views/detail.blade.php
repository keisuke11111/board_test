
@extends("layouts.Telun")
@section("content")
<form method="POST" action="{{ route('user.logout') }}">
  @csrf
  <x-responsive-nav-link :href="route('user.logout')"
        onclick="event.preventDefault();
             this.closest('form').submit();">
    {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h3 class="text-xl border-b-2 border-yellow-400 pb-2 mb-10">　ボランティアの投稿</h3>
        <div class="flex justify-between items-stretch mb-5">
            <div class="flex flex-col w-6/12 mr-5">
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　タイトル<em clsass="text-xs text-pink-600"></em></label>
                    <input type="text" name="title" value="{{$teer->title}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>
                </div>

                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　開催期間<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="period" value="{{$teer->period}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　時間帯<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="time" value="{{$teer->time}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　募集期間<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="b_boshu" value="{{$teer->b_boshu}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　料金<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="money" value="{{$teer->money}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　定員<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="capacity" value="{{$teer->capacity}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　対象者<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="human" value="{{$teer->human}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　場所<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="place" value="{{$teer->place}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　住所<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="address" value="{{$teer->address}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　最寄り駅<em class="text-xs text-pink-600"></em></label>
                    <input type="text" name="moyori" value="{{$teer->moyori}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none" required autofocus readonly>  
                </div>
                
            </div>
            <div class="flex flex-col w-6/12 mr-5">
            コメント
            <div class="flex flex- items-stretch flex-grow">

                <label class="text-gray-700 text-sm"></label>
                <textarea name="coment" class="w-full h-full text-lg px-2 py-2 border-2 border-gray-200" required autofocus readonly>{{$teer->coment}}</textarea>
            </div>
            写真
            <div class="flex flex-row items-stretch flex-grow">
                <input  type="file" name="img_path"onchange="previewFile(this);"accept="image/*" value="{{$teer->img_path}}" required autofocus readonly> 
                </div>
            <img src="{{asset('/storage/image/'.$teer->img_path)}}"id="preview" width="640" height="310" >   
            <div class="flex justify-end" >
            <script>
                    function previewFile(hoge){
                        var fileData = new FileReader();
                        fileData.onload = (function() {
                            //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
                            //プレビュー表示している
                            document.getElementById('preview').src = fileData.result;
                        });
                         fileData.readAsDataURL(hoge.files[0]);
                    }
            </script>
             <form action="{{ route('user.join.index') }}" method="Get"> 
             <button type="submit" class="text-white text-center leading-10 bg-yellow-400 px-10 hover:bg-yellow-300 rounded-md">参加</button>
             </form>
            </div>
            
        </div>
@endsection
