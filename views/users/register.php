<script> document.title = "Qdict - Register" </script>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="register-form" class="form-signin" role="form">
    <h1 class="h3 mb-3 font-weight-normal">Register in Qdict</h1>

    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" name="inputUsername" class="form-control" placeholder="Username" required autofocus>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

    <label for="ConfirmPassword" class="sr-only">Confirm Password</label>
    <input type="password" name="ConfirmPassword" class="form-control" placeholder="Confirm Password" required>

    <input class="btn btn-lg btn-outline-primary btn-block" name="submit" type="submit" value="Sign up">
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>