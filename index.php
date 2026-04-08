<?php
// Налаштування помилок (залишаємо для розробки)
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("./php/connection.php");

/**
 * ЛОГІКА ОТРИМАННЯ ДАНИХ
 */
$ver = "N/A";
$downloadLink = "#";

$sql = "SELECT link, ver FROM DownloadLinks ORDER BY ordr DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $ver = $row["ver"] ?? "N/A";
    $link = trim($row["link"] ?? "");

    if (!empty($link)) {
        // Перевірка наявності протоколу http/https
        $downloadLink = preg_match('/^https?:\/\//i', $link) ? $link : "https://" . ltrim($link, "/");
    }
} else {
    error_log("SOTS: No download links found in database.");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include("./php/head.php")?>

<body class="text-white site-container basiic">

    <?php include("./php/banner-nav.php"); ?>

    <main class="content flex w-full justify-center mt-4 mb-4">
        <div class="text-white content-wrapper flex justify-center">
            
            <div class="main-content">
                <h3 class="text-center">What Is SOTS?</h3>
                <p>
                    SOTS is a Minecraft modpack that aims to combine the best of old and new minecraft
                    while adding meaningful and balanced gameplay features, QOL improvements, and optimizations/bugfixes.
                    A pretty sizable bugfix update is coming soon so stay tuned ~
                </p>

                <ul class="flower-list">
                    <li>beta+ combat!</li>
                    <li>beta+ terrain gen!</li>
                    <li>simpler structures!</li>
                    <li>new mobs!</li>
                    <li>new blocks!</li>
                    <li>classics you've come to expect like the aether!</li>
                    <li>storage crates!</li>
                    <li>magic wands!</li>
                    <li>and a few more small things.</li>
                </ul>
            </div>

            <div class="secondary-content">
                <h3 class="text-center">Latest Release!</h3>


                <div class="flex-1 w-full">
                    <small>v_<?= htmlspecialchars($ver) ?></small>

                    <div class="flex items-center justify-center w-full">
                        <a class="download-link inline-block text-center  w-full" href="<?= htmlspecialchars($downloadLink) ?>">
                            <button class="download-button w-full">
                                <span>Download!</span>
                            </button>
                        </a>
                    </div>
                </div>
<div class="w-full">
<?php include("news-preview.php"); ?>
</div>
            </div>

        </div>
    </main>

    <?php include("./php/footer.php"); ?>

</body>    
</html>