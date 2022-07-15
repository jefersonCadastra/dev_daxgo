<?php

namespace App\Services;

use App\Utils\Date;
use App\Services\{GoalService, VisitService};

class DailyGoalsService
{

  private GoalService $goalService;

  public function __construct(GoalService $goalService, VisitService $visitService)
  {
    $this->goalService = $goalService;
    $this->visitService = $visitService;
  }

  public function dailyData($month, $year)
  {
    dd($month, $year);

    $dayBegin = "$year-$month-1";
    $dayEnd = Date::lastDayOfMonth($month, $year);
    $dataReturn = [];

    $performanceDay = [
      '1' => 4.37,
      '2' => 4.28,
      '3' => 3.85,
      '4' => 3.78,
      '5' => 3.35,
      '6' => 3.07,
      '7' => 2.37
    ];

    $totalPercentPerformance = 0;

    for ($i = strtotime($dayBegin . ' 12:00:00'); $i <= strtotime($dayEnd . ' 12:00:00'); $i += 86400) {

      $dayOfMonth = date('d', $i);
      $dayOfWeek = date('N', $i);
      $dayOfWeekString = Date::dayOfWeek(date('Y-m-d', $i));

      $totalPercentPerformance += $performanceDay[$dayOfWeek];

      $dayRegister = ['dayOfMonth' => $dayOfMonth, 'dayOfWeekString' => $dayOfWeekString, 'performance' => $performanceDay[$dayOfWeek]];
      $dataReturn[$dayOfMonth] = $dayRegister;
    }

    /* Sometimes the sum of the performance goals does not reach 100%.
      The routine below corrects these values*/
    $count = count($dataReturn);
    $item = 0;
    $totalPercentPerformanceAdjusted = 0;

    foreach ($dataReturn as $key => $value) {

      $item++;
      $performance = $value['performance'];

      //The last item is calculated separately to avoid rounding errors
      if ($item != $count)
        $adjustedPerformance = (100 * $performance) / $totalPercentPerformance;
      else
        $adjustedPerformance = 100 - $totalPercentPerformanceAdjusted;

      $dataReturn[$key]['adjustedPerformance'] = number_format($adjustedPerformance, 2, '.', '');

      $totalPercentPerformanceAdjusted += $adjustedPerformance;
    }

    //Get the goals
    $goals = $this->goalService->findByYearMonth($year, $month);
    $goalsList = [];
    foreach ($goals as $key => $value) {
      $goalsList[$value->title] = $value->value;
    }

    $visits = $this->visitService->findVisit($month, $year);
    $goalsList['visits'] = $visits->quantity;

    //Aply the goals
    foreach ($dataReturn as $key => $value) {
      $performance = $value['adjustedPerformance'] / 100;

      $visits = $goalsList['visits'] * $performance;
    }


    //dd($totalPercentPerformance, $totalPercentPerformanceAdjusted);

    dd($dataReturn, $totalPercentPerformanceAdjusted);
  }
}
