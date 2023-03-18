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
    .login-btn{
        color: rgb(0, 0, 0);
        border: 0.5px solid;
        border-radius: 0.4em;
        padding: 5px 8px;
        display: inline-block;
        text-decoration: none;
        font-size: 16px;
        background-color: #fdb5bcbb;
        border-color: #946065bb;
        margin-left: 43%;
        width: 10%;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .login-btn:hover{
        background-color: rgba(3, 148, 138, 0.568);
        color: #fff;
        cursor: pointer;
    }
</style>

<?php if (isset($_SESSION['logged'])  && $_SESSION['logged'] == 1) : ?>
    
    
<?php else : ?>
    <a class="login-btn" href="http://localhost/php-bank/u2/bank/login">Prisijungti</a>
<?php endif ?>

