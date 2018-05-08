<?php include_once __DIR__ . DS . '..' . DS . 'helpers.php'; ?>

<?php loadBlinksTranslation(); ?>

<style>
.broken-link-list {
  margin-left: 3rem;
  font-size: .8em;
  padding-bottom: 1rem;
  font-style: italic;
}
.nav-list > li:last-of-type .broken-link-list {
  padding-bottom: 0;
}
</style>


<?php if(!$has_broken_links): ?>
  <div class="dashboard-box" style="margin-top: 1rem;">
    <div class="text"><?= l::get('broken-links.ok') ?></div>
  </div>

<?php else: ?>

  <ul class="nav nav-list sidebar-list">
    <?php foreach($broken_links as $page_id => $links): ?>
      <?php $page = panel()->page($page_id) ?>

      <li>
      <a href="<?= $page->url('edit') ?>">
        <?= $page->icon() ?>
        <?php $links_string = count($links) == 1 ? l::get('broken-links.link') : l::get('broken-links.links'); ?>
        <span><?= $page->title() ?></span>
        <small class="marginalia shiv shiv-left shiv-white" style="color: red; font-weight:bold;"><?= count($links) ?> <?= $links_string ?></small>
      </a>

      <ul class="broken-link-list">
        <?php foreach($links as $link): ?>
        <li><?= $link ?></li>
        <?php endforeach ?>
      </ul>

    </li>

    <?php endforeach ?>
  </ul>


<?php endif ?>
