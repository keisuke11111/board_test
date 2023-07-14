@extends("layouts.op_telun")
@section("content")
<x-guest-layout>
    <x-auth-card>
    <x-slot name="logo">
    
    <div class="review">
  <form="" methd='post'>
  <p>レビュー</p>
  <div class="stars">
    @foreach($info as $in)
  <form action="{{ route('user.point.store',['user_id' => $in->user_id, 'join_id' => $in->join_id]) }}" enctype="multipart/form-data" method="post">
    @endforeach
    <span>
      <input id="review01" type="radio" name="review"value="5"><label for="review01">★</label>
      <input id="review02" type="radio" name="review"value="4"><label for="review02">★</label>
      <input id="review03" type="radio" name="review"value="3"><label for="review03">★</label>
      <input id="review04" type="radio" name="review"value="2"><label for="review04">★</label>
      <input id="review05" type="radio" name="review"value="1"><label for="review05">★</label>
    </span>
  </div>
  
  <button type="submit"class="block w-20 h-10 text-white text-center bg-yellow-400 hover:bg-yellow-300 mr-5 px-3 py-2 rounded-md " name="jug" value="">評価</button>
 

</div>

  
    
   
            @csrf
           

            <!-- Name -->
           
            @foreach ($info as $info )
            <div>
                <x-label for="name" :value="__('名前')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$info->name}}" required autofocus readonly readonly />
            </div>

            <div>
                <x-label for="tel" :value="__('電話番号')" />

                <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" value="{{$info->tel}}" required autofocus readonly readonly />
            </div>
            <div>
                <x-label for="sex" :value="__('性別')" />

                <x-input id="sex" class="block mt-1 w-full" type="sex" name="sex" value="{{$info->sex}}" required autofocus readonly readonly />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$info->email}}"  required autofocus readonly />
            </div>

            <div class="mt-4">
                <x-label for="text" :value="__('質問やコメント')" />

                <textarea id="text" class="block mt-1 w-full"  name="text" value="{{$info->qu}}"  required autofocus readonly> </textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
       
            <button type="submit"class="block w-20 h-10 text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md " name="jug"value="1" >戻る</button>
            
            @endforeach
       
            </form>
    </x-auth-card>
  
</x-guest-layout>

@endsection
<style>
    .stars span{
  display: flex;               /* 要素をフレックスボックスにする */
  flex-direction: row-reverse; /* 星を逆順に並べる */
  justify-content: flex-end;   /* 逆順なので、左寄せにする */
}

.stars input[type='radio']{
  display: none;               /* デフォルトのラジオボタンを非表示にする */
}

.stars label{
  color: #D2D2D2;              /* 未選択の星をグレー色に指定 */
  font-size: 30px;             /* 星の大きさを30pxに指定 */
  padding: 0 5px;              /* 左右の余白を5pxに指定 */
  cursor: pointer;             /* カーソルが上に乗ったときに指の形にする */
}

.stars label:hover,
.stars label:hover ~ label,
.stars input[type='radio']:checked ~ label{
  color: #F8C601;              /* 選択された星以降をすべて黄色にする */
}


</style>

  