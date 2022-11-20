<!-- in /templates/Users/login.php -->
<div style="max-width: 600px;
    margin: auto;
    background-color: white;
    padding: 15px;
    margin-top: 100px;
    border-radius: 0.4rem;
    box-shadow: 0 7px 14px 0 rgb(60 66 87 / 10%), 0 3px 6px 0 rgb(0 0 0 / 7%);">
    <div class="users form">
        <?= $this->Flash->render() ?>
        <h3>Login</h3>
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Please enter your email and password') ?></legend>
            <?= $this->Form->control('email', ['required' => true]) ?>
            <?= $this->Form->control('password', ['required' => true]) ?>
        </fieldset>
        <div style="text-align: center; margin-top: 20px">
            <?= $this->Form->submit(__('Login')); ?>
            <!-- <?= $this->Html->link("Add User", ['action' => 'add'], ['alert' => __('This feature is temporary and will be removed for production')]) ?> -->
        </div>
        <?= $this->Form->end() ?>

    </div>
</div>