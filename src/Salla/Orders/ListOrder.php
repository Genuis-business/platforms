<?php

namespace Bian\Platforms\Salla\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ListOrder extends Request
{
    public Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orders';
    }
}
