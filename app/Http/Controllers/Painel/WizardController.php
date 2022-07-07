<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Services\WizardService;
use Illuminate\Http\Request;

class WizardController extends Controller
{
    private $wizardService;

    public function __construct(WizardService $wizardService)
    {
        $this->wizardService = $wizardService;
    }

    public function step(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        return view('painel.wizard.step-' . $request->step);
    }

    public function finish()
    {
        $this->wizardService->storeFromSession();

        return redirect()->route('home');
    }
}
