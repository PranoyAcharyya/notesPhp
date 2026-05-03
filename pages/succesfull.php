<?php include __DIR__ . '/../layout/Header.php'; ?>

<?php
require __DIR__ . '../../database/db.php';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'] ?? null;
    $description = $_POST['description'] ?? null;
    $publishDate = $_POST['date'] ?? null;
    $category = $_POST['category'] ?? null;
    $featureImage = null;

    // Title validation
    if (empty($title)) {
        $errors[] = "Title is required";
    }

    // Description validation
    if (empty($description)) {
        $errors[] = "Description is required";
    }

    // Date validation
    if (empty($publishDate)) {
        $errors[] = "Date is required";
    }

    // Category validation
    if ($category === "Select category" || empty($category)) {
        $errors[] = "Please select a category";
    }

    // Image validation
    if (!isset($_FILES['featureimage']) || $_FILES['featureimage']['error'] !== 0) {
        $errors[] = "Feature image is required";
    } else {

        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxSize = 2 * 1024 * 1024; // 2MB

        $fileType = mime_content_type($_FILES['featureimage']['tmp_name']);
        $fileSize = $_FILES['featureimage']['size'];

        // Validate type
        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Only JPG and PNG images are allowed";
        }

        // Validate size
        if ($fileSize > $maxSize) {
            $errors[] = "Image size must be less than 2MB";
        }
    }

    // If no errors → process
    if (empty($errors)) {

        // Generate unique filename
        $ext = pathinfo($_FILES['featureimage']['name'], PATHINFO_EXTENSION);
        $featureImage = uniqid() . '.' . $ext;

        $uploadPath = __DIR__ . '/../uploads/' . $featureImage;

        if (!move_uploaded_file($_FILES['featureimage']['tmp_name'], $uploadPath)) {
            $errors[] = "Failed to upload image";
        } else {

            $sql = "INSERT INTO notes (title, description, date, featureImage, category)
                    VALUES (:title, :description, :date, :featureImage, :category)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':title' => $title,
                ':description' => $description,
                ':date' => $publishDate,
                ':featureImage' => $featureImage,
                ':category' => $category
            ]);

            $success = true;
        }
    }
}
?>

<!-- Error Messages -->
<?php if (!empty($errors)): ?>
    <div class=" min-h-screen flex flex-col justify-center items-center">
        <ul class="bg-red-100 text-red-700 p-4 rounded mb-4 max-w-md mx-auto">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= BASE_URL ?>pages/addNotes.php"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            Go to form
        </a>
    </div>
<?php endif; ?>


<!-- Success UI -->
<?php if ($success): ?>
    <div class="bg-white min-h-screen shadow-xl rounded-2xl p-8 max-w-md w-full text-center mx-auto flex justify-center items-center flex-col space-y-2">

        <div class="text-green-500 text-5xl mb-4">✔</div>

        <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Successfully Submitted
        </h2>

        <p class="text-gray-600 mb-6">
            Your post has been saved successfully.
        </p>

        <a href="<?= BASE_URL ?>"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            Go to Home
        </a>

    </div>
<?php endif; ?>