<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\DetalleAcceso[]|\Cake\Collection\CollectionInterface $detalleAccesos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Detalle Acceso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accesos'), ['controller' => 'Accesos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Acceso'), ['controller' => 'Accesos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Credenciales'), ['controller' => 'Credenciales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Credenciale'), ['controller' => 'Credenciales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleAccesos index large-9 medium-8 columns content">
    <h3><?= __('Detalle Accesos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acceso_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('credencial_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleAccesos as $detalleAcceso): ?>
            <tr>
                <td><?= $this->Number->format($detalleAcceso->id) ?></td>
                <td><?= $detalleAcceso->has('acceso') ? $this->Html->link($detalleAcceso->acceso->id, ['controller' => 'Accesos', 'action' => 'view', $detalleAcceso->acceso->id]) : '' ?></td>
                <td><?= $detalleAcceso->has('credenciale') ? $this->Html->link($detalleAcceso->credenciale->id, ['controller' => 'Credenciales', 'action' => 'view', $detalleAcceso->credenciale->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $detalleAcceso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleAcceso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detalleAcceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAcceso->id)]) ?>
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
