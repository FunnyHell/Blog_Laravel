<x-app-layout>
    <div
        class="grid md:grid-cols-3 grid-cols-2 gap-3 dark:text-white m-5 md:m-0">
        <div
            class="col-span-3 ml-auto mr-auto mb-4 mt-2 text-2xl border-solid border-b-2 rounded-md dark:border-gray-500 border-neutral-800 p-2 hover:p-4 hover:text-3xl hover:duration-100">{{__('This is a small work by Sergey Omelianenko')}}
        </div>

        <div class="grid col-span-3 md:grid-cols-2 grid-cols-1 mt-12">
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">
                {{__('It was made for learning Jetstream, Livewire, Tailwind and upgrade skills in Laravel, HTML, CSS, JS, etc.')}}
            </div>
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">
                {{__('At this work you can find: Blog functionality, CRUD, messages, social networks functionality')}}
            </div>

        </div>
        <div class="grid col-span-3 md:grid-cols-3 grid-cols-2 mt-12">
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">{{__('It all will work on Laravel Jetstream with Livewire, Vue.JS frontend frameworks')}}</div>
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300 auto-cols-auto">{{__('For CSS used Tailwind and some Bootstrap')}}</div>
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">{{__('It also has small frameworks like Summernote for WYSIWYG')}}</div>
        </div>

        <div class="grid col-span-3 md:grid-cols-3 grid-cols-2 mt-12">
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">{{__('Backend made by Laravel')}}</div>
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">{{__('Database made by MySQL 8.1')}}</div>
            <div
                class="border-b-2 rounded-md dark:border-gray-800 border-neutral-800 p-2 m-2 hover:text-lg hover:duration-300">{{__('This page can be update')}}</div>
        </div>
        <div class="col-start-3 mt-16">
            <a href="https://github.com/FunnyHell/"
               class="hover:bg-blue-200 hover:dark:bg-gray-500 hover:p-2 rounded hover:duration-75 hover:text-lg">{{__('More work on git')}}</a>
        </div>
    </div>
</x-app-layout>
