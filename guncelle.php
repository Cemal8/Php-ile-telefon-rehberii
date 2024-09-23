<?php
include('db.php');

// ID ile kişi bilgilerini al
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM rehber WHERE id = ?");
    $stmt->execute([$id]);
    $kisi = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$kisi) {
        echo "Kişi bulunamadı!";
        exit();
    }
} else {
    echo "Geçersiz ID!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişi Güncelle - Telefon Rehberi</title>
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
        <h1 class="text-center">Kişi Güncelle</h1>
        <form action="guncelle_islem.php" method="post" class="mt-4">
            <input type="hidden" name="id" value="<?php echo $kisi['id']; ?>">
            
            <div class="mb-3">
                <label for="ad" class="form-label">Ad:</label>
                <input type="text" name="ad" placeholder="ad" value="<?php echo $kisi['ad']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="soyad" class="form-label">Soyad:</label>
                <input type="text" name="soyad" value="<?php echo $kisi['soyad']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon Numarası:</label>
                <input type="text" name="telefon" value="<?php echo $kisi['telefon']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ikinci_telefon" class="form-label">İkinci Telefon Numarası:</label>
                <input type="text" name="ikinci_telefon" value="<?php echo $kisi['ikinci_telefon']; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="<?php echo $kisi['email']; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="grup" class="form-label">Grup:</label>
                <input type="text" name="grup" value="<?php echo $kisi['grup']; ?>" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Güncelle</button>
        </form>
        <div class="text-center mt-4">
            <a href="rehber.php" class="btn btn-info">Rehbere Dön</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
