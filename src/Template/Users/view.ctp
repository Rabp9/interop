<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Users'), ['controller' => 'DetalleUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle User'), ['controller' => 'DetalleUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Detalle Users') ?></h4>
        <?php if (!empty($user->detalle_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Persona Id') ?></th>
                <th scope="col"><?= __('Sistema Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->detalle_users as $detalleUsers): ?>
            <tr>
                <td><?= h($detalleUsers->id) ?></td>
                <td><?= h($detalleUsers->persona_id) ?></td>
                <td><?= h($detalleUsers->sistema_id) ?></td>
                <td><?= h($detalleUsers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetalleUsers', 'action' => 'view', $detalleUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleUsers', 'action' => 'edit', $detalleUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetalleUsers', 'action' => 'delete', $detalleUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
