<?php include __DIR__ . '/../layout/Header.php'; ?>

<?php

require __DIR__ . '/../database/db.php';

try {

    $noteId = $_GET['id'];

    $sql = 'SELECT * FROM notes WHERE noteId = :pageID';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':pageID', $noteId);
    $stmt->execute();

    $note = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}

?>

<div class="min-h-screen bg-gray-50 py-10 px-4">

    <?php if ($note): ?>

        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden mt-30">

            <!-- Feature Image -->
            <div class="relative">

                <img
                    src="/notesproject/uploads/<?php echo htmlspecialchars($note['featureImage']); ?>"
                    alt="<?php echo htmlspecialchars($note['title']); ?>"
                    class="w-full h-[500px] object-cover">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/30"></div>

                <!-- Category -->
                <div class="absolute top-6 left-6">
                    <span class="bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-full shadow-lg">
                        <?php echo htmlspecialchars($note['category']); ?>
                    </span>
                </div>

            </div>

            <!-- Content -->
            <div class="p-8 md:p-12">

                <!-- Date -->
                <p class="text-gray-500 text-sm mb-4 tracking-wide uppercase">
                    Published on <?php echo htmlspecialchars($note['date']); ?>
                </p>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-8">
                    <?php echo htmlspecialchars($note['title']); ?>
                </h1>

                <!-- Article Content -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-8">
                    <?php echo nl2br(htmlspecialchars($note['description'])); ?>
                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-lg p-10 text-center">

            <h2 class="text-3xl font-bold text-red-500 mb-4">
                Note Not Found
            </h2>

            <p class="text-gray-600">
                The note you are looking for does not exist.
            </p>

        </div>

    <?php endif; ?>
    <!-- Floating Action Button -->
    <div class="fixed bottom-8 right-8 z-50">

        <!-- Action Buttons -->
        <div id="fabMenu" class="hidden flex flex-col items-end gap-4 mb-4 absolute bottom-20 right-0">

            <!-- back button -->

            <a
                href="NoteList.php"
                class="group flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-full shadow-2xl transition-all duration-300 hover:scale-105">

                <span class="text-sm font-semibold">
                    Back
                </span>

                <i class="fa-solid fa-arrow-left-long"></i>
            </a>

            <!-- Edit Button -->
            <a
                href="addNotes.php?id=<?php echo $note['noteId']; ?>"
                class="group flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-full shadow-2xl transition-all duration-300 hover:scale-105">

                <span class="text-sm font-semibold">
                    Edit
                </span>

                <i class="fa-solid fa-pen-to-square text-lg"></i>
            </a>

            <!-- Delete Button -->
            <button
                id="deleteBtn"
                data-id="<?php echo $note['noteId']; ?>"
                class="group flex items-center gap-3 bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-full shadow-2xl transition-all duration-300 hover:scale-105">

                <span class="text-sm font-semibold">
                    Delete
                </span>

                <i class="fa-solid fa-trash"></i>

            </button>

        </div>

        <!-- Main FAB Button -->
        <button
            id="fabToggle"
            class="w-16 h-16 rounded-full bg-black text-white shadow-2xl flex items-center justify-center text-2xl transition-all duration-300 hover:scale-110">
            <i id="fabIcon" class="fa-solid fa-plus"></i>
        </button>

    </div>

</div>

<?php include __DIR__ . '/../layout/Footer.php'; ?>

</body>

</html>