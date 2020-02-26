<script> document.title = "History" </script>
<div id="search-history-box" style="margin-top: 50px">
    <p> Looked-up words </p>
    <div class="history-container">
        <?php
            $show = $viewmodel;
            foreach($show as $value) {
                echo "<div class='h_word'><a href='" . ROOT_URL. "/dictionaries/search/{$value['word']}' "
                    ."title='Last time: {$value['timestamp']}' class='badge badge-primary'>{$value['word']}</a></div>";
            }
        ?>
    </div>

</div>

<!--<iframe frameborder="0" class="quick_meaning" src="<?php echo ROOT_URL; ?>assets/iframe/quickmeaning.php" ></iframe>-->