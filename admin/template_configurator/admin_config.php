<main class="nc_admin">
  <section>
    <h2>テンプレート詳細設定</h2>
<?php
global $parent_file;
if ($parent_file != 'options-general.php') {
  require_once(ABSPATH . 'wp-admin/options-head.php');
}
?>
    <form method="post">
      <dl>
        <dt>Google Tag Managerタグ</dt>
        <dd><textarea id="google_tagmanager_tag" name="nct001_google_tagmanager_tag"><?php echo esc_textarea(nc_option('google_tagmanager_tag')); ?></textarea></dd>
        <dt>Google Analyticsタグ</dt>
        <dd><textarea id="google_analytics_tag" name="nct001_google_analytics_tag"><?php echo esc_textarea(nc_option('google_analytics_tag')); ?></textarea></dd>
      </dl>
      <?php submit_button(); ?>
    </form>
  </section>
</main>
