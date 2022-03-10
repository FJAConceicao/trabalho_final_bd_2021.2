<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sell $sell
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sell'), ['action' => 'edit', $sell->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sell'), ['action' => 'delete', $sell->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sell->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sells'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sell'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sells view large-9 medium-8 columns content">
    <h3><?= h($sell->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sell->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Product Id') ?></th>
            <td><?= $this->Number->format($sell->fk_Product_Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Store Id') ?></th>
            <td><?= $this->Number->format($sell->fk_Store_Id) ?></td>
        </tr>
    </table>
</div>
