<x-app-layout>
    <!-- ここが{{ $header }} にはいる-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- 以下が{{ $slot }}に入る　 -->
     <div>
        <form>
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <!-- todo p189 -->
        </form>
     </div>
   
</x-app-layout>
