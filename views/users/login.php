<script> document.title = "Qdict - Login" </script>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputUsername" class="sr-only">Email address</label>
    <input type="text" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Sign in">
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
