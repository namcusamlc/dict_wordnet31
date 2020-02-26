<script>
    document.title = "Changing login password";
</script>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="update-pass-form" class="form-signin" role="form">
    <h1 class="h3 mb-3 font-weight-normal">Change login password</h1>

    <label for="inputOldPassword" class="sr-only">Old Password</label>
    <input type="password" name="inputOldPassword" class="form-control" placeholder="Old Password" required autofocus>

    <label for="inputNewPassword" class="sr-only">New Password</label>
    <input type="password" name="inputNewPassword" class="form-control" placeholder="New Password" required>

    <label for="ConfirmNewPassword" class="sr-only">Confirm New Password</label>
    <input type="password" name="ConfirmNewPassword" class="form-control" placeholder="Confirm New Password" required>

    <input class="btn btn-lg btn-outline-primary btn-block" name="submit" type="submit" value="Update">
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>