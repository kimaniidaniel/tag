<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storagelocation[]|\Cake\Collection\CollectionInterface $storagelocations
 */
?>
<div class="storagelocations index content">
    <?= $this->Html->link(__('New Storagelocation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Storagelocations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storagelocations as $storagelocation): ?>
                <tr>
                    <td><?= $this->Number->format($storagelocation->id) ?></td>
                    <td><?= $storagelocation->has('user') ? $this->Html->link($storagelocation->user->id, ['controller' => 'Users', 'action' => 'view', $storagelocation->user->id]) : '' ?></td>
                    <td><?= h($storagelocation->name) ?></td>
                    <td><?= h($storagelocation->address) ?></td>
                    <td><?= h($storagelocation->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $storagelocation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storagelocation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storagelocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->id)]) ?>
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
