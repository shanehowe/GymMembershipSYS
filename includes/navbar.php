<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
?>
<div class="navbar-container">
    <div class="navbar-brand">
        <p>Gym Membership SYS</p>
    </div>

    <div class="navbar-elements">
        <div class="nav-item">
            <a href="<?php echo BASE_URL . '/views/members/view.php' ?>">Member Management</a>
        </div>

        <div class="nav-item">
            <p>Classes</p>
        </div>
    </div>
</div>