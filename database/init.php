<?php
require 'db.php';

// ✅ create migrations table if not exists FIRST
$pdo->exec("
    CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) UNIQUE
    )
");

//get all sql files

$files = glob(__DIR__ . '/*.sql');

//sort item (001,002,00x)

sort($files);

foreach ($files as $file) {
    $filename = basename($file);

    //check if already executed

    $stmt = $pdo->prepare("SELECT * FROM migrations WHERE filename= ?");
    $stmt->execute([$filename]);

    if ($stmt->rowCount() === 0) {
        $sql = file_get_contents($file);
        try {
            $pdo->exec($sql);

            $insert = $pdo->prepare("INSERT INTO migrations (filename) VALUES (?)");
            $insert->execute([$filename]);

            echo "✅ Executed: $filename <br>";
        } catch (PDOException $e) {
            echo "❌ Error in $filename: " . $e->getMessage() . "<br>";
        }
    } else {
        echo "⏭ Skipped: $filename <br>";
    }
}
