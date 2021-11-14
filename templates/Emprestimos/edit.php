<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $emprestimo->id],
                ['confirm' => __('Tem certeza que deseja deletar # {0}?', $emprestimo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Empréstimos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emprestimos form content">
            <?= $this->Form->create($emprestimo) ?>
            <fieldset>
                <legend><?= __('Editar Empréstimo') ?></legend>
                <?php
                    echo $this->Form->control('livros._ids', ['label' => '', 'class' => 'livros', 'multiple' => 'checkbox']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
