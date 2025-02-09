<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Admin' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
  <?php include('sidebar.php') ?>
  <div class="overlay" id="overlay"></div>
  
  <div class="content">
    <?php include('header.php') ?>
    <main>
      <?= $content ?>
    </main>
    
  </div>
  
  <?php include('script.php') ?>
</body>
</html>