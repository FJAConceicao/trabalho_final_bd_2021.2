<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorie $categorie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categorie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categorie->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorie'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorie form large-9 medium-8 columns content">
    <?= $this->Form->create($categorie) ?>
    <fieldset>
        <legend><?= __('Edit Categorie') ?></legend>
        <?php
            echo $this->Form->control('categorie');
            echo $this->Form->control('product._ids', ['options' => $product]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
