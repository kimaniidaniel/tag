<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user
 */
?>
<div class="user index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('UserID') ?></th>
                    <th><?= $this->Paginator->sort('FirstName') ?></th>
                    <th><?= $this->Paginator->sort('LastName') ?></th>
                    <th><?= $this->Paginator->sort('UserName') ?></th>
                    <th><?= $this->Paginator->sort('Password') ?></th>
                    <th><?= $this->Paginator->sort('Term') ?></th>
                    <th><?= $this->Paginator->sort('Role') ?></th>
                    <th><?= $this->Paginator->sort('Identifier') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Address') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->UserID) ?></td>
                    <td><?= h($user->FirstName) ?></td>
                    <td><?= h($user->LastName) ?></td>
                    <td><?= h($user->UserName) ?></td>
                    <td><?= h($user->Password) ?></td>
                    <td><?= h($user->Term) ?></td>
                    <td><?= h($user->Role) ?></td>
                    <td><?= h($user->Identifier) ?></td>
                    <td><?= h($user->Email) ?></td>
                    <td><?= h($user->Address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->UserID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->UserID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->UserID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->UserID)]) ?>
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
