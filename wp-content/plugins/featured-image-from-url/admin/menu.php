<?php

add_action('admin_menu', 'fifu_insert_menu');

function fifu_insert_menu() {
    add_menu_page(
            'Featured Image From URL', 'Featured Image From URL', 'administrator', 'featured-image-from-url', 'fifu_get_menu_html', plugins_url() . '/featured-image-from-url/admin/images/favicon.png'
    );

    add_action('admin_init', 'fifu_get_menu_settings');
}

function fifu_get_menu_html() {
    $image_button = plugins_url() . '/featured-image-from-url/admin/images/onoff.jpg';

    $enable_woocommerce = get_option('fifu_woocommerce');
    $enable_social = get_option('fifu_social');
    $enable_content = get_option('fifu_content');
    $enable_hide_page = get_option('fifu_hide_page');
    $enable_hide_post = get_option('fifu_hide_post');
    $enable_get_first = get_option('fifu_get_first');
    $enable_pop_first = get_option('fifu_pop_first');
    $enable_ovw_first = get_option('fifu_ovw_first');
    $column_height = get_option('fifu_column_height');

    $array_cpt = array();
    for ($x = 0; $x <= 4; $x++)
        $array_cpt[$x] = get_option('fifu_cpt' . $x);

    include 'html/menu.html';

    fifu_update_menu_options();

    fifu_script_woocommerce();
}

function fifu_get_menu_settings() {
    fifu_get_setting('fifu_woocommerce');
    fifu_get_setting('fifu_social');
    fifu_get_setting('fifu_content');
    fifu_get_setting('fifu_hide_page');
    fifu_get_setting('fifu_hide_post');
    fifu_get_setting('fifu_get_first');
    fifu_get_setting('fifu_pop_first');
    fifu_get_setting('fifu_ovw_first');
    fifu_get_setting('fifu_column_height');

    for ($x = 0; $x <= 4; $x++)
        fifu_get_setting('fifu_cpt' . $x);
}

function fifu_get_setting($type) {
    register_setting('settings-group', $type);

    if (!get_option($type)) {
        if (strpos($type, "cpt") !== false)
            update_option($type, '');
        else if (strpos($type, "fifu_column_height") !== false)
            update_option($type, "64");
        else
            update_option($type, 'toggleoff');
    }
}

function fifu_update_menu_options() {
    fifu_update_option('fifu_input_woocommerce', 'fifu_woocommerce');
    fifu_update_option('fifu_input_social', 'fifu_social');
    fifu_update_option('fifu_input_content', 'fifu_content');
    fifu_update_option('fifu_input_hide_page', 'fifu_hide_page');
    fifu_update_option('fifu_input_hide_post', 'fifu_hide_post');
    fifu_update_option('fifu_input_get_first', 'fifu_get_first');
    fifu_update_option('fifu_input_pop_first', 'fifu_pop_first');
    fifu_update_option('fifu_input_ovw_first', 'fifu_ovw_first');
    fifu_update_option('fifu_input_column_height', 'fifu_column_height');

    for ($x = 0; $x <= 4; $x++)
        fifu_update_option('fifu_input_cpt' . $x, 'fifu_cpt' . $x);
}

function fifu_update_option($input, $type) {
    if (isset($_POST[$input])) {
        if ($_POST[$input] == 'on')
            update_option($type, 'toggleon');
        else if ($_POST[$input] == 'off')
            update_option($type, 'toggleoff');
        else
            update_option($type, wp_strip_all_tags($_POST[$input]));
    }
}

function fifu_script_woocommerce() {
    if (get_option('fifu_woocommerce') == 'toggleon') {
        $command1 = "echo " . get_template_directory() . " > ../wp-content/plugins/featured-image-from-url/scripts/tmp.txt";
        $command2 = "sh ../wp-content/plugins/featured-image-from-url/scripts/enableWoocommerce.sh";
    } else {
        $command1 = "sh ../wp-content/plugins/featured-image-from-url/scripts/disableWoocommerce.sh";
        $command2 = "rm ../wp-content/plugins/featured-image-from-url/scripts/tmp.txt";
    }
    shell_exec($command1);
    shell_exec($command2);
}

function show_woocommerce_box() {
    return function_exists('WC') && WC()->version < 2.6 ? 'display:inline' : 'display:none';
}
