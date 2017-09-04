<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li><?= $this->Html->link(__('Volver al menu'), ['controller' => 'Pages', 'action' => 'client']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('role', array('value'=>'Empleado', 'disabled' => 'disabled'));
            echo $this->Form->control('ci');
            echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('address');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
