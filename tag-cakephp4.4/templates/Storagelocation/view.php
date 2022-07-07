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
            <?= $this->Html->link(__('Edit Storagelocation'), ['action' => 'edit', $storagelocation->StorageLocationID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Storagelocation'), ['action' => 'delete', $storagelocation->StorageLocationID], ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->StorageLocationID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Storagelocation'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Storagelocation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storagelocation view content">
            <h3><?= h($storagelocation->StorageLocationID) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($storagelocation->Name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($storagelocation->Address) ?></td>
                </tr>
                <tr>
                    <th><?= __('StorageLocationID') ?></th>
                    <td><?= $this->Number->format($storagelocation->StorageLocationID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned User ID') ?></th>
                    <td><?= $this->Number->format($storagelocation->Assigned_User_ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($storagelocation->Updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($storagelocation->Description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
