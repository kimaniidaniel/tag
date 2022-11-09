<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storageunit $storageunit
 * @var \Cake\Collection\CollectionInterface|string[] $storagelocations
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Storageunits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="storageunits form content">
            <?= $this->Form->create($storageunit) ?>
            <fieldset>
                <legend><?= __('Add Storage Unit') ?></legend>
                <?php
                    echo $this->Form->control('storagelocation_id', ['options' => $storagelocations]);
                    echo $this->Form->control('cage_name',['placeholder'=>'Cage name']);
                    echo $this->Form->control('id_number', ['placeholder'=>'please enter you ID number']);
                    //  echo $this->Form->control('description');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    // echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
