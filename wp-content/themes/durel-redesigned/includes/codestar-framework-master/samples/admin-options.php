<?php if (!defined('ABSPATH')) {
  die;
} // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = 'durel_options';

//
// Create options
//
CSF::createOptions(
  $prefix,
  array(
    'menu_title' => 'ISP Website',
    'menu_slug' => 'isp-website',
    'menu_position' => 2
  )
);

/* ==============================
Site Setting Options Start
================================= */
CSF::createSection(
  $prefix,
  array(
    "id" => "site_setting",
    "title" => "Site Setting",
    'icon' => 'fas fa-cog'
  )
);

/* 1. General Settings Start */
CSF::createSection(
  $prefix,
  array(
    "parent" => "site_setting",
    "title" => "General Settings",
    "icon" => "fa fa-cog",
    "fields" => array(
      // Site Identity
      array(
        "type" => "subheading",
        "content" => "Site Identity"
      ),
      array(
        "id" => "durel_ss_company_name",
        "title" => "Company/Site Name :",
        "type" => "text",
        "desc" => "Enter your company or website name:"
      ),
      array(
        "id" => "durel_ss_company_description",
        "title" => "Company Description :",
        "type" => "textarea",
        "desc" => "Brief description about your company (used in footer and other places)"
      ),
      array(
        "id" => "durel_ss_header_logo",
        "title" => "Logo (size: 140x40px) :",
        "type" => "media",
        "url" => false,
        "desc" => "Main company logo"
      ),
      
      // Contact Information
      array(
        "type" => "subheading",
        "content" => "Contact Information"
      ),
      array(
        "id" => "durel_ss_company_phone",
        "title" => "Phone :",
        "type" => "text",
        "desc" => "Main company phone number"
      ),
      array(
        "id" => "durel_ss_company_email",
        "title" => "Email :",
        "type" => "text",
        "desc" => "Main company email address"
      ),
      array(
        "id" => "durel_ss_company_address",
        "title" => "Address :",
        "type" => "textarea",
        "desc" => "Main company address"
      ),
      array(
        "id" => "durel_ss_google_map_link",
        "title" => "Google Map Link :",
        "type" => "textarea",
        "desc" => "Google Maps embed URL for contact page"
      ),
      array(
        "id" => "durel_ss_social_links_group",
        "title" => "Social Links :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_ss_social_link",
            "title" => "Social Link :",
            "type" => "text",
          ),
          array(
            "id" => "durel_ss_social_icon",
            "title" => "Icon :",
            "type" => "icon",
          ),
        )
      )
    ),
  )
);
/* 1. General Settings End */

/* 2. Navigation & Links Start */
CSF::createSection(
  $prefix,
  array(
    "parent" => "site_setting",
    "title" => "Navigation & Links",
    "icon" => "fa fa-link",
    "fields" => array(
      array(
        "id" => "durel_ss_client_login_link",
        "title" => "Client Login URL :",
        "type" => "text",
        "desc" => "URL for client login page"
      ),
      array(
        "id" => "durel_ss_new_connection_link",
        "title" => "New Connection URL :",
        "type" => "text",
        "default" => "/new-connection",
        "desc" => "URL for new connection page"
      ),
      array(
        "id" => "durel_ss_apk_download_url",
        "title" => "APK Download URL :",
        "type" => "text",
        "default" => "#",
        "desc" => "URL for APK download link (used in header, mobile menu, and CTA section)"
      ),
      array(
        "id" => "durel_ss_apk_download_text",
        "title" => "APK Download Button Text :",
        "type" => "text",
        "default" => "Download APK",
        "desc" => "Text for APK download button (used throughout the site)"
      ),
      array(
        "id" => "durel_ss_show_floating_buttons",
        "title" => "Show Floating Buttons :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display floating action buttons (phone, new connection, client login)"
      ),
    ),
  )
);
/* 2. Navigation & Links End */

/* 3. Footer Start */
CSF::createSection(
  $prefix,
  array(
    "parent" => "site_setting",
    "title" => "Footer",
    "icon" => "fa fa-footer",
    "fields" => array(
      array(
        "id" => "durel_ss_copyright_text",
        "title" => "Copyright Text :",
        "type" => "text",
        "default" => "© 2024 All Rights Reserved",
        "desc" => "Copyright text for footer"
      ),
      array(
        "id" => "durel_ss_footer_show_contact",
        "title" => "Show Contact Info in Footer :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display contact information in footer"
      ),
      array(
        "id" => "durel_ss_footer_show_social",
        "title" => "Show Social Links in Footer :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display social media links in footer"
      ),
    ),
  )
);
/* 3. Footer End */

/* ==============================
Site Setting Options End
================================ */

/* ==============================
Home Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "home_page",
    "title" => "Home Page",
    'icon' => 'fas fa-home'
  )
);

/* Hero Banner Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Hero Banner Section",
    "icon" => "fa fa-home",
    "fields" => array(
      array(
        "id" => "durel_hp_hb_title",
        "title" => "Hero Title :",
        "type" => "text",
        "desc" => "Main headline for the hero section"
      ),
      array(
        "id" => "durel_hp_hb_subtitle",
        "title" => "Hero Subtitle :",
        "type" => "textarea",
        "desc" => "Subtitle text that appears below the main title"
      ),
      array(
        "id" => "durel_hp_hb_explore_plans_text",
        "title" => "Explore Plans Button Text :",
        "type" => "text",
        "default" => "Explore Plans",
        "desc" => "Text for the primary button"
      ),
      array(
        "id" => "durel_hp_hb_explore_plans_link",
        "title" => "Explore Plans Button Link :",
        "type" => "text",
        "default" => "#pricing",
        "desc" => "URL for the 'Explore Plans' button (e.g., #pricing, /plans, etc.)"
      ),
      array(
        "id" => "durel_hp_hb_watch_demo_text",
        "title" => "Watch Demo Button Text :",
        "type" => "text",
        "default" => "Watch Demo",
        "desc" => "Text for the secondary button"
      ),
      array(
        "id" => "durel_hp_hb_watch_demo_link",
        "title" => "Watch Demo Button Link :",
        "type" => "text",
        "default" => "#",
        "desc" => "URL for the 'Watch Demo' button (e.g., YouTube URL, Vimeo URL, or any video URL)"
      ),
      array(
        "id" => "durel_hp_hb_feature_title",
        "title" => "Feature Card Title :",
        "type" => "text",
        "default" => "Ultra-Fast Speed",
        "desc" => "Title for the feature card on the right side"
      ),
      array(
        "id" => "durel_hp_hb_feature_description",
        "title" => "Feature Card Description :",
        "type" => "text",
        "default" => "Up to 1 Gbps Download Speed",
        "desc" => "Description text for the feature card"
      ),
      array(
        "id" => "durel_hp_hb_right_content_type",
        "title" => "Right Side Content :",
        "type" => "select",
        "options" => array(
          "feature_card" => "Feature Card (Speed Info)",
          "speed_test" => "Internet Speed Test"
        ),
        "default" => "speed_test",
        "desc" => "Choose what to display on the right side of the hero banner"
      ),
      array(
        "id" => "durel_hp_hb_speed_test_service",
        "title" => "Speed Test Service :",
        "type" => "select",
        "options" => array(
          "netmeter" => "NetMeter (metercustom.net)",
          "fast_com" => "Fast.com (Netflix)",
          "custom_url" => "Custom URL"
        ),
        "default" => "netmeter",
        "desc" => "Choose which speed test service to use",
        "dependency" => array("durel_hp_hb_right_content_type", "==", "speed_test")
      ),
      array(
        "id" => "durel_hp_hb_speed_test_custom_url",
        "title" => "Custom Speed Test URL :",
        "type" => "text",
        "default" => "",
        "desc" => "Enter custom speed test iframe URL (only used if 'Custom URL' is selected above)",
        "dependency" => array("durel_hp_hb_speed_test_service", "==", "custom_url")
      )
    )
  )
);
/* Hero Banner Section End  */

/* Notice Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Notice Section",
    "icon" => "fa fa-bell",
    "fields" => array(
      array(
        "id" => "durel_hp_ns_show_notice",
        "title" => "Show Notice Section :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Enable or disable the notice section"
      ),
      array(
        "id" => "durel_hp_ns_notice_group",
        "title" => "Add Notice Messages :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_ns_notice_text",
            "title" => "Notice Text :",
            "type" => "textarea",
            "desc" => "Notice message to display to users"
          ),
          array(
            "id" => "durel_hp_ns_notice_type",
            "title" => "Notice Type :",
            "type" => "select",
            "options" => array(
              "info" => "Information",
              "success" => "Success",
              "warning" => "Warning",
              "error" => "Error"
            ),
            "default" => "info",
            "desc" => "Visual style for the notice"
          ),
          array(
            "id" => "durel_hp_ns_notice_link",
            "title" => "Notice Link (Optional) :",
            "type" => "text",
            "desc" => "URL to link the notice to (optional)"
          )
        )
      )
    )
  )
);
/* Notice Section End  */

/* Service Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Service Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "type" => "notice",
        "style" => "info",
        "content" => "<strong>Service Configuration Moved!</strong><br><br>Service configuration has been moved to <strong>ISP Website → Services Page</strong> for better organization.<br><br>To configure services for the home page:<br>1. Go to <strong>ISP Website → Services Page</strong><br>2. Add your services with icons, descriptions, and slugs<br>3. Enable <strong>'Show on Home Page'</strong> for services you want on the home page<br>4. Set the <strong>'Display Order'</strong> to control the order they appear<br><br>This eliminates duplicate configuration and makes management much easier!"
      ),
    )
  )
);
/* Service Section End  */

/* How It Work Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "How It Work Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_hiw_title",
        "title" => "Section Title :",
        "type" => "text"
      ),
      array(
        "id" => "durel_hp_hiw_list",
        "title" => "Add Work Process :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_hiw_name",
            "title" => "Work Process Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_hiw_short_description",
            "title" => "Short Description :",
            "type" => "textarea",
          ),
          array(
            "id" => "durel_hp_hiw_icon",
            "title" => "Icon :",
            "type" => "icon",
          ),
        )
      ),
    )
  )
);
/* How It Work Section End  */

/* Team Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Team Section",
    "icon" => "fa fa-users",
    "fields" => array(
      array(
        "id" => "durel_hp_team_section_title",
        "title" => "Section Title :",
        "type" => "text",
        "default" => "Meet Our Team",
        "desc" => "Main title for the team section"
      ),
      array(
        "id" => "durel_hp_team_section_subtitle",
        "title" => "Section Subtitle :",
        "type" => "text",
        "default" => "The people behind our success",
        "desc" => "Subtitle for the team section"
      ),
      array(
        "id" => "durel_hp_team_member_group",
        "title" => "Add Team Members :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_team_member_name",
            "title" => "Team Member Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_team_member_position",
            "title" => "Position/Title :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_team_member_image",
            "title" => "Profile Image (size: 200x200px) :",
            "type" => "media",
            "url" => false
          ),
          array(
            "id" => "durel_hp_team_member_bio",
            "title" => "Short Bio :",
            "type" => "textarea",
            "desc" => "Brief description about the team member"
          ),
          array(
            "id" => "durel_hp_team_member_social_group",
            "title" => "Add Social Links :",
            "type" => "group",
            "fields" => array(
              array(
                "id" => "durel_hp_team_member_social_link",
                "title" => "Social Link :",
                "type" => "text",
              ),
              array(
                "id" => "durel_hp_team_member_social_icon",
                "title" => "Icon :",
                "type" => "icon",
              ),
            )
          )
        )
      )
    )
  )
);
/* Team Section End  */

/* Company Activity Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Company Activity Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_ca_section_title",
        "title" => "Section Title :",
        "type" => "text",
        "default" => "Trusted by thousands across Bangladesh",
        "desc" => "Main title for the company activity section"
      ),
      array(
        "id" => "durel_hp_ca_section_description",
        "title" => "Section Description :",
        "type" => "textarea",
        "default" => "",
        "desc" => "Description text for the company activity section"
      ),
      array(
        "id" => "durel_hp_ca_guarantee_text",
        "title" => "Guarantee Text :",
        "type" => "text",
        "default" => "99.9% Uptime Guarantee",
        "desc" => "Text displayed with the shield icon"
      ),
      array(
        "id" => "durel_hp_ca_list",
        "title" => "Add Company Activities :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_ca_name",
            "title" => "Activity Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_ca_number",
            "title" => "Activity Count Number :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_ca_icon",
            "title" => "Icon :",
            "type" => "icon",
          ),
        )
      )
    )
  )
);
/* Company Activity Section End  */


/* Client Review Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Client Review Section",
    "icon" => "fa fa-star",
    "fields" => array(
      array(
        "id" => "durel_hp_cr_section_title",
        "title" => "Section Title :",
        "type" => "text",
        "default" => "What Our Clients Say",
        "desc" => "Main title for the client review section"
      ),
      array(
        "id" => "durel_hp_cr_section_subtitle",
        "title" => "Section Subtitle :",
        "type" => "text",
        "default" => "Hear from our satisfied customers about their experience",
        "desc" => "Subtitle for the client review section"
      ),
      array(
        "id" => "durel_hp_cr_review_group",
        "title" => "Add Client Review List :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_cr_name",
            "title" => "Client Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_cr_designation",
            "title" => "Client Designation :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_cr_text",
            "title" => "Review Text :",
            "type" => "textarea",
          ),
          array(
            "id" => "durel_hp_cr_img",
            "title" => "Image (size: 100x100px) :",
            "type" => "media",
            'url' => false
          ),
          array(
            "id" => "durel_hp_cr_rating",
            "title" => "Rating (1-5) :",
            "type" => "select",
            "options" => array(
              "1" => "1 Star",
              "2" => "2 Stars",
              "3" => "3 Stars",
              "4" => "4 Stars",
              "5" => "5 Stars"
            ),
            "default" => "5",
            "desc" => "Select the rating for this review"
          ),
        ),
      ),

    )
  )
);
/* Client Review Section End  */
/* CTA Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "CTA Section",
    "icon" => "fa fa-bullhorn",
    "fields" => array(
      array(
        "id" => "durel_hp_cta_section_title",
        "title" => "CTA Title :",
        "type" => "text",
        "default" => "Ready to Get Connected?",
        "desc" => "Main headline for the CTA section"
      ),
      array(
        "id" => "durel_hp_cta_section_description",
        "title" => "CTA Description :",
        "type" => "textarea",
        "default" => "Join thousands of satisfied customers enjoying ultra-fast fiber internet. Get started today!",
        "desc" => "Description text below the title"
      ),
      array(
        "id" => "durel_hp_cta_primary_button_text",
        "title" => "Primary Button Text :",
        "type" => "text",
        "default" => "Choose Your Plan",
        "desc" => "Text for the primary action button"
      ),
      array(
        "id" => "durel_hp_cta_primary_button_link",
        "title" => "Primary Button Link :",
        "type" => "text",
        "default" => "#packages",
        "desc" => "URL for the primary button (e.g., #packages, /packages)"
      ),
      array(
        "id" => "durel_hp_cta_secondary_button_text",
        "title" => "Secondary Button Text :",
        "type" => "text",
        "default" => "Call Now",
        "desc" => "Text for the secondary action button"
      ),
      array(
        "id" => "durel_hp_cta_secondary_button_link",
        "title" => "Secondary Button Link :",
        "type" => "text",
        "default" => "tel:+8801234567890",
        "desc" => "Phone number or URL for the secondary button"
      ),
      array(
        "id" => "durel_hp_cta_phone_number",
        "title" => "Phone Number :",
        "type" => "text",
        "default" => "+880 1234 567890",
        "desc" => "Phone number to display in secondary button"
      ),
      array(
        "id" => "durel_hp_cta_show_apk_download",
        "title" => "Show APK Download Section :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Enable/disable APK download section in CTA"
      ),
    
    )
  )
);
/* CTA Section End  */

/* Packages Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Packages Section",
    "icon" => "fa fa-box-open",
    "fields" => array(
      array(
        "id" => "durel_hp_packages_section_title",
        "title" => "Packages Section Title :",
        "type" => "text",
        "default" => "Our Packages",
        "desc" => "Main title for the packages section on homepage"
      ),
      array(
        "id" => "durel_hp_packages_section_subtitle",
        "title" => "Packages Section Subtitle :",
        "type" => "text",
        "default" => "Choose the perfect package for your needs",
        "desc" => "Subtitle for the packages section on homepage"
      ),
      array(
        "id" => "durel_hp_packages_show_internet_only",
        "title" => "Show Only Internet Packages :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display only internet/bandwidth packages on the homepage (packages from services marked as internet services)"
      ),
      array(
        "type" => "notice",
        "style" => "info",
        "content" => "<strong>Package Configuration:</strong><br><br>Packages are now configured within each service category in <strong>ISP Website → Services Page</strong>.<br><br>To show packages on the homepage:<br>1. Go to <strong>ISP Website → Services Page</strong><br>2. Add packages to your service categories<br>3. Enable <strong>'Display on Homepage'</strong> for packages you want to feature<br><br>This creates a unified system where packages belong to services and can be displayed anywhere!"
      ),
    )
  )
);
/* Packages Section End  */

/* ==============================
Home Page Options End
================================= */
/* ==============================
About Page Options Start
================================= */
CSF::createSection(
  $prefix,
  array(
    "id" => "about_page",
    "title" => "About Us Page",
    "icon" => "fas fa-info-circle",
    "fields" => array(
      // Page Header Settings
      array(
        "type" => "subheading",
        "content" => "Page Header Settings"
      ),
      array(
        "id" => "durel_ap_page_title",
        "title" => "Page Title :",
        "type" => "text",
        "default" => "About Us",
        "desc" => "Custom page title for the About Us page header"
      ),
      array(
        "id" => "durel_ap_page_subtitle",
        "title" => "Page Subtitle :",
        "type" => "text",
        "default" => "Learn more about our company, mission, and the people behind our success",
        "desc" => "Subtitle text displayed below the main title"
      ),
      
      // Mission & Vision Settings
      array(
        "type" => "subheading",
        "content" => "Mission & Vision"
      ),
      array(
        "id" => "durel_ap_mv_mission_title",
        "title" => "Mission Title :",
        "type" => "text",
        "default" => "Our Mission",
        "desc" => "Title for the mission section"
      ),
      array(
        "id" => "durel_ap_mv_mission_description",
        "title" => "Mission Description :",
        "type" => "wp_editor",
        "desc" => "Detailed description of your company's mission"
      ),
      array(
        "id" => "durel_ap_mv_vision_title",
        "title" => "Vision Title :",
        "type" => "text",
        "default" => "Our Vision",
        "desc" => "Title for the vision section"
      ),
      array(
        "id" => "durel_ap_mv_vision_description",
        "title" => "Vision Description :",
        "type" => "wp_editor",
        "desc" => "Detailed description of your company's vision"
      ),
      
      // Company History Settings
      array(
        "type" => "subheading",
        "content" => "Company History"
      ),
      array(
        "id" => 'durel_ap_history_section_title',
        "title" => "History Section Title :",
        "type" => "text",
        "default" => "Our Journey",
        "desc" => "Title for the company history section"
      ),
      array(
        "id" => "durel_ap_history_group",
        "title" => "Add Business History :",
        "type" => "group",
        "desc" => "Add key milestones in your company's history",
        "fields" => array(
          array(
            "id" => "durel_ap_history_year",
            "title" => "Year :",
            "type" => "text",
            "desc" => "Year of the milestone (e.g., 2020, 2015)"
          ),
          array(
            "id" => "durel_ap_history_title",
            "title" => "Milestone Title :",
            "type" => "text",
            "desc" => "Title of the milestone (e.g., Company Founded, New Office Opened)"
          ),
          array(
            "id" => "durel_ap_history_description",
            "title" => "Description :",
            "type" => "textarea",
            "desc" => "Brief description of what happened in this milestone"
          ),
          array(
            "id" => "durel_ap_history_img",
            "title" => "Image :",
            "type" => "media",
            "url" => false,
            "desc" => "Image related to this milestone (optional)"
          ),
        )
      ),
    )
  )
);

/* ==============================
About Page Options End
================================= */
/* ==============================
Services Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "services_page",
    "title" => "Services Page",
    "icon" => "fas fa-concierge-bell",
    "fields" => array(
      array(
        "id" => "durel_sp_section_title",
        "title" => "Services Section Title :",
        "type" => "text",
        "default" => "Our Services",
        "desc" => "Main title for the services section"
      ),
      array(
        "id" => "durel_sp_section_subtitle",
        "title" => "Services Section Subtitle :",
        "type" => "text",
        "default" => "Comprehensive internet solutions designed to meet all your connectivity needs",
        "desc" => "Subtitle for the services section"
      ),
      array(
        "id" => "durel_sp_show_service_overview",
        "title" => "Show Service Overview Cards :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display service category cards at the top"
      ),
      array(
        "id" => "durel_sp_service_categories",
        "title" => "Service Categories :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_sp_service_name",
            "title" => "Service Name :",
            "type" => "text",
            "desc" => "Name of the service category (e.g., Home Broadband, Business Service)"
          ),
          array(
            "id" => "durel_sp_service_icon",
            "title" => "Service Icon :",
            "type" => "icon",
            "desc" => "Icon for the service category"
          ),
          array(
            "id" => "durel_sp_service_description",
            "title" => "Service Description :",
            "type" => "textarea",
            "desc" => "Brief description of the service"
          ),
          array(
            "id" => "durel_sp_service_slug",
            "title" => "Service Slug :",
            "type" => "text",
            "desc" => "URL-friendly identifier (auto-generated from service name, but can be edited)"
          ),
          array(
            "id" => "durel_sp_service_show_on_home",
            "title" => "Show on Home Page :",
            "type" => "switcher",
            "default" => true,
            "desc" => "Display this service on the home page"
          ),
          array(
            "id" => "durel_sp_service_is_internet",
            "title" => "Is Internet Service :",
            "type" => "switcher",
            "default" => false,
            "desc" => "Check if this is an internet/bandwidth service (all packages will be treated as internet packages)"
          ),
          array(
            "id" => "durel_sp_service_packages",
            "title" => "Service Packages :",
            "type" => "group",
            "desc" => "Add packages for this service category",
            "fields" => array(
              array(
                "id" => "durel_sp_package_name",
                "title" => "Package Name :",
                "type" => "text",
                "desc" => "Name of the package (e.g., Basic, Standard, Premium)"
              ),
              array(
                "id" => "durel_sp_package_specs",
                "title" => "Package Specifications :",
                "type" => "text",
                "desc" => "Package specifications (e.g., 50 Mbps, 05 Extensions, 1GB Storage)"
              ),
              array(
                "id" => "durel_sp_package_price",
                "title" => "Price Per Month (TK) :",
                "type" => "text",
                "desc" => "Monthly price in Taka"
              ),
              array(
                "id" => "durel_sp_package_popular",
                "title" => "Mark as Popular :",
                "type" => "switcher",
                "default" => false,
                "desc" => "Mark this package as the most popular option"
              ),
              array(
                "id" => "durel_sp_package_display_homepage",
                "title" => "Display on Homepage :",
                "type" => "switcher",
                "default" => false,
                "desc" => "Show this package on the homepage service section"
              ),
              array(
                "id" => "durel_sp_package_features",
                "title" => "Package Features :",
                "type" => "group",
                "desc" => "Add features/benefits for this package",
                "fields" => array(
                  array(
                    "id" => "durel_sp_package_feature_text",
                    "title" => "Feature :",
                    "type" => "text",
                    "desc" => "Feature or benefit included in this package"
                  ),
                )
              ),
            ),
          ),
        ),
      ),
      array(
        "id" => "durel_sp_packages_per_row",
        "title" => "Packages Per Row :",
        "type" => "select",
        "options" => array(
          "3" => "3 packages per row",
          "4" => "4 packages per row",
          "2" => "2 packages per row"
        ),
        "default" => "3",
        "desc" => "Number of packages to display per row"
      ),
      array(
        "id" => "durel_sp_services_page_url",
        "title" => "Services Page URL :",
        "type" => "text",
        "default" => "/services/",
        "desc" => "URL of the services page (used for linking from home page service section)"
      ),
      array(
        "type" => "notice",
        "style" => "info",
        "content" => "<strong>🎯 Dynamic Menu Generator</strong><br><br>Click the button below to automatically generate menu items for all your services. This will add them to your main navigation menu.<br><br><button type='button' id='generate-services-menu' class='button button-primary'>Generate Services Menu Items</button><br><br><small>This will create menu items for all your service categories that you can then organize in Appearance → Menus</small>"
      ),
    ),
  )
);
/* Services Page Options End */

/* ==============================
Hosting Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "hosting_page",
    "title" => "Hosting Page",
    "icon" => "fas fa-server",
    "fields" => array(
      array(
        "id" => "durel_h_section_title",
        "title" => "Hosting Section Title :",
        "type" => "text",
        "default" => "Hosting Solutions",
        "desc" => "Main title for the hosting section"
      ),
      array(
        "id" => "durel_h_section_subtitle",
        "title" => "Hosting Section Subtitle :",
        "type" => "text",
        "default" => "Professional hosting services for your online presence",
        "desc" => "Subtitle for the hosting section"
      ),
      array(
        "id" => "durel_h_show_service_overview",
        "title" => "Show Service Overview Cards :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display hosting category cards at the top"
      ),
      array(
        "id" => "durel_h_service_categories",
        "title" => "Hosting Categories :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_h_service_name",
            "title" => "Service Name :",
            "type" => "text",
            "desc" => "Name of the hosting category (e.g., Web Hosting, VPS Hosting, Dedicated Servers)"
          ),
          array(
            "id" => "durel_h_service_icon",
            "title" => "Service Icon :",
            "type" => "icon",
            "desc" => "Icon for the hosting category"
          ),
          array(
            "id" => "durel_h_service_description",
            "title" => "Service Description :",
            "type" => "textarea",
            "desc" => "Brief description of the hosting service"
          ),
          array(
            "id" => "durel_h_service_slug",
            "title" => "Service Slug :",
            "type" => "text",
            "desc" => "URL-friendly identifier (auto-generated from service name, but can be edited)"
          ),
          array(
            "id" => "durel_h_service_show_on_home",
            "title" => "Show on Home Page :",
            "type" => "switcher",
            "default" => true,
            "desc" => "Display this hosting service on the home page"
          ),
          array(
            "id" => "durel_h_service_packages",
            "title" => "Hosting Packages :",
            "type" => "group",
            "desc" => "Add packages for this hosting category",
            "fields" => array(
              array(
                "id" => "durel_h_package_name",
                "title" => "Package Name :",
                "type" => "text",
                "desc" => "Name of the package (e.g., Basic Hosting, Premium Hosting, Enterprise)"
              ),
              array(
                "id" => "durel_h_package_specs",
                "title" => "Package Specifications :",
                "type" => "text",
                "desc" => "Package specifications (e.g., 10GB Storage, 1 CPU, 2GB RAM)"
              ),
              array(
                "id" => "durel_h_package_price",
                "title" => "Price (TK) :",
                "type" => "text",
                "desc" => "Price in Taka"
              ),
              array(
                "id" => "durel_h_package_popular",
                "title" => "Mark as Popular :",
                "type" => "switcher",
                "default" => false,
                "desc" => "Mark this package as the most popular option"
              ),
              array(
                "id" => "durel_h_package_display_homepage",
                "title" => "Display on Homepage :",
                "type" => "switcher",
                "default" => false,
                "desc" => "Show this package on the homepage hosting section"
              ),
              array(
                "id" => "durel_h_package_features",
                "title" => "Package Features :",
                "type" => "group",
                "desc" => "Add features/benefits for this package",
                "fields" => array(
                  array(
                    "id" => "durel_h_package_feature_text",
                    "title" => "Feature :",
                    "type" => "text",
                    "desc" => "Feature or benefit included in this package"
                  ),
                )
              ),
            ),
          ),
        ),
      ),
      array(
        "id" => "durel_h_packages_per_row",
        "title" => "Packages Per Row :",
        "type" => "select",
        "options" => array(
          "3" => "3 packages per row",
          "4" => "4 packages per row",
          "2" => "2 packages per row"
        ),
        "default" => "3",
        "desc" => "Number of packages to display per row"
      ),
      array(
        "id" => "durel_h_services_page_url",
        "title" => "Hosting Page URL :",
        "type" => "text",
        "default" => "/hosting/",
        "desc" => "URL of the hosting page (used for linking from home page)"
      ),
      array(
        "type" => "notice",
        "style" => "info",
        "content" => "<strong>🎯 Dynamic Menu Generator</strong><br><br>Click the button below to automatically generate menu items for all your hosting services. This will add them to your main navigation menu.<br><br><button type='button' id='generate-hosting-menu' class='button button-primary'>Generate Hosting Menu Items</button><br><br><small>This will create menu items for all your hosting categories that you can then organize in Appearance → Menus</small>"
      ),
    ),
  )
);
/* Hosting Page Options End */

/* ==============================
Pay Bill Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "pay_bill_page",
    "title" => "Pay Bill Page",
    "icon" => "far fa-money-bill-alt",
    "fields" => array(
      // Page Header Settings
      array(
        "type" => "subheading",
        "content" => "Page Header Settings"
      ),
      array(
        "id" => "durel_pbp_page_title",
        "title" => "Page Title :",
        "type" => "text",
        "default" => "Pay Bill",
        "desc" => "Custom page title for the Pay Bill page header"
      ),
      array(
        "id" => "durel_pbp_page_subtitle",
        "title" => "Page Subtitle :",
        "type" => "text",
        "default" => "Convenient payment options for your internet bills",
        "desc" => "Subtitle text displayed below the main title"
      ),
      
      // Page Description
      array(
        "type" => "subheading",
        "content" => "Page Description"
      ),
      array(
        "id" => "durel_pbp_page_description",
        "title" => "Page Description :",
        "type" => "wp_editor",
        "desc" => "Rich text description for the Pay Bill page (supports HTML formatting, lists, etc.)"
      ),
      
      // App & Login Options
      array(
        "type" => "subheading",
        "content" => "App & Login Options"
      ),
      array(
        "id" => "durel_pbp_show_app_section",
        "title" => "Show App Download Section :",
        "type" => "switcher",
        "default" => true,
        "desc" => "Display app download and login section"
      ),
      array(
        "id" => "durel_pbp_app_download_text",
        "title" => "App Download Button Text :",
        "type" => "text",
        "default" => "Android App Download now",
        "desc" => "Text for the app download button"
      ),
      array(
        "id" => "durel_pbp_app_download_url",
        "title" => "App Download URL :",
        "type" => "text",
        "default" => "#",
        "desc" => "URL for app download"
      ),
      array(
        "id" => "durel_pbp_client_login_text",
        "title" => "Client Login Button Text :",
        "type" => "text",
        "default" => "Client Login",
        "desc" => "Text for the client login button"
      ),
      array(
        "id" => "durel_pbp_client_login_url",
        "title" => "Client Login URL :",
        "type" => "text",
        "default" => "#",
        "desc" => "URL for client login"
      ),
      
      // Tab Configuration
      array(
        "type" => "subheading",
        "content" => "Tab Configuration"
      ),
      array(
        "id" => "durel_pbp_tab_mobile_banking",
        "title" => "Mobile Banking Tab Title :",
        "type" => "text",
        "default" => "Mobile Banking",
        "desc" => "Title for the Mobile Banking tab"
      ),
      array(
        "id" => "durel_pbp_tab_checkout",
        "title" => "Check Out Tab Title :",
        "type" => "text",
        "default" => "Check Out & Bill Offers",
        "desc" => "Title for the Check Out tab"
      ),
      array(
        "id" => "durel_pbp_tab_client_guidelines",
        "title" => "Client Guidelines Tab Title :",
        "type" => "text",
        "default" => "Client's Guidelines",
        "desc" => "Title for the Client Guidelines tab"
      ),
      
      // Pay Bill Methods
      array(
        "type" => "subheading",
        "content" => "Pay Bill Methods (Mobile Banking Tab)"
      ),
      array(
        "id" => "durel_pbp_pay_bill_group",
        "title" => "Add Payment Methods :",
        "type" => "group",
        "desc" => "Add different payment methods for bill payment",
        "fields" => array(
          array(
            "id" => "durel_pbp_pay_bill_method",
            "title" => "Payment Method Name :",
            "type" => "text",
            "desc" => "Name of the payment method (e.g., bKash, Rocket, Nagad)"
          ),
          array(
            "id" => "durel_pbp_pay_bill_merchant_number",
            "title" => "Merchant/Recipient Number :",
            "type" => "text",
            "desc" => "Merchant number or recipient number for this payment method"
          ),
          array(
            "id" => "durel_pbp_pay_bill_steps",
            "title" => "Payment Steps :",
            "type" => "group",
            "desc" => "Add step-by-step instructions for this payment method",
            "fields" => array(
              array(
                "id" => "durel_pbp_step_number",
                "title" => "Step Number :",
                "type" => "text",
                "desc" => "Step number (e.g., 1, 2, 3)"
              ),
              array(
                "id" => "durel_pbp_step_description",
                "title" => "Step Description :",
                "type" => "textarea",
                "desc" => "Detailed description of this step"
              ),
            ),
          ),
          array(
            "id" => "durel_pbp_pay_bill_img",
            "title" => "Payment Guide Image :",
            "type" => "media",
            "url" => false,
            "desc" => "Step-by-step guide image for this payment method"
          ),
        ),
      ),

      // Check Out & Bill Offers Tab
      array(
        "type" => "subheading",
        "content" => "Check Out & Bill Offers Tab"
      ),
      array(
        "id" => "durel_pbp_checkout_description",
        "title" => "Check Out Tab Description :",
        "type" => "wp_editor",
        "desc" => "Rich text description for the Check Out tab"
      ),
      array(
        "id" => "durel_pbp_check_out_group",
        "title" => "Add Check Out Information :",
        "type" => "group",
        "desc" => "Add check out process images and information",
        "fields" => array(
          array(
            "id" => "durel_pbp_cu_method",
            "title" => "Check Out Method :",
            "type" => "text",
            "desc" => "Name of the check out method"
          ),
          array(
            "id" => "durel_pbp_cu_app_img",
            "title" => "App Payment Image :",
            "type" => "media",
            "url" => false,
            "desc" => "Image showing app-based payment process"
          ),
          array(
            "id" => "durel_pbp_cu_manual_img",
            "title" => "Manual Payment Image :",
            "type" => "media",
            "url" => false,
            "desc" => "Image showing manual payment process"
          ),
        ),
      ),

      // Client Guidelines Tab
      array(
        "type" => "subheading",
        "content" => "Client Guidelines Tab"
      ),
      array(
        "id" => "durel_pbp_client_guidelines_description",
        "title" => "Client Guidelines Description :",
        "type" => "wp_editor",
        "desc" => "Rich text description for the Client Guidelines tab"
      ),
      array(
        "id" => "durel_pbp_client_guidelines_group",
        "title" => "Add Client Guidelines :",
        "type" => "group",
        "desc" => "Add client guidelines and instructions",
        "fields" => array(
          array(
            "id" => "durel_pbp_guideline_title",
            "title" => "Guideline Title :",
            "type" => "text",
            "desc" => "Title of the guideline"
          ),
          array(
            "id" => "durel_pbp_guideline_description",
            "title" => "Guideline Description :",
            "type" => "wp_editor",
            "desc" => "Detailed description of the guideline"
          ),
          array(
            "id" => "durel_pbp_guideline_image",
            "title" => "Guideline Image :",
            "type" => "media",
            "url" => false,
            "desc" => "Image related to this guideline (optional)"
          ),
        ),
      ),
    )
  )
);
/* ==============================
Pay Bill Page Options End
================================ */

/* ==============================
Coverage Area Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "coverage_area_page",
    "title" => "Coverage Area Page",
    "icon" => "fas fa-route",
    "fields" => array(
      array(
        "id" => "durel_cap_region_group",
        "title" => "Add Office Region :",
        "type" => 'group',
        "fields" => array(
          array(
            "id" => "durel_cap_region_name",
            "title" => "Region Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_cap_oInfo_group",
            "title" => "Add Office Info",
            "type" => 'group',
            "fields" => array(
              array(
                "id" => "durel_cap_office_name",
                "title" => "Office Name :",
                "type" => 'text',
              ),
              array(
                "id" => "durel_cap_office_num1",
                "title" => "Number 1 :",
                "type" => 'text',
              ),
              array(
                "id" => "durel_cap_office_num2",
                "title" => "Number 2 (optional) :",
                "type" => 'text',
              ),
              array(
                "id" => "durel_cap_office_email1",
                "title" => "Email 1 :",
                "type" => 'text',
              ),
              array(
                "id" => "durel_cap_office_email2",
                "title" => "Email 2 (optional) :",
                "type" => 'text',
              ),
              array(
                "id" => "durel_cap_office_address",
                "title" => "Office Address :",
                "type" => 'textarea',
              ),
            )
          )
        )
      )
    )
  )
);
/* ==============================
Coverage Area Page Options End
================================ */
/* ==============================
Career Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "career_page",
    "title" => "Career Page",
    "icon" => "fas fa-briefcase",
    "fields" => array(
      array(
        "id" => "durel_cp_job_groups",
        "title" => "Add Career Opportunity :",
        "type" => 'group',
        "fields" => array(
          array(
            "id" => "durel_cp_job_title",
            "title" => "Job Title :",
            "type" => 'text',
          ),
          array(
            "id" => "durel_cp_job_description",
            "title" => "Job Description :",
            "type" => 'wp_editor',
          )
        )
      )
    )
  )
);
/* ==============================
Career Page Options End
================================ */
/* ==============================
FAQ's Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "faq_page",
    "title" => "FAQ's Page",
    "icon" => "far fa-question-circle",
    "fields" => array(
      array(
        "type" => "subheading",
        "content" => "Page Header Settings"
      ),
      array(
        "id" => "durel_faq_page_title",
        "title" => "Page Title :",
        "type" => "text",
        "default" => "Frequently Asked Questions",
        "desc" => "Main title for the FAQ page header"
      ),
      array(
        "id" => "durel_faq_page_subtitle",
        "title" => "Page Subtitle :",
        "type" => "text",
        "default" => "Find answers to commonly asked questions",
        "desc" => "Subtitle text displayed below the main title"
      ),
      array(
        "type" => "subheading",
        "content" => "FAQ Content"
      ),
      array(
        "id" => "durel_faq_groups",
        "title" => "Add FAQ's :",
        "type" => 'group',
        "fields" => array(
          array(
            "id" => "durel_faq_question",
            "title" => "Question :",
            "type" => 'text',
          ),
          array(
            "id" => "durel_faq_answer",
            "title" => "Answer :",
            "type" => 'textarea',
          ),

        )
      )
    )
  )
);
/* ==============================
FAQ's Page Options End
================================ */

/* ==============================
Image Gallery Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "image_gallery",
    "title" => "Image Gallery",
    "icon" => "far fa-images",
    "fields" => array(
      array(
        "type" => "subheading",
        "content" => "Page Header Settings"
      ),
      array(
        "id" => "durel_ig_page_title",
        "title" => "Page Title :",
        "type" => "text",
        "default" => "Image Gallery",
        "desc" => "Main title for the Image Gallery page header"
      ),
      array(
        "id" => "durel_ig_page_subtitle",
        "title" => "Page Subtitle :",
        "type" => "text",
        "default" => "Explore our collection of images showcasing our work and achievements",
        "desc" => "Subtitle text displayed below the main title"
      ),
      array(
        "type" => "subheading",
        "content" => "Image Categories"
      ),
      array(
        "id" => "durel_image_categories",
        "title" => "Create Categories :",
        "type" => "group",
        "desc" => "Create categories for organizing your images",
        "fields" => array(
          array(
            "id" => "durel_image_category_name",
            "title" => "Category Name :",
            "type" => "text",
            "desc" => "Enter category name (e.g., Events, Services, Team)"
          ),
        ),
      ),
      array(
        "type" => "subheading",
        "content" => "Gallery Images"
      ),
      array(
        "id" => "durel_image_gallery_group",
        "title" => "Add Images :",
        "type" => "group",
        "desc" => "Add images to your gallery with categories for filtering",
        "fields" => array(
          array(
            "id" => "durel_image_title",
            "title" => "Image Title :",
            "type" => "text",
            "desc" => "Title/name for this image"
          ),
          array(
            "id" => "durel_image_description",
            "title" => "Image Description :",
            "type" => "textarea",
            "desc" => "Optional description for this image"
          ),
          array(
            "id" => "durel_image_file",
            "title" => "Image File :",
            "type" => "media",
            "url" => false,
            "desc" => "Upload or select an image file"
          ),
          array(
            "id" => "durel_image_category",
            "title" => "Categories :",
            "type" => "select",
            "options" => "durel_get_image_categories",
            "multiple" => true,
            "desc" => "Select one or more categories for this image"
          ),
        ),
      ),
    )
  )
);
/* ==============================
Image Gallery Options End
================================ */

/* ==============================
Video Gallery Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "video_gallery",
    "title" => "Video Gallery",
    "icon" => "far fa-play-circle",
    "fields" => array(
      array(
        "type" => "subheading",
        "content" => "Page Header Settings"
      ),
      array(
        "id" => "durel_vg_page_title",
        "title" => "Page Title :",
        "type" => "text",
        "default" => "Video Gallery",
        "desc" => "Main title for the Video Gallery page header"
      ),
      array(
        "id" => "durel_vg_page_subtitle",
        "title" => "Page Subtitle :",
        "type" => "text",
        "default" => "Watch our collection of videos showcasing our services and achievements",
        "desc" => "Subtitle text displayed below the main title"
      ),
      array(
        "type" => "subheading",
        "content" => "Video Categories"
      ),
      array(
        "id" => "durel_video_categories",
        "title" => "Create Categories :",
        "type" => "group",
        "desc" => "Create categories for organizing your videos",
        "fields" => array(
          array(
            "id" => "durel_video_category_name",
            "title" => "Category Name :",
            "type" => "text",
            "desc" => "Enter category name (e.g., Tutorials, Promotions, Events)"
          ),
        ),
      ),
      array(
        "type" => "subheading",
        "content" => "Gallery Videos"
      ),
      array(
        "id" => "durel_video_gallery_group",
        "title" => "Add Videos :",
        "type" => "group",
        "desc" => "Add videos to your gallery with categories for filtering",
        "fields" => array(
          array(
            "id" => "durel_video_title",
            "title" => "Video Title :",
            "type" => "text",
            "desc" => "Title/name for this video"
          ),
          array(
            "id" => "durel_video_description",
            "title" => "Video Description :",
            "type" => "textarea",
            "desc" => "Optional description for this video"
          ),
          array(
            "id" => "durel_video_url",
            "title" => "Video URL :",
            "type" => "text",
            "desc" => "Video URL (YouTube, Vimeo, MP4, or any video link)"
          ),
          array(
            "id" => "durel_video_thumbnail",
            "title" => "Video Thumbnail :",
            "type" => "media",
            "url" => false,
            "desc" => "Custom thumbnail image (optional)"
          ),
          array(
            "id" => "durel_video_category",
            "title" => "Categories :",
            "type" => "select",
            "options" => "durel_get_video_categories",
            "multiple" => true,
            "desc" => "Select one or more categories for this video"
          ),
        ),
      ),
    )
  )
);
/* ==============================
Video Gallery Options End
================================ */

// Add JavaScript for live category refresh
add_action('admin_footer', 'durel_gallery_live_refresh_script');

if (!function_exists('durel_gallery_live_refresh_script')):
    function durel_gallery_live_refresh_script() {
        $screen = get_current_screen();
        if ($screen && strpos($screen->id, 'durel-options') !== false) {
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                // Function to refresh category dropdowns
                function refreshCategoryDropdowns() {
                    // Refresh image category dropdowns
                    $('select[data-depend-id*="durel_image_category"]').each(function() {
                        var $select = $(this);
                        var currentValue = $select.val();
                        
                        // Trigger change event to refresh options
                        $select.trigger('change');
                        
                        // Restore selected value if it still exists
                        if (currentValue && $select.find('option[value="' + currentValue + '"]').length > 0) {
                            $select.val(currentValue);
                        }
                    });
                    
                    // Refresh video category dropdowns
                    $('select[data-depend-id*="durel_video_category"]').each(function() {
                        var $select = $(this);
                        var currentValue = $select.val();
                        
                        // Trigger change event to refresh options
                        $select.trigger('change');
                        
                        // Restore selected value if it still exists
                        if (currentValue && $select.find('option[value="' + currentValue + '"]').length > 0) {
                            $select.val(currentValue);
                        }
                    });
                }
                
                // Watch for changes in category creation fields
                $(document).on('change', 'input[name*="durel_image_category_name"], input[name*="durel_video_category_name"]', function() {
                    setTimeout(function() {
                        refreshCategoryDropdowns();
                    }, 500); // Small delay to allow form to update
                });
                
                // Watch for form submissions
                $(document).on('submit', 'form', function() {
                    setTimeout(function() {
                        refreshCategoryDropdowns();
                    }, 1000); // Delay after form submission
                });
                
                // Initial refresh on page load
                setTimeout(function() {
                    refreshCategoryDropdowns();
                }, 1000);
            });
            </script>
            <?php
        }
    }
endif;
