<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory[]|\Cake\Collection\CollectionInterface $inventory
 */
?>
<div class="inventory index content">
    <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Inventory') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ItemID') ?></th>
                    <th><?= $this->Paginator->sort('StorageUnitID') ?></th>
                    <th><?= $this->Paginator->sort('UserID') ?></th>
                    <th><?= $this->Paginator->sort('Description') ?></th>
                    <th><?= $this->Paginator->sort('Number_of_Items') ?></th>
                    <th><?= $this->Paginator->sort('Arrival_Date') ?></th>
                    <th><?= $this->Paginator->sort('Departure_Date') ?></th>
                    <th><?= $this->Paginator->sort('Updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventory as $inventory): ?>
                <tr>
                    <td><?= $this->Number->format($inventory->ItemID) ?></td>
                    <td><?= $this->Number->format($inventory->StorageUnitID) ?></td>
                    <td><?= $this->Number->format($inventory->UserID) ?></td>
                    <td><?= h($inventory->Description) ?></td>
                    <td><?= $this->Number->format($inventory->Number_of_Items) ?></td>
                    <td><?= h($inventory->Arrival_Date) ?></td>
                    <td><?= h($inventory->Departure_Date) ?></td>
                    <td><?= h($inventory->Updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $inventory->ItemID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->ItemID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->ItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->ItemID)]) ?>
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
