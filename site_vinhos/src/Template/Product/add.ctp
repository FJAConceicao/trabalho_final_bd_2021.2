<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorie'), ['controller' => 'Categorie', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categorie'), ['controller' => 'Categorie', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="product form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('asin');
            echo $this->Form->control('brand');
            echo $this->Form->control('source_url');
            echo $this->Form->control('description');
            echo $this->Form->control('fk_info_info_PK');
            echo $this->Form->control('fk_Manufacturer_Id');
            echo $this->Form->control('categorie._ids', ['options' => $categorie]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
