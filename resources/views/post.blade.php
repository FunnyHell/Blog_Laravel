<x-app-layout>
    <div id="app">
        <div class="bg-gray-300 dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg m-4 p-6">
            <h1 class="text-3xl dark:text-white font-bold ml-12">
                {{$post->title}}
            </h1>
            <div
                class="font-semibold sm:text-xl dark:text-white mt-10 p-2 sm:p-6 border-gray-500 border-solid border-2 rounded inline-block">
                {!! str_replace('src="img', 'src="'.asset('storage/img/'), $post->text) !!}
            </div> <!-- TODO: сделать, чтоб при нажатии на изображение, оно открывалось на весь экран -->

            <br>

            <div class="flex justify-between mt-3 p-3 items-center sm:w-1/2">

                <like-component :user="{{Auth::user()->id}}" :id="{{$post->id}}"
                                :like_count="{{$post->like_count}}"></like-component>

                <a href="#comments-block">
                    <div class="flex items-center">
                        <img src="{{asset('img/comment.png')}}" class="h-8 mr-3" alt="">
                        <h2 class="dark:text-white">{{$post->comment_count}}</h2>
                    </div>
                </a>
                <div class="flex items-center">
                    <img src="{{asset('img/views.png')}}" class="h-8 mr-3" alt="">
                    <h2 class="dark:text-white">{{$post->view_count}}</h2>
                </div>
            </div>

            <div id="comments-block">
                <commentaries-component :user_id="{{Auth::user()->id}}"
                                        :post_id="{{$post->id}}"></commentaries-component>
            </div>
            <!-- TODO: buttons for editting (for creators) and controllers, models for this -->
        </div>
    </div>
</x-app-layout>
