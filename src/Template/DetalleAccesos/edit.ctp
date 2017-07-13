<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detalleAcceso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAcceso->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Detalle Accesos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accesos'), ['controller' => 'Accesos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Acceso'), ['controller' => 'Accesos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Credenciales'), ['controller' => 'Credenciales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Credenciale'), ['controller' => 'Credenciales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleAccesos form large-9 medium-8 columns content">
    <?= $this->Form->create($detalleAcceso) ?>
    <fieldset>
        <legend><?= __('Edit Detalle Acceso') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
