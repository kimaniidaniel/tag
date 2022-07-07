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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inventory->ItemID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->ItemID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Inventory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventory form content">
            <?= $this->Form->create($inventory) ?>
            <fieldset>
                <legend><?= __('Edit Inventory') ?></legend>
                <?php
                    echo $this->Form->control('StorageUnitID');
                    echo $this->Form->control('UserID');
                    echo $this->Form->control('Description');
                    echo $this->Form->control('Number_of_Items');
                    echo $this->Form->control('Arrival_Date');
                    echo $this->Form->control('Departure_Date');
                    echo $this->Form->control('Updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
