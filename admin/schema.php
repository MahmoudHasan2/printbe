<?php
/**
 * Every section listed here becomes an item in the dashboard sidebar.
 * type: 'simple'   -> a single object of fields, addressed by 'path'
 *       'repeater' -> a list of objects, addressed by 'path', each row
 *                     using the same 'fields' definition
 * field type: text | textarea | image | number | checkbox
 */
return [

    'settings' => [
        'label' => 'Site Settings', 'icon' => 'fa-gear', 'group' => 'Global',
        'type' => 'simple', 'path' => ['settings'],
        'fields' => [
            'site_name'       => ['label' => 'Site Name', 'type' => 'text'],
            'brand_name'      => ['label' => 'Logo Text (part 1)', 'type' => 'text'],
            'brand_accent'    => ['label' => 'Logo Text (part 2, colored)', 'type' => 'text'],
            'phone'           => ['label' => 'Phone Number', 'type' => 'text'],
            'email'           => ['label' => 'Email Address', 'type' => 'text'],
            'address'         => ['label' => 'Address', 'type' => 'text'],
            'promo_text'      => ['label' => 'Top Promo Bar Text', 'type' => 'text'],
            'promo_link_text' => ['label' => 'Promo Bar Button Text', 'type' => 'text'],
            'footer_about'    => ['label' => 'Footer About Text', 'type' => 'textarea'],
            'facebook'        => ['label' => 'Facebook URL', 'type' => 'text'],
            'twitter'         => ['label' => 'Twitter / X URL', 'type' => 'text'],
            'instagram'       => ['label' => 'Instagram URL', 'type' => 'text'],
            'pinterest'       => ['label' => 'Pinterest URL', 'type' => 'text'],
        ],
    ],

    'ribbons' => [
        'label' => 'Scrolling Ribbon Tags', 'icon' => 'fa-arrows-left-right', 'group' => 'Global',
        'type' => 'simple', 'path' => ['ribbons'],
        'fields' => [
            'category_tags'    => ['label' => 'Category Ribbon (one tag per line)', 'type' => 'textarea'],
            'shop_tags'        => ['label' => 'Shop Tags Ribbon (one tag per line)', 'type' => 'textarea'],
            'testimonial_word1'=> ['label' => 'Testimonials Ribbon — Word 1', 'type' => 'text'],
            'testimonial_word2'=> ['label' => 'Testimonials Ribbon — Word 2', 'type' => 'text'],
        ],
    ],

    'home_hero' => [
        'label' => 'Hero Slides', 'icon' => 'fa-images', 'group' => 'Home Page',
        'type' => 'repeater', 'path' => ['home', 'hero_slides'], 'item_label_field' => 'title_line1',
        'fields' => [
            'badge'           => ['label' => 'Badge Text', 'type' => 'text'],
            'badge_icon'      => ['label' => 'Badge Icon (Font Awesome class)', 'type' => 'text'],
            'title_line1'     => ['label' => 'Title — Line 1', 'type' => 'text'],
            'title_highlight' => ['label' => 'Title — Highlighted Word', 'type' => 'text'],
            'title_line2'     => ['label' => 'Title — Line 2', 'type' => 'text'],
            'desc'            => ['label' => 'Description', 'type' => 'textarea'],
            'btn1_text'       => ['label' => 'Button 1 Text', 'type' => 'text'],
            'btn1_link'       => ['label' => 'Button 1 Link', 'type' => 'text'],
            'btn2_text'       => ['label' => 'Button 2 Text', 'type' => 'text'],
            'btn2_link'       => ['label' => 'Button 2 Link', 'type' => 'text'],
            'stat1_num'       => ['label' => 'Stat 1 — Number', 'type' => 'text'],
            'stat1_suffix'    => ['label' => 'Stat 1 — Suffix', 'type' => 'text'],
            'stat1_label'     => ['label' => 'Stat 1 — Label', 'type' => 'text'],
            'stat2_num'       => ['label' => 'Stat 2 — Number', 'type' => 'text'],
            'stat2_suffix'    => ['label' => 'Stat 2 — Suffix', 'type' => 'text'],
            'stat2_label'     => ['label' => 'Stat 2 — Label', 'type' => 'text'],
            'stat3_num'       => ['label' => 'Stat 3 — Number', 'type' => 'text'],
            'stat3_suffix'    => ['label' => 'Stat 3 — Suffix', 'type' => 'text'],
            'stat3_label'     => ['label' => 'Stat 3 — Label', 'type' => 'text'],
            'main_img'        => ['label' => 'Main Image', 'type' => 'image'],
            'float_img1'      => ['label' => 'Floating Image 1', 'type' => 'image'],
            'float_img2'      => ['label' => 'Floating Image 2', 'type' => 'image'],
            'float_img3'      => ['label' => 'Floating Image 3', 'type' => 'image'],
        ],
    ],

    'home_usp' => [
        'label' => 'USP Strip (4 icons)', 'icon' => 'fa-circle-check', 'group' => 'Home Page',
        'type' => 'repeater', 'path' => ['home', 'usp'], 'item_label_field' => 'title',
        'fields' => [
            'icon'  => ['label' => 'Icon (Font Awesome class)', 'type' => 'text'],
            'title' => ['label' => 'Title', 'type' => 'text'],
            'desc'  => ['label' => 'Subtitle', 'type' => 'text'],
        ],
    ],

    'home_stats' => [
        'label' => 'Stats Band', 'icon' => 'fa-chart-simple', 'group' => 'Home Page',
        'type' => 'repeater', 'path' => ['home', 'stats'], 'item_label_field' => 'label',
        'fields' => [
            'num'    => ['label' => 'Number', 'type' => 'text'],
            'suffix' => ['label' => 'Suffix (+ / % / K+)', 'type' => 'text'],
            'label'  => ['label' => 'Label', 'type' => 'text'],
        ],
    ],

    'home_reasons' => [
        'label' => 'Reasons To Choose Us', 'icon' => 'fa-star', 'group' => 'Home Page',
        'type' => 'repeater', 'path' => ['home', 'reasons'], 'item_label_field' => 'title',
        'fields' => [
            'icon'  => ['label' => 'Icon (Font Awesome class)', 'type' => 'text'],
            'title' => ['label' => 'Title', 'type' => 'text'],
            'desc'  => ['label' => 'Description', 'type' => 'textarea'],
        ],
    ],

    'home_steps' => [
        'label' => '3-Step Process', 'icon' => 'fa-shoe-prints', 'group' => 'Home Page',
        'type' => 'repeater', 'path' => ['home', 'steps'], 'item_label_field' => 'title',
        'fields' => [
            'title' => ['label' => 'Title', 'type' => 'text'],
            'desc'  => ['label' => 'Description', 'type' => 'textarea'],
        ],
    ],

    'home_bulk_cta' => [
        'label' => 'Bulk Order Banner', 'icon' => 'fa-boxes-stacked', 'group' => 'Home Page',
        'type' => 'simple', 'path' => ['home', 'bulk_cta'],
        'fields' => [
            'label'    => ['label' => 'Small Label', 'type' => 'text'],
            'title'    => ['label' => 'Title', 'type' => 'text'],
            'desc'     => ['label' => 'Description', 'type' => 'textarea'],
            'btn_text' => ['label' => 'Button Text', 'type' => 'text'],
            'btn_link' => ['label' => 'Button Link', 'type' => 'text'],
            'img1'     => ['label' => 'Image 1', 'type' => 'image'],
            'img2'     => ['label' => 'Image 2', 'type' => 'image'],
            'img3'     => ['label' => 'Image 3', 'type' => 'image'],
        ],
    ],

    'home_pricing' => [
        'label' => 'Pricing Plans', 'icon' => 'fa-tags', 'group' => 'Home Page',
        'type' => 'repeater', 'path' => ['home', 'pricing'], 'item_label_field' => 'tag',
        'fields' => [
            'tag'      => ['label' => 'Plan Name', 'type' => 'text'],
            'desc'     => ['label' => 'Short Description', 'type' => 'text'],
            'price_m'  => ['label' => 'Monthly Price ($ number only)', 'type' => 'number'],
            'price_y'  => ['label' => 'Yearly Price ($ number only)', 'type' => 'number'],
            'features' => ['label' => 'Features (one per line)', 'type' => 'textarea'],
            'featured' => ['label' => 'Highlight This Plan', 'type' => 'checkbox'],
        ],
    ],

    'home_newsletter' => [
        'label' => 'Newsletter Banner', 'icon' => 'fa-envelope-open-text', 'group' => 'Home Page',
        'type' => 'simple', 'path' => ['home', 'newsletter'],
        'fields' => [
            'title' => ['label' => 'Title', 'type' => 'text'],
            'desc'  => ['label' => 'Description', 'type' => 'textarea'],
        ],
    ],

    'services_page' => [
        'label' => 'Services Page Intro', 'icon' => 'fa-file-lines', 'group' => 'Services Page',
        'type' => 'simple', 'path' => ['services_page'],
        'fields' => [
            'badge' => ['label' => 'Small Label', 'type' => 'text'],
            'title' => ['label' => 'Title', 'type' => 'text'],
            'desc'  => ['label' => 'Description', 'type' => 'textarea'],
        ],
    ],

    'services_list' => [
        'label' => 'Services (shared list)', 'icon' => 'fa-screwdriver-wrench', 'group' => 'Services Page',
        'type' => 'repeater', 'path' => ['services_list'], 'item_label_field' => 'title',
        'fields' => [
            'image' => ['label' => 'Image', 'type' => 'image'],
            'title' => ['label' => 'Title', 'type' => 'text'],
            'desc'  => ['label' => 'Description', 'type' => 'textarea'],
        ],
    ],

    'shop_page' => [
        'label' => 'Shop Filters', 'icon' => 'fa-filter', 'group' => 'Shop Page',
        'type' => 'simple', 'path' => ['shop_page'],
        'fields' => [
            'badge'             => ['label' => 'Sidebar Heading', 'type' => 'text'],
            'filter_categories' => ['label' => 'Categories — one per line as "Name|Count"', 'type' => 'textarea'],
        ],
    ],

    'products' => [
        'label' => 'Products (shared list)', 'icon' => 'fa-box-open', 'group' => 'Shop Page',
        'type' => 'repeater', 'path' => ['products'], 'item_label_field' => 'name',
        'fields' => [
            'image'    => ['label' => 'Image', 'type' => 'image'],
            'badge'    => ['label' => 'Badge Text (e.g. -20%, New — leave blank for none)', 'type' => 'text'],
            'category' => ['label' => 'Category', 'type' => 'text'],
            'name'     => ['label' => 'Product Name', 'type' => 'text'],
            'price'    => ['label' => 'Price / Price Range', 'type' => 'text'],
        ],
    ],

    'about_page' => [
        'label' => 'About Page — Story', 'icon' => 'fa-building', 'group' => 'About Page',
        'type' => 'simple', 'path' => ['about_page'],
        'fields' => [
            'badge'        => ['label' => 'Small Label', 'type' => 'text'],
            'title'        => ['label' => 'Title', 'type' => 'text'],
            'desc1'        => ['label' => 'Paragraph 1', 'type' => 'textarea'],
            'desc2'        => ['label' => 'Paragraph 2', 'type' => 'textarea'],
            'story_img'    => ['label' => 'Story Image', 'type' => 'image'],
            'badge_years'  => ['label' => 'Years Badge (e.g. 25+)', 'type' => 'text'],
            'value1_title' => ['label' => 'Value 1 — Title', 'type' => 'text'],
            'value1_desc'  => ['label' => 'Value 1 — Description', 'type' => 'text'],
            'value2_title' => ['label' => 'Value 2 — Title', 'type' => 'text'],
            'value2_desc'  => ['label' => 'Value 2 — Description', 'type' => 'text'],
            'value3_title' => ['label' => 'Value 3 — Title', 'type' => 'text'],
            'value3_desc'  => ['label' => 'Value 3 — Description', 'type' => 'text'],
        ],
    ],

    'about_stats' => [
        'label' => 'About Page — Stats', 'icon' => 'fa-chart-simple', 'group' => 'About Page',
        'type' => 'repeater', 'path' => ['about_page', 'stats'], 'item_label_field' => 'label',
        'fields' => [
            'num'    => ['label' => 'Number', 'type' => 'text'],
            'suffix' => ['label' => 'Suffix', 'type' => 'text'],
            'label'  => ['label' => 'Label', 'type' => 'text'],
        ],
    ],

    'team' => [
        'label' => 'Team Members', 'icon' => 'fa-people-group', 'group' => 'About Page',
        'type' => 'repeater', 'path' => ['team'], 'item_label_field' => 'name',
        'fields' => [
            'image'    => ['label' => 'Photo', 'type' => 'image'],
            'name'     => ['label' => 'Name', 'type' => 'text'],
            'role'     => ['label' => 'Role', 'type' => 'text'],
            'linkedin' => ['label' => 'LinkedIn URL', 'type' => 'text'],
            'twitter'  => ['label' => 'Twitter / X URL', 'type' => 'text'],
        ],
    ],

    'contact_page' => [
        'label' => 'Contact Page Intro', 'icon' => 'fa-address-card', 'group' => 'Contact Page',
        'type' => 'simple', 'path' => ['contact_page'],
        'fields' => [
            'intro_desc' => ['label' => 'Form Intro Text', 'type' => 'textarea'],
        ],
    ],

    'contact_hours' => [
        'label' => 'Business Hours', 'icon' => 'fa-clock', 'group' => 'Contact Page',
        'type' => 'repeater', 'path' => ['contact_page', 'hours'], 'item_label_field' => 'day',
        'fields' => [
            'day'  => ['label' => 'Day(s)', 'type' => 'text'],
            'time' => ['label' => 'Hours', 'type' => 'text'],
        ],
    ],

    'testimonials' => [
        'label' => 'Testimonials', 'icon' => 'fa-quote-left', 'group' => 'Shared Content',
        'type' => 'repeater', 'path' => ['testimonials'], 'item_label_field' => 'author_name',
        'fields' => [
            'stars'        => ['label' => 'Star Rating (1–5)', 'type' => 'number'],
            'text'         => ['label' => 'Quote', 'type' => 'textarea'],
            'author_image' => ['label' => 'Author Photo', 'type' => 'image'],
            'author_name'  => ['label' => 'Author Name', 'type' => 'text'],
            'author_role'  => ['label' => 'Author Role / Company', 'type' => 'text'],
        ],
    ],

    'blog_posts' => [
        'label' => 'Blog Posts', 'icon' => 'fa-newspaper', 'group' => 'Shared Content',
        'type' => 'repeater', 'path' => ['blog_posts'], 'item_label_field' => 'title',
        'fields' => [
            'image'    => ['label' => 'Cover Image', 'type' => 'image'],
            'author'   => ['label' => 'Author', 'type' => 'text'],
            'date'     => ['label' => 'Date', 'type' => 'text'],
            'comments' => ['label' => 'Comment Count', 'type' => 'text'],
            'title'    => ['label' => 'Title', 'type' => 'text'],
            'excerpt'  => ['label' => 'Short Excerpt', 'type' => 'textarea'],
            'body'     => ['label' => 'Full Article Body (blank line = new paragraph)', 'type' => 'textarea'],
        ],
    ],

];
