<!-- get header -->
<?php include __DIR__.'/layout/Header.php' ?>


    <!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white min-h-screen flex justify-center items-center">
  <div class="max-w-6xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center justify-between">

    <!-- Left Content -->
    <div class="max-w-xl">
      <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
        Capture Your Thoughts <br> Anytime, Anywhere
      </h1>

      <p class="text-lg text-blue-100 mb-8">
        A simple and powerful notes app to store your ideas, manage tasks, and stay organized effortlessly.
      </p>

      <div class="flex gap-4">
        <a href="addNotes.php"
           class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
          Create Note
        </a>

        <a href="#"
           class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-700 transition">
          Learn More
        </a>
      </div>
    </div>

    <!-- Right Image -->
    <div class="mt-10 md:mt-0">
      <img src="https://illustrations.popsy.co/gray/work-from-home.svg"
           alt="Hero Illustration"
           class="w-[400px]">
    </div>

  </div>
</section>

<?php include __DIR__. '/layout/Footer.php' ?>
</body>
</html>