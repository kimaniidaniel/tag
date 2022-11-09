<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storageunit[]|\Cake\Collection\CollectionInterface $storageunits
 */
?>
<div class="storageunits index content">
    <?= $this->Html->link(__('New Storageunit'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Storage Units') ?></h3>
    <small>Here you will find the list of storge units in the system. A storage unit exists inside a storage location</small>
    <div class="table-responsive">
        <?php echo $this->Form->create(); ?>
        <?php echo $this->Form->control('query', 
            ['placeholder'=>'Search: Name, idenitifier, user etc.', 'class'=>'search-text',
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
                    <th><?= $this->Paginator->sort('storagelocation_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <!-- <th><?= $this->Paginator->sort('id_number') ?></th> -->
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storageunits as $storageunit): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($storageunit->id) ?></td> -->
                    <td><?= $storageunit->has('storagelocation') ? $this->Html->link($storageunit->storagelocation->name, ['controller' => 'Storagelocations', 'action' => 'view', $storageunit->storagelocation->id]) : $storageunit->storagelocation_id ?></td>
                    <td><?= h($storageunit->cage_name) ?></td>
                    <!-- <td><?= h($storageunit->id_number) ?></td> -->
                    <td><?= $storageunit->has('user') ? $this->Html->link($storageunit->user->first_name . " " . $storageunit->user->last_name, ['controller' => 'Users', 'action' => 'view', $storageunit->user->id]) : '' ?></td>
                    <td><?= h($storageunit->updated_at) ?></td>
                    <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $storageunit->id], ['escape' => false]) ?>
                        <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $storageunit->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $storageunit->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $storageunit->id)]) ?>
                        <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storageunit->id]) ?> -->
                        <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storageunit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageunit->id)]) ?> -->
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
