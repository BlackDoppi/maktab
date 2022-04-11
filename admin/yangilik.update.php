<?php

if (!(isset($_COOKIE['login']) && isset($_COOKIE['login'])))
    exit('<meta http-equiv="refresh" content="0;url=../admin/login.html">');


require('../backend/config.php');

$id = $_GET['id'];

try {
    $sql = "SELECT title, text FROM yangiliklar WHERE id=$id";
    $data = $conn->query($sql)->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;

?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Yangilikni o'zgartirish</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Admin Panel</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Bo'limlar</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Bosh sahifa
                        </a>
                        <a class="nav-link" href="qabul.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-paperclip"></i></div>
                            Qabul uchun
                        </a>
                        <a class="nav-link" href="yangiliklar.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-rss"></i></div>
                            Yangiliklar
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card-header">
                        <i class="fas fa-paperclip me-1"></i>
                        Yangilikni o'zgartirish
                    </div>
                    <div class="card-body">
                        <form action="../backend/yanglilik.add.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <label for="title" class="form-label m-1">Sarlavha</label>
                            <input type="text" id="title" class="form-control mb-1" value="<?php echo $data['title'] ?>" name="title" minlength="16" maxlength="128" required>
                            <label for="text" class="form-label">Matn</label>
                            <textarea id="text" cols="30" rows="10" class="form-control mb-1" name="text" minlength="128" maxlength="2200" required><?php echo $data['text'] ?></textarea>
                            <label for="image" class="form-label">Rasm</label>
                            <input type="file" id="image" accept="image/*" class="form-control mb-3" name="image" required>
                            <button type="submit" class="btn btn-success">Saqlash</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>