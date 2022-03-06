<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="product view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asin') ?></th>
            <td><?= h($product->asin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand') ?></th>
            <td><?= h($product->brand) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Url') ?></th>
            <td><?= h($product->source_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categories') ?></th>
            <td><?= h($product->categories) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Info Info PK') ?></th>
            <td><?= $this->Number->format($product->fk_info_info_PK) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Manufacturer Id') ?></th>
            <td><?= $this->Number->format($product->fk_Manufacturer_Id) ?></td>
        </tr>
    </table>
</div>
<div>
<div class="product index large-9 medium-8 columns content">
    <h3><?= __('Todos os Produtos Deste Fabricante') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_info_info_PK') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_Manufacturer_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categories') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product2 as $product2): ?>
            <tr>
                <td><?= $this->Number->format($product2->id) ?></td>
                <td><?= h($product2->name) ?></td>
                <td><?= h($product2->asin) ?></td>
                <td><?= h($product2->brand) ?></td>
                <td><?= h($product2->source_url) ?></td>
                <td><?= h($product2->description) ?></td>
                <td><?= $this->Number->format($product2->fk_info_info_PK) ?></td>
                <td><?= $this->Number->format($product2->fk_Manufacturer_Id) ?></td>
                <td><?= h($product2->categories) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product2->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product2->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product2->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="review index large-9 medium-8 columns content">
    <h3><?= __('Review') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_User_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_Product_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('did_purchase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('text') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($review as $review): ?>
            <tr>
                <td><?= $this->Number->format($review->id) ?></td>
                <td><?= $this->Number->format($review->fk_User_Id) ?></td>
                <td><?= $this->Number->format($review->fk_Product_Id) ?></td>
                <td><?= h($review->date) ?></td>
                <td><?= h($review->did_purchase) ?></td>
                <td><?= $this->Number->format($review->rating) ?></td>
                <td><?= h($review->title) ?></td>
                <td><?= h($review->text) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $review->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $review->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<div class="store index large-9 medium-8 columns content">
    <h3><?= __('Produtos que possuem uma média de reviews melhores do que este produto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Name Product') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Média de reviews') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= h($product['name']) ?></td>
                <td><?= h($product['AVG(review.rating)']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

