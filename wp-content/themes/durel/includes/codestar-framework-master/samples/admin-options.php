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

/* Header and Footer Section Start */
CSF::createSection(
  $prefix,
  array(
    "parent" => "site_setting",
    "title" => "Header & Footer",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_ss_hf_logo",
        "title" => "Main Logo (size: 140x40px) :",
        "type" => "media",
        "url" => false
      ),
      array(
        "id" => "durel_ss_hf_clink",
        "title" => "Client Login Link :",
        "type" => "text",
      ),
      array(
        "id" => "durel_ss_hf_copyright_text",
        "title" => "Copyright Text :",
        "type" => "text",
      ),
    ),
  )
);
/* Header and Footer Section Start */
/* Contact Us Page Start */
CSF::createSection(
  $prefix,
  array(
    "parent" => "site_setting",
    "title" => "Contact Us",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_ss_cu_img",
        "title" => "Image (size: 650x500px) :",
        "type" => "media",
        "url" => false
      ),
      array(
        "id" => "durel_ss_cu_address",
        "title" => "Office Address :",
        "type" => "textarea"
      ),
      array(
        "id" => "durel_ss_cu_email",
        "title" => "Email :",
        "type" => "text"
      ),
      array(
        "id" => "durel_ss_cu_number",
        "title" => "Number :",
        "type" => "text"
      ),
      array(
        "id" => "durel_ss_cu_google_map",
        "title" => "Google Map Link :",
        "type" => "textarea"
      ),

      array(
        "id" => "durel_ss_cu_social_link_group",
        "title" => "Add Social Links :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_ss_cu_social_link",
            "title" => "Social Link :",
            "type" => "text",
          ),
          array(
            "id" => "durel_ss_cu_social_icon",
            "title" => "Icon :",
            "type" => "icon",
          ),
        )
      )
    ),
  )
);

/* Contact Us Page End */
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

/* Here Banner Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Banner Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_bs_image",
        "title" => "Banner Section Image (size: 560x350px)",
        "type" => "media",
        "url" => false
      ),
      array(
        "id" => "durel_hp_bs_title",
        "title" => "Banner Section Title :",
        "type" => 'text'
      ),
      array(
        "id" => "durel_hp_bs_nt_group",
        "title" => "Add Notice Text :",
        "type" => 'group',
        'fields' => array(
          array(
            "id" => "durel_hp_bs_nt_text",
            "title" => "Notice Text :",
            "type" => 'textarea',
          ),
        ),
      ),

    )
  )
);
/* Here Banner Section End  */

/* Service Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Service Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_ss_list",
        "title" => "Add Service List :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_ss_name",
            "title" => "Service Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_ss_icon",
            "title" => "Icon :",
            "type" => "icon",
          ),
          array(
            "id" => "durel_hp_ss_link",
            "title" => "Service Page Link :",
            "type" => "text",
          ),
        )
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

/* Company Activity Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Company Activity Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_ca_image",
        "title" => "Image (size: 535x750px) :",
        "type" => "media",
        "url" => false
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
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_cr_section_title",
        "title" => "Section Title :",
        "type" => "text",
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
        ),
      ),

      array(
        "id" => "durel_hp_cr_video_title",
        "title" => "Video Section Title :",
        "type" => "text",
      ),
      array(
        "id" => "durel_hp_cr_video_id",
        "title" => "Video ID :",
        "type" => "text",
      ),
    )
  )
);
/* Client Review Section End  */
/* Client Logo Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "home_page",
    "title" => "Client Logo Section",
    "icon" => "fa fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_hp_cl_logo_group",
        "title" => "Add Client Logo List :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_hp_cl_logo_name",
            "title" => "Client Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_hp_cl_logo_img",
            "title" => "Client Logo (size: 100x100 px) :",
            "type" => "media",
            "url" => false
          ),
          array(
            "id" => "durel_hp_cl_link",
            "title" => "Client Website Link:",
            "type" => "text",
          ),
        )
      )
    )
  )
);
/* Client Logo Section End  */
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
    'icon' => 'fas fa-home'
  )
);
/* Mission & Vision Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "about_page",
    "title" => "Mission & Vision Section",
    "icon" => "fas fa-plus-circle",
    "fields" => array(
      array(
        "id" => "durel_ap_mv_mission_title",
        "title" => "Mission Title :",
        "type" => "text"
      ),
      array(
        "id" => "durel_ap_mv_mission_description",
        "title" => "Mission Description :",
        "type" => "wp_editor"
      ),
      array(
        "id" => "durel_ap_mv_vision_title",
        "title" => "Vision Title :",
        "type" => "text"
      ),
      array(
        "id" => "durel_ap_mv_vision_description",
        "title" => "Vision Description :",
        "type" => "wp_editor"
      ),
    )
  )
);
/* Mission & Vision Section End  */
/* History Section Start  */
CSF::createSection(
  $prefix,
  array(
    "parent" => "about_page",
    "title" => "Histroy Section",
    "icon" => "fas fa-plus-circle",
    "fields" => array(
      array(
        "id" => 'durel_ap_history_section_title',
        "title" => "Section Title :",
        "type" => "text",
      ),
      array(
        "id" => "durel_ap_history_group",
        "title" => "Add Business History :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_ap_history_year",
            "title" => "History Year :",
            "type" => "text",
          ),
          array(
            "id" => "durel_ap_history_title",
            "title" => "History Title :",
            "type" => "text",
          ),
          array(
            "id" => "durel_ap_history_description",
            "title" => "Short Description :",
            "type" => "textarea",
          ),
          array(
            "id" => "durel_ap_history_img",
            "title" => "Image (size: 585x370px) :",
            "type" => "media",
            "url" => false
          ),

        )
      ),
    ),
  )
);
/* History Section End  */

/* ==============================
About Page Options End
================================= */
/* ==============================
Pricing Page Options Start
================================ */
CSF::createSection(
  $prefix,
  array(
    "id" => "pricing_page",
    "title" => "Pricing Page",
    "icon" => "fas fa-box-open",
    "fields" => array(
      array(
        "id" => "durel_pp_package_list",
        "title" => "Add Pricing Plan :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_pp_package_name",
            "title" => "Package Name :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pp_short_description",
            "title" => "Short Description :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pp_package_internet",
            "title" => "Package Internet (Mbps) :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pp_package_price",
            "title" => "Price Per Month (TK) :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pp_package_offer_list",
            "title" => "Add Package Offer Points :",
            "type" => "group",
            "fields" => array(
              array(
                "id" => "durel_pp_package_offer_title",
                "title" => "Package Offer Point :",
                "type" => "text",
              ),
            )
          ),
        ),
      ),
    ),
  )
);
/* ==============================
Pricing Page Options End
================================ */
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
      array(
        "id" => "durel_pbp_pay_bill_group",
        "title" => "Add Pay Bill System :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_pbp_pay_bill_method",
            "title" => "Payment Method :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pbp_pay_bill_img",
            "title" => "Image (size: 630x470px) :",
            "type" => "media",
            "url" => false
          ),
        ),
      ),

      array(
        "id" => "durel_pbp_check_out_group",
        "title" => "Add Check Out System :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_pbp_cu_method",
            "title" => "Payment Method :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pbp_cu_app_img",
            "title" => "App Payment Image (size: 900x500px) :",
            "type" => "media",
            "url" => false
          ),
          array(
            "id" => "durel_pbp_cu_manual_img",
            "title" => "Manual Payment Image (size: 900x500px) :",
            "type" => "media",
            "url" => false
          ),
        ),
      ),
      array(
        "id" => "durel_pbp_payment_group",
        "title" => "Add Payment System :",
        "type" => "group",
        "fields" => array(
          array(
            "id" => "durel_pbp_payment_method",
            "title" => "Payment Method :",
            "type" => "text",
          ),
          array(
            "id" => "durel_pbp_payment_app_img",
            "title" => "App Payment Image (size: 900x500px) :",
            "type" => "media",
            "url" => false
          ),
          array(
            "id" => "durel_pbp_payment_manual_img",
            "title" => "Manual Payment Image (size: 900x500px) :",
            "type" => "media",
            "url" => false
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
