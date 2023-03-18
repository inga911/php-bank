<?php
defined('ENTER') || die('Neturite leidimo patekti  i si puslapi');
?>
<style>
    h3, form {
        display: inline-block;
        margin-left: 20px;
    }
    button {
        background: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }
</style>

<?php if (isset($_SESSION['logged'])  && $_SESSION['logged'] == 1) : ?>
    
    
<?php else : ?>
    <a class="btn btn-main-page" href="http://localhost/php-bank/u2/bank/login">Prisijungti</a>
<?php endif ?>

