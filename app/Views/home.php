<?php
$api_key = 'edcd52275afd8b8c152c82f1ce3933a2'; // Obtenha em https://www.themoviedb.org/
$url_filmes = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=pt-BR";
$url_series = "https://api.themoviedb.org/3/tv/popular?api_key=$api_key&language=pt-BR";
$url_backdrops = "https://api.themoviedb.org/3/trending/movie/week?api_key=$api_key";

// Função para buscar dados da API
function getData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$filmes = getData($url_filmes)['results'];
$series = getData($url_series)['results'];
$backdrops = getData($url_backdrops)['results'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamFlix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        :root {
            --dark: #0f0f0f;
            --yellow: #FFD700;
        }

        body {
            background-color: var(--dark);
            color: white;
        }

        /* Menu Hambúrguer */
        .nav-container {
            padding: 20px;
            position: fixed;
            width: 100%;
            top: 0;
            background: rgba(0,0,0,0.9);
            z-index: 1000;
        }

        .nav-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-items {
            display: flex;
            gap: 20px;
        }

        .menu-icon {
            display: none;
            cursor: pointer;
        }

        .login-btn {
            color: var(--yellow);
            font-size: 1.2rem;
        }

        /* Slider */
        .slider-section {
            margin-top: 80px;
            padding: 20px;
            position: relative;
        }

        .backdrop-slider {
            display: flex;
            overflow: hidden;
            border-radius: 10px;
            position: relative;
            aspect-ratio: 16 / 9;
        }

        .backdrop-item {
            min-width: 100%;
            background-size: cover;
            background-position: center;
            transition: opacity 1s ease-in-out;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
        }

        .backdrop-item.active {
            opacity: 1;
        }

        .slider-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .slider-indicator {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
        }

        .slider-indicator.active {
            background: var(--yellow);
        }

        /* Sessões de filmes e séries */
        .content-section {
            padding: 20px;
        }

        .content-scroll {
            display: flex;
            overflow-x: auto;
            gap: 15px;
            padding-bottom: 20px;
        }

        .content-card {
            min-width: 150px;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            position: relative;
        }

        .content-card:hover {
            transform: scale(1.05);
        }

        .content-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .content-info {
            position: absolute;
            bottom: 0;
            padding: 10px;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
            width: 100%;
        }

        .rating {
            color: var(--yellow);
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .menu-items {
                display: none;
            }
            
            .menu-icon {
                display: block;
            }

            .content-card {
                min-width: 120px;
            }
        }
    </style>
</head>
<body>
    <!-- Menu -->
    <nav class="nav-container">
        <div class="nav-menu">
            <i class="fa-solid fa-bars menu-icon"></i>
            <div class="menu-items">
                <a href="#">Início</a>
                <a href="#">Filmes</a>
                <a href="#">Séries</a>
            </div>
            
            <a href="/login"><i class="fa-solid fa-user logia-btn"></i></a>
        </div>
    </nav>

    <!-- Backdrops -->
    <section class="slider-section">
        <div class="backdrop-slider">
            <?php foreach(array_slice($backdrops, 0, 5) as $index => $item): ?>
                <div class="backdrop-item <?= $index === 0 ? 'active' : '' ?>" 
                     style="background-image: url(https://image.tmdb.org/t/p/original<?= $item['backdrop_path'] ?>)">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="slider-indicators">
            <?php foreach(array_slice($backdrops, 0, 5) as $index => $item): ?>
                <div class="slider-indicator <?= $index === 0 ? 'active' : '' ?>" data-index="<?= $index ?>"></div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Filmes -->
    <section class="content-section">
        <h2>Filmes Populares</h2>
        <div class="content-scroll">
            <?php foreach($filmes as $filme): ?>
                <div class="content-card">
                    <img src="https://image.tmdb.org/t/p/w300<?= $filme['poster_path'] ?>" alt="<?= $filme['title'] ?>">
                    <div class="content-info">
                        <h4><?= $filme['title'] ?></h4>
                        <p class="rating"><i class="fa-solid fa-star"></i> <?= number_format($filme['vote_average'], 1) ?></p>
                        <p><?= substr($filme['release_date'], 0, 4) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Séries -->
    <section class="content-section">
        <h2>Séries Populares</h2>
        <div class="content-scroll">
            <?php foreach($series as $serie): ?>
                <div class="content-card">
                    <img src="https://image.tmdb.org/t/p/w300<?= $serie['poster_path'] ?>" alt="<?= $serie['name'] ?>">
                    <div class="content-info">
                        <h4><?= $serie['name'] ?></h4>
                        <p class="rating"><i class="fa-solid fa-star"></i> <?= number_format($serie['vote_average'], 1) ?></p>
                        <p><?= substr($serie['first_air_date'], 0, 4) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script>
        // Menu Hamburguer
        document.querySelector('.menu-icon').addEventListener('click', () => {
            document.querySelector('.menu-items').classList.toggle('active');
        });

        // Slider automático
        const sliderItems = document.querySelectorAll('.backdrop-item');
        const indicators = document.querySelectorAll('.slider-indicator');
        let currentIndex = 0;

        function showSlide(index) {
            sliderItems.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % sliderItems.length;
            showSlide(currentIndex);
        }

        // Troca de slide a cada 5 segundos
        setInterval(nextSlide, 5000);

        // Indicadores clicáveis
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                showSlide(currentIndex);
            });
        });
    </script>
</body>
</html>