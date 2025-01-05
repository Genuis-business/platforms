<?php

namespace Bian\Platforms\SnapChat;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOrganizationsIDs extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me/organizations';
    }
}
