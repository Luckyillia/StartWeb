<p>Witaj na czacie <strong><?php echo htmlspecialchars($user_name); ?></strong> w pokoju <strong><?php echo htmlspecialchars($room_name['pokoj']); ?></strong></p>
<div class="row">
    <div class="col-md-8">
        <div class="chat-container p-3">
            <?php if (empty($messages)) : ?>
                <p>Brak wiadomości</p>
            <?php else : ?>
                <?php foreach ($messages as $msg) : ?>
                    <p><strong><?php echo htmlspecialchars($msg['user']); ?>:</strong> <?php echo htmlspecialchars($msg['message']); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <form action="send_message.php" method="post" class="d-flex mt-2">
            <input type="text" name="message" class="form-control me-2" placeholder="Wpisz tutaj wiadomość, którą chcesz dodać na czacie" required>
            <button type="submit" class="btn btn-primary">Wyślij</button>
        </form>
    </div>
    <div class="col-md-4">
        <div class="users-list p-3">
            <h5>Zalogowani</h5>
            <?php
            if(isset($users) && count($users) > 0){
                foreach($users as $user){
                    echo '<p>'.$user.'</p>';
                }
            }else{
                echo '<p>Brak użytkowników</p>';
            }

            ?>
        </div>
    </div>
</div>