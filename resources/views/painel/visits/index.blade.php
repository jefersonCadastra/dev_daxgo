@extends('layouts.app')

@section('content')
<section>
    <div class="row mt-5">
        <div class="col-8 offset-2 bg-light border p-4">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form method="POST" action="{{ route('visits.store') }}">
                        @csrf
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
                            <label for="quantity">Quantidade</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity">
                            @error('quantity')
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
                            <th>Mês</th>
                            <th>Ano</th>
                            <th>Quantidade</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                        <tr>
                            <td>{{ $visit->id }}</td>
                            <td>{{ $visit->month }}</td>
                            <td>{{ $visit->year }}</td>
                            <td>{{ $visit->quantity }}</td>
                            <td>
                                <a href="{{ route('visitsdetail.distribute',['month' => $visit->month, 'year' => $visit->year]) }}" style="color: green; text-decoration: none" onclick="event.preventDefault(); document.getElementById('remove-item-{{ $visit->id }}-form').submit();">
                                    Distribuir
                                </a>
                                <a href="{{ route('visits.destroy', $visit) }}" style="color: red; text-decoration: none; margin-left: 40px;" onclick="event.preventDefault(); document.getElementById('remove-item-{{ $visit->id }}-form').submit();">
                                    Excluir
                                </a>
                                <form id="remove-item-{{ $visit->id }}-form" method="POST" action="{{ route('visits.destroy', $visit) }}">
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