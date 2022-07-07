<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->ItemID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Inventory'), ['action' => 'delete', $inventory->ItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->ItemID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Inventory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventory view content">
            <h3><?= h($inventory->ItemID) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($inventory->Description) ?></td>
                </tr>
                <tr>
                    <th><?= __('ItemID') ?></th>
                    <td><?= $this->Number->format($inventory->ItemID) ?></td>
                </tr>
                <tr>
                    <th><?= __('StorageUnitID') ?></th>
                    <td><?= $this->Number->format($inventory->StorageUnitID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UserID') ?></th>
                    <td><?= $this->Number->format($inventory->UserID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number Of Items') ?></th>
                    <td><?= $this->Number->format($inventory->Number_of_Items) ?></td>
                </tr>
                <tr>
                    <th><?= __('Arrival Date') ?></th>
                    <td><?= h($inventory->Arrival_Date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Date') ?></th>
                    <td><?= h($inventory->Departure_Date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($inventory->Updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
