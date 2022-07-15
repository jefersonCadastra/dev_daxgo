<?php

namespace App\Services;

use App\Models\BehaviorDate;
use App\Utils\Analytics;

class BehaviorDateService
{
    private BehaviorDate $behaviorDate;
    private Analytics $analytics;

    public function __construct(BehaviorDate $behaviorDate)
    {
        $this->behaviorDate = $behaviorDate;
    }

    public function all()
    {
        return $this->behaviorDate->all();
    }

    public function create($data)
    {
        return $this->behaviorDate->create($data);
    }

    public function update($data, $id)
    {
        return $this->behaviorDate->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->behaviorDate->find($id)->delete();
    }
}
