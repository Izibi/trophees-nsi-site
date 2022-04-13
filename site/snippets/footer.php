<footer class="footer">

  <figure class="footer__logo">
    <a href="#">
      <?= asset('assets/img/nsi-logo.svg')->read() ?>
    </a>
  </figure>

   <ul class="footer__menu">
    <?php foreach ($site->footer_links()->toPages() as $entry): ?>
      <li class="footer__menu__entry">
        <a href="<?= $entry->url() ?>"><?= $entry->title() ?></a>
      </li>
    <?php endforeach; ?>
  </ul>

  <div class="footer__legals">
    <?= $site->legals() ?>
  </div>

</footer>


<!-- <script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/main.js"></script> -->

</body>

</html>
<?= js('@auto') ?>
