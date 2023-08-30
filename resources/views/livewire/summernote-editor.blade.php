<div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <style>
        /*.note-toolbar {*/
        /*    background-color: #2d3748;*/
        /*}*/
        /*.note-btn {*/
        /*    background-color: #6b7280;*/
        /*}*/
    </style>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-16">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-4">
            <form id="summernote-form" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea id="summernote" name="summernote" class="form-control"></textarea>
                <div style="display: flex; justify-content: flex-end">
                    <button type="submit"
                            class="relative inline-flex item-center justify-center rounded-md p-2 hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-5 mb-2">{{__('Save')}}</button>
                    <button type="reset"
                            class="relative inline-flex item-center justify-center rounded-md p-2 hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-2 mb-2"
                            id="clear">{{__('Clear')}}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                disableDragAndDrop: true,
                tabsize: 2,
                height: 350,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ]
            });
        })
        $('#clear').click(function () {
            $('#summernote').summernote('reset');
        });
    </script>

</div>
