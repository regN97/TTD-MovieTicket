<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?= BASE_ASSETS_CSS . 'main.css'; ?>" rel="stylesheet" />
</head>

<body class="bg-image bg-body">
    <?php require_once PATH_ASSETS_INC_CLIENT . 'navigation.php'; ?>
    <?php require_once PATH_ASSETS_INC_CLIENT . 'header.php'; ?>

    <!-- Section-->
    <section class="container mt-3">
        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_CLIENT . $view . '.php';
            }
            ?>
        </div>
    </section>

    <?php require_once PATH_ASSETS_INC_CLIENT . 'footer.php'; ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="/../duan1_TTDMovieTicket/assets/js/main.js"></script>
</body>

</html>