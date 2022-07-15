<?php

namespace App\Services;

use App\Models\{
    Goal,
    Visit,
    VisitDetail
};

class WizardService
{

    private Goal $modelGoal;
    private Visit $modelVisit;
    private VisitDetail $modelVisitDetail;

    public function __construct(Goal $modelGoal, Visit $modelVisit, VisitDetail $modelVisitDetail)
    {
        $this->modelGoal = $modelGoal;
        $this->modelVisit = $modelVisit;
        $this->modelVisitDetail = $modelVisitDetail;
    }

    /**
     * Put data request in session "wizard"
     *
     * @param array $dataRequest
     * @return void
     */
    public function putDataInSession(array $dataRequest)
    {
        unset($dataRequest['_token']);

        if (count($dataRequest) > 0) {
            foreach ($dataRequest as $key => $value) {
                session()->put("wizard.{$key}", $value);
            }
        }
    }

    /**
     * Store data from session "wizard"
     *
     * @return void
     */
    public function storeFromSession()
    {
        // Retorna os dados e deleta a sessão
        //$dataSession = session()->pull('wizard');
        $dataSession = session('wizard');

        //Invoicing Goal Create
        $data = [];
        $data['title'] = 'invoicing';
        $data['month'] = $dataSession['month'];
        $data['year'] = $dataSession['year'];
        $data['value'] = $dataSession['invoicing'];
        $this->modelGoal->create($data);

        // //Approval Goal Create
        $data = [];
        $data['title'] = 'approval';
        $data['month'] = $dataSession['month'];
        $data['year'] = $dataSession['year'];
        $data['value'] = $dataSession['approval'];
        $this->modelGoal->create($data);

        // //Ticket Goal Create
        $data = [];
        $data['title'] = 'ticket';
        $data['month'] = $dataSession['month'];
        $data['year'] = $dataSession['year'];
        $data['value'] = $dataSession['ticket'];
        $this->modelGoal->create($data);

        // //Conversion Goal Create
        $data = [];
        $data['title'] = 'conversion';
        $data['month'] = $dataSession['month'];
        $data['year'] = $dataSession['year'];
        $data['value'] = $dataSession['conversion'];
        $this->modelGoal->create($data);

        //Visits Create
        $data = [];
        $data['quantity'] = $dataSession['visits'];
        $data['month'] = $dataSession['month'];
        $data['year'] = $dataSession['year'];
        $createdVisit = $this->modelVisit->create($data);
        $idVisit = $createdVisit->id;

        foreach ($dataSession as $key => $value) {

            if (strpos($key, 'noPaidVisit_') !== false) {
                $idVisitOrigin = explode('noPaidVisit_', $key);
                $idVisitOrigin = $idVisitOrigin[1];
                $qntVisitOrigin = $value;

                if (empty($value))
                    continue;

                //Visit Detail Create
                $data = [];
                $data['visit_id'] = $idVisit;
                $data['quantity'] = $qntVisitOrigin;
                $data['origin'] = $idVisitOrigin;

                $this->modelVisitDetail->create($data);
            }

            if (strpos($key, 'paidVisit_') !== false) {
                $idVisitOrigin = explode('paidVisit_', $key);
                $idVisitOrigin = $idVisitOrigin[1];
                $qntVisitOrigin = $value;
                $cpcVisitOrigin = $dataSession["paidVisitCpc_" . $idVisitOrigin];

                if (empty($value))
                    continue;

                //Visit Detail Create
                $data = [];
                $data['visit_id'] = $idVisit;
                $data['quantity'] = $qntVisitOrigin;
                $data['origin'] = $idVisitOrigin;
                $data['cpc'] = $cpcVisitOrigin;
                $this->modelVisitDetail->create($data);
            }
        }

        // Chamar os services que irão persistir os dados
        //$dataSession = session()->forget('wizard');

        dd($dataSession);
    }
}
