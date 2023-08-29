<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Usuario'), ['action' => 'delete', $user->id], ['confirm' => __('¿Estas seguro de eliminar este usuario? # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuestros Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3>Datos del Usuario</h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($user->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($user->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipo') ?></th>
                    <td><?= h($user->equipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Edad') ?></th>
                    <td><?= $this->Number->format($user->edad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado el') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ultima modificación') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
