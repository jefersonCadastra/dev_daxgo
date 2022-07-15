<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DailyGoalsService;

class DailyGoalsController extends Controller
{
    private DailyGoalsService $dailyGoalsService;

    /**
     * Instance of DailyGoalsController
     *
     * @param DailyGoalsService $dailyGoalsService
     *
     * @return void
     */
    public function __construct(DailyGoalsService $dailyGoalsService)
    {
        $this->dailyGoalsService = $dailyGoalsService;
    }

    public function index()
    {
        $dataSession = session('wizard');
        $month = $dataSession['month'];
        $year = $dataSession['year'];

        $this->dailyGoalsService->dailyData($month, $year);

        dd($dataSession);
        return view('painel.dailygoals.index', compact('goals'));
    }
}
