<?php
/* Custom Fields */
function add_custom_fields() {
  $post_id = '';
  if (isset($_GET['post']) || isset($_POST['post_ID'])) {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
  }
  if ($post_id == get_option('page_on_front')) {
    add_meta_box('frontpage_custom_content', 'カスタムコンテンツ (HTMLタグ)', 'frontpage_fields_input', 'page', 'normal', 'default');
  }
}
add_action('add_meta_boxes', 'add_custom_fields');
 
function frontpage_fields_input() {
  global $post;
  echo '<p>ページ上部に表示されるカスタムコンテンツを登録できます。HTMLタグを使って記述してください。</p>';
  echo '<textarea name="frontpage_custom_content" rows="16" style="width: 100%;">' . get_post_meta($post->ID, 'frontpage_custom_content', true) . '</textarea>';
}

function frontpage_fields_save($post_id) {
  if (!empty($_POST['frontpage_custom_content'])) {
    update_post_meta($post_id, 'frontpage_custom_content', $_POST['frontpage_custom_content'] );
  } else {
    delete_post_meta($post_id, 'frontpage_custom_content');
  }
}
add_action('save_post', 'frontpage_fields_save');
/* /Custom Fields */
?>