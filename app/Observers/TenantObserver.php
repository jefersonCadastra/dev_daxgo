<?php

namespace App\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model)
    {
        $tenantId = app(ManagerTenant::class)->getTenantId();

        $model->setAttribute('tenant_id', $tenantId);
    }
}
