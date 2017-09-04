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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

    <!DOCTYPE html>
    <html>

    <head>

        <link rel="stylesheet" href="/InPlanet2/css/style.css" />
        <link rel="stylesheet" href="/InPlanet2/css/base.css" />
        <?= $this->Html->charset() ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?= $cakeDescription ?>:
                    <?= $this->fetch('title') ?>
            </title>
            <?= $this->Html->meta('icon') ?>

                <?= $this->Html->css('style.css') ?>
                    <?= $this->Html->css('style2.css') ?>
                        <?= $this->Html->css('estilo.css') ?>
                            <?= $this->Html->css('boostrap.min.css') ?>

                                <?= $this->Html->script('jquery.min.js'); ?>
                                    <?= $this->Html->script('menu.js'); ?>




    </head>

    <body>

        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1>

                        <div class="header-image">
                            <a><?= $this->Html->image('logo.jpg') ?></a>
                        </div>
                    </h1>
                </li>
            </ul>
         
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Roles</button>
                    <div id="myDropdown" class="dropdown-content">
                        <ul class="right">

                            <li>
                                <?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?>
                            </li>


                        </ul>
                    </div>
                </div>
           

        </nav>


        <div class="row2">

            <div class="col-sm-8">
                <?php echo $this->Html->image('in.png', ['alt' => 'in']);?>


            </div>
            <div class="col-sm-5">
                <div class="vertical-menu">
                    <li>

                        <?= $this->Html->link( 'Editar Perfil',['controller' => 'Users', 'action' => 'edit_Client',$this->request->session()->read('Auth.User.id')]); ?>
                    </li>
                    <li>

                        <?= $this->Html->link( 'Ver Perfil',['controller' => 'Users', 'action' => 'view_Client',$this->request->session()->read('Auth.User.id')]); ?>
                    </li>
                    <a href="#">Cargar Planilla</a>

                    <?= $this->Html->link('Generar Cita', ['controller' => 'pages', 'action' => 'generarcita']); ?>

                        <li>
                            <?= $this->Html->link( 'Ver Planes',['controller' => 'Pages', 'action' => 'menuPlanes']); ?>
                        </li>
                </div>
            </div>

        </div>



    </body>

    </html>
