<x-app-layout>
    <div class="sm:flex items-start">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg sm:w-1/6 ml-2 mr-2">
            <button
                class="w-full flex justify-center cursor-pointer border-solid border-b-2 border-gray-800 hover:border-gray-600"
                id="new-post-button">
                <h2 class="font-medium text-xl text-gray-800 dark:text-gray-200 m-4">
                    {{__('Add new post')}}
                </h2>
            </button>
            <button
                class="w-full flex justify-center cursor-pointer border-solid border-b-2 border-gray-800 hover:border-gray-600"
                id="watch-all-posts-button">
                <h2 class="font-medium text-xl text-gray-800 dark:text-gray-200 m-4">
                    {{__('Watch all posts')}}
                </h2>
            </button>
            <button
                class="w-full flex justify-center cursor-pointer border-solid border-b-2 border-gray-800 hover:border-gray-600"
                id="watch-new-comments-button">
                <h2 class="font-medium text-xl text-gray-800 dark:text-gray-200 m-4">
                    {{__('New comments')}}
                </h2>
            </button>
        </div>

        <div id="new-post-block"
             class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg sm:w-10/12 ml-2 mr-2 mt-16 sm:mt-0"
             style="display: none;">
                        @livewire('new-post')
        </div>
        <div id="posts-block"
             class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg sm:w-10/12 ml-2 mr-2 mt-16 sm:mt-0"
{{--             style="display: none;">--}}>
                        @livewire('posts')
        </div>
        <div id="comments-block"
             class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg sm:w-10/12 ml-2 mr-2 mt-16 sm:mt-0"
             style="display: none;">
                        @livewire('comments')
        </div>

{{--        <div id="default-block"--}}
{{--             class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg sm:w-10/12 ml-2 mr-2 mt-16 sm:mt-0">--}}
{{--            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 m-4">{{__('Hello, ')}} {{ Auth::user()->first_name }} {{Auth::user()->second_name}}</h1>--}}
{{--        </div>--}}
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = [
            { button: document.getElementById("new-post-button"), block: document.getElementById("new-post-block") },
            { button: document.getElementById("watch-all-posts-button"), block: document.getElementById("posts-block") },
            { button: document.getElementById("watch-new-comments-button"), block: document.getElementById("comments-block") },
            { button: null, block: document.getElementById("default-block") },
        ];

        function showBlock(block) {
            buttons.forEach((element) => {
                element.block.style.display = element.block === block ? "block" : "none";
            })
        }

        buttons.forEach(item => {
            item.button.addEventListener("click", () => {
                showBlock(item.block);
            })
        })
    });
</script>
