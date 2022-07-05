<?php

namespace App\Services;

use App\Models\Goal;
use App\Utils\Analytics;

class GoalService
{

  private Goal $goal;
  private $analytics;

  /**
   * Instance of Goal goal
   *
   * @param Goal $goal
   *
   * @return void
   */
  public function __construct(Goal $goal)
  {
    $this->goal = $goal;
    $this->analytics = app(Analytics::class);
  }

  public function all()
  {
    $goals = $this->goal->all();

    return $goals;
  }

  public function findByYearMonth($year, $month)
  {
    return $this->goal->findByYearMonth($year, $month)->get();
  }

  public function create($params)
  {
    $this->goal
      ->create($params);
  }

  public function destroy($id)
  {
    $this->goal
      ->find($id)
      ->delete();
  }
}
