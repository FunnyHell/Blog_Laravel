<div
    class="w-full bg-white dark:bg-gray-800 dark:bg-opacity-30 border-b border-gray-200 dark:border-gray-600 p-4 mb-4 rounded-lg">
    <div class="w-1/4">
        <a href="" class="flex">
            @if($comment->post_author)
                <img src="{{asset('img/star.png')}}" class="h-4 mr-3 self-start" alt="">
            @endif
            <div class="flex items-center space-x-4">
                <h1 class="font-semibold dark:text-white text-xl sm:text-2xl">{{$comment->nickname}}</h1>
                <h4 class="text-gray-500 dark:text-gray-400 text-sm self-start">{{$comment->role}}</h4>
            </div>
        </a>
    </div>
    <div class="grid gap-4 grid-cols-8 sm:grid-cols-12">
        <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base col-span-4 sm:col-span-9">{{$comment->text}}</p>

        @if($comment->was_updated)
            <p class="text-gray-800 dark:text-gray-200 text-sm font-bold underline col-span-1">{{__('Updated')}}</p>
        @endif
        <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base col-span-2 sm:col-span-2 col-start-7 sm:col-start-12 text-right">{{$comment->time}}</p>
    </div>
</div>
