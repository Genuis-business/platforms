<?php

namespace Bian\Platforms\Salla\Merchant;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUserInformation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/info';
    }
}
