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

  <?php if ($site->social_networks()->isNotEmpty()) : ?>
    <ul class="footer__socials">
      <?php foreach ($site->social_networks()->toStructure() as $network): ?>
        <a class="footer__socials__network" href="<?= $network->url() ?>">
          <?= asset('assets/img/'.$network->type().'-logo-fill.svg')->read() ?>
        </a>
      <?php endforeach; ?>
    </ul>
  <?php endif ?>

  <div class="footer__legals">
    <?= $site->legals() ?>
  </div>

</footer>


<!-- <script src="js/vendor/modernizr-3.11.2.min.js"></script>
<script src="js/main.js"></script> -->

</body>

</html>
<?= js('@auto') ?>
