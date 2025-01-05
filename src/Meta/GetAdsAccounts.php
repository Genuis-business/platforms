<?php

namespace Bian\Platforms\Meta;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAdsAccounts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me/adaccounts';
    }

    protected function defaultQuery(): array
    {
        return [
            'fields' => 'id,name,account_id,account_status,currency,timezone_name',
        ];
    }
} 