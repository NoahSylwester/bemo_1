<html>
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
<body id="login-page">
<h1><?= $page->title()->html() ?></h1>

<?php if($error): ?>
<div class="alert"><?= $page->alert()->html() ?></div>
<?php endif ?>

<form method="post" action="<?= $page->url() ?>">
  <div>
    <label for="email"><?= $page->username()->html() ?></label>
    <input type="email" id="email" name="email" value="<?= esc(get('email')) ?>">
  </div>
  <div>
    <label for="password"><?= $page->password()->html() ?></label>
    <input type="password" id="password" name="password" value="<?= esc(get('password')) ?>">
  </div>
  <div>
    <input type="submit" name="login" value="<?= $page->button()->html() ?>">
  </div>
</form>
</body>
</html>