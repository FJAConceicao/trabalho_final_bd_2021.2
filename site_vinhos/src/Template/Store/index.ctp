<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store[]|\Cake\Collection\CollectionInterface $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="store index large-9 medium-8 columns content">
    <h3><?= __('Store') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($store as $store): ?>
            <tr>
                <td><?= h($store->name) ?></td>
                <td><?= h($store->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $store->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $store->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?>
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

<div class="store index large-9 medium-8 columns content">
    <h3><?= __('URLs das Lojas que produzem e vendem ao mesmo tempo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urls as $url): ?>
            <tr>
                <td><?= h($url['url']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>