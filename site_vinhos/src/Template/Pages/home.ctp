<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <div style="display:flex; flex:1; justify-content:center; align-items: center; flex-direction:column;">
    <h3 style="margin-top:18px"> Lojas de Cerveja, Licor e Review de Vinhos </h3>
    <h5 style="margin-top:8px"> Uma lista com mais de 2 mil reviews de cerveja, licor e vinhos </h5>
    <img src="https://i1.wp.com/www.wine.com.br/winepedia/wp-content/uploads/2018/10/Como-servir-vinhos.jpg?resize=1180%2C517&ssl=1" alt="Girl in a jacket" width="900" height="800">

    </div>
    <footer>
    </footer>
</body>
</html>
