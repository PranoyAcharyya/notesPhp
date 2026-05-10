<?php

require_once __DIR__ . '/../config.php';
$pageName = basename($_SERVER['PHP_SELF']);
$blackPages = ['singleNote.php', 'NoteList.php', 'addNotes.php'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/notesproject/css/style.css">
    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full z-50 backdrop-blur-lg 
<?= in_array($pageName, $blackPages) ? 'bg-black' : 'bg-black/10'; ?> 
text-white shadow-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="<?= BASE_URL ?>">
                <h2 class="text-2xl font-bold tracking-wide">
                    My<span class="text-[#fc0356]">Notes</span>
                </h2>
            </a>

            <!-- Buttons -->
            <div class="flex items-center gap-3">
                <a href="<?= BASE_URL ?>addNotes.php"
                    class="px-4 py-2 rounded-lg bg-[#fc0356] text-white font-medium hover:opacity-90 transition">
                    Add Notes
                </a>

                <a href="<?= BASE_URL ?>NoteList.php"
                    class="px-4 py-2 rounded-lg border border-white/30 text-white font-medium hover:bg-white hover:text-black transition">
                    See Notes
                </a>
            </div>

        </div>
    </header>