<?php

namespace App\Traits;

use App\Observers\TenantObserver;
use App\Scopes\TenantScope;

trait TenantTrait
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope);

        static::observe(new TenantObserver);
    }
}
