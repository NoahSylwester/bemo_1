<?php if (!$kirby->user()) go('/login') ?>
<?php snippet('header') ?>

<img class="contact-banner" src="<?= $page->image()->url() ?>"/>

<div class="padding">
    <div class="message-text">
        <h4><?= $site->title() ?></h4>
        <div>
            <div><strong>Toll Free: </strong><?= $page->phone() ?></div>
            <div><strong>Email: </strong><?= $page->email() ?></div>
        </div>
    </div>

    <?php snippet('email-form') ?>

    <p>
        <strong>Note:</strong> If you are having difficulties with our contact us form above, send us an email to <?= $page->email() ?> (copy & paste the email address)
    </p>
</div>

<?php snippet('footer') ?>
