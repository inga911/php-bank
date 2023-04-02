<?php
use App\Services\Auth;
?>
<?php if (isset($hideNav)) return ?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>clients">Clients List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>clients/create">Add Client</a>
                </li>
            </ul>
            <span class="navbar-text">
            <?php if (Auth::get()->isAuth()) : ?>
                <span class="user-email"><?= Auth::get()->getName() ?></span>
                <form class="logout" action="<?= URL ?>logout" method="post">
                    <button class="logout-btn" type="submit">Logout </button>
                </form>
            <?php else : ?>
                <a class="nav-link" href="<?= URL ?>login">LOGIN</a>
            <?php endif ?>
            </span>
        </div>
    </div>
</nav>