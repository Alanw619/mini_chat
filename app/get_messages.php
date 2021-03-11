<?php

require_once __DIR__.'/../dbconnexion.php';



$allMessagesStatement = $pdo->prepare("SELECT msg.*, user.pseudo FROM msg 
                                        JOIN user
                                            ON msg.iduser = user.id ORDER BY msg.datecreate ASC");

$allMessagesStatement->execute();

$allMessages = $allMessagesStatement->fetchAll(PDO::FETCH_ASSOC);

foreach ($allMessages as $message) { ?>

<div class="row">
    <div class="col s9"><?=$message['msgtxt']?></div>
    <div class="col s3"><?= $message['pseudo']?> : <?=$message['datecreate']?></div>
</div>

<?php } ?>

