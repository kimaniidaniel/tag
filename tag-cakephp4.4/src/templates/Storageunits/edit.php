<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storageunit $storageunit
 * @var string[]|\Cake\Collection\CollectionInterface $storagelocations
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storageunit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storageunit->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Storageunits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageunits form content">
            <?= $this->Form->create($storageunit) ?>
            <fieldset>
                <legend><?= __('Edit Storageunit') ?></legend>
                <?php
                    echo $this->Form->control('storagelocation_id', ['options' => $storagelocations]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('identifier');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
