<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Acceso[]|\Cake\Collection\CollectionInterface $accesos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Acceso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accesos index large-9 medium-8 columns content">
    <h3><?= __('Accesos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('persona_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sistema_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accesos as $acceso): ?>
            <tr>
                <td><?= $this->Number->format($acceso->id) ?></td>
                <td><?= $acceso->has('persona') ? $this->Html->link($acceso->persona->full_name, ['controller' => 'Personas', 'action' => 'view', $acceso->persona->id]) : '' ?></td>
                <td><?= $acceso->has('sistema') ? $this->Html->link($acceso->sistema->descripcion, ['controller' => 'Sistemas', 'action' => 'view', $acceso->sistema->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $acceso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $acceso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $acceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acceso->id)]) ?>
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
