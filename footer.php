<footer id="footer">
  <div class="container">
    <div class="row">
      <?php clean_custom_menu("footer_menu"); ?>
    </div>
    <div class="row">
      <div class="col-12 social">
        <?php my_social_media_icons(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 description">
    <?php bloginfo( 'description' ); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 copyright">
        <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved</p>
      </div>
    </div>
  </div>
</footer>

    <?php wp_footer(); ?>
  </body>
</html>
