<?php
/**
 * Add Hosting Services and Packages Data to WordPress Options
 * Run this script once to add the hosting data to your system
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if running from command line or admin
if (php_sapi_name() !== 'cli' && !current_user_can('manage_options')) {
    die('Access denied. This script requires admin privileges.');
}

// Get current options
$current_options = get_option('durel_options', array());

// Define the hosting services
$hosting_services = [
    [
        'durel_h_service_name' => 'Web Hosting',
        'durel_h_service_icon' => 'fas fa-server',
        'durel_h_service_description' => 'We provide domain hosting & IP number',
        'durel_h_service_slug' => 'web-hosting',
        'durel_h_service_show_on_home' => true,
        'durel_h_service_packages' => [
            [
                'durel_h_package_name' => 'BDIX 1GB',
                'durel_h_package_specs' => '1GB Storage',
                'durel_h_package_price' => '1',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '1GB'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ],
            [
                'durel_h_package_name' => 'BDIX 10GB',
                'durel_h_package_specs' => '10GB',
                'durel_h_package_price' => '2',
                'durel_h_package_popular' => true,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '10GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ],
            [
                'durel_h_package_name' => 'BDIX 20GB',
                'durel_h_package_specs' => '20GB',
                'durel_h_package_price' => '3',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '20GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ],
            [
                'durel_h_package_name' => 'BDIX 50GB',
                'durel_h_package_specs' => '50GB',
                'durel_h_package_price' => '5',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '50GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ]
        ]
    ],
    [
        'durel_h_service_name' => 'Reseller Hosting',
        'durel_h_service_icon' => 'fas fa-users-cog',
        'durel_h_service_description' => 'Powerful Reseller Hosting Plans',
        'durel_h_service_slug' => 'reseller-hosting',
        'durel_h_service_show_on_home' => true,
        'durel_h_service_packages' => [
            [
                'durel_h_package_name' => 'Reseller 10GB',
                'durel_h_package_specs' => '10GB',
                'durel_h_package_price' => '5',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '10GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel with WHM'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ],
            [
                'durel_h_package_name' => 'Reseller 20GB',
                'durel_h_package_specs' => '20GB',
                'durel_h_package_price' => '9',
                'durel_h_package_popular' => true,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '20GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel with WHM'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ],
            [
                'durel_h_package_name' => 'Reseller 50GB',
                'durel_h_package_specs' => '50GB',
                'durel_h_package_price' => '16',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '50GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel with WHM'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ],
            [
                'durel_h_package_name' => 'Reseller 100GB',
                'durel_h_package_specs' => '100GB',
                'durel_h_package_price' => '24',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '100GB Storage'],
                    ['durel_h_package_feature_text' => 'Unlimited Bandwidth'],
                    ['durel_h_package_feature_text' => 'cPanel with WHM'],
                    ['durel_h_package_feature_text' => 'Free Certificate']
                ]
            ]
        ]
    ],
    [
        'durel_h_service_name' => 'VPS',
        'durel_h_service_icon' => 'fas fa-cloud',
        'durel_h_service_description' => 'Best Multiple location VPS',
        'durel_h_service_slug' => 'vps-rdp',
        'durel_h_service_show_on_home' => true,
        'durel_h_service_packages' => [
            [
                'durel_h_package_name' => 'VPS 1',
                'durel_h_package_specs' => '1 CPU, 1GB RAM, 10GB',
                'durel_h_package_price' => '6',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '1 CPU'],
                    ['durel_h_package_feature_text' => '1GB RAM'],
                    ['durel_h_package_feature_text' => '10GB Storage']
                ]
            ],
            [
                'durel_h_package_name' => 'VPS 2',
                'durel_h_package_specs' => '2 CPU, 2GB RAM, 20GB',
                'durel_h_package_price' => '10',
                'durel_h_package_popular' => true,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '2 CPU'],
                    ['durel_h_package_feature_text' => '2GB RAM'],
                    ['durel_h_package_feature_text' => '20GB Storage']
                ]
            ],
            [
                'durel_h_package_name' => 'VPS 3',
                'durel_h_package_specs' => '3 CPU, 4GB RAM, 40GB',
                'durel_h_package_price' => '17',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '3 CPU'],
                    ['durel_h_package_feature_text' => '4GB RAM'],
                    ['durel_h_package_feature_text' => '40GB Storage']
                ]
            ],
            [
                'durel_h_package_name' => 'VPS 4',
                'durel_h_package_specs' => '4 CPU, 8GB RAM, 80GB',
                'durel_h_package_price' => '24',
                'durel_h_package_popular' => false,
                'durel_h_package_display_homepage' => true,
                'durel_h_package_features' => [
                    ['durel_h_package_feature_text' => '4 CPU'],
                    ['durel_h_package_feature_text' => '8GB RAM'],
                    ['durel_h_package_feature_text' => '80GB Storage']
                ]
            ]
        ]
    ]
];

// Add hosting services to the options
$current_options['durel_h_service_categories'] = $hosting_services;

// Update the options
$result = update_option('durel_options', $current_options);

if ($result) {
    echo "✅ Successfully added hosting services and packages to WordPress options!\n";
    echo "📊 Added " . count($hosting_services) . " hosting services\n";
    
    $total_packages = 0;
    foreach ($hosting_services as $service) {
        $total_packages += count($service['durel_h_service_packages']);
    }
    echo "📦 Added " . $total_packages . " hosting packages\n";
    
    echo "\nHosting Services added:\n";
    foreach ($hosting_services as $service) {
        echo "- " . $service['durel_h_service_name'] . " (" . count($service['durel_h_service_packages']) . " packages)\n";
    }
    
    echo "\nPackages by service:\n";
    foreach ($hosting_services as $service) {
        echo "\n" . $service['durel_h_service_name'] . ":\n";
        foreach ($service['durel_h_service_packages'] as $package) {
            $price_display = $package['durel_h_package_price'];
            if (in_array($service['durel_h_service_name'], ['Web Hosting', 'Reseller Hosting', 'VPS'])) {
                $price_display = '$' . $package['durel_h_package_price'];
            } else {
                $price_display = $package['durel_h_package_price'] . ' TK';
            }
            echo "  - " . $package['durel_h_package_name'] . " - " . $price_display . "\n";
        }
    }
} else {
    echo "❌ Failed to update WordPress options\n";
}

echo "\n🎉 Hosting data import completed!\n";
echo "You can now view the data in WordPress Admin → ISP Website → Hosting Page\n";
