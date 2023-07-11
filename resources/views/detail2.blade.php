@extends("layouts.op_telun")
@section("content")
<x-guest-layout>
    <x-auth-card>
    <x-slot name="logo">
    </x-slot>
    <form action="" enctype="multipart/form-data" method="post">
            @csrf
            @foreach ($join as $join )

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

                <textarea id="text" class="block mt-1 w-full"  name="text" value="" required> </textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
       
            <button type="submit"class="block w-20 h-10 text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md  " >決定</button>
            </form>
            <button type="submit"class="block w-20 h-10 text-white text-center bg-sky-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md  " >お見送り</button>
            </div>
          @endforeach
       
        
    </x-auth-card>
</x-guest-layout>
@endsection

  