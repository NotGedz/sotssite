<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./php/connection.php"); // Перевір, чи цей файл лежить поруч

$sql = "SELECT * FROM SIteNewsLinks ORDER BY ordr DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("./php/head.php"); ?>

<body class="text-white site-container basiic">
    <?php include("./php/banner-nav.php"); ?>

    <main class="content flex justify-center w-full">
        <div class="content-wrapper flex flex-col items-center max-w-4xl w-full p-4">
            
            <h3 class="text-center text-white font-bold mb-4">All News</h3>

<div class="news-wrapper flex flex-wrap items-start justify-start gap-2 ">

            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    
                    <div class="window w-full mb-6" style="margin-bottom: 20px;">
                        <div class="title-bar">
                            <div class="title-bar-text">newsletter.exe</div>
                            <div class="title-bar-controls">
                                <button aria-label="Minimize"></button>
                                <button aria-label="Maximize"></button>
                                <button aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="window-body dark-text news-preview-item" >
                            <a href="news.php?id=<?= $row['ordr'] ?>" style="display: flex; text-decoration: none; color: inherit; align-items: center;">
                                
                                <img src="<?= htmlspecialchars($row['previewimglink']) ?>" 
                                     style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px; border: 2px solid #808080;">

                                <div>
                                    <h4 style="margin: 0; font-size: 1.2rem;"><?= htmlspecialchars($row['link']) ?></h4>
                                    <p style="margin: 5px 0 0; font-size: 0.8rem; color: #555;">
                                        Date: <?= $row['date'] ?> | By: <?= htmlspecialchars($row['author']) ?>
                                    </p>
                                
                                </div>
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>news are yet to be written.</p>
            <?php endif; ?>

        </div>
        
    </main>

    <?php include("./php/footer.php"); ?>
</body>
</html>