<?php include __DIR__ . '/../layout/Header.php'; ?>
<?php
// if($_POST){
//   var_dump($_POST);
// };

require __DIR__ . '../../database/db.php'

?>

<div class="w-full max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">

  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Post</h2>

  <form class="space-y-5" method="post" action="<?= BASE_URL ?>pages/succesfull.php" enctype="multipart/form-data">

    <!-- Title -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
      <input
        type="text"
        name="title"
        placeholder="Enter title"
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Description -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
      <textarea
        name="description"
        rows="4"
        placeholder="Write description..."
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
    </div>

    <!-- Date -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
      <input
        name="date"
        type="date"
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" />
    </div>

    <!-- Feature Image -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Feature Image</label>
      <input
        type="file"
        name="featureimage"
        class="w-full px-3 py-2 border rounded-xl bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
    </div>

    <!-- Category -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
      <select
        name="category"
        class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <option>Select category</option>
        <option>Technology</option>
        <option>Business</option>
        <option>Lifestyle</option>
        <option>Education</option>
      </select>
    </div>

    <!-- Submit -->
    <div>
      <button
        name="submit"
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-200">
        Submit
      </button>
    </div>

  </form>
</div>

</body>

</html>