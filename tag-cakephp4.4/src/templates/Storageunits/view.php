<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storageunit $storageunit
 */
?>
<?php
//https://book.cakephp.org/4/en/views/helpers/url.html
$thisInventoryItem = $this->Url->build([
    'controller' => 'Storageunits',
    'action' => 'view',
    $storageunit->id,
], ['fullBase' => true]);

$qrCodeUrl = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=".$thisInventoryItem ;
// echo $qrCodeUrl;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Storageunit'), ['action' => 'edit', $storageunit->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Storageunit'), ['action' => 'delete', $storageunit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageunit->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Storageunits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Storageunit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageunits view content">
            <h3><?= h($storageunit->name) ?></h3>
            <div style="float: right;"><img src="<?=$qrCodeUrl?>"></div>
            <table>
                <tr>
                    <th><?= __('Storagelocation') ?></th>
                    <td><?= $storageunit->has('storagelocation') ? $this->Html->link($storageunit->storagelocation->name, ['controller' => 'Storagelocations', 'action' => 'view', $storageunit->storagelocation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __(' Storage Unit') ?></th>
                    <td><?= h($storageunit->name) ?></td>
                </tr>
                <tr>
                    <!-- <th><?= __('id_number') ?></th>
                    <td><?= h($storageunit->id_number) ?></td> -->
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $storageunit->has('user') ? $this->Html->link($storageunit->user->id, ['controller' => 'Users', 'action' => 'view', $storageunit->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($storageunit->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Inventory') ?></h4>
                <?php if (!empty($storageunit->inventory)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Student Name') ?></th>
                            <!-- <th><?= __('Storageunit Id') ?></th> -->
                            <th><?= __('User') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Number Of Items') ?></th>
                            <th><?= __('Departure Date') ?></th>
                            <th><?= __('Arrival Date') ?></th>
                            <!-- <th><?= __('Updated At') ?></th> -->
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($storageunit->inventory as $inventory) : ?>
                        <tr>
                            <td><?= h($inventory->student_name) ?></td>
                            <!-- <td><?= h($inventory->storageunit_id) ?></td> -->
                            <td><?= h($inventory->user_id) ?></td>
                            <td><?= h($inventory->description) ?></td>
                            <td><?= h($inventory->number_of_items) ?></td>
                            <td><?= h($inventory->departure_date) ?></td>
                            <td><?= h($inventory->arrival_date) ?></td>
                          <!-- <td><?= h($inventory->updated_at) ?></td> -->
                            <!-- <td class="actions">
                            <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $storageunit->id], ['escape' => false]) ?>
                            <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $storageunit->id], ['escape' => false]) ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $storageunit->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $storageunit->id)]) ?>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
