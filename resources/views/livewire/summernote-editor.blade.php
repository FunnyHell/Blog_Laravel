<div>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        html {
            font-size: 16px;
        }
    </style>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <form id="summernote-form" action="{{route('test')}}" method="post" enctype="multipart/form-data">
                @csrf
                <textarea id="summernote" name="summernote" class="form-control"></textarea>
                <div style="display: flex; justify-content: flex-end">
                    <button type="submit"
                            class="relative inline-flex item-center justify-center rounded-md p-2 text-gray-200 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-5 mb-2">{{__('Save')}}</button>
                    <button type="reset"
                            class="relative inline-flex item-center justify-center rounded-md p-2 text-gray-200 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-2 mb-2"
                            id="clear">{{__('Clear')}}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                disableDragAndDrop: true,
                placeholder: 'Hello, user',
                tabsize: 2,
                height: 250
            });
        })
        $('#clear').click(function () {
            $('#summernote').summernote('reset');
        });
    </script>

</div>
