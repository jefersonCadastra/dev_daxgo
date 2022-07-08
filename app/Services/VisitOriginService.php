<?php

namespace App\Services;

use App\Models\VisitOrigin;
use App\Utils\Date;

class VisitOriginService
{
    private VisitOrigin $visitOrigin;

    public function __construct(VisitOrigin $visitOrigin)
    {
        $this->visitOrigin = $visitOrigin;
    }

    public function all()
    {
        return $this->visitOrigin->all();
    }

    public function create($data)
    {
        return $this->visitOrigin->create($data);
    }

    public function update($data, $id)
    {
        return $this->visitOrigin->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->visitOrigin->find($id)->delete();
    }

    public function getVisitOrigins($paid = false)
    {
        if ($paid)
            return $this->visitOrigin->where("paid", $paid)->get();
        else
            return $this->visitOrigin->all();
    }
}
