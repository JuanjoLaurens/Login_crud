<div class="users form content">

    <?= $this->Form->create() ?>

    <fieldset>

        <legend><?= __('Ingresa correo y contraseña') ?></legend>

        <?= $this->Form->control('email') ?>

        <?= $this->Form->control('password') ?>

    </fieldset>

    <?= $this->Form->button(__('Login')); ?>

    <?= $this->Form->end() ?>

</div>
