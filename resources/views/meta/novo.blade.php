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
        .form-group{
            margin-top: 20px;
        }
    </style>

</head>
<body>
<nav>
    <div class="container g-0">

        <div class="row">
            <div class="col-12">
                <h2>Cadastro de metas</h2>
            </div>
        </div>
    </div>
</nav>

<div class="row" style="margin-top: 30px;">
    
    <div class="col-4">

    </div>  

    <div class="col-4">
        <form method="POST" action="insert">
            <div class="form-group" >
                <label for="nome">Meta</label>
                <select name="nome" id="nome"  class="form-control">
                    <option value="faturamento">Faturamento</option>
                    <option value="conversao">Conversão</option>
                    <option value="ticket">Ticket Médio</option>
                    <option value="aprovacao">Aprovação</option>
                </select>
            </div>

            <div class="form-group" >
                <label for="meta">Mês</label>
                <select name="mes" id="mes"  class="form-control">
                    <option value="1">JAN</option>
                    <option value="2">FEV</option>
                    <option value="3">MAR</option>
                    <option value="4">ABR</option>
                    <option value="5">MAI</option>
                    <option value="6">JUN</option>
                    <option value="7">JUL</option>
                    <option value="8">AGO</option>
                    <option value="9">SET</option>
                    <option value="10">OUT</option>
                    <option value="11">NOV</option>
                    <option value="12">DEZ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ano">Ano</label>
                <select name="ano" id="ano" class="form-control">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022" selected>2022</option>
                    <option value="2023">2023</option>
                    
                </select>
            </div>

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

            
        </form>
    </div>

    <div class="col-4">
      
    </div>

   
</div>

<br>
<br>

<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Meta</th>
                <th>Mês</th>
                <th>Ano</th>
                <th>Valor</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dados as $dado)
            <tr>
            <td>{{ $dado->id }}</td>
            <td>{{ $dado->nome }}</td>
            <td>{{ $dado->mes }}</td>
            <td>{{ $dado->ano }}</td>
            <td>{{ $dado->valor }}</td>
            <td>
                <a href="/meta/delete/{{ $dado->id}}" style="color: red; text-decoration: none">
                    Excluir
                </a>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-2"></div>


</div>



</body>
</html>