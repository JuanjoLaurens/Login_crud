<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Nuevo Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nuestros Usuarios') ?></h3>
    <?=$username = $this->Identity->get('nombre');?>
    <?=$username = $this->Identity->get('apellido');?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellido') ?></th>
                    <th><?= $this->Paginator->sort('equipo') ?></th>
                    <th><?= $this->Paginator->sort('edad') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td><?= h($user->equipo) ?></td>
                    <td><?= $this->Number->format($user->edad) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Seguro que quieres eliminar {0} {1}?', $user->nombre,$user->apellido)]) ?>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <div>
        <?= $this->Html->link(__('Descargar datos en excel'), ['action' => 'downloadExcel'], ['class' => 'button']) ?>
        <?= $this->Html->link(__('Descargar datos en texto'), ['action' => 'downloadTxt'], ['class' => 'button']) ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Atras')) ?>
            <?= $this->Paginator->prev('< ' . __('Adelante')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} De {{pages}}')) ?></p>
    </div>
</div>
