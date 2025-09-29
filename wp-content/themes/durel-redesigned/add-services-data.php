<?php
/**
 * Add Services and Packages Data to WordPress Options
 * Run this script once to add the data to your system
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if running from command line or admin
if (php_sapi_name() !== 'cli' && !current_user_can('manage_options')) {
    die('Access denied. This script requires admin privileges.');
}

// Get current options
$current_options = get_option('durel_options', array());

// Define the services
$services = [
    [
        'durel_sp_service_name' => 'Home Broadband',
        'durel_sp_service_icon' => 'fas fa-wifi',
        'durel_sp_service_description' => 'High-speed internet for residential use with reliable fiber connections',
        'durel_sp_service_slug' => 'home-broadband',
        'durel_sp_service_show_on_home' => true,
        'durel_sp_service_is_internet' => true,
        'durel_sp_service_packages' => []
    ],
    [
        'durel_sp_service_name' => 'Product Service',
        'durel_sp_service_icon' => 'fas fa-box',
        'durel_sp_service_description' => 'Comprehensive product solutions and technical support',
        'durel_sp_service_slug' => 'product-service',
        'durel_sp_service_show_on_home' => true,
        'durel_sp_service_packages' => []
    ],
    [
        'durel_sp_service_name' => 'Business Service',
        'durel_sp_service_icon' => 'fas fa-briefcase',
        'durel_sp_service_description' => 'Dedicated internet solutions for business operations',
        'durel_sp_service_slug' => 'business-service',
        'durel_sp_service_show_on_home' => true,
        'durel_sp_service_is_internet' => true,
        'durel_sp_service_packages' => []
    ],
    [
        'durel_sp_service_name' => 'SME Service',
        'durel_sp_service_icon' => 'fas fa-building',
        'durel_sp_service_description' => 'Small and medium enterprise internet solutions',
        'durel_sp_service_slug' => 'sme-service',
        'durel_sp_service_show_on_home' => true,
        'durel_sp_service_is_internet' => true,
        'durel_sp_service_packages' => []
    ],
    [
        'durel_sp_service_name' => 'Residential Service',
        'durel_sp_service_icon' => 'fas fa-home',
        'durel_sp_service_description' => 'Home internet packages for families and individuals',
        'durel_sp_service_slug' => 'residential-service',
        'durel_sp_service_show_on_home' => true,
        'durel_sp_service_is_internet' => true,
        'durel_sp_service_packages' => []
    ],
    [
        'durel_sp_service_name' => 'Support Service',
        'durel_sp_service_icon' => 'fas fa-headset',
        'durel_sp_service_description' => '24/7 technical support and customer service',
        'durel_sp_service_slug' => 'support-service',
        'durel_sp_service_show_on_home' => true,
        'durel_sp_service_packages' => []
    ],
    [
        'durel_sp_service_name' => 'IP PBX',
        'durel_sp_service_icon' => 'fas fa-phone',
        'durel_sp_service_description' => 'Fully managed IP PBX service in Bangladesh with no hidden charges. No need to purchase any IP PBX hardware.',
        'durel_sp_service_slug' => 'ip-pbx',
        'durel_sp_service_show_on_home' => false,
        'durel_sp_service_is_internet' => false,
        'durel_sp_service_packages' => [
            [
                'durel_sp_package_name' => 'Starter',
                'durel_sp_package_specs' => '05 Extensions',
                'durel_sp_package_price' => '750',
                'durel_sp_package_popular' => false,
                'durel_sp_package_display_homepage' => true,
                'durel_sp_package_features' => [
                    ['durel_sp_package_feature_text' => 'Free IP Number'],
                    ['durel_sp_package_feature_text' => '05 extensions'],
                    ['durel_sp_package_feature_text' => '05 Channels'],
                    ['durel_sp_package_feature_text' => 'IVR/Caller Tune'],
                    ['durel_sp_package_feature_text' => 'Call history'],
                    ['durel_sp_package_feature_text' => 'Call record 500 TK'],
                    ['durel_sp_package_feature_text' => 'Setup fee 1000 TK*']
                ]
            ],
            [
                'durel_sp_package_name' => 'Business',
                'durel_sp_package_specs' => '10 Extensions',
                'durel_sp_package_price' => '1250',
                '' => false,
                'durel_sp_package_popular' => true,
                'durel_sp_package_display_homepage' => true,
                'durel_sp_package_features' => [
                    ['durel_sp_package_feature_text' => 'Free IP Number'],
                    ['durel_sp_package_feature_text' => '10 extensions'],
                    ['durel_sp_package_feature_text' => '10 Channels'],
                    ['durel_sp_package_feature_text' => 'IVR/Caller Tune'],
                    ['durel_sp_package_feature_text' => 'Call history'],
                    ['durel_sp_package_feature_text' => 'Call record 1000 TK'],
                    ['durel_sp_package_feature_text' => 'Setup fee 1000 TK*']
                ]
            ],
            [
                'durel_sp_package_name' => 'Corporate',
                'durel_sp_package_specs' => '15 Extensions',
                'durel_sp_package_price' => '1750',
                '' => false,
                'durel_sp_package_popular' => false,
                'durel_sp_package_display_homepage' => true,
                'durel_sp_package_features' => [
                    ['durel_sp_package_feature_text' => 'Free IP Number'],
                    ['durel_sp_package_feature_text' => '15 extensions'],
                    ['durel_sp_package_feature_text' => '15 Channels'],
                    ['durel_sp_package_feature_text' => 'IVR/Caller Tune'],
                    ['durel_sp_package_feature_text' => 'Call history'],
                    ['durel_sp_package_feature_text' => 'Call record 1500 TK'],
                    ['durel_sp_package_feature_text' => 'Setup fee 1000 TK*']
                ]
            ],
            [
                'durel_sp_package_name' => 'Enterprise',
                'durel_sp_package_specs' => 'Unlimited Extensions',
                'durel_sp_package_price' => '2450',
                '' => false,
                'durel_sp_package_popular' => false,
                'durel_sp_package_display_homepage' => true,
                'durel_sp_package_features' => [
                    ['durel_sp_package_feature_text' => 'Free IP Number'],
                    ['durel_sp_package_feature_text' => 'Unlimited extensions'],
                    ['durel_sp_package_feature_text' => 'Unlimited Channels'],
                    ['durel_sp_package_feature_text' => 'IVR/Caller Tune'],
                    ['durel_sp_package_feature_text' => 'Call history'],
                    ['durel_sp_package_feature_text' => 'Call record 2000 TK'],
                    ['durel_sp_package_feature_text' => 'Setup fee 1000 TK*']
                ]
            ]
        ]
    ]
];

// Define the packages
$packages_data = [
    [
        'name' => 'Power User Value 50+',
        'speed' => '50 Mbps',
        'price' => '860',
        'features' => [
            'Excellent speed for the best value',
            'Supports multiple devices streaming & downloading without lag',
            'FTTH Connections charges OTC 1000 with XONN',
            'Optical Fiber connection',
            'Auto IPv6 Public IP Only',
            '24/7 Phone and Online Support'
        ],
        'services' => ['Home Broadband', 'Residential Service']
    ],
    [
        'name' => 'SME Starter Streamer 70+',
        'speed' => '70 Mbps',
        'price' => '1150',
        'features' => [
            'The ultimate package for buffer-free HD/4K streaming, competitive online gaming, and connected smart homes',
            'FTTH Connections charges OTC 1000 with XONN',
            'Optical Fiber connection',
            'Auto IPv6 Public IP Only',
            '24/7 Phone and Online Support'
        ],
        'services' => ['Home Broadband', 'Residential Service']
    ],
    [
        'name' => 'Power 100+',
        'speed' => '100 Mbps',
        'price' => '1300',
        'features' => [
            'Experience extreme speed for heavy downloading, 4K streaming, multiple screens, and lag-free gaming',
            'FTTH Connections charges OTC 1000 with XONN',
            'Optical Fiber connection',
            'Auto IPv6 Public IP Only',
            '24/7 Phone and Online Support'
        ],
        'services' => ['Home Broadband', 'Residential Service']
    ],
    [
        'name' => 'Pro 150+',
        'speed' => '150 Mbps',
        'price' => '1550',
        'features' => [
            'For power users, small offices, and serious gamers; includes a FREE Real IP Address',
            'Advanced streaming on multiple devices',
            'FTTH Connections charges OTC 1000 with XONN',
            'Optical Fiber connection',
            '24/7 Phone and Online Support'
        ],
        'services' => ['Home Broadband', 'Residential Service']
    ],
    [
        'name' => 'Elite 200+',
        'speed' => '200 Mbps',
        'price' => '2050',
        'features' => [
            'The fastest residential package; Unleash the full potential of your fiber connection with a FREE Real IP',
            'Advanced streaming on multiple devices',
            'FTTH Connections charges OTC 1000 with XONN',
            'Optical Fiber connection',
            '24/7 Phone and Online Support'
        ],
        'services' => ['Home Broadband', 'Residential Service']
    ]
];

// Add packages to the appropriate services
foreach ($packages_data as $package) {
    $package_data = [
        'durel_sp_package_name' => $package['name'],
        'durel_sp_package_specs' => $package['speed'],
        'durel_sp_package_price' => $package['price'],
        '' => true, // These are internet packages
        'durel_sp_package_popular' => false,
        'durel_sp_package_display_homepage' => true,
        'durel_sp_package_features' => []
    ];
    
    // Add features
    foreach ($package['features'] as $feature) {
        $package_data['durel_sp_package_features'][] = [
            'durel_sp_package_feature_text' => $feature
        ];
    }
    
    // Add package to Home Broadband service
    foreach ($services as &$service) {
        if ($service['durel_sp_service_name'] === 'Home Broadband') {
            $service['durel_sp_service_packages'][] = $package_data;
            break;
        }
    }
}

// Add services to the options
$current_options['durel_sp_service_categories'] = $services;

// Update the options
$result = update_option('durel_options', $current_options);

if ($result) {
    echo "✅ Successfully added services and packages to WordPress options!\n";
    echo "📊 Added " . count($services) . " services\n";
    echo "📦 Added " . count($packages_data) . " packages to Home Broadband service\n";
    echo "\nServices added:\n";
    foreach ($services as $service) {
        echo "- " . $service['durel_sp_service_name'] . "\n";
    }
    echo "\nPackages added to Home Broadband:\n";
    foreach ($packages_data as $package) {
        echo "- " . $package['name'] . " (" . $package['speed'] . ") - " . $package['price'] . "\n";
    }
} else {
    echo "❌ Failed to update WordPress options\n";
}

echo "\n🎉 Data import completed!\n";
echo "You can now view the data in WordPress Admin → ISP Website → Services Page\n";

