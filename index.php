<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişi Ekle - Telefon Rehberi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Telefon Rehberi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="rehber.php">Rehber</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Kişi Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rehber.php">Güncelle</a> 
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Kişi Ekle</h1>
        <form action="ekle.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="ad" class="form-label">Ad:</label>
                <input type="text" name="ad" id="ad" class="form-control" placeholder="Örnek: Cemal" required>
            </div>
            <div class="mb-3">
                <label for="soyad" class="form-label">Soyad:</label>
                <input type="text" name="soyad" id="soyad" class="form-control" placeholder="Örnek: Kıvrak" required>
            </div>
            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon Numarası:</label>
                <input type="text" name="telefon" id="telefon" class="form-control" placeholder="Örnek: 0531 962 3818" required>
            </div>
            <div class="mb-3">
                <label for="ikinci_telefon" class="form-label">İkinci Telefon Numarası:</label>
                <input type="text" name="ikinci_telefon" id="ikinci_telefon" class="form-control" placeholder="Opsiyonel: 0531 962 3818">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Örnek: cemal@example.com">
            </div>
            <div class="mb-3">
                <label for="grup" class="form-label">Grup:</label>
                <input type="text" name="grup" id="grup" class="form-control" placeholder="Örnek: Aile, İş, Arkadaş">
            </div>
            <button type="submit" class="btn btn-primary">Kişi Ekle</button>
        </form>
        <div class="text-center mt-4">
            <a href="rehber.php" class="btn btn-info">Rehberi Görüntüle</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
