@extends("layouts.op_telun")
@section("content")
<x-guest-layout>
    <x-auth-card>
    <x-slot name="logo">
    <div>
                <x-label for="name" :value="__('タイトル')" />
            @foreach($rec as $rec)
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$rec->title}}" required autofocus />
            </div>
    </x-slot>
    @foreach ($join as $join )
    <form action="{{route('user.hope.store',['user_id' => $join->user_id, 'join_id' => $rec->id,'id' => $join->id])}}" enctype="multipart/form-data" method="post">
    @endforeach
            @csrf
           

            <!-- Name -->
           
            
            <div>
                <x-label for="name" :value="__('名前')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$join->name}}" required autofocus />
            </div>

            <div>
                <x-label for="tel" :value="__('電話番号')" />

                <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" value="{{$join->tel}}" required autofocus />
            </div>
            <div>
                <x-label for="sex" :value="__('性別')" />

                <x-input id="sex" class="block mt-1 w-full" type="sex" name="sex" value="{{$join->sex}}" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$join->email}}" required />
            </div>

            <div class="mt-4">
                <x-label for="text" :value="__('質問やコメント')" />

                <textarea id="text" class="block mt-1 w-full"  name="text" value="{{$join->qu}}" required> </textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
       
            <button type="submit"class="block w-20 h-10 text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md " name="jug"value="1" >決定</button>
            
           <button type="submit"class="block w-20 h-10 text-white text-center bg-sky-500 hover:bg-sky-400 mr-5 px-3 py-2 rounded-md " name="jug" value="0" >削除</button>
            
          @endforeach
       
        
    </x-auth-card>
</x-guest-layout>
@endsection

  