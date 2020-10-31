<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="Matej Mozola">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Admin |
        {{ env('APP_NAME') }}
    </title>

    <link rel="shortcut icon" href="{{ asset('img/admin-favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('css/admin.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')

</head>
<body>

<div id="wrapper">

    @include('admin._partials._topbar')
    @include('admin._partials._menu')

    <div class="content-page">

        @yield('content')
        @include('admin._partials._footer')

    </div>
    @include('admin._partials._delete_modal')
</div>

<!-- SCRIPTS -->
<script src="{{ asset('js/admin.min.js') }}" type="text/javascript"></script>
@yield('js')

<script>
    $(document).ready(function () {
        if($(".tinymce").length > 0){
            tinymce.init({
                selector: "textarea.tinymce",
                theme: "modern",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        }
    });
</script>

</body>
</html>