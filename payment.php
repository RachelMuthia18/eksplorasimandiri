<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $food = htmlspecialchars($_POST['food']);
    $total_price = htmlspecialchars($_POST['total_price']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function showPaymentDetails() {
            var paymentMethod = document.getElementById("payment-method").value;
            var creditCardDetails = document.getElementById("credit-card-details");
            var bankTransferDetails = document.getElementById("bank-transfer-details");
            var eWalletDetails = document.getElementById("e-wallet-details");

            creditCardDetails.style.display = "none";
            bankTransferDetails.style.display = "none";
            eWalletDetails.style.display = "none";

            if (paymentMethod === "Kartu Kredit") {
                creditCardDetails.style.display = "block";
            } else if (paymentMethod === "Transfer Bank") {
                bankTransferDetails.style.display = "block";
            } else if (paymentMethod === "E-Wallet") {
                eWalletDetails.style.display = "block";
            }
        }

        function validateForm() {
            var paymentMethod = document.getElementById("payment-method").value;

            if (paymentMethod === "Kartu Kredit") {
                var cardNumber = document.getElementById("card-number").value;
                var expDate = document.getElementById("exp-date").value;
                var cvv = document.getElementById("cvv").value;

                if (cardNumber === "" || expDate === "" || cvv === "") {
                    alert("Harap isi semua detail kartu kredit.");
                    return false;
                }
            } else if (paymentMethod === "Transfer Bank") {
                var bankAccount = document.getElementById("bank-account").value;

                if (bankAccount === "") {
                    alert("Harap isi nomor rekening bank.");
                    return false;
                }
            } else if (paymentMethod === "E-Wallet") {
                var eWalletNumber = document.getElementById("e-wallet-number").value;

                if (eWalletNumber === "") {
                    alert("Harap isi nomor E-Wallet.");
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Pembayaran</h1>
        <p>Total Harga: Rp<?php echo number_format($total_price, 0, ',', '.'); ?></p>
        <form action="complete.php" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="food" value="<?php echo $food; ?>">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            
            <label for="payment-method">Pilih Metode Pembayaran:</label>
            <select id="payment-method" name="payment-method" onchange="showPaymentDetails()" required>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="Kartu Kredit">Kartu Kredit</option>
                <option value="E-Wallet">E-Wallet</option>
                <option value="Bayar di Tempat">Bayar di Tempat</option>
            </select>

            <div id="credit-card-details" style="display:none;">
                <label for="card-number">Nomor Kartu Kredit:</label>
                <input type="text" id="card-number" name="card-number">
                
                <label for="exp-date">Tanggal Kedaluwarsa (MM/YY):</label>
                <input type="text" id="exp-date" name="exp-date" placeholder="MM/YY">

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv">
            </div>

            <div id="bank-transfer-details" style="display:none;">
                <label for="bank-account">Nomor Rekening Bank:</label>
                <input type="text" id="bank-account" name="bank-account">
            </div>

            <div id="e-wallet-details" style="display:none;">
                <label for="e-wallet-number">Nomor E-Wallet:</label>
                <input type="text" id="e-wallet-number" name="e-wallet-number">
            </div>
            
            <button type="submit">Konfirmasi Pembayaran</button>
        </form>
    </div>
</body>
</html>
