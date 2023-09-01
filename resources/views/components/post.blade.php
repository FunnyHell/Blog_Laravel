<div class="bg-gray-300 dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg m-4 p-2">
    <a href="{{route('posts.show', $post->slug)}}">
        <div class="grid gap-6 grid-cols-7 sm:grid-cols-12">
            <h1 class="text-gray-900 dark:text-white col-span-5 sm:col-span-3 font-semibold sm:text-xl">
                {{$post->title}}
            </h1>
            <h1 class="text-gray-900 dark:text-white col-span-2 sm:col-span-2 font-semibold sm:text-xl">
                {{__('Access level')}}: {{$post->level}}
            </h1>
            <h1 class="text-gray-900 dark:text-white col-span-2 sm:col-span-2 font-semibold sm:text-xl">
                {{__('Likes')}}: {{$post->like_count}}
            </h1>
            <h1 class="text-gray-900 dark:text-white col-span-2 sm:col-span-2 font-semibold sm:text-xl">
                {{__('Views')}}: {{$post->view_count}}
            </h1>
            <h1 class="text-gray-900 dark:text-white col-span-3 sm:col-span-3 font-semibold sm:text-xl">
                {{__('Comments')}}: {{$post->comment_count}}
            </h1>
        </div>
    </a>
    <div class="grid gap-6 grid-cols-2 sm:grid-cols-8 mt-8">
        @if(!$post->is_published)
            <form action="{{route('posts.publish')}}" method="POST" class="col-span-1">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="submit" value="{{__('Publish')}}"
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            </form>
        @else
            <form action="{{route('posts.unpublish')}}" method="POST" class="col-span-1">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="submit" value="{{__('Unpublish')}}"
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            </form>
        @endif
        @if($post->is_deleted)
            <form action="{{route('posts.restore')}}" method="POST" class="ml-4">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="submit" value="{{__('Restore')}}"
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            </form>
        @else
            <form action="{{route('posts.delete')}}" method="POST" class="ml-4">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="submit" value="{{__('Delete')}}"
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            </form>
        @endif
    </div>
</div>
