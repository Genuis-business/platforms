<?php

namespace Bian\Platforms\X;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAdsAccounts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/accounts';
    }

    protected function defaultQuery(): array
    {
        return [
            'with_deleted' => false,
            'with_draft' => true,
            'with_suspended' => true,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
        $accounts = $data['data'] ?? [];

        return array_map(function ($account) {
            return [
                'id' => $account['id'],
                'name' => $account['name'],
                'business_name' => $account['business_name'] ?? null,
                'timezone' => $account['timezone'],
                'currency' => $account['currency'],
                'status' => $account['status'],
            ];
        }, $accounts);
    }
} 