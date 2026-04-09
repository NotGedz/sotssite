<?php
include($_SERVER['DOCUMENT_ROOT'] ."/sots/php/connection.php");

// Отримуємо номер посту з URL (напр. news.php?id=1)
// Використовуємо (int) для захисту від SQL-ін'єкцій
$post_ordr = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$post = null;
if ($post_ordr > 0) {
    // Шукаємо пост за полем ordr
    $sql = "SELECT * FROM SiteNewsLinks WHERE ordr = $post_ordr LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);
}

if (!$post) {
    header("Location: index.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/sots/php/head.php")?>

<body class="text-white site-container basiic">

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/sots/php/banner-nav.php"); ?>

    <main class="content flex justify-center w-full">
        <div class="content-wrapper flex flex-col items-center max-w-4xl w-full p-4">
            
            <article class="main-content w-full">


            
                <div class="mb-6">
                    <img src="<?= htmlspecialchars($post['previewimglink']) ?>" alt="Preview" class="w-full h-64 object-cover shadow-lg">
                </div>



                <div class="flex justify-between items-center mb-4 text-white">
                    <p>Author: <?= htmlspecialchars($post['author']) ?></p>
                    <p>Date: <?= $post['date'] ?></p>
                </div>

                <h3 class="text-4xl text-center text-white">
                    <?= htmlspecialchars($post['link']) ?> </h3>
                    <p class="text-white"><?php echo($post['text'])?></p>

                <hr class="text-white mb-8">

                <div class="post-body text-lg leading-relaxed whitespace-pre-line">
                    <?= htmlspecialchars($post['text']) ?>
                </div>

            
            </article>

        </div>
    </main>

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/sots/php/footer.php"); ?>
</body>
</html>
