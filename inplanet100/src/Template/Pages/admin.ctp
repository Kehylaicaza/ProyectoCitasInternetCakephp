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


$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

    <!DOCTYPE html>
    <html>



    <body>


        <div class="row2">

            <div class="col-sm-8">



            </div>
            <div class="col-sm-5">
                <div class="vertical-menu">





                    <li>
                        <?= $this->Html->link( 'Crear Nuevo Usuario',['controller' => 'Users', 'action' => 'add']); ?>
                    </li>
                </div>
            </div>

        </div>


        <div>
            <h2 class="text-center">Menú crear</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="/InPlanet3/appointments/">
                            <div class="con">APPOINTMENTS</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/cities/">
                            <div class="con">CITIES</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/clients/">
                            <div class="con">CLIENTS</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/contracts/">
                            <div class="con">CONTRACTS</div>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a href="/InPlanet3/departments/">
                            <div class="con">DEPARTMENTS</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/employees/">
                            <div class="con">EMPLOYEES</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/InternetServices/">
                            <div class="con">INTERNET</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/modems/">
                            <div class="con">MODEMS</div>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a href="/InPlanet3/payements/">
                            <div class="con">PAYEMENTS</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/people/">
                            <div class="con">PEOPLE</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/plans/">
                            <div class="con">PLANS</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/typeofemployees/">
                            <div class="con">T.Empl</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/InPlanet3/users/">
                            <div class="con">USERS</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <style>
            #return {
                color: #236AC1;
                font-size: 18px;
                margin-left: 90%;
                text-align: right;
            }
            
            li {
                list-style: none;
            }
            
            div a {
                text-align: center;
                color: blue;
            }
            
            div a:hover {
                color: white;
            }
            
            .con {
                background: #7DCD3E;
                margin: 2% 10%;
                padding: 2%;
                padding-right: 11%;
                width: 100px;
                float: left;
                transition: all 0.6s ease;
            }
            
            .con:hover {
                background: #EE3830;
                transition: all 0.6s ease;
                cursor: pointer;
            }

        </style>
    </body>

    </html>
