<x-app-layout>
    <div class="bg-gray-300 dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg m-4 p-6">
        <h1 class="text-3xl dark:text-white font-bold ml-12">
            {{$post->title}}
        </h1>
        <div
            class="font-semibold sm:text-xl dark:text-white mt-10 p-2 sm:p-6 border-gray-500 border-solid border-2 rounded inline-block">
            {!! str_replace('src="img', 'src="'.asset('storage/img/'), $post->text) !!}
        </div> <!-- TODO: сделать, чтоб при нажатии на изображение, оно открывалось на весь экран -->
        <br>
        <div id="app">
            <like-component :user="{{Auth::user()->id}}" :id="{{$post->id}}"
                            :like_count="{{$post->like_count}}"></like-component>
        </div>
        <!-- TODO: commentaries component, likes, view_count, buttons for editting (for creators) and controllers, models for this -->
    </div>
</x-app-layout>
