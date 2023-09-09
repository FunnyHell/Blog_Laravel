<div>
    @if($comments)
        @foreach($comments as $comment)
            @if(!$comment->reply_id)
                <div
                    class="w-full bg-white dark:bg-gray-800 dark:bg-opacity-30 border-b border-gray-200 dark:border-gray-600 p-4 mb-8 rounded-lg">
{{--                    <x-commentary :comment="$comment"/>--}}
                    <commentary-component :comment="$comment" :user_id="{{Auth::user()->id}}"/>
                </div>
            @else
{{--                <div class="flex">--}}
{{--                    <div class="border-l-2 min-h-full mb-8 mr-8"></div>--}}
{{--                    <div--}}
{{--                        class="w-full bg-white dark:bg-gray-800 dark:bg-opacity-30 border-b border-gray-200 dark:border-gray-600 p-4 mb-8 rounded-lg">--}}
{{--                        <x-commentary :comment="$comment"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endif
        @endforeach
    @endif
</div>
