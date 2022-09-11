<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (Configure::read('debug')) :
    echo "<centeR style='font-size: .8em'>In dubug mode!</center>";
endif;

$cakeDescription = 'TAG: we will store and track your bags safely';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('custom') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home', 'custom']) ?>
</head>
<body class="home">

<header>
    <div class="container text-center" style="background-color: #1A7AFF;color: white;border-radius: 3px;
    box-shadow: 0 7px 14px 0 rgb(60 66 87 / 10%), 0 3px 6px 0 rgb(0 0 0 / 7%);">
        <a href="/omp/" target="_blank" rel="noopener">
            <div class=""><?= $this->Html->image('nawasa-logo.png') ?></div>
        </a>
        <h2 style="color: white;">
            TAGandSTORE 1.0
        </h2>
        <h4 style="color: white;">
            Welcome to the Online Management Portal (OMP)
        </h4>
    </div>
</header>

<main class="main">
        <div class="container">
            <div class="content">
                <div class="row center">
                    <div class="column">
                        <div class="message default text-center">
                            <?php echo $this->Html->link("Inventory", array('controller' => 'inventory','action'=> 'index'), array( 'class' => 'button', 'title'=> 'Click to manage the inventory of storage items'));?>
                            <?php echo $this->Html->link("Storage Units", array('controller' => 'storageunits','action'=> 'index'), array( 'class' => 'button', 'title'=> 'Click to access the storage units'));?>
                            <?php echo $this->Html->link("Storage Locations", array('controller' => 'storagelocations','action'=> 'index'), array( 'class' => 'button', 'title'=> 'Click to view access the storage locations'));?>
                            <?php echo $this->Html->link("Users", array('controller' => 'users','action'=> 'index'), array( 'class' => 'button', 'title'=> 'Click to manage Users that can access the system'));?>
                            
                            <hr>
                            <?php
                            // $this->loadHelper('Authentication.Identity');
                            // $can_admin = $this->Identity->get('can_admin');
                            // if($can_admin){
                            ?>
                                <!-- <?php echo $this->Html->link("OMP Access", array('controller' => 'admins','action'=> 'index'), array( 'class' => 'button', 'title'=> 'Click to manage users of the OMP'));?>
                                <?php echo $this->Html->link("Settings", array('controller' => 'settings','action'=> 'index'), array( 'class' => 'button', 'title'=> 'Click to change some App and OMP settings'));?> -->
                            <?php //} ?>
                           <br> <small>Please select one of the buttons above to proceed to that section.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

</body>
</html>
