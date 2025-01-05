# Platforms Integration Package

A Laravel package that provides seamless integration with various social media and e-commerce platforms including Salla, Meta (Facebook), Google, TikTok, Snapchat, and X (Twitter).

## Requirements

- PHP ^8.3
- Laravel ^10.0 or ^11.0

## Installation

You can install the package via composer:

```bash
composer require bian/platforms
```

The package will automatically register its service provider.

## Available Platforms

- Salla (E-commerce)
- Meta (Facebook)
- Google
- TikTok
- Snapchat
- X (Twitter)

## Configuration

After installation, publish the configuration file:

```bash
php artisan vendor:publish --provider="Bian\Platforms\PlatformsServiceProvider"
```

Configure your platform credentials in the published config file or in your `.env` file:

```env
TIKTOK_APP_ID=your_app_id
SNAPCHAT_CLIENT_ID=your_client_id
SALLA_CLIENT_ID=your_client_id
GOOGLE_CLIENT_ID=your_client_id
META_CLIENT_ID=your_client_id
```

## Usage

This package uses the Saloon HTTP client for making API requests. Each platform has its own dedicated client and services.

### Helper Functions

The package includes several helper functions for generating authentication links:

```php
// Generate TikTok authentication link
$tiktokAuthUrl = generateTiktokAuthLink($redirectUrl, $organizationId);

// Generate Snapchat authentication link
$snapchatAuthUrl = generateSnapchatAuthLink($organizationId);

// Generate Salla authentication link
$sallaAuthUrl = generateSallaAuthLink($organizationId);

// Generate Google authentication link
$googleAuthUrl = generateGoogleAuthLink($organizationId);

// Generate Meta (Facebook) authentication link
$metaAuthUrl = generateMetaAuthLink($organizationId);
```

Each helper function generates the appropriate OAuth authentication URL for the respective platform.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- [Mohammed Hamid](https://github.com/yourusername)

## Support

For support, please email hamoda.dev@gmail.com 