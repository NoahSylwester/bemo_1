<?php if (!$kirby->user()) go('/login') ?>
<?php snippet('header') ?>

<div class="banner">
    <h1 id="banner-title">
        <p><?= $page->intro() ?></p>
        <div></div>
    </h1>
    <img src="<?= $page->image()->url() ?>" ?>
</div>
<div class="padding">
    <div class="text">
        <p class="text-content">
            <?= $page->text()->kt() ?>
        </p>
    </div>
</div>
<?php snippet('footer') ?>
