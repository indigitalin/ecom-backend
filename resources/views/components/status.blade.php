<div class="{{$type == 'success' ? 'bg-green-500':'bg-red-500'}} text-center text-white py-1 px-3 w-auto shadow-lg" x-data="{ {{$notifyer}} : false, message: '' }" x-show="{{$notifyer}}" x-on:{{$identifier}}.window="{{$notifyer}} = true; message = $event.detail.message; setTimeout(() => {{$notifyer}} = false, 2000);" x-transition.duration.800ms>
    <p x-text="message"></p>
</div>