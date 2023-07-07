<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h3 class="display-4">Hello, <?= (isset($_SESSION['user']) && property_exists($_SESSION['user'], 'email')) ? $_SESSION['user']->email : 'Guest' ?></h3>
    </div>
</div>
