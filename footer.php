  </main>
  <footer>
    <nav>
<?php
wp_nav_menu(array(
  'theme_location' => 'primary',
  'container'      => false,
  'menu_class'     => '',
  'depth'          => 1
));
?>
    </nav>
    <div>&copy; <?php bloginfo('name'); ?></div>
  </footer>
</body>
</html>