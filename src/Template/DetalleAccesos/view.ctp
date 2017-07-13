<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\DetalleAcceso $detalleAcceso
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Detalle Acceso'), ['action' => 'edit', $detalleAcceso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Detalle Acceso'), ['action' => 'delete', $detalleAcceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAcceso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Accesos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Acceso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accesos'), ['controller' => 'Accesos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acceso'), ['controller' => 'Accesos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credenciales'), ['controller' => 'Credenciales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credenciale'), ['controller' => 'Credenciales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="detalleAccesos view large-9 medium-8 columns content">
    <h3><?= h($detalleAcceso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Acceso') ?></th>
            <td><?= $detalleAcceso->has('acceso') ? $this->Html->link($detalleAcceso->acceso->id, ['controller' => 'Accesos', 'action' => 'view', $detalleAcceso->acceso->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credenciale') ?></th>
            <td><?= $detalleAcceso->has('credenciale') ? $this->Html->link($detalleAcceso->credenciale->id, ['controller' => 'Credenciales', 'action' => 'view', $detalleAcceso->credenciale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($detalleAcceso->id) ?></td>
        </tr>
    </table>
</div>
