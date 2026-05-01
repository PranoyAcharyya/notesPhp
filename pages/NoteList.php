<?php include __DIR__ . '/../layout/Header.php'; ?>
<?php

require __DIR__ . '../../database/db.php';

try {
    $sql = "SELECT * FROM notes";

    $stmt = $pdo->query($sql);

    // Fetch all rows
    while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        $results = $row;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <h2 class="text-3xl font-bold text-gray-800 mb-8">📒 Notes</h2>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

        <?php foreach ($results as $result): ?>

            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">

                <!-- Image -->
                <img
                    src="../uploads/<?php echo $result['featureImage']; ?>"
                    alt="<?php echo htmlspecialchars($result['title']); ?>"
                    class="w-full h-48 object-cover">

                <!-- Content -->
                <div class="p-5">

                    <span class="text-sm text-blue-600 font-medium">
                        <?php echo htmlspecialchars($result['category']); ?>
                    </span>

                    <h3 class="text-lg font-semibold text-gray-800 mt-2 mb-2">
                        <?php echo htmlspecialchars($result['title']); ?>
                    </h3>

                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                        <?php echo htmlspecialchars($result['description']); ?>
                    </p>

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span><?php echo htmlspecialchars($result['date']); ?></span>
                        <a href="#" class="text-blue-600 hover:underline">Read</a>
                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>
</body>

</html>