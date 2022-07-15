<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Services\{
    WizardService,
    visitOriginService,
    behaviorDateService
};
use Illuminate\Http\Request;
use App\Utils\LDCalculator;

class WizardController extends Controller
{
    private WizardService $wizardService;
    private VisitOriginService $visitOriginService;
    private BehaviorDateService $behaviorDateService;

    public function __construct(WizardService $wizardService, VisitOriginService $visitOriginService, BehaviorDateService $behaviorDateService)
    {
        $this->wizardService = $wizardService;
        $this->visitOriginService = $visitOriginService;
        $this->behaviorDateService = $behaviorDateService;
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

        if (empty($request->input('month')) || empty($request->input('year'))) {
            $data = session('wizard');
            $month = $data['month'];
            $year = $data['year'];
        } else {
            $month = $request->input('month');
            $year = $request->input('year');
        }

        $data = session('wizard');
        $invoicing = $data['invoicing'];
        $approval = $data['approval'];
        $ticket = $data['ticket'];
        $conversion = $data['conversion'];

        $quantity = LDCalculator::calcTotalVisit($invoicing, $approval, $ticket, $conversion);

        $visitOriginData = $this->visitOriginService->getVisitOrigins('N');
        $visitOriginPaidData = $this->visitOriginService->getVisitOrigins('S');

        return view(
            'painel.visitDetail.distribute',
            compact(
                'visitOriginData',
                'visitOriginPaidData',
                'month',
                'year',
                'quantity'
            )
        );

        return view('painel.wizard.step-3');
    }

    public function step4(Request $request)
    {
        if ($request->isMethod('POST')) {
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

    public function step6(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        $dates = $this->behaviorDateService->all();
        return view('painel.wizard.step-6',  compact('dates'));
    }

    public function finish(Request $request)
    {
        if ($request->isMethod('POST'))
            $this->wizardService->putDataInSession($request->all());

        $this->wizardService->storeFromSession();

        dd(session('wizard'));
        return redirect()->route('dailygoals');
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
