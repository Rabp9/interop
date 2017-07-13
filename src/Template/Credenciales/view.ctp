<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Credencial $credencial
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Credencial'), ['action' => 'edit', $credencial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credencial'), ['action' => 'delete', $credencial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credencial->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credenciales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credencial'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="credenciales view large-9 medium-8 columns content">
    <h3><?= h($credencial->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($credencial->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sistema') ?></th>
            <td><?= $credencial->has('sistema') ? $this->Html->link($credencial->sistema->descripcion, ['controller' => 'Sistemas', 'action' => 'view', $credencial->sistema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($credencial->id) ?></td>
        </tr>
    </table>
</div>
