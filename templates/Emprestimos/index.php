<div class="emprestimos index content">
    <?= $this->Html->link(__('Novo Empréstimo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Empréstimos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th><?= $this->Paginator->sort('user_id', 'Usuário') ?></th>
                    <th><?= $this->Paginator->sort('status', 'Status') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emprestimos as $emprestimo): ?>
                <tr>
                    <td><?= $this->Number->format($emprestimo->id) ?></td>
                    <td><?= $emprestimo->user->username ?></td>
                    
                        <?php
                        if ($emprestimo->status === NULL) { ?>
                            <td> <?= h('Em Análise') ?> </td>
                            <?php } elseif ($emprestimo->status == 0) { ?>
                            <td> <?= h('Reprovado') ?> </td>
                            <?php } else { ?>
                            <td> <?= h('Aprovado') ?> </td>
                            <?php }
                        ?>
                        
                    <td><?= h($this->Time->i18nFormat($emprestimo->created, 'yyyy-MMM-dd hh:mm:ss', 'invalid', 'America/Campo_Grande')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $emprestimo->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $emprestimo->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $emprestimo->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $emprestimo->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')) ?></p>
    </div>
</div>
