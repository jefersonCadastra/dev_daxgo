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

    public function step1(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        return view('painel.wizard.step-1');
    }

    public function step2(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        return view('painel.wizard.step-2');
    }

    public function step3(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        return view('painel.wizard.step-3');
    }

    public function step4(Request $request)
    {
        if ($request->isMethod('POST')) {
            dd($request->all());
            $this->wizardService->putDataInSession($request->all());
        }

        return view('painel.wizard.step-4');
    }

    public function step5(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        return view('painel.wizard.step-5');
    }

    public function finish(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        $this->wizardService->storeFromSession();

        return redirect()->route('home');
    }

    public function distribute(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $visitData = $this->visitService->findVisit($month, $year);
        $visitOriginData = $this->visitOriginService->getVisitOrigins('N');
        $visitOriginPaidData = $this->visitOriginService->getVisitOrigins('S');

        return view('painel.visitDetail.distribute', compact('visitData', 'visitOriginData', 'visitOriginPaidData'));
    }
}
