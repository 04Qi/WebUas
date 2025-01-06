<?php
include 'konesi.php';
session_start();

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="file.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Admin</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="data_admin.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Data Admin</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="data_pesanan.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Data Pesanan</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            <img src="foto/Descargar_concepto_de_ecología_mundial_gratis-removebg-preview.png" class="avatar img-fluid" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Data Pesanan</h3>
                        <!-- <div class="mb-3">
                            <a href="tambah_admin.php" type="button" class="btn btn-primary">Tambah data</a>
                        </div> -->
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nomor HP</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Harga satuan</th>
                                            <th scope="col">Total harga</th>
                                            <th scope="col">Tanggal Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM pemesanan";
                                        $result = mysqli_query($koneksi, $query);

                                        if(!$result){
                                            die ("Query Error: " . mysqli_errno($koneksi). 
                                                " - ".mysqli_error($koneksi));
                                        }

                                        $no = 1;

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>

                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td><?php echo $row['nomor_hp'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['jumlah'];?></td>
                                            <td><?php echo $row['harga_satuan'];?></td>
                                            <td><?php echo $row['total_harga'];?></td>
                                            <td><?php echo $row['tanggal_pesan'];?></td>

                                        </tr>


                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>