<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storageunit $storageunit
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Storageunit'), ['action' => 'edit', $storageunit->StorageUnitID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Storageunit'), ['action' => 'delete', $storageunit->StorageUnitID], ['confirm' => __('Are you sure you want to delete # {0}?', $storageunit->StorageUnitID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Storageunit'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Storageunit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageunit view content">
            <h3><?= h($storageunit->StorageUnitID) ?></h3>
            <table>
                <tr>
                    <th><?= __('StorageName') ?></th>
                    <td><?= h($storageunit->StorageName) ?></td>
                </tr>
                <tr>
                    <th><?= __('StorageUnitID') ?></th>
                    <td><?= $this->Number->format($storageunit->StorageUnitID) ?></td>
                </tr>
                <tr>
                    <th><?= __('StorageLocationID') ?></th>
                    <td><?= $this->Number->format($storageunit->StorageLocationID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned User ID') ?></th>
                    <td><?= $this->Number->format($storageunit->Assigned_User_ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($storageunit->Updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
