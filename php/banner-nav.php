<header class="banner bg-cover bg-center flex items-center justify-center">
    <div class="mclogo">
        <picture>
            <source srcset="img/mc-small.png" media="(max-width: 600px)">
            <img src="img/mc.png" alt="Minecraft SOTS Logo">
        </picture>
    </div>
</header>


<nav class="navbar will-stick w-full sticky-wrap="true"> 
    <div class="hamburger" id="hamburger">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <ul class="nav-links gap-2" id="nav-links">
      <?php
        // Виконуємо запит
        $sql = "SELECT link, name, iconlink FROM SiteLinks ORDER BY ordr ASC";
        $navResult = mysqli_query($conn, $sql);

        // Перевіряємо наявність результатів
        if ($navResult && mysqli_num_rows($navResult) > 0): 
            // Використовуємо while (це швидше і чистіше для mysqli)
            while ($row = mysqli_fetch_assoc($navResult)):
                $name = $row["name"];
                $iconlink = $row["iconlink"];
                $siteLink = trim($row["link"]);

                if (empty($siteLink)) continue;

                // Додаємо протокол, якщо його немає
                if (!preg_match('/^https?:\/\//i', $siteLink)) {
                    $siteLink = "https://" . ltrim($siteLink, "/");
                }
                ?>
                <li>
                    <a href="<?= htmlspecialchars($siteLink) ?>" class="site-link">
                        <?php if (!empty($iconlink)): ?>
                            <img src="<?= htmlspecialchars($iconlink) ?>" alt="<?= htmlspecialchars($name) ?> icon" class="site-icon">
                        <?php endif; ?>
                        <?= htmlspecialchars($name) ?>
                    </a>
                </li>
            <?php 
            endwhile; 
        endif; 
        ?>
    </ul>
</nav>

<script src="js/ham.js"></script>



<script>
const nav = document.querySelector('.navbar');
const placeholder = document.createElement('div'); // щоб контент не стрибав
const navOffset = nav.offsetTop;

window.addEventListener('scroll', function() {
    if (window.pageYOffset >= navOffset) {
        // Коли доскролили:
        nav.classList.add('fixed-nav');
        // Додаємо "заглушку", щоб сторінка не сіпалася
        if (!placeholder.parentElement) {
            nav.parentNode.insertBefore(placeholder, nav);
            placeholder.style.height = nav.offsetHeight + 'px';
        }
    } else {
        // Коли повернулися вгору:
        nav.classList.remove('fixed-nav');
        if (placeholder.parentElement) {
            placeholder.remove();
        }
    }
});</script>