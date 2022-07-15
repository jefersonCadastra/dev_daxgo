<?php

namespace App\Services;

class WizardService
{
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
        $data = session()->pull('wizard');

        // Chamar os services que irão persistir os dados

        dd($data);
    }
}
