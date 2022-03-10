<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sell $sell
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sell->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sell->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sells'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sells form large-9 medium-8 columns content">
    <?= $this->Form->create($sell) ?>
    <fieldset>
        <legend><?= __('Edit Sell') ?></legend>
        <?php
            echo $this->Form->control('fk_Product_Id');
            echo $this->Form->control('fk_Store_Id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
