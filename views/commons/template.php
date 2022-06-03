<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?=$description?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="icon" href="public/sources/logo/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://bootswatch.com/5/spacelab/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="persoLogoSize" src="public/sources/logo/logo.svg" alt="logo">TrotMan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=trotinettes">Nos Trotinettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=nous">Nous</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAV BAR -->

    <!-- MAIN CONTENT -->
    <div class="container">
        <h1 class="text-center text-dark bg-light border border-light rounded p-1 m-3"><?=$title?></h1>
        <?=$content?>
    </div>
    <!-- END MAIN CONTENT -->

    <!-- FOOTER -->
    <footer class="bg-primary text-center text-white rounded-top">
        <p class="p-2 mb-0">&copy; TrotMan 2022</p>
    </footer>
    <!-- END FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/main.js"></script>

</body>
</html>