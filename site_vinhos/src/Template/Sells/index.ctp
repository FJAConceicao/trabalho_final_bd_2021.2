<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sell[]|\Cake\Collection\CollectionInterface $sells
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sell'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sells index large-9 medium-8 columns content">
    <h3><?= __('Sells') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_Product_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_Store_Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sells as $sell): ?>
            <tr>
                <td><?= $this->Number->format($sell->id) ?></td>
                <td><?= $this->Number->format($sell->fk_Product_Id) ?></td>
                <td><?= $this->Number->format($sell->fk_Store_Id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sell->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sell->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sell->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sell->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
