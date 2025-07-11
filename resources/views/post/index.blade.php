<x-app-layout>
    <!-- ここが$header にはいる-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto px-6">
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                {{$post->title}}
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$post->body}}
            </p>
            <div class="p-4 text-sm font-semibold">
                <p>
                    <!-- 注：この記法はHTMLコメントの為、ブラウザのソースコードに表示されてしまうよ -->
                    {{-- この行はLaravelのコメントアウト記法です。こっちの記法を使用しよう --}}
                    {{-- ??でnull合体演算子により、nullだった場合のmessageを記述 --}}
                    {{$post->created_at}} / {{$post->user->name??'postsテーブルにuser_idカラムが無かった時の投稿だよ'}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>