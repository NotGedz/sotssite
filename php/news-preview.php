
<aside class="news-sidebar flex flex-col gap-4 w-full">
    <h3 class="text-center text-xl font-bold mb-2">Latest Updates</h3>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/sots/php/connection.php");

    // Запит: беремо останні 5 новин за номером ordr
    $sql = "SELECT link, previewimglink, date, ordr FROM SiteNewsLinks ORDER BY ordr DESC LIMIT 5";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0):
        while($row = mysqli_fetch_assoc($result)): 
            // Обрізаємо заголовок, якщо він занадто довгий
            $title = $row['link'];
            if (mb_strlen($title) > 40) $title = mb_substr($title, 0, 37) . '...';
    ?>

<div class="window" class="w-full">
  <div class="title-bar">
    <div class="title-bar-text">newsletter.exe</div>
    <div class="title-bar-controls">
      <button aria-label="Minimize"></button>
      <button aria-label="Maximize"></button>
      <button aria-label="Close"></button>
    </div>
  </div>
  <div class="window-body">
        <a href="php/news.php?id=<?= $row['ordr'] ?>" class="news-preview-item flex items-center ">
            
            <div class="w-16 h-16 flex-shrink-0 overflow-visible mr-3">
                <img src="<?= htmlspecialchars($row['previewimglink']) ?>" 
                     alt="News" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform">
            </div>

            <div class="flex flex-col justify-center overflow-hidden">
                <h4 class="text-sm font-semibold leading-tight dark-text">
                    <?= htmlspecialchars($title) ?>
                </h4>
                <span class="text-xs dark-text mt-1"><?= $row['date'] ?></span>
            </div>
            
        </a>
  </div>
</div>

    <?php 
        endwhile;
    else:
        echo "<p class='text-center text-white'>No news yet.</p>";
    endif; 
    ?>


    
    <a href="all-news.php" class="text-center text-xs text-blue-400 hover:underline mt-2 italic">
        View all updates →
    </a>
</aside>
