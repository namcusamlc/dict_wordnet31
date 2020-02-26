<script type="text/javascript">
    document.title = "Profile - Qdict";
</script>
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

<div id="user-profile">
    <div class="br-title"> <p> User Management </p> </div>
    <div class="alert info_profile">Username: <b><?php echo $_SESSION['user']['username']; ?> </b> </div>
    <div class="alert info_profile">Password: <b> ********** </b>
            <a class="btn btn-primary btn-change-pass" href="<?php echo ROOT_URL; ?>users/updatePass">
                Change password
            </a>
    </div>
    <div class="alert info_profile">Email:    <b><?php echo $_SESSION['user']['email']; ?> </b> </div>
</div>