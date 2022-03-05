<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Review'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="review form large-9 medium-8 columns content">
    <?= $this->Form->create($review) ?>
    <fieldset>
        <legend><?= __('Add Review') ?></legend>
        <?php
            echo $this->Form->control('fk_User_Id');
            echo $this->Form->control('fk_Product_Id');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('did_purchase');
            echo $this->Form->control('rating');
            echo $this->Form->control('title');
            echo $this->Form->control('text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
