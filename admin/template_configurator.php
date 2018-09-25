<?php
/*
　管理メニューに「操作マニュアル」ページを追加
*/
function nc_template_configurator() {
  if (is_admin()) {
    add_submenu_page('themes.php', 'テンプレート詳細設定', 'テンプレート詳細設定', 'manage_options', 'nc_template_configurator', 'nc_configurator_page');
  }
}
add_action('admin_menu', 'nc_template_configurator');

function nc_configurator_page() {
  $update_values = get_option('nct001');
  $update_flag   = false;
  foreach ($_POST as $key => $value) {
    $key   = trim($key);
    $value = trim(wp_unslash($value));
    if (preg_match('/^nct001_.+$/', $key) === 1) {
      $option_name = preg_replace('/^nct001_(.+)$/', '$1', $key);
      if ($update_values[$option_name] !== $value) {
        $update_values[$option_name] = $value;
        $update_flag = true;
      }
    }
  }
  if ($update_flag) update_option('nct001', $update_values);
  get_template_part('admin/template_configurator/admin_config');
}

function nc_admin_style() {
  wp_enqueue_style('nc_admin_style', get_template_directory_uri().'/admin/css/admin_style.css');
}
add_action('admin_enqueue_scripts', 'nc_admin_style');

function nc_admin_script() {
  /*wp_enqueue_script( 'my_admin_script', get_template_directory_uri().'/my_admin_script.js' );
   
  // jQuery のコードだった場合
  wp_enqueue_script( 'my_admin_script', get_template_directory_uri().'/my_admin_script.js', array('jquery'));
   
  // body 終了タグ直前で読み込みたい場合（読み込み位置をフッターにするには第4引数を true にします）
  wp_enqueue_script( 'my_admin_script', get_template_directory_uri().'/my_admin_script.js', '', '', true);
   
  // body 終了タグ直前で jQuery のファイルを読み込みたい場合
  wp_enqueue_script( 'my_admin_script', get_template_directory_uri().'/my_admin_script.js', array('jquery'), '', true);*/
  wp_enqueue_script('nc_admin_script', get_template_directory_uri().'/admin/js/admin_common.js', '', '', true);
  wp_enqueue_script('nc_vue_js', get_template_directory_uri().'/admin/js/vue.js', '', '', true);
}
add_action('admin_enqueue_scripts', 'nc_admin_script');
?>