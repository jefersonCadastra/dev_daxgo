<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaxGo</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav>
        <div class="container g-0">

            <div class="row">
                <div class="col-12">
                    <h2>DaxGo</h2>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('conteudo')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
