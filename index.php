<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Makanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Menu Makanan</h1>
        <form action="confirm.php" method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

            <label for="food">Pilih Makanan:</label>
            <select id="food" name="food" required>
                <?php foreach ($menu as $food => $price): ?>
                    <option value="<?php echo $food; ?>">
                        <?php echo $food . " - Rp" . number_format($price, 0, ',', '.'); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Pesan</button>
        </form>
    </div>
</body>
</html>
