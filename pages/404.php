<?php include __DIR__ . '/../layout/Header.php'; ?>

<div class="min-h-screen flex flex-col justify-center items-center text-center">
    <h1 class="text-6xl font-bold text-red-500">404</h1>
    <p class="text-xl text-gray-600 mt-4">Page Not Found</p>

    <a href="<?= BASE_URL ?>"
       class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg">
        Go Home
    </a>
</div>

<?php include __DIR__ . '/../layout/Footer.php'; ?>