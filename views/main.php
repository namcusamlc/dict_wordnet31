<html>
<head>
    <title><?php echo $_GET['id']?> meaning in Qdict</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ROOT_URL; ?>assets/img/favicon.ico" />
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/style.css">
    <script src="<?php echo ROOT_URL; ?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Qdict</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a></li>
            <?php if (isset($_SESSION['is_logged_in'])) : ?> )
            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>history">Looked-up words</a></li>
            <?php endif; ?>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <?php if(isset($_SESSION['is_logged_in'])) :  ?>
                <li>
                    <a class="nav-link" href="<?php echo ROOT_URL; ?>users/profile">Welcome, <?php echo $_SESSION['user']['username']; ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo ROOT_URL ?>users/logout">Logout</a>
                </li>

            <?php else : ?>
                <li>
                    <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Sign in</a>
                 </li>
                <li>
                    <a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Sign up</a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>

<div role="main">
    <?php Messages::display(); ?>

    <?php require($view); ?>
</div><!-- /.container -->
</body>
<script src="<?php echo ROOT_URL; ?>assets/js/main.js"></script>
</html>