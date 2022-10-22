<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 */
?>

<?php
//https://book.cakephp.org/4/en/views/helpers/url.html
$thisInventoryItem = $this->Url->build([
    'controller' => 'Inventory',
    'action' => 'view',
    $inventory->id,
], ['fullBase' => true]);

$qrCodeUrl = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=".$thisInventoryItem ;
echo $qrCodeUrl;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Inventory'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Inventory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Inventory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventory view content">
            <h3><?= h($inventory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($inventory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Storageunit') ?></th>
                    <td><?= $inventory->has('storageunit') ? $this->Html->link($inventory->storageunit->name, ['controller' => 'Storageunits', 'action' => 'view', $inventory->storageunit->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $inventory->has('user') ? $this->Html->link($inventory->user->id, ['controller' => 'Users', 'action' => 'view', $inventory->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($inventory->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($inventory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number Of Items') ?></th>
                    <td><?= $this->Number->format($inventory->number_of_items) ?></td>
                </tr>
                <tr>
                <th><?= __('Departure Date') ?></th>
                    <td><?= h($inventory->departure_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departure Date') ?></th>
                    <td><?= h($inventory->departure_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($inventory->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
