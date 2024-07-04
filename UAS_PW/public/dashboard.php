<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffecb3; /* Warna kuning lembut */
        }
        .navbar {
            background-color: #ffa726; /* Warna oranye */
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white;
        }
        .sidebar {
            background-color: #fff8e1; /* Warna kuning yang lebih terang */
            border-right: 1px solid #ffb74d; /* Border warna kuning */
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #ffa726; /* Warna oranye */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">GameStore</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../actions/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <!-- Tambahkan item navigasi lainnya di sini -->
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
                <!-- Tambahkan konten dashboard di sini -->
            </main>
        </div>
    </div>
</body>
</html>
