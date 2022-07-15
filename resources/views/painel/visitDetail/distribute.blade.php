@extends('layouts.app')

@section('content')
<style>
  .numVisitas {
    font-size: 14pt;
    font-weight: bold;
    color: orange;
  }

  body {
    overflow: scroll;
  }

  #paid_origins input {
    width: 90% !important;
  }
</style>

<script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>

<script>

</script>

<section>
  <div class="row mt-5">
    <div class="col-8 offset-2 bg-light border p-4">
      <div class="row">
        <div class="col-12">
          <h3>Planejamento de Visitas</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h4>
            {{ $month }}
            {{ $year }}
          </h4>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          Você precisa de <span class="numVisitas">{{ $quantity }}</span> visitas <br>
          Você já planejou<span class="numVisitas">0 </span> visitas <br>
          Seu saldo atual é de <span class="numVisitas">0 </span> visitas
        </div>
      </div>

      <div class="row border-top mt-3 pt-5">
        <div class="col-12">
          <div class="row">
            <form method="post" action="{{ route('wizard.step', ['step' => 4]) }}">
              <input type="hidden" name='visits' value='{{ $quantity }}'>
              <div class="col-6">
                Visitas Orgânicas <span class="numVisitas">0</span>

                <div class="row">
                  <div class="col-3">

                  </div>
                  <div class="col-3 text-center">
                    (U)
                  </div>
                </div>

                <div class="row">
                  <div class="col-12" id='no_paid_origins'>
                    @foreach ($visitOriginData as $visitOrigin)

                    <div class="row mt-2">
                      <div class="col-3">
                        {{$visitOrigin->title}}
                      </div>
                      <div class="col-3 text-center">
                        <input name='noPaidVisit_{{$visitOrigin->id}}' id='noPaidVisit_{{$visitOrigin->id}}' type="number" style="width: 120px;" />
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

              </div>

              <div class="col-12  border-top mt-3">

                Visitas Pagas <span class="numVisitas">0</span>

                <div class="row">
                  <div class="col-2">

                  </div>

                  <div class="col-2 text-center">
                    Visitas
                  </div>

                  <div class="col-2 text-center">
                    Conect Rate
                  </div>

                  <div class="col-2 text-center">
                    Cliques
                  </div>

                  <div class="col-2 text-center">
                    CPC
                  </div>

                  <div class="col-2 text-center">
                    Investimento
                  </div>
                </div>

                <div class="row">
                  <div class="col-12" id='paid_origins'>
                    @foreach ($visitOriginPaidData as $visitOrigin)

                    <div class="row mt-2">
                      <div class="col-2">
                        {{$visitOrigin->title}}
                      </div>

                      <div class="col-2 text-center">
                        <input name='paidVisit_{{$visitOrigin->id}}' id='paidVisit_{{$visitOrigin->id}}' type="number" />
                      </div>

                      <div class="col-2">
                        <input type="number" />
                      </div>

                      <div class="col-2">
                        <input type="number" />
                      </div>

                      <div class="col-2 text-center">
                        <input name='paidVisitCpc_{{$visitOrigin->id}}' id='paidVisitCpc_{{$visitOrigin->id}}' type="number" />
                      </div>

                      <div class="col-2 text-center">
                        <input type="number" />
                      </div>

                    </div>

                    @endforeach
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning rounded-pill text-uppercase ms-auto">Avançar</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>



      <div class="row mt-3 border-top pt-5">
        <div class="col-6">
          <button type="submit" class="btn btn-warning" id='btn_add_other_no_paid'>Add Organica</button>
          <input type="text" id='title_other_no_paid' />
        </div>

        <div class="col-6">
          <button type="submit" class="btn btn-warning" id='btn_add_other_paid'>Add Paga</button>
          <input type="text" id='title_other_paid' />
        </div>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <a class="btn btn-outline-warning rounded-pill text-uppercase me-auto" href="{{ route('wizard.step', ['step' => 2]) }}">
          Voltar
        </a>
        <!-- <a class="btn btn-outline-warning rounded-pill text-uppercase ms-auto" href="{{ route('wizard.step', ['step' => 4]) }}">
          Avançar
        </a> -->
      </div>

    </div>


</section>

<script type="text/javascript">
  async function saveOrigin(title, paid) {

    const URL = '/visitorigin/store'

    const data = {
      "title": title,
      "paid": paid
    };

    try {
      let res = await fetch(URL, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').attributes.content.value
        },
        body: JSON.stringify(data)

      });
      return await res.json();
    } catch (error) {
      console.log(error);
    }
  }

  async function createVisitOrigin(title, paid, target) {

    const result = await saveOrigin(title, paid);
    console.log(result);
    let newHtml = '';

    if (paid === 'N') {
      newHtml = `<div class="row mt-2">
                    <div class="col-3">
                    ${title}
                    </div>
                    <div class="col-3 text-center">
                      <input name='noPaidVisit_${result.newOrigin}' id='noPaidVisit_${result.newOrigin}' type="number" style="width: 120px;" />
                    </div>
                  </div>`;
    }

    if (paid === 'S') {
      newHtml = `  <div class="row mt-2">
                      <div class="col-2">
                      ${title}
                      </div>

                      <div class="col-2 text-center">
                        <input name="paidVisit_${result.newOrigin}" id="paidVisit_${result.newOrigin}" type="number" style="width: 120px;" />
                      </div>

                      <div class="col-2">
                        <input type="number" />
                      </div>

                      <div class="col-2">
                        <input type="number" />
                      </div>

                      <div class="col-2 text-center">
                        <input name="paidVisitCpc_${result.newOrigin}" id="paidVisitCpc_${result.newOrigin}" type="number" style="width: 120px;" />
                      </div>

                      <div class="col-2 text-center">
                        <input type="number" />
                      </div>

                    </div>`;
    }

    let container = document.getElementById(target);
    let html = container.innerHTML;
    html += newHtml;
    container.innerHTML = html;

  }

  const btnOtherNoPaid = document.getElementById('btn_add_other_no_paid');
  btnOtherNoPaid.addEventListener('click', function() {

    const title_other_no_paid = document.getElementById('title_other_no_paid').value;

    if (confirm('Add?')) {
      createVisitOrigin(title_other_no_paid, 'N', 'no_paid_origins')
    }
  })

  const btnOtherPaid = document.getElementById('btn_add_other_paid');
  btnOtherPaid.addEventListener('click', function() {

    const title_other_paid = document.getElementById('title_other_paid').value;

    if (confirm('Add?')) {
      createVisitOrigin(title_other_paid, 'S', 'paid_origins')
    }
  })
</script>

@endsection