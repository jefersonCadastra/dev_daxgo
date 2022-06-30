@extends('layout/layout')
@section('conteudo')
    <section>
        <div class="row mt-5">
            <div class="col-8 offset-2 bg-light border p-4">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        @if ($errors->any())
                            @component('components.alert', ['type' => 'danger'])
                                Há erros de validação, verifique os campos e tente novamente.
                            @endcomponent
                        @endif

                        <form method="POST" action="{{ route('metas.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Meta</label>
                                <select name="nome" id="nome"
                                    class="form-control @error('nome') is-invalid @enderror">
                                    <option value="Faturamento">Faturamento</option>
                                    <option value="Conversao">Conversão</option>
                                    <option value="Ticket Médio">Ticket Médio</option>
                                    <option value="Aprovacao">Aprovação</option>
                                </select>
                                @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta">Mês</label>
                                <select name="mes" id="mes"
                                    class="form-control @error('mes') is-invalid @enderror">
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
                                @error('mes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ano">Ano</label>
                                <select name="ano" id="ano"
                                    class="form-control @error('ano') is-invalid @enderror">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022" selected>2022</option>
                                    <option value="2023">2023</option>
                                </select>
                                @error('ano')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input type="number" class="form-control @error('valor') is-invalid @enderror"
                                    id="valor" name="valor">
                                @error('valor')
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
                            @foreach ($dados as $dado)
                                <tr>
                                    <td>{{ $dado->id }}</td>
                                    <td>{{ $dado->nome }}</td>
                                    <td>{{ $dado->mes }}</td>
                                    <td>{{ $dado->ano }}</td>
                                    <td>{{ $dado->valor }}</td>
                                    <td>
                                        <a href="{{ route('metas.destroy', $dado) }}"
                                            style="color: red; text-decoration: none"
                                            onclick="event.preventDefault(); document.getElementById('remove_item_{{ $dado->id }}').submit();">
                                            Excluir
                                        </a>
                                        <form id="remove_item_{{ $dado->id }}" method="POST"
                                            action="{{ route('metas.destroy', $dado) }}">
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
