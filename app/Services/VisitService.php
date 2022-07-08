<?php

namespace App\Services;

use App\Models\Visit;
use App\Utils\Date;

class VisitService
{
    private Visit $visit;

    public function __construct(Visit $visit)
    {
        $this->visit = $visit;
    }

    public function all()
    {
        return $this->visit->all();
    }

    public function create($data)
    {
        return $this->visit->create($data);
    }

    public function update($data, $id)
    {
        return $this->visit->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->visit->find($id)->delete();
    }

    public function findVisit($month, $year)
    {
        $visit = $this->visit->where("month", $month)->where("year", $year)->first();
        $visit->month = Date::monthNumberToFullString($visit->month);
        return $visit;
    }
}
