<?php

namespace App\Services;

use App\Models\PerformanceAverage;

class PerformanceAverageService
{
    private PerformanceAverage $performanceAverage;

    public function __construct(PerformanceAverage $performanceAverage)
    {
        $this->performanceAverage = $performanceAverage;
    }

    public function all()
    {
        return $this->performanceAverage->all();
    }

    public function create($data)
    {
        return $this->performanceAverage->create($data);
    }

    public function update($data, $id)
    {
        return $this->performanceAverage->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->performanceAverage->find($id)->delete();
    }
}
