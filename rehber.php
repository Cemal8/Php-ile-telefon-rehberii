<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefon Rehberi</title>
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
                        <a class="nav-link" href="guncelle.php">Güncelle</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Telefon Rehberi</h1>
        
       
        <form action="rehber.php" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="arama" class="form-control" placeholder="ID, Ad, Soyad veya Telefon ile ara..." value="<?php echo isset($_GET['arama']) ? htmlspecialchars($_GET['arama']) : ''; ?>">
                <button class="btn btn-primary" type="submit">Ara</button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Telefon</th>
                    <th>İkinci Telefon</th>
                    <th>Email</th>
                    <th>Grup</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $arama = isset($_GET['arama']) ? $_GET['arama'] : '';

                
                $query = $db->prepare("SELECT * FROM rehber WHERE 
                    id LIKE :arama OR 
                    ad LIKE :arama OR 
                    soyad LIKE :arama OR 
                    telefon LIKE :arama 
                    ORDER BY id DESC");
                $query->execute(['arama' => "%$arama%"]);

                
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['ad'] . "</td>";
                    echo "<td>" . $row['soyad'] . "</td>";
                    echo "<td>" . $row['telefon'] . "</td>";
                    echo "<td>" . $row['ikinci_telefon'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['grup'] . "</td>";
                    echo "<td>
                            <a href='guncelle.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Güncelle</a> 
                            <a href='sil.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Sil</a>
                         </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Kişi Ekle</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
