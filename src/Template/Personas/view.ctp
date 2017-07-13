<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Persona $persona
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accesos'), ['controller' => 'Accesos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acceso'), ['controller' => 'Accesos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle User'), ['controller' => 'DetalleUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personas view large-9 medium-8 columns content">
    <h3><?= h($persona->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($persona->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombres') ?></th>
            <td><?= h($persona->nombres) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Paterno') ?></th>
            <td><?= h($persona->apellido_paterno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Materno') ?></th>
            <td><?= h($persona->apellido_materno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($persona->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Accesos') ?></h4>
        <?php if (!empty($persona->accesos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Persona Id') ?></th>
                <th scope="col"><?= __('Sistema Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($persona->accesos as $accesos): ?>
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
</div>
