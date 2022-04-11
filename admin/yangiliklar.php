<?php

if (!(isset($_COOKIE['login']) && isset($_COOKIE['login'])))
    exit('<meta http-equiv="refresh" content="0;url=../admin/login.html">');


require('../backend/config.php');


try {
    $sql = "SELECT id, title, image FROM yangiliklar";
    $data = $conn->query($sql)->fetchAll();
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
    <title>Yangiliklar</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                        <i class="fas fa-table me-1"></i>
                        Yangiliklar
                    </div>

                    <div class="card-body">
                        <table id="news">
                            <thead>
                                <tr>
                                    <th>Rasm</th>
                                    <th>Sarlavha</th>
                                    <th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($data as $news) {
                                    echo "
                                    <tr>
                                        <td><img src='$news[2]' width='32'></td>
                                        <td>$news[1]</td>
                                        <td><a href='yangilik.update.php?id=$news[0]' class='update btn btn-warning text-white'><i class='fas fa-pen'></i> Yangilash</button></td>
                                        <td><a href='../backend/yangilik.delete.php?id=$news[0]' class='delete btn btn-danger'><i class='fas fa-trash'></i> O'chirish</button></td>
                                    </tr>
                                    ";
                                }

                                ?>

                            </tbody>
                        </table>

                        <a href="yangilik.add.html" class="btn btn-success">
                            <i class="fas fa-plus"></i> Yangilik qo'shish
                        </a>

                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            new simpleDatatables.DataTable('#news') 
        })
    </script>
</body>

</html>