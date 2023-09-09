<div id="{{$comment->id}}">
    <div class="grid grid-cols-6 sm:grid-cols-12 mb-4">
        <div class="w-full col-span-5">
            <a href="" class="flex">
                @if($comment->post_author)
                    <img src="{{asset('img/star.png')}}" class="h-4 mr-3 self-start" alt="">
                @endif
                <div class="flex flex-col sm:flex-row items-center sm:space-x-4">
                    <div class="flex space-x-2">
                        <img src="{{asset($comment->profile_photo_path)}}" class="h-8 rounded" alt="">
                        <h1 class="font-semibold dark:text-white text-xl sm:text-2xl break-all">{{$comment->nickname}}</h1>
                    </div>
                    <h4 class="text-gray-500 dark:text-gray-400 text-sm self-start">{{$comment->role}}</h4>
                </div>
            </a>
        </div>

        @if($comment->was_updated)
            <p class="text-gray-800 dark:text-gray-200 text-sm font-bold underline row-start-2 sm:row-start-1 sm:col-start-11">
                {{__('Updated')}}
            </p>
            <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base text-right sm:col-start-12 row-start-2 sm:row-start-1 col-span-2 col-start-5">
                {{$comment->time}}
            </p>
        @else
            <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base text-right sm:col-start-12 col-span-1 col-start-6">{{$comment->time}}</p>
        @endif
    </div>

    <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base break-all">{{$comment->text}}</p>
    @if($comment->reply_id)
        <h4 class="text-gray-500 dark:text-gray-400 text-sm self-start">
            <a href="#{{$comment->reply_id}}">{{__('Go to commentary')}}</a>
        </h4>
    @endif
    <br>
</div>
