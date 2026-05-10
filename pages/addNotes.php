<?php include __DIR__ . '/../layout/Header.php'; ?>
<?php
// if($_POST){
//   var_dump($_POST);
// };

require __DIR__ . '../../database/db.php';

$editMode = false;
$note = null;

if (isset($_GET['id'])) {

    $editMode = true;

    $id = $_GET['id'];

    $sql = "SELECT * FROM notes WHERE noteId = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $note = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<div class="w-full max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 mt-[100px] mb-[20px]">

  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Post</h2>

  <form class="space-y-5" method="post" 
  action="<?= BASE_URL ?>pages/succesfull.php<?= $editMode ? '?id=' . $note['noteId'] : '' ?>">

    <!-- Title -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
      <input
        type="text"
        name="title"
        placeholder="Enter title"
        value="<?= $editMode ? htmlspecialchars($note['title']) : '' ?>"
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Description -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
      <textarea
        name="description"
        rows="4"
        placeholder="Write description..."
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none"><?= $editMode ? htmlspecialchars($note['description']) : '' ?></textarea>
    </div>

    <!-- Date -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
      <input
        name="date"
        type="date"
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" 
        value="<?= $editMode ? $note['date'] : '' ?>"
        />
    </div>

   
   <!-- Feature Image -->
<div>
  <label class="block text-sm font-medium text-gray-700 mb-1">
    Feature Image
  </label>

  <?php if ($editMode && !empty($note['featureImage'])): ?>
    
    <div class="mb-3">
      <img
        src="<?= BASE_URL ?>uploads/<?= htmlspecialchars($note['featureImage']) ?>"
        alt="Preview"
        class="w-40 h-28 object-cover rounded-lg border">
    </div>

  <?php endif; ?>

  <input
    type="file"
    name="featureimage"
    class="w-full px-3 py-2 border rounded-xl bg-white 
    file:mr-4 file:py-2 file:px-4 
    file:rounded-lg file:border-0 
    file:bg-blue-50 file:text-blue-700 
    hover:file:bg-blue-100" />

  <?php if ($editMode): ?>
    <p class="text-sm text-gray-500 mt-2">
      Leave empty to keep old image
    </p>
  <?php endif; ?>
</div>

<!-- Category -->
<div>
  <label class="block text-sm font-medium text-gray-700 mb-1">
    Category
  </label>

  <select
    name="category"
    class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">

    <option value="">Select category</option>

    <option
      value="Technology"
      <?= ($editMode && $note['category'] === 'Technology') ? 'selected' : '' ?>>
      Technology
    </option>

    <option
      value="Business"
      <?= ($editMode && $note['category'] === 'Business') ? 'selected' : '' ?>>
      Business
    </option>

    <option
      value="Lifestyle"
      <?= ($editMode && $note['category'] === 'Lifestyle') ? 'selected' : '' ?>>
      Lifestyle
    </option>

    <option
      value="Education"
      <?= ($editMode && $note['category'] === 'Education') ? 'selected' : '' ?>>
      Education
    </option>

  </select>
</div>

    <!-- Submit -->
    <div>
      <button
        name="submit"
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-200">
        <?= $editMode ? 'Update Note' : 'Create Note' ?>
      </button>
    </div>

  </form>
</div>

<?php include __DIR__ . '/../layout/Footer.php'; ?>

</body>

</html>