<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./php/connection.php"); // Перевір, чи цей файл лежить поруч

$sql = "SELECT * FROM ImageLinks ORDER BY ordr DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("./php/head.php"); ?>

<body class="text-white site-container basiic">
    <?php include("./php/banner-nav.php"); ?>

    <main class="content flex justify-center w-full">
        <div class="content-wrapper flex flex-col items-center max-w-4xl w-full p-4">
            
            <h3 class="text-center text-white font-bold mb-4">Galery</h3>

<div class="news-wrapper flex flex-wrap items-start justify-start gap-2 ">

            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    
                    <div class="window w-full mb-6" style="margin-bottom: 20px;">
                        <div class="title-bar">
                            <div class="title-bar-text">img-<?php echo($row['date'])?>.png</div>
                            <div class="title-bar-controls">
                                <button aria-label="Minimize"></button>
                                <button aria-label="Maximize"></button>
                                <button aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="window-body dark-text news-preview-item flex-col" >
                                
                                <div><a href="<?= htmlspecialchars($row['link']) ?>"><img src="<?= htmlspecialchars($row['link']) ?>" 
                                     style=" object-fit: cover; margin-right: 15px; border: 2px solid #808080;"></a></div>
                                <div><p><?php echo($row['description'])?></p></div>    

                        </div>
                    </div>

                <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>images are yet to be added.</p>
            <?php endif; ?>

        </div>
        
    </main>

    <?php include("./php/footer.php"); ?>
</body>
</html>