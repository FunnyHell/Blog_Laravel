<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-4">
    @foreach($posts as $post)
        <x-post :post="$post"/>
    @endforeach
</div>
