<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inventory $inventory
 * @var string[]|\Cake\Collection\CollectionInterface $storageunits
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php
//https://book.cakephp.org/4/en/views/helpers/url.html
$thisInventoryItem = $this->Url->build([
    'controller' => 'Inventory',
    'action' => 'edit',
    $inventory->id,
], ['fullBase' => true]);

$qrCodeUrl = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=".$thisInventoryItem ;
// echo $qrCodeUrl;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inventory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Inventory'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="inventory form content">
        <div style="float: right;"><img src="<?=$qrCodeUrl?>"></div>
            <?= $this->Form->create($inventory) ?>
            <fieldset>
                <legend><?= __('Edit Inventory') ?></legend>
                <?php
                    echo $this->Form->control('student_name');
                    echo $this->Form->control('storageunit_id', ['options' => $storageunits]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('number_of_items');
                    echo $this->Form->control('timeslot');
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
