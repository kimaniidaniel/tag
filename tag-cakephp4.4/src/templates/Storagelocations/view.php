<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storagelocation $storagelocation
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Storage Location'), ['action' => 'edit', $storagelocation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Storage Location'), ['action' => 'delete', $storagelocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Storage Location'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Storage Location'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storagelocations view content">
            <th><?= __('Storage Location Id') ?></th>
            <h3><?= h($storagelocation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $storagelocation->has('user') ? $this->Html->link($storagelocation->user->id, ['controller' => 'Users', 'action' => 'view', $storagelocation->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($storagelocation->name) ?></td>
                </tr>
                <tr>
                    <!-- <th><?= __('Address') ?></th>
                    <td><?= h($storagelocation->address) ?></td> -->
                </tr>
                <tr>
                    <!-- <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($storagelocation->id) ?></td> -->
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($storagelocation->updated_at) ?></td>
                </tr>
            </table>
            <!-- <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($storagelocation->description)); ?>
                </blockquote>
            </div> -->
            <div class="related">
                <h4><?= __('Related Storageunits') ?></h4>
                <?php if (!empty($storagelocation->storageunits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <!-- <th><?= __('Storagelocation Id') ?></th> -->
                            <th><?= __('Storage Unit') ?></th>
                            <!-- <th><?= __('Student Name') ?></th> -->
                            <th><?= __('User') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <!-- <th class="actions"><?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($storagelocation->storageunits as $storageunits) : ?>
                        <tr>
                            <!-- <?= h($storageunits->id) ?>
                            <td><?= h($storageunits->name) ?></td>
                            <td><?= h($storageunits->user_id) ?></td>
                            <td><?= h($storageunits->updated_at) ?></td>
                            <!-- <td class="actions">
                            <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $storagelocation->id], ['escape' => false]) ?>
                            <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $storagelocation->id], ['escape' => false]) ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $storagelocation->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->id)]) ?>
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
