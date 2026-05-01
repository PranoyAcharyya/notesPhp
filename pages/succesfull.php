<?php include __DIR__ . '/../layout/Header.php'; ?>
<?php
// if($_POST){
//   var_dump($_POST);
// };

require __DIR__ . '../../database/db.php';

try{

if (isset($_POST['submit'])) {
    $title = $_POST['title'] ?? null;
    $description = $_POST['description'] ?? null;
    $publishDate = $_POST['date'] ?? null;
    // $featureImage = $_POST['featureimage'];
    $category = $_POST['category'] ?? null;

     $featureImage = null;

     if(isset($_FILES['featureimage']) && $_FILES['featureimage']['error'] === 0){
        $featureImage = $_FILES['featureimage']['name'];

        //move file
        move_uploaded_file(
            $_FILES['featureimage']['tmp_name'],
            __DIR__.'/../uploads/'.$featureImage
        );
     }

    $sql = "INSERT INTO notes (title, description, date , featureImage , category) VALUES (:title, :description , :date , :featureImage , :category)";

    $stmt = $pdo -> prepare($sql);

    $stmt -> execute([
        ':title' => $title,
        ':description' => $description,
        ':date' => $publishDate,
        ':featureImage' => $featureImage,
        ':category' => $category
    ]);

     echo "Data inserted successfully!";

    }

}catch(PDOException $e){
    echo "Database Error: " . $e->getMessage();
}catch(Exception $e){
    echo "General Error: " . $e->getMessage();
}



?>

<div class="bg-white min-h-screen shadow-xl rounded-2xl p-8 max-w-md w-full text-center mx-auto flex justify-center items-center flex-col space-y-2">

    
        <!-- Success Icon -->
        <div class="text-green-500 text-5xl mb-4">✔</div>

        <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Successfully Submitted
        </h2>

        <p class="text-gray-600 mb-6">
            Your post has been saved successfully.
        </p>

        <a href="index.php"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            Go to Home
        </a>


</div>