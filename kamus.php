<?php
// Array asosiatif untuk menyimpan kata dan definisinya
$dictionary = [];

// Fungsi untuk menambah kata dan definisinya ke dalam kamus
function addWord($word, $definition) {
    global $dictionary;
    $dictionary[strtolower($word)] = $definition;
}

// Fungsi untuk mencari definisi suatu kata
function getDefinition($word) {
    global $dictionary;
    $word = strtolower($word);
    if (isset($dictionary[$word])) {
        return $dictionary[$word];
    } else {
        return "Kata tidak ditemukan dalam kamus.";
    }
}

// Tambahkan beberapa kata dan definisi ke dalam kamus
addWord("apple", "A fruit that is typically round and red, green, or yellow.");
addWord("banana", "A long, curved fruit with a yellow skin and soft, sweet, white flesh inside.");
addWord("cat", "A small domesticated carnivorous mammal with soft fur, a short snout, and retractile claws.");
addWord("dog", "A domesticated carnivorous mammal that typically has a long snout, an acute sense of smell, non-retractile claws, and a barking, howling, or whining voice.");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Kamus Inggris Sederhana</title>
</head>
<body>
    <h1>Kamus Inggris Sederhana</h1>
    <form method="post" action="">
        <label for="word">Cari kata:</label>
        <input type="text" id="word" name="word" required>
        <input type="submit" value="Cari">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $word = $_POST["word"];
        $definition = getDefinition($word);
        echo "<h2>Definisi untuk '$word':</h2>";
        echo "<p>$definition</p>";
    }
    ?>
</body>
</html>
