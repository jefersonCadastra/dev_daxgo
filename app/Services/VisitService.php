<?php

namespace App\Services;

use App\Models\Visit;

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
}
