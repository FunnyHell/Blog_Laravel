<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-4">
    <form id="summernote-form" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-6 p-4 grid-cols-5 sm:grid-cols-8">
            <input type="text" id="title"
                   class="col-span-5 bg-gray-50 border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                   name="title" placeholder="{{__('title')}}" required>
            <label for="body"
                   class="col-span-3 sm:col-span-2 mb-2 text-xl font-medium text-gray-900 dark:text-gray-300">{{__('Select access level')}}
                :</label>
            <select
                name="level[]"
                class="col-span-2 sm:col-span-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($levels as $level)
                    <option value="{{$level->access_to_posts_level}}">{{$level->access_to_posts_level}}</option>
                @endforeach
            </select>
        </div>
        @livewire('summernote-editor')

        <div style="display: flex; justify-content: flex-end">
            <button type="submit"
                    class="relative inline-flex item-center justify-center rounded-md p-2 hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-5 mb-2">{{__('Save')}}</button>
            <button type="reset"
                    class="relative inline-flex item-center justify-center rounded-md p-2 hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-2 mb-2"
                    id="clear">{{__('Clear')}}</button>
        </div>
    </form>
</div>
