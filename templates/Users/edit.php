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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Seguro que quieres eliminar {0} {1}?', $user->nombre,$user->apellido), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Nuestros usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('equipo');
                    echo $this->Form->control('edad');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
