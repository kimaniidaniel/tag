<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <!-- <h3><?= h($user->id) ?></h3> -->
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Number') ?></th>
                    <td><?= h($user->id_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($user->address) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= h($user->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Inventory') ?></h4>
                <?php if (!empty($user->inventory)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <th><?= __('Student Name') ?></th>
                            <!-- <th><?= __('Storageunit Id') ?></th> -->
                            <!-- <th><?= __('User') ?></th> -->
                            <th><?= __('Description') ?></th>
                            <!-- <th><?= __('Number Of Items') ?></th> -->
                            <th><?= __('Departure Date') ?></th>
                            <th><?= __('Arival Date') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($user->inventory as $inventory) : ?>
                        <tr>
                            <!-- <td><?= h($inventory->id) ?></td> -->
                            <td><?= h($inventory->student_name) ?></td>
                            <!-- <td><?= h($inventory->storageunit_id) ?></td> -->
                            <!-- <td><?= h($inventory->user_id) ?></td> -->
                            <td><?= h($inventory->description) ?></td>
                            <!-- <td><?= h($inventory->number_of_items) ?></td> -->
                            <td><?= h($inventory->departure_date) ?></td>
                            <td><?= h($inventory->arrival_date) ?></td>
                            <td><?= h($inventory->updated_at) ?></td>
                            <!-- <td class="actions">
                                <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $inventory->id], ['escape' => false]) ?>
                                <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $inventory->id], ['escape' => false]) ?>
                                <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $inventory->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related storage locations') ?></h4>
                <?php if (!empty($user->storagelocations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <th><?= __('Name') ?></th>
                            <th><?= __('User') ?></th>
                            <!-- <th><?= __('Address') ?></th> -->
                            <!-- <th><?= __('Description') ?></th> -->
                            <th><?= __('Updated At') ?></th>
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($user->storagelocations as $storagelocations) : ?>
                        <tr>
                            <!-- <td><?= h($storagelocations->id) ?></td> -->
                            <td><?= h($storagelocations->name) ?></td>
                            <td><?= h($storagelocations->user_id) ?></td>
                            <!-- <td><?= h($storagelocations->address) ?></td> -->
                            <!-- <td><?= h($storagelocations->description) ?></td> -->
                            <td><?= h($storagelocations->updated_at) ?></td>
                            <!-- <td class="actions">
                                <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $storagelocations->id], ['escape' => false]) ?>
                                <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $storagelocations->id], ['escape' => false]) ?>
                                <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $storagelocations->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $storagelocations->id)]) ?>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related storage units') ?></h4>
                <?php if (!empty($user->storageunits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <!-- <th><?= __('Storagelocation Id') ?></th> -->
                            <th><?= __('Name') ?></th>
                            <th><?= __('User') ?></th>
                            <!-- <th><?= __('id_number') ?></th> -->
                            <th><?= __('Updated At') ?></th>
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($user->storageunits as $storageunits) : ?>
                        <tr>
                            <!-- <td><?= h($storageunits->id) ?></td> -->
                            <!-- <td><?= h($storageunits->storagelocation_id) ?></td> -->
                            <td><?= h($storageunits->cage_name) ?></td>
                            <!-- <td><?= h($storageunits->id_number) ?></td> -->
                            <td><?= h($storageunits->user_id) ?></td>
                            <td><?= h($storageunits->updated_at) ?></td>
                            <!-- <td class="actions">
                            <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $storageunits->id], ['escape' => false]) ?>
                                <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $storageunits->id], ['escape' => false]) ?>
                                <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $storageunits->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $storageunits->id)]) ?>
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
