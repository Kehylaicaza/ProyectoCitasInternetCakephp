
<?php
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
                    <?= $this->Html->css('cake.css') ?>

                        <?= $this->fetch('meta') ?>
                            <?= $this->fetch('css') ?>
                                <?= $this->fetch('script') ?>
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
              <div class="top-bar-section">
                <ul class="right">
                    
                     <?php if($loggedIn) : ?>
                    <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'add_registry']); ?></li>
                <?php endif; ?>
                    
                   
               
                </ul>
            </div>
 
        </nav>
        <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
            
    </body>

    </html>