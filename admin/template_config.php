<?php
/*
　管理メニューに「操作マニュアル」ページを追加
*/
function template_config() {
  get_template_part('admin/_partial/admin_config');
}
function template_customizer_sub1() {
  get_template_part('admin/_partial/admin_info');
}
function nc_template_customizer() {
  add_menu_page('テンプレートカスタマイズ', 'テンプレートカスタマイズ', 'manage_options', 'nc_template_customizer', 'template_config');
  add_submenu_page('nc_template_customizer', '情報', '情報', 'manage_options', 'template_customizer_sub1', 'template_customizer_sub1');
}
add_action('admin_menu', 'nc_template_customizer');

function nc_admin_style() {
  wp_enqueue_style('my_admin_style', get_template_directory_uri().'/admin/css/admin_style.css');
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
}
add_action('admin_enqueue_scripts', 'nc_admin_script');
?>