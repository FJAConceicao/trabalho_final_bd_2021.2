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
    </table>
</div>

<div class="review index large-9 medium-8 columns content">
    <h3><?= __('Informações do produto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Dimension') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Weight') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infosProduct as $info): ?>
                <tr>
                    <td><?= h($info['dim']) ?></td>
                    <td><?= h($info['wei']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>


<divl style="float: right;" class="review index large-9 medium-8 columns content">
    <h3><?= __('Comentários e notas relacionados a este produto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Comentário') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nota') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentsNotesProduct as $dataProduct): ?>
            <tr>
                <td><?= h($dataProduct['text']) ?></td>
                <td><?= h($dataProduct['rating']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class=" store index large-9 medium-8 columns content">
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
                <td><?= h($product['media']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

