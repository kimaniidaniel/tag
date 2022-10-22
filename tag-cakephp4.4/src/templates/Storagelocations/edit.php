<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storagelocation $storagelocation
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storagelocation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storagelocation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Storagelocations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storagelocations form content">
            <?= $this->Form->create($storagelocation) ?>
            <fieldset>
                <legend><?= __('Edit Storagelocation') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('name');
                    // echo $this->Form->control('address');
                    // echo $this->Form->control('description');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
