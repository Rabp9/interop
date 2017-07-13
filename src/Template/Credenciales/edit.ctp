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
                ['action' => 'delete', $credencial->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $credencial->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Credenciales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="credenciales form large-9 medium-8 columns content">
    <?= $this->Form->create($credencial) ?>
    <fieldset>
        <legend><?= __('Edit Credencial') ?></legend>
        <?php
            echo $this->Form->select('sistema_id', $sistemas, ['empty' => 'Selecciona un Sistema']);
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
