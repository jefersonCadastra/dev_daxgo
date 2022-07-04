<?php

namespace App\Tenant;

class ManagerTenant
{
    public function getTenantId()
    {
        return auth()->user()->tenant->id;
    }
}
