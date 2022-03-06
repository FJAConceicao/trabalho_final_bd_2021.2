<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Info[]|\Cake\Collection\CollectionInterface $info
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="info index large-9 medium-8 columns content">
    <h3><?= __('Info') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dimension') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($info as $info): ?>
            <tr>
                <td><?= $this->Number->format($info->id) ?></td>
                <td><?= h($info->dimension) ?></td>
                <td><?= h($info->weight) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $info->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $info->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id)]) ?>
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