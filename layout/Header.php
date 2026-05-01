<?php

require_once __DIR__ . '/../config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <header class="w-full bg-black text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="<?= BASE_URL ?>">
                <h2 class="text-2xl font-bold tracking-wide">
                    My<span class="text-[#fc0356]">Notes</span>
                </h2>
            </a>

            <!-- Buttons -->
            <div class="flex items-center gap-3">
                <a href="<?= BASE_URL ?>pages/addNotes.php" class="px-4 py-2 rounded-lg bg-[#fc0356] text-white font-medium hover:opacity-90 transition">
                    Add Notes
                </a>
                <a
                    href="<?= BASE_URL ?>pages/NoteList.php ?>"
                
                class="px-4 py-2 rounded-lg border border-white text-white font-medium hover:bg-white hover:text-black transition">
                    See Notes
                </a>
            </div>

        </div>
    </header>