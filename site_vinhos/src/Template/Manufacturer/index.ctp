<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer[]|\Cake\Collection\CollectionInterface $manufacturer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="manufacturer index large-9 medium-8 columns content">
    <h3><?= __('Manufacturer') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($manufacturer as $manufacturer): ?>
                <?php if ($manufacturer->name != ""): ?>
                    <tr>
                        <td><?= h($manufacturer->name) ?></td>
                        <td><?= h($manufacturer->url) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $manufacturer->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manufacturer->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manufacturer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacturer->id)]) ?>
                        </td>
                    </tr>
                <?php endif; ?>
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

<div class="product index large-9 medium-8 columns content">
    <h3><?= __('Quantidade de produtos de cada produtora') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Produtora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Quantidade') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
                <?php if ($result['name'] != ""): ?>
                    <tr>
                        <td><?= h($result['name']) ?></td>
                        <td><?= h($result['COUNT(product.id)']) ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
