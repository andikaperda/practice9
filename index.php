<?php
include "koneksi.php";
$qkelas = "SELECT * FROM kelas";
$data_kelas = $conn->query($qkelas);
$qmahasiswa = "SELECT * FROM mahasiswa";
$data_mahasiswa = $conn->query($qmahasiswa);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Mahasiswa</title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .bg-light-blue {
            background-color: #e3f2fd; /* Light blue background */
        }
        .header-text {
            color: #0d6efd; /* Bootstrap primary color */
        }
        .btn-primary {
            background-color: #0d6efd; /* Bootstrap primary color */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Slightly darker blue for hover */
        }
        .list-group-item {
            border-left: 5px solid #0d6efd; /* Highlight list item */
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .btn-block {
            margin-top: 10px;
        }
        /* Centering for mobile */
        @media (max-width: 768px) {
            .form-section {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body class="bg-light-blue">
<div class="container">
    <div class="py-5 text-center">
        <h2 class="header-text">Form Mahasiswa</h2>
    </div>

    <div class="row">
        <!-- Data Mahasiswa -->
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Data Mahasiswa</span>
                <span class="badge badge-primary badge-pill"><?php echo $data_mahasiswa->num_rows; ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php if ($data_mahasiswa->num_rows > 0): ?>
                    <?php foreach ($data_mahasiswa as $value): ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo htmlspecialchars($value['nama_lengkap']); ?></h6>
                                <small class="text-muted"><?php echo htmlspecialchars($value['alamat']); ?></small>
                            </div>
                            <span class="text-muted"><?php echo htmlspecialchars($value['kelas_id']); ?></span>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item">Belum ada data mahasiswa.</li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Input Data -->
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Input Data</h4>
            <form action="simpan_mahasiswa.php" method="POST">
                <div class="form-section">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-section">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                </div>
                <div class="form-section">
                    <label for="kelas">Kelas</label>
                    <select class="custom-select d-block w-100" id="kelas" name="kelas_id" required>
                        <option value="">Pilih...</option>
                        <?php foreach ($data_kelas as $value): ?>
                            <option value="<?php echo htmlspecialchars($value['kelas_id']); ?>">
                                <?php echo htmlspecialchars($value['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Data</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center text-small">
    <p class="mb-1">&copy; 2023 Your Company</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
</footer>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
