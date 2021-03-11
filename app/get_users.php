<?php
require './dbconnexion.php';

$allUsersStatement = $pdo->prepare("SELECT * FROM user");

$allUsersStatement->execute();

$allUsers = $allUsersStatement->fetchAll(PDO::FETCH_ASSOC);


foreach ($allUsers as $user) { ?>

<div class="row">
    <div class="col"> <?= $user['pseudo'] ?></div>
</div>

<?php } ?>

