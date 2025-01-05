<?php

if (! function_exists('generateTiktokAuthLink')) {
    function generateTiktokAuthLink(string $redirctUrl, string $organizationId): string
    {
        $appId = config('platforms.tiktok.app_id');

        return "https://business-api.tiktok.com/portal/auth?app_id={$appId}&redirect_uri={$redirctUrl}&state={$organizationId}";
    }
}

if (! function_exists('generateSnapchatAuthLink')) {
    function generateSnapchatAuthLink(string $organizationId): string
    {
        $redirect_uri = config('platforms.snapchat.redirect_url');
        $client_id = config('platforms.snapchat.client_id');

        return "https://accounts.snapchat.com/login/oauth2/authorize?client_id={$client_id}&redirect_uri={$redirect_uri}&response_type=code&scope=snapchat-marketing-api&state={$organizationId}";
    }
}

if (! function_exists('generateSallaAuthLink')) {
    function generateSallaAuthLink(string $organizationId): string
    {
        $redirect_uri = config('platforms.salla.redirect_url');
        $client_id = config('platforms.salla.client_id');

        return "https://accounts.salla.sa/oauth2/auth?state={$organizationId}&scope=&response_type=code&approval_prompt=auto&client_id={$client_id}";
    }
}

if (! function_exists('generateGoogleAuthLink')) {
    function generateGoogleAuthLink(string $organizationId): string
    {
        $redirect_uri = config('platforms.google.redirect_url');
        $client_id = config('platforms.google.client_id');

        return "https://accounts.google.com/o/oauth2/auth?client_id={$client_id}&redirect_uri={$redirect_uri}&response_type=code&scope=https://www.googleapis.com/auth/adwords&access_type=offline&include_granted_scopes=true&state={$organizationId}";
    }
}

if (! function_exists('generateMetaAuthLink')) {
    function generateMetaAuthLink(string $organizationId): string
    {
        $redirect_uri = config('platforms.meta.redirect_url');
        $client_id = config('platforms.meta.client_id');

        return "https://www.facebook.com/v21.0/dialog/oauth?client_id={$client_id}&redirect_uri={$redirect_uri}&scope=ads_management&state={$organizationId}";
    }
}
