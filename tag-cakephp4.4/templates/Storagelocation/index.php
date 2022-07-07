<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storagelocation[]|\Cake\Collection\CollectionInterface $storagelocation
 */
?>
<div class="storagelocation index content">
    <?= $this->Html->link(__('New Storagelocation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Storagelocation') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('StorageLocationID') ?></th>
                    <th><?= $this->Paginator->sort('Assigned_User_ID') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th><?= $this->Paginator->sort('Address') ?></th>
                    <th><?= $this->Paginator->sort('Updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storagelocation as $storagelocation): ?>
                <tr>
                    <td><?= $this->Number->format($storagelocation->StorageLocationID) ?></td>
                    <td><?= $this->Number->format($storagelocation->Assigned_User_ID) ?></td>
                    <td><?= h($storagelocation->Name) ?></td>
                    <td><?= h($storagelocation->Address) ?></td>
                    <td><?= h($storagelocation->Updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $storagelocation->StorageLocationID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storagelocation->StorageLocationID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storagelocation->StorageLocationID], ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->StorageLocationID)]) ?>
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
