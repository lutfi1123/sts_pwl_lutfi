<?php

$pesan_terkirim = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"] ?? "");

    $email = trim($_POST["email"] ?? "");

    $pesan = trim($_POST["pesan"] ?? "");


    if (
        $nama !== "" &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        $pesan !== ""
    ) {

        $pesan_terkirim = true;

    }

}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Kontak - salvatore Digital</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="assets/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="index.php">

            salvatore Digital

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="index.php">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="about.php">
                        Tentang Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="layanan.php">
                        Layanan
                    </a>

                </li>

                <li class="nav-item">
                    <a
                        class="nav-link active"
                        href="kontak.php">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-header">
    <div class="container text-center">
        <h1 class="fw-bold">
            Kontak Kami
        </h1>
        <p>
            Silakan hubungi kami untuk informasi lebih lanjut
        </p>
    </div>

</section>

<section class="py-5">
    <div class="container">
        <?php if ($pesan_terkirim): ?>
            <div class="alert alert-success">
                Pesan berhasil dikirim.
                Terima kasih sudah menghubungi salvatore Digital!
            </div>

        <?php endif; ?>
        <div class="row g-5">
            <div class="col-lg-5">
                <h3 class="fw-bold mb-4">
                    Informasi Kontak
                </h3>
                <p>
                    <strong>
                        Alamat
                    </strong>
                    <br>
                    Jl. Raya Jatinangor No. 10,
                    Cibeusi, Jawa Barat
                </p>
                <p>
                    <strong>
                        Email
                    </strong>
                    <br>
                    salvatore@gmail.com
                </p>
                <p>
                    <strong>
                        Telepon
                    </strong>
                    <br>
                    0851-4741-4129
                </p>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">
                            Form Kontak
                        </h3>


                        <form
                            method="POST"
                            action="">


                            <div class="mb-3">

                                <label class="form-label">
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Pesan
                                </label>

                                <textarea
                                    name="pesan"
                                    rows="5"
                                    class="form-control"
                                    required></textarea>

                            </div>


                            <button
                                type="submit"
                                class="btn btn-primary">

                                Kirim

                            </button>


                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4">

    <p class="mb-0">

        &copy; 2026 salvatore Digital.
        All Rights Reserved.

    </p>

</footer>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>