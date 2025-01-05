<?php

namespace Bian\Platforms\Google;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GetAdsAccounts extends Request
{
    public Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/customers:listAccessibleCustomers';
    }
}