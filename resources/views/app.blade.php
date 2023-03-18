<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="/images/logo.png" sizes="16x16">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>

    @inertiaHead
</head>

<body class="bg-bgall">
    <div class=" overflow-x-hidden overflow-y-auto">
        @inertia
    </div>
</body>

</html>