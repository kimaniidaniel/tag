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
            <?= $this->Html->link(__('List User'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="user form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('FirstName');
                    echo $this->Form->control('LastName');
                    echo $this->Form->control('UserName');
                    echo $this->Form->control('Password');
                    echo $this->Form->control('Term');
                    echo $this->Form->control('Role');
                    echo $this->Form->control('Identifier');
                    echo $this->Form->control('Email');
                    echo $this->Form->control('Address');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
