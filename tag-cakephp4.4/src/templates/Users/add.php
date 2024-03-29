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
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend> Please enter your details below
                    <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    // echo $this->Form->control('username');
                    echo $this->Form->control('password');
                   // echo $this->Form->control('unit');
                    echo $this->Form->control('role',['placeholder'=>'Staff,Admin,RA']);
                    echo $this->Form->control('id_number', ['placeholder'=>'please enter you ID number']);
                    echo $this->Form->control('email', ['placeholder'=>'Valid email address eg. jsmith@sgu.edu']);
                    // echo $this->Form->control('address');

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
