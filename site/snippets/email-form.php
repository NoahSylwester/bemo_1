<?php if($success): ?>
    <div class="alert success">
        <p><?= $success ?></p>
    </div>
    <?php else: ?>
    <?php if (isset($alert['error'])): ?>
        <div><?= $alert['error'] ?></div>
    <?php endif ?>
    <form method="post" action="<?= $page->url() ?>">
        <div class="honeypot">
            <label for="website">Website <abbr title="required">*</abbr></label>
            <input type="website" id="website" name="website">
        </div>
        <div class="field">
            <label for="name">
                NAME: <span title="required">*</span>
            </label>
            <div>
                <input class="contact-input" type="text" id="name" name="name" value="<?= $data['name'] ?? '' ?>" required>
            </div>
            <?= isset($alert['name']) ? '<span class="alert error">' . html($alert['name']) . '</span>' : '' ?>
        </div>
        <div class="field">
            <label for="email">
                EMAIL ADDRESS: <span title="required">*</span>
            </label>
            <div>
                <input class="contact-input" type="email" id="email" name="email" value="<?= $data['email'] ?? '' ?>" required>
            </div>
            <?= isset($alert['email']) ? '<span class="alert error">' . html($alert['email']) . '</span>' : '' ?>
        </div>
        <div class="field">
            <label for="text">
                HOW CAN WE HELP YOU? <span title="required">*</span>
            </label>
            <div>
                <textarea id="text" name="text" class="contact-input" required><?= $data['text'] ?? '' ?></textarea>
            </div>
            <?= isset($alert['text']) ? '<span class="alert error">' . html($alert['text']) . '</span>' : '' ?>
        </div>
        <input class="form-button" type="reset" name="reset" value="Reset">
        <input class="form-button" type="submit" name="submit" value="Submit">
    </form>
<?php endif ?>