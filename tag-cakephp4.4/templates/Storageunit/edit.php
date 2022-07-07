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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storageunit->StorageUnitID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storageunit->StorageUnitID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Storageunit'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageunit form content">
            <?= $this->Form->create($storageunit) ?>
            <fieldset>
                <legend><?= __('Edit Storageunit') ?></legend>
                <?php
                    echo $this->Form->control('StorageLocationID');
                    echo $this->Form->control('StorageName');
                    echo $this->Form->control('Assigned_User_ID');
                    echo $this->Form->control('Updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
