<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <small>Here you will find the list of users that can log into the system</small>
    <div class="table-responsive">
        <?php echo $this->Form->create(); ?>
        <?php echo $this->Form->control('query', 
            ['placeholder'=>'Search: Name, address, username etc.', 'class'=>'search-text',
                'label'=>'',
                'style'=>'border-radius:5px;width:100%']
            ); 
        echo $this->Form->button(__('Search'));
        echo $this->Form->end(); ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_number') ?></th>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <th><?= $this->Paginator->sort('first_name','Name') ?></th>
                    <!-- <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('username') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('unit') ?></th> -->
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <!-- <th><?= $this->Paginator->sort('address') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->id_number) ?></td>
                    <!-- <td><?= $this->Number->format($user->id) ?></td> -->
                    <td><?= $this->Html->link(h($user->first_name)." ".h($user->last_name), ['action' => 'view', $user->id]) ?></td>
                    <!-- <td><?= h($user->first_name) ?></td> -->
                    <!-- <td><?= h($user->last_name) ?></td> -->
                    <!-- <td><?= h($user->username) ?></td> -->
                    <!-- <td><?= h($user->unit) ?></td> -->
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->email) ?></td>
                    <!-- <td><?= h($user->address) ?></td> -->
                    <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'View item', 'class' => 'fa-solid fa-eye')), ['action' => 'view', $user->id], ['escape' => false]) ?>
                        <?= $this->Html->link($this->Html->tag('i', '', array('title'=>'Edit item', 'class' => 'fa fa-pencil')), ['action' => 'edit', $user->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('title'=>'Delete item', 'class' => 'fa fa-trash')), ['action' => 'delete', $user->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
