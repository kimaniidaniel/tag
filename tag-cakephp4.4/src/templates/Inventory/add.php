<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 * @var \Cake\Collection\CollectionInterface|string[] $storageunits
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $storagelocations
 * 
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Inventory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventory form content">
            <?= $this->Form->create($inventory) ?>
            <fieldset>
                <legend><?= __('Add Inventory') ?></legend>
                <?php
                    echo $this->Form->control('name', ['placeholder'=>'First/Last Name']);
                    // echo $this->Form->control('first_name', ['placeholder'=>'First Name']);
                    // echo $this->Form->control('last_name', ['placeholder'=>'Last Name']);
                    echo $this->Form->control('student', ['placeholder'=>'Student ID']);
                    echo $this->Form->control('storageunit_id', ['options' => $storageunits]);
                    echo $this->Form->control('user_id');
                    echo $this->Form->control('description',['placeholder'=>'Please lsit your items']);
                    echo $this->Form->control('storagelocation_id', ['options' =>$storageLocations]);
                //  echo $this->Form->control('period');
                    echo $this->Form->control('number_of_items');
                    //https://book.cakephp.org/4/en/views/helpers/form.html#creating-time-controls
                    echo $this->Form->control('timeslot', 
                        ['options'=>
                        ["5:00 pm"=>"5:00 pm", "5:15 pm"=>"5:15 pm", "5:30 pm"=>"5:30 pm", 
                        "5:45 pm"=>"5:45 pm", "6:00 pm"=>"6:00 pm"]], ['label'=>'Time?']);
                    echo $this->Form->control('departure_date');
                    echo $this->Form->control('arrival_date');
                    echo $this->Form->control('updated_at');        
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
