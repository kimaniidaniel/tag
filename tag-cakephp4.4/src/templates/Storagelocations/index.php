<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storagelocation[]|\Cake\Collection\CollectionInterface $storagelocations
 */
?>
<div class="storagelocations index content">
    <?= $this->Html->link(__('New Storagelocation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Storage Locations') ?></h3>
    <small>Here you will find the list of storage location in the system</small>
    <div class="table-responsive">
        <?php echo $this->Form->create(); ?>
        <?php echo $this->Form->control('query', 
            ['placeholder'=>'Search: Name, address, description etc.', 'class'=>'search-text',
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
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <!-- <th><?= $this->Paginator->sort('address') ?></th> -->
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storagelocations as $storagelocation): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($storagelocation->id) ?></td> -->
                    <td><?= $storagelocation->has('user') ? $this->Html->link($storagelocation->user->id, ['controller' => 'Users', 'action' => 'view', $storagelocation->user->id]) : '' ?></td>
                    <!-- <td><?= $storagelocation->has('user') ? $this->Html->link($storagelocation->user->first_name . " " . $storagelocation->user->last_name, ['controller' => 'Users', 'action' => 'view', $storagelocation->user->id]) : '' ?></td> -->
                    <!-- <td><?= $storagelocation->has('user') ? $this->Html->link($storagelocation->user->first_name . " " . $storagelocation->user->last_name, ['controller' => 'Users', 'action' => 'view', $storagelocation->user->id]) : '' ?></td> -->
                    <td><?= h($storagelocation->name) ?></td>
                    <!-- <td><?= h($storagelocation->address) ?></td> -->
                    <td><?= h($storagelocation->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $storagelocation->id], ['escape' => false]) ?>
                        <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $storagelocation->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $storagelocation->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->id)]) ?>
                        <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $storagelocation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storagelocation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storagelocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->id)]) ?> -->
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
