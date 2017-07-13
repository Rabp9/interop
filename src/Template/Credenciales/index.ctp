<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Credencial[]|\Cake\Collection\CollectionInterface $credenciales
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Credencial'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="credenciales index large-9 medium-8 columns content">
    <h3><?= __('Credenciales') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sistema.descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($credenciales as $credencial): ?>
            <tr>
                <td><?= $this->Number->format($credencial->id) ?></td>
                <td><?= h($credencial->descripcion) ?></td>
                <td><?= $credencial->has('sistema') ? $this->Html->link($credencial->sistema->descripcion, ['controller' => 'Sistemas', 'action' => 'view', $credencial->sistema->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $credencial->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $credencial->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $credencial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credencial->id)]) ?>
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
