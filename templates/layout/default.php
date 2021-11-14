<?php

$cakeDescription = 'Sub Sistema Livraria';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/emprestimos') ?>"><span>Livraria</span>Empréstimos</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://google.com.br">Google</a>
            <a target="_blank" rel="noopener" href="https://www.linkedin.com/in/marcos-david-almeida-de-sousa-499449207/">David</a>
                <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
