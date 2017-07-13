<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Sistema $sistema
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sistema'), ['action' => 'edit', $sistema->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sistema'), ['action' => 'delete', $sistema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sistema->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sistemas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sistema'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accesos'), ['controller' => 'Accesos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acceso'), ['controller' => 'Accesos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credenciales'), ['controller' => 'Credenciales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credenciale'), ['controller' => 'Credenciales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Users'), ['controller' => 'DetalleUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle User'), ['controller' => 'DetalleUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sistemas view large-9 medium-8 columns content">
    <h3><?= h($sistema->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($sistema->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($sistema->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sistema->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Accesos') ?></h4>
        <?php if (!empty($sistema->accesos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Persona Id') ?></th>
                <th scope="col"><?= __('Sistema Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sistema->accesos as $accesos): ?>
            <tr>
                <td><?= h($accesos->id) ?></td>
                <td><?= h($accesos->persona_id) ?></td>
                <td><?= h($accesos->sistema_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accesos', 'action' => 'view', $accesos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accesos', 'action' => 'edit', $accesos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accesos', 'action' => 'delete', $accesos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accesos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Credenciales') ?></h4>
        <?php if (!empty($sistema->credenciales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Sistema Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sistema->credenciales as $credenciales): ?>
            <tr>
                <td><?= h($credenciales->id) ?></td>
                <td><?= h($credenciales->descripcion) ?></td>
                <td><?= h($credenciales->sistema_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Credenciales', 'action' => 'view', $credenciales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Credenciales', 'action' => 'edit', $credenciales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Credenciales', 'action' => 'delete', $credenciales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credenciales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
