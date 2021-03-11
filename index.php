<?php include './partials/header.php' ?>

<?php include './app/new_message.php' ?>


<div class="row">
    <section class="col s10 section-message">
        <h5>LISTE DES MESSAGES</h5>
        <div class="boxMsg">
            <?php include './app/get_messages.php'?>
        </div>

    </section>
    <section class="col s2 ">
        <h5>LISTE DES UTILISATEUR</h5>
        <?php include './app/get_users.php'?>
    </section>
</div>


<section>
<form class="col s12" method="post">

        <div class="row">
            <div class="input-field col s2">
                <input id="pseudo" type="text" name="pseudo" data-length="10">
                <label for="pseudo">Pseudo</label>
            </div>

            <div class="input-field col s8">
                <textarea id="message" class="materialize-textarea" name="message" data-length="120"></textarea>
                <label for="message">Message</label>
            </div>
            <div class="input-field col s2">
                <button id="sendButton" type="submit" class="waves-effect waves-light btn #e65100 orange darken-4">Send Message</button>
            </div>
        </div>  
</form>


</section>



<?php include './partials/footer.php' ?>