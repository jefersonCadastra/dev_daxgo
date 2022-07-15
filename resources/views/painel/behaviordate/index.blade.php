@extends('layouts.app')

@section('content')
<section>
  <div class="row mt-5">
    <div class="col-8 offset-2 bg-light border p-4">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <form method="POST" action="{{ route('dates.store') }}">
            @csrf
            <div class="form-group">
              <label for="type">Comportamento</label>
              <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                <option value="F">Feriado</option>
                <option value="S">Sem Faturamento</option>
              </select>
              @error('type')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="date">Data</label>
              <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" />
              @error('date')
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
              <th>Data</th>
              <th>Comportamento</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dates as $date)
            <tr>
              <td>{{ $date->date }}</td>
              <td>{{ $date->type }}</td>
              <td>
                <a href="{{ route('dates.destroy',$date) }}" style="color: red; text-decoration: none" onclick="event.preventDefault(); document.getElementById('remove-item-{{$date->id }}-form').submit();">
                  Excluir
                </a>
                <form id="remove-item-{{$date->id }}-form" method="POST" action="{{ route('dates.destroy',$date) }}">
                  @csrf
                  @method('DELETE')
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between">
        <a class="btn btn-outline-warning rounded-pill text-uppercase me-auto" href="{{ route('wizard.step.5', ['step' => 5]) }}">
          Voltar
        </a>
        <a class="btn btn-outline-warning rounded-pill text-uppercase me-auto" href="{{ route('visitsdetail.finish') }}">
          Finalizar
        </a>
      </div>
    </div>
  </div>
</section>
@endsection