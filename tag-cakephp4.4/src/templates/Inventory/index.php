<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory[]|\Cake\Collection\CollectionInterface $inventory
 */
?>
<div class="inventory index content">
    <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Inventory') ?></h3>
    <small>Here you will find the list of items being stored</small>
    <div class="table-responsive">
        <?php echo $this->Form->create(); ?>
        <?php echo $this->Form->control('query', 
            ['placeholder'=>'Search: Name, unit, description etc.', 'class'=>'search-text',
                'label'=>'',
                'style'=>'border-radius:5px;width:100%']
            ); 
        echo $this->Form->button(__('Search'));
        echo $this->Form->end(); ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <!-- <th><?= $this->Paginator->sort('storageunit_id') ?></th> -->
                    <th><?= $this->Paginator->sort('user') ?></th>
                    <!-- <th><?= $this->Paginator->sort('description') ?></th> -->
                    <th><?= $this->Paginator->sort('storagelocation_id') ?></th>
                    <th><?= $this->Paginator->sort('number_of_items') ?></th>
                    <th><?= $this->Paginator->sort('timeslot') ?></th>
                    <th><?= $this->Paginator->sort('departure_date') ?></th>
                    <th><?= $this->Paginator->sort('arival_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventory as $inventory): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($inventory->id) ?></td> -->
                    <td><?= h($inventory->name) ?></td>
                    <!-- <td><?= $inventory->has('storageunit') ? $this->Html->link($inventory->storageunit->name, ['controller' => 'Storageunits', 'action' => 'view', $inventory->storageunit->id]) : '' ?></td> -->
                    <td><?= $inventory->has('user') ? $this->Html->link($inventory->user->id, ['controller' => 'Users', 'action' => 'view', $inventory->user->id]) : '' ?></td>
                    <!-- <td><?= h($inventory->description) ?></td> -->
                    <td><?= h($inventory->storagelocation_id) ?></td>
                    <td><?= $this->Number->format($inventory->number_of_items) ?></td>
                    <td><?= h($inventory->timeslot) ?></td>
                    <td><?= h($inventory->arival_date) ?></td>
                    <td><?= h($inventory->departure_date) ?></td>
                    <td><?= h($inventory->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $inventory->id], ['escape' => false]) ?>
                        <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $inventory->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $inventory->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
                        <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $inventory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
