<div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
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
    <textarea id="summernote" name="summernote" class="form-control"></textarea>

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
