<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'menu.php'; // Mengimpor array menu
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $food = htmlspecialchars($_POST['food']);

    $total_price = $menu[$food]; // Mengambil harga dari menu
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Konfirmasi Pemesanan</h1>
        <p>Nama: <?php echo $name; ?></p>
        <p>Alamat: <?php echo $address; ?></p>
        <p>Makanan: <?php echo $food; ?></p>
        <p>Total Harga: Rp<?php echo number_format($total_price, 0, ',', '.'); ?></p>
        <form action="payment.php" method="post">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="food" value="<?php echo $food; ?>">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            <button type="submit">Lanjut ke Pembayaran</button>
        </form>
    </div>
</body>
</html>
