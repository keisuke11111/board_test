@extends("layouts.Telun")
@section("content")
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="review">
                <form="" method="post">
                    <p>レビュー</p>
                    <div class="stars">
                        @foreach($user_info as $user_info)
                        <form action="{{route('user.userinfo.update',['userinfo'=> $user_info->id])}}" enctype="multipart/form-data" method="post">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('名前')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user_info->name}}" required autofocus readonly readonly />
                            </div>

                            <div>
                                <x-label for="tel" :value="__('電話番号')" />
                                <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" value="{{$user_info->tel}}" required autofocus readonly readonly />
                            </div>
                            <div>
                                <x-label for="sex" :value="__('性別')" />
                                <x-input id="sex" class="block mt-1 w-full" type="sex" name="sex" value="{{$user_info->sex}}" required autofocus readonly readonly />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user_info->email}}" required autofocus readonly />
                            </div>

                            <div class="flex">
                                <button type="submit" class="block w-20 h-10 text-white text-center bg-red-500 hover:bg-red-400 mr-5 px-3 py-2 rounded-md" name="jug" value="1">変更</button>
                                <a href="{{route('user.userinfo.show',['userinfo' => $user_info->id])}}" class="block w-24 h-10 text-white text-center bg-yellow-500 hover:bg-yellow-400 mr-5 px-3 py-2 rounded-md">履歴</a>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </form>
            </div>
        </x-auth-card>
    </x-guest-layout>
@endsection
