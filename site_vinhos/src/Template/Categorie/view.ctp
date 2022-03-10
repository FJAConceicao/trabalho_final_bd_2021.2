<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorie $categorie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categorie'), ['action' => 'edit', $categorie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categorie'), ['action' => 'delete', $categorie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorie'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorie view large-9 medium-8 columns content">
    <h3><?= h($categorie->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categorie') ?></th>
            <td><?= h($categorie->categorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categorie->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product') ?></h4>
        <?php if (!empty($categorie->product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Asin') ?></th>
                <th scope="col"><?= __('Brand') ?></th>
                <th scope="col"><?= __('Source Url') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Fk Info Info PK') ?></th>
                <th scope="col"><?= __('Fk Manufacturer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categorie->product as $product): ?>
            <tr>
                <td><?= h($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->asin) ?></td>
                <td><?= h($product->brand) ?></td>
                <td><?= h($product->source_url) ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= h($product->fk_info_info_PK) ?></td>
                <td><?= h($product->fk_Manufacturer_Id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Product', 'action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Product', 'action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Product', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
