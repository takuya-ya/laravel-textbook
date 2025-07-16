<!-- When there is no desire, all things are at peace. - Laozi -->
@props(['message'])
@if ($message)
    <div class="p-4 m-2 rounded bg-green-100">
        {{$message}}
    </div>
@endif