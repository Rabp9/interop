<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Acceso $acceso
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Acceso'), ['action' => 'edit', $acceso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Acceso'), ['action' => 'delete', $acceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acceso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accesos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acceso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accesos view large-9 medium-8 columns content">
    <h3><?= h($acceso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Persona') ?></th>
            <td><?= $acceso->has('persona') ? $this->Html->link($acceso->persona->id, ['controller' => 'Personas', 'action' => 'view', $acceso->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sistema') ?></th>
            <td><?= $acceso->has('sistema') ? $this->Html->link($acceso->sistema->id, ['controller' => 'Sistemas', 'action' => 'view', $acceso->sistema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($acceso->id) ?></td>
        </tr>
    </table>
</div>
