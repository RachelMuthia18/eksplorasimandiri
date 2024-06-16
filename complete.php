<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $food = htmlspecialchars($_POST['food']);
    $total_price = htmlspecialchars($_POST['total_price']);
    $payment_method = htmlspecialchars($_POST['payment-method']);
    
    if ($payment_method == "Kartu Kredit") {
        $card_number = htmlspecialchars($_POST['card-number']);
        $exp_date = htmlspecialchars($_POST['exp-date']);
        $cvv = htmlspecialchars($_POST['cvv']);
    } else if ($payment_method == "Transfer Bank") {
        $bank_account = htmlspecialchars($_POST['bank-account']);
    } else if ($payment_method == "E-Wallet") {
        $e_wallet_number = htmlspecialchars($_POST['e-wallet-number']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Akhir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Terima Kasih!</h1>
        <p>Pesanan Anda telah diterima.</p>
        <p>Nama: <?php echo $name; ?></p>
        <p>Alamat: <?php echo $address; ?></p>
        <p>Makanan: <?php echo $food; ?></p>
        <p>Total Harga: Rp<?php echo number_format($total_price, 0, ',', '.'); ?></p>
        <p>Metode Pembayaran: <?php echo $payment_method; ?></p>
        <?php if ($payment_method == "Kartu Kredit"): ?>
            <p>Nomor Kartu Kredit: <?php echo $card_number; ?></p>
            <p>Tanggal Kedaluwarsa: <?php echo $exp_date; ?></p>
            <p>CVV: <?php echo $cvv; ?></p>
        <?php elseif ($payment_method == "Transfer Bank"): ?>
            <p>Nomor Rekening Bank: <?php echo $bank_account; ?></p>
        <?php elseif ($payment_method == "E-Wallet"): ?>
            <p>Nomor E-Wallet: <?php echo $e_wallet_number; ?></p>
        <?php endif; ?>
        <a href="index.php" class="order-button">Kembali ke Menu</a>
    </div>
</body>
</html>
