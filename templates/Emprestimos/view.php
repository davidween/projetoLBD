<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Empréstimo'), ['action' => 'edit', $emprestimo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Deletar Empréstimo'), ['action' => 'delete', $emprestimo->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $emprestimo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Empréstimos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Empréstimo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emprestimos view content">
            <h3><?= h($emprestimo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuário') ?></th>
                    <td><?= $emprestimo->user->username ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($emprestimo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado em') ?></th>
                    <td><?= h($this->Time->i18nFormat($emprestimo->created, 'yyyy-MMM-dd hh:mm:ss', 'invalid', 'America/Campo_Grande')) ?></td>
                    
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <?php
                        if ($emprestimo->status === NULL) { ?>
                            <td> <?= h('Em Análise') ?> </td>
                            <?php } elseif ($emprestimo->status == 0) { ?>
                            <td> <?= h('Reprovado') ?> </td>
                            <?php } else { ?>
                            <td> <?= h('Aprovado') ?> </td>
                            <?php }
                        ?>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Livros') ?></h4>
                <?php if (!empty($emprestimo->livros)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Gênero') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Total de Páginas') ?></th>
                            <th><?= __('Isbn') ?></th>
                            <th class="actions"><?= __('Ações') ?></th>
                        </tr>
                        <?php foreach ($emprestimo->livros as $livros) : ?>
                        <tr>
                            <td><?= h($livros->id) ?></td>
                            <td><?= h($livros->genero->name) ?></td>
                            <td><?= h($livros->name) ?></td>
                            <td><?= h($livros->total_paginas) ?></td>
                            <td><?= h($livros->isbn) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Livros', 'action' => 'view', $livros->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Livros', 'action' => 'edit', $livros->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Livros', 'action' => 'delete', $livros->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $livros->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
