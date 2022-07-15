@extends('layouts.app')

@section('content')
<section>
    <div class="row mt-5">
        <div class="col-8 offset-2 bg-light border p-4">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form method="POST" action="{{ route('goals.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Meta</label>
                            <select name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                                <option value="Faturamento">Faturamento</option>
                                <option value="Conversao">Conversão</option>
                                <option value="Ticket Médio">Ticket Médio</option>
                                <option value="Aprovacao">Aprovação</option>
                            </select>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="month">Mês</label>
                            <select name="month" id="month" class="form-control @error('month') is-invalid @enderror">
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
                            @error('month')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year">Ano</label>
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022" selected>2022</option>
                                <option value="2023">2023</option>
                            </select>
                            @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="number" class="form-control @error('value') is-invalid @enderror" id="value" name="value">
                            @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-8 offset-2">
            <div class="row table-responsive">
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
                        @foreach ($goals as $goal)
                        <tr>
                            <td>{{ $goal->id }}</td>
                            <td>{{ $goal->title }}</td>
                            <td>{{ $goal->month }}</td>
                            <td>{{ $goal->year }}</td>
                            <td>{{ $goal->value }}</td>
                            <td>
                                <a href="{{ route('goals.destroy', $goal) }}" style="color: red; text-decoration: none" onclick="event.preventDefault(); document.getElementById('remove-item-{{ $goal->id }}-form').submit();">
                                    Excluir
                                </a>
                                <form id="remove-item-{{ $goal->id }}-form" method="POST" action="{{ route('goals.destroy', $goal) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection