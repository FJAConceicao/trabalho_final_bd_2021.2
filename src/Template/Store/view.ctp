<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="store view large-9 medium-8 columns content">
    <h3><?= h($store->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($store->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($store->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($store->id) ?></td>
        </tr>
    </table>
</div>
<div class="store index large-9 medium-8 columns content">
    <h3><?= __('Produtos mais vendidos desta loja') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $store): ?>
            <tr>
                <td><?= h($store['name']) ?></td>
                <td><?= h($store['COUNT(*)']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
