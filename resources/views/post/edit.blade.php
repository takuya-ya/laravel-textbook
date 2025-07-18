<x-app-layout>
    <!-- ここが$header にはいる-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- 以下がデフォルトスロット $slot に入る　 -->
     <div class="max-w-7xl mx-auto px-6">
        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif

        <!-- CoontrollerからPost $postを渡している -->
        <form method="POST" action="{{ route('post.update', $post) }}">
            @csrf
            @method('patch')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <!-- validationエラーの場合にerrorを出力 -->
                    {{-- @error ディレクションを使用する方法もある --}}
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md"
                    value="{{old('title', $post->title)}}">
                </div>
            </div>

            <!-- todo p189 -->
            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">本文</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="5">{{old('body', $post->body)}}</textarea>
             </div>

             <x-primary-button class="mt-4">
                送信する
             </x-primary-button>
        </form>
     </div>
</x-app-layout>
