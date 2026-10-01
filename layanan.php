<?php
require_once __DIR__ . '/config/koneksi.php';
mysqli_set_charset($conn, 'utf8mb4');

$hasilLayanan = mysqli_query(
    $conn,
    'SELECT nama_layanan, deskripsi, gambar FROM layanan ORDER BY id ASC'
);

if (!$hasilLayanan) {
    error_log('Query layanan gagal: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - salvatore Digital</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            salvatore Digital
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">
                        Tentang Kami
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="layanan.php" aria-current="page">
                        Layanan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="kontak.php">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-header">
    <div class="container text-center">
        <h1 class="fw-bold">Layanan Kami</h1>
        <p>Solusi digital yang membantu bisnis berkembang.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if (!$hasilLayanan): ?>
            <p class="alert alert-danger" role="alert">Data layanan gagal dimuat.</p>
        <?php elseif (mysqli_num_rows($hasilLayanan) === 0): ?>
            <p class="text-center">Belum ada layanan yang tersedia.</p>
        <?php else: ?>
            <div class="row g-4">
                <?php while ($layanan = mysqli_fetch_assoc($hasilLayanan)): ?>
                    <?php
                    $namaLayanan = htmlspecialchars($layanan['nama_layanan'], ENT_QUOTES, 'UTF-8');
                    $deskripsiLayanan = nl2br(htmlspecialchars($layanan['deskripsi'], ENT_QUOTES, 'UTF-8'));
                    $namaGambar = basename((string) $layanan['gambar']);
                    $pathGambar = __DIR__ . '/assets/img/' . $namaGambar;

                    if (!is_file($pathGambar)) {
                        $namaGambar = 'Salvatore-community-3d.gif';
                    }
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <article class="card service-card h-100 border-0 shadow-sm">
                            <img
                                src="assets/img/<?= rawurlencode($namaGambar) ?>"
                                class="card-img-top"
                                alt="Ilustrasi <?= $namaLayanan ?>">
                            <div class="card-body p-4">
                                <h2 class="h4 fw-bold"><?= $namaLayanan ?></h2>
                                <p class="text-muted mb-0"><?= $deskripsiLayanan ?></p>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="text-center mt-5">
            <a href="kontak.php" class="btn btn-primary">Konsultasikan kebutuhan Anda</a>
        </div>
    </div>
</section>

<footer class="bg-dark text-white text-center py-4">

    <p class="mb-0">
        &copy; 2026 salvatore Digital. All Rights Reserved.
    </p>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>