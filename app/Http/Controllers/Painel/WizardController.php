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

        if ($request->step == 3)
            return redirect()->route('visitsdetail.distribute');

        return view('painel.wizard.step-' . $request->step);
    }

    public function finish()
    {
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
