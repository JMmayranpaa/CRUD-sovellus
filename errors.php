
<!-- error handlausta -->
<?php if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>

<!--Lähteet:-->
<!--https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database-->
<!--Linkin koodi muokattu sovellukseen sopivaksi.-->