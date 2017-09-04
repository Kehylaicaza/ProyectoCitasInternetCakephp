<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Appointment[]|\Cake\Collection\CollectionInterface $appointments
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li><?= $this->Html->link(__('Volver al menú'), ['controller' => 'Pages', 'action' => 'employee']) ?></li>
       
    </ul>
</nav>
<div class="appointments index large-9 medium-8 columns content">
    <h3><?= __('Citas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $this->Number->format($appointment->id) ?></td>
                <td><?= h($appointment->description) ?></td>
                <td><?= h($appointment->state) ?></td>
                <td><?= $appointment->has('schedule') ? $this->Html->link($appointment->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $appointment->schedule->id]) : '' ?></td>
                <td><?= $appointment->has('client') ? $this->Html->link($appointment->client->id, ['controller' => 'Clients', 'action' => 'view', $appointment->client->id]) : '' ?></td>
                <td><?= $appointment->has('employee') ? $this->Html->link($appointment->employee->id, ['controller' => 'Employees', 'action' => 'view', $appointment->employee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appointment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appointment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
