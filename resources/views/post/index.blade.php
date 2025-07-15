<x-app-layout>
    <!-- ここが$header にはいる-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto px-6">
        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <a href="{{route('post.show', $post)}}"
            class="text-blue-600">
                {{$post->title}}
            </a>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$post->body}}
            </p>
            <div class="p-4 text-sm font-semibold">
                <p>
                    <!-- 注：この記法はHTMLコメントの為、ブラウザのソースコードに表示されてしまうよ -->
                    {{-- この行はLaravelのコメントアウト記法です。こっちの記法を使用しよう --}}
                    {{-- ??でnull合体演算子により、nullだった場合のmessageを記述 --}}
                    {{$post->created_at}} / {{$post->user->name??'postsテーブルのuser_idカラムがnullの場合にエラーになるのでこの文章を代入します'}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
