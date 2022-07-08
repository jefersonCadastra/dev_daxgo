<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitRequest;
use App\Services\{
    VisitService,
    VisitOriginService
};
use Illuminate\Http\Request;
use App\Utils\LDCalculator;


class VisitDetailController extends Controller
{

    private VisitService $visitService;
    private VisitOriginService $visitOriginService;

    /**
     * Instance of VisitController
     *
     * @param VisitService $visitService
     * @param VisitSerVisitOriginServicevice $visitOriginService
     *
     * @return void
     */
    public function __construct(
        VisitService $visitService,
        VisitOriginService $visitOriginService
    ) {
        $this->visitService = $visitService;
        $this->visitOriginService = $visitOriginService;
    }

    public function index()
    {
    }

    public function distribute(Request $request)
    {
        if (empty($request->input('month')) || empty($request->input('year'))) {
            $data = session('wizard');
            $month = $data['month'];
            $year = $data['year'];
        } else {
            $month = $request->input('month');
            $year = $request->input('year');
        }

        $data = session('wizard');
        $invoicing = $data['value'];
        $approval = $data['aprovacao'];
        $ticket = $data['ticket'];
        $conversion = $data['meta'];

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
    }
}
