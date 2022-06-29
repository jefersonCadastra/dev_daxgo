<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaxGo</title>

    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-group {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="container g-0">

            <div class="row">
                <div class="col-12">
                    <h2>Login</h2>
                </div>
            </div>
        </div>
    </nav>

    <session>
        @yield('conteudo')
    </session>
</body>

</html>