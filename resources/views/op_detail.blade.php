@extends("layouts.op_telun")
@section("content")
<section>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h3 class="text-xl border-b-2 border-sky-400 pb-2 mb-10">　ボランティアの投稿</h3>
     <form action="{{ route( 'admin.op_home.update', $article->id )}}"method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex justify-between items-stretch mb-5">
            <div class="flex flex-col w-6/12 mr-5">
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　タイトル<em clsass="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="title" value="{{$article->title}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">
                </div>

                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　開催期間<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="period" value="{{$article->period}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　時間帯<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="time" value="{{$article->time}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　募集期間<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="b_boshu" value="{{$article->b_boshu}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　料金<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="money" value="{{$article->money}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　定員<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="capacity" value="{{$article->capacity}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　対象者<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="human" value="{{$article->human}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　場所<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="place" value="{{$article->place}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　住所<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="address" value="{{$article->address}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-gray-700 text-sm">　最寄り駅<em class="text-xs text-pink-600">必須</em></label>
                    <input type="text" name="moyori" value="{{$article->moyori}}" class="w-full h-10 px-3 text-lg border-2 border-gray-200 outline-none">  
                </div>
                
            </div>
            <div class="flex flex-col w-6/12 mr-5">
            コメント
            <div class="flex flex- items-stretch flex-grow">

                <label class="text-gray-700 text-sm"></label>
                <textarea name="coment" class="w-full h-full text-lg px-2 py-2 border-2 border-gray-200">{{$article->coment}}</textarea>
            </div>
            写真
            <div class="flex flex-row items-stretch flex-grow">
                <input  type="file" name="img_path"onchange="previewFile(this);"accept="image/*" value="{{$article->img_path}}"> 
                </div>
            <img src="{{asset('/storage/image/'.$article->img_path)}}"id="preview" width="640" height="310" >   
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
    


            </div>
            </div>
        </div>

    <div class="flex justify-end">
        <a href="{{route('user.op_homes.deci',['id' => $article->id])}}" class="block w-24 h-10 text-white text-center bg-pink-500 hover:bg-pink-400 mr-5 px-3 py-2 rounded-md">参加者</a>
        <a href="{{route('user.userjoin.index',['id' => $article->id])}}" class="block w-24 h-10 text-white text-center bg-blue-500 hover:bg-blue-400 mr-5 px-3 py-2 rounded-md">chat</a>
        <button type="submit" class="block w-24 h-10 text-white text-center bg-yellow-400 hover:bg-yellow-400 mr-5 px-3 py-2 rounded-md">編集</button>
       
    </form>
        <!-- <form action="{{ route('admin.op_home.destroy', $article->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"
                class="block w-20 .text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md" >削除</button>
         </form> -->
         <form action="{{ route('admin.op_home.destroy', $article->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"class="block w-20 h-10 text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md  " >削除</button>
         </form>
    </div>

        
    
   

</section>
@endsection
