<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Detalle Acceso') ?></legend>
        <?php
            echo $this->Form->select('acceso_id', $accesos, ['empty' => 'Selecciona un Acceso']);
            echo $this->Form->select('credencial_id', $credenciales, ['empty' => 'Selecciona un Credencial']);
            echo $this->FOrm->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
