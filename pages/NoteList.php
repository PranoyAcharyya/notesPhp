<?php include __DIR__ . '/../layout/Header.php'; ?>
<?php

require __DIR__ . '../../database/db.php';

try {

    $perPage = 3;
    $page = (int)($_GET['page'] ?? 1);

    // logic is IF page is 1 , offset 0
    // IF page is 2 , offset is $perPage
    // If page is 3 , offset is $perPage*2

    $offset = ($page - 1) * $perPage;


    $sql = 'SELECT * FROM `notes` ORDER BY `date` DESC, `noteId` DESC LIMIT :perPage OFFSET :offset';

    $stmtCount = $pdo->prepare('SELECT COUNT(*) as `count` FROM `notes`');
    $stmtCount->execute();
    $count = $stmtCount->fetch(PDO::FETCH_ASSOC)['count'];

    $numOfPages = ceil($count / $perPage);

    $stmt = $pdo->prepare($sql);


    // IMPORTANT: bind as INT
    $stmt->bindValue(':perPage', (int)$perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

    $stmt->execute();

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

        <div class="flex justify-center mt-10">

            <ul class="flex items-center gap-2">

                <!-- Prev Button -->
                <?php if ($page > 1): ?>
                    <li>
                        <a href="?page=<?php echo $page - 1; ?>"
                            class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                            ← Prev
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $numOfPages; $i++): ?>
                    <li>
                        <a href="?page=<?php echo $i; ?>"
                            class="px-4 py-2 rounded-lg 
                   <?php echo ($i == $page)
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-100 hover:bg-gray-200'; ?>">

                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <!-- Next Button -->
                <?php if ($page < $numOfPages): ?>
                    <li>
                        <a href="?page=<?php echo $page + 1; ?>"
                            class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Next →
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

        </div>

    </div>

</div>
</body>

</html>