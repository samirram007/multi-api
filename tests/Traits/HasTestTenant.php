<?php

namespace Tests\Traits;

trait HasTestTenant
{
    protected string $tenantKey;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tenantKey = $this->setupTenant();
        $this->actingAsUser();
    }

    protected function withTenantHeader(): array
    {
        return ['X-Tenant-Key' => $this->tenantKey];
    }
}
