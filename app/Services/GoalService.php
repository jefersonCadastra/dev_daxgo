<?php

namespace App\Services;

use App\Models\Goal;
use App\Utils\Analytics;

class GoalService
{

  private Goal $goal;
  private Analytics $analytics;

  public function __construct(Goal $goal)
  {
    $this->goal = $goal;
    $this->analytics = app(Analytics::class);
  }

  public function all()
  {
    return $this->goal->all();
  }

  public function findByYearMonth($year, $month)
  {
    return $this->goal->findByYearMonth($year, $month)->get();
  }

  public function create($data)
  {
    return $this->goal->create($data);
  }

  public function update($data, $id)
  {
    return $this->goal->find($id)->update($data);
  }

  public function delete($id)
  {
    return $this->goal->find($id)->delete();
  }
}
