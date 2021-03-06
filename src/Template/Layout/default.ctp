<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Generador de pruebas online';
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
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('select2.min.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('angular.min.js'); ?>
    <?= $this->Html->script('angular-local-storage.min.js') ?>
    <?= $this->Html->script('prueba.js'); ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('select2.min.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body ng-app="prueba">
    <div id="wrap">
    <?php if($role=="admin"): ?>
    <?php echo $this->element('navbar'); ?>
    <?= $this->Flash->render() ?>
    <?php elseif($role=="user"): ?>
    <?php echo $this->element('navbar2'); ?>
    <?= $this->Flash->render() ?>
    <?php else: ?>
    <?= $this->Flash->render() ?>
    <br><br>
    <?php endif; ?>
    <div>
        <?= $this->fetch('content') ?>
    </div>
    </div>
    <footer id="footer">
        <div class="container">
        <p class="text-muted credit"></p>
      </div>
    </footer>
</body>
</html>
