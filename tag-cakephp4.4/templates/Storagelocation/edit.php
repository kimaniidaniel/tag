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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storagelocation->StorageLocationID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->StorageLocationID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Storagelocation'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storagelocation form content">
            <?= $this->Form->create($storagelocation) ?>
            <fieldset>
                <legend><?= __('Edit Storagelocation') ?></legend>
                <?php
                    echo $this->Form->control('Assigned_User_ID');
                    echo $this->Form->control('Name');
                    echo $this->Form->control('Address');
                    echo $this->Form->control('Description');
                    echo $this->Form->control('Updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
