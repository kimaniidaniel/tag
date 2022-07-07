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
            <?= $this->Html->link(__('Edit Storageunit'), ['action' => 'edit', $storageunit->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Storageunit'), ['action' => 'delete', $storageunit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageunit->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Storageunits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Storageunit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageunits view content">
            <h3><?= h($storageunit->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Storagelocation') ?></th>
                    <td><?= $storageunit->has('storagelocation') ? $this->Html->link($storageunit->storagelocation->name, ['controller' => 'Storagelocations', 'action' => 'view', $storageunit->storagelocation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($storageunit->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identifier') ?></th>
                    <td><?= h($storageunit->identifier) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $storageunit->has('user') ? $this->Html->link($storageunit->user->id, ['controller' => 'Users', 'action' => 'view', $storageunit->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($storageunit->id) ?></td>
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
                            <th><?= __('Id') ?></th>
                            <th><?= __('Storageunit Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Number Of Items') ?></th>
                            <th><?= __('Arival Date') ?></th>
                            <th><?= __('Departure Date') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($storageunit->inventory as $inventory) : ?>
                        <tr>
                            <td><?= h($inventory->id) ?></td>
                            <td><?= h($inventory->storageunit_id) ?></td>
                            <td><?= h($inventory->user_id) ?></td>
                            <td><?= h($inventory->description) ?></td>
                            <td><?= h($inventory->number_of_items) ?></td>
                            <td><?= h($inventory->arival_date) ?></td>
                            <td><?= h($inventory->departure_date) ?></td>
                            <td><?= h($inventory->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Inventory', 'action' => 'view', $inventory->ItemID]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Inventory', 'action' => 'edit', $inventory->ItemID]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inventory', 'action' => 'delete', $inventory->ItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->ItemID)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
