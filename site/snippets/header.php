<!doctype html>
<html lang="en">
<head>
  <!-- Google analytics tag -->
  <?= $site->google() ?>
  <!-- Facebook advertising pixel -->
  <?= $site->facebook() ?>
  <!-- No-index tag -->
  <?php $noindex = $page->noindex() ?>
  <?php if ($noindex == "false"): ?>
    <meta name="robots" content="noindex" />
  <?php endif ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <!-- The meta description of each page -->
  <meta name="description" content="<?= $page->metadescription() ?>">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?= css(['assets/css/index.css', '@auto']) ?>

</head>
<body>

  <div class="page">
    <header class="header">
      <!-- In this link we call `$site->url()` to create a link back to the homepage -->

      <nav id="menu" class="menu">
        <a class="logo" href="<?= $site->url() ?>"><img src="<?= $site->image()->resize(167, 100)->url() ?>"/></a>
        <div class="nav-links" id="nav-links">
          <?php 
          // In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
          // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
          // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
          foreach ($site->children()->listed() as $item): ?>
          <a class="nav-link" href="<?= $item->url() ?>"><?= $item->title() ?></a>
          <?php endforeach ?>
          <?php if ($user = $kirby->user()): ?>
            <a class="nav-link" href="<?= url('logout') ?>">Logout</a>
          <?php endif ?>
          <a href="javascript:void(0);" class="icon" onclick="navbarClick()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </nav>
    </header>

