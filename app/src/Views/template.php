<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?= $title; ?></title>
</head>
<body>


<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"/>
                </svg>
            </a>
            <?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) { ?>
                <h2 class="username"><?php echo $_SESSION['user_token']['username']; ?></h2>
            <?php } ?>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                <?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) { ?>
                    <li><a href="/post" class="nav-link px-2 text-secondary">New Post</a></li>
                    <li><a href="/author" class="nav-link px-2 text-white">User</a></li>
                <?php } ?>
                <li><a href="#" class="nav-link px-2 text-white">Api</a></li>
            </ul>
            <?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) { ?>
                <a href="setting" type="button" class="link px-2 text-white">Setting</a>
            <?php } ?>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <!-- IF USER CONNECTED -->
                <?php if ( isset($_SESSION['user_token']) && $_SESSION['user_token'] == true) { ?>
                    <a href="logout" type="button" class="btn btn-outline-light me-2">Logout</a>
                <?php } else { ?>
                    <!-- IF USER NOT CONNECTED -->
                    <a href="login" type="button" class="btn btn-outline-light me-2">Login</a>
                    <a href="register" type="button" class="btn btn-warning">Sign-in</a>
                <?php } ?>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?= $content; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>