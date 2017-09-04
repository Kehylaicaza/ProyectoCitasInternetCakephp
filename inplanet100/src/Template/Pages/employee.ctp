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


$cakeDescription = 'CakePHP: the rapid development PHP framework';?>

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

                            <?= $this->fetch('meta') ?>
                                <?= $this->fetch('script') ?>
    </head>


    <body>


  <div class="row2">
<br><br><br>
            <div class="col-sm-7">
                <div class="vertical-menu">
                 <li>
                        <?= $this->Html->link( 'Editar Horarios',['controller' => 'Schedules', 'action' => 'add_Employee']); ?>
                    </li>
                 
                      <li>
                        <?= $this->Html->link( 'Ver estado Citas',['controller' => 'Appointments', 'action' => 'index_Employee']); ?>
                    </li>
                      <li>

                        <?= $this->Html->link( 'Actualizar mis datos',['controller' => 'Users', 'action' => 'edit_Employee',$this->request->session()->read('Auth.User.id')]); ?>
                    </li>
                          <li>

                        <?= $this->Html->link( 'Ver Perfil',['controller' => 'Users', 'action' => 'view_User',$this->request->session()->read('Auth.User.id')]); ?>
                    </li>
                  
                </div>
            </div>

        </div>


        <div>
        </div>



    </body>

    </html>
