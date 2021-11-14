<?php
declare(strict_types=1);

namespace App\Controller;

class EmprestimosController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $emprestimos = $this->paginate($this->Emprestimos);

        $this->set(compact('emprestimos'));
    }

    public function view($id = null)
    {
        $emprestimo = $this->Emprestimos->get($id, [
            'contain' => ['Users', 'Livros', 'Livros.Generos'],
        ]);

        $this->set(compact('emprestimo'));
    }

    public function add()
    {
        $emprestimo = $this->Emprestimos->newEmptyEntity();

        $user = $this->Authentication->getIdentity()->getOriginalData();
        $emprestimo->user_id = $user->id;

        if ($this->request->is('post')) {
            $emprestimo = $this->Emprestimos->patchEntity($emprestimo, $this->request->getData());
            if ($this->Emprestimos->save($emprestimo)) {
                $this->Flash->success(__('Empréstimo salvo!!!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Empréstimo não pode ser salvo. Por favor, tente novamente!!!'));
        }
        $users = $this->Emprestimos->Users->find('list', ['limit' => 200])->all();
        $livros = $this->Emprestimos->Livros->find('list', ['limit' => 200])->all();
        $this->set(compact('emprestimo', 'users', 'livros'));
    }

    public function edit($id = null)
    {
        $emprestimo = $this->Emprestimos->get($id, [
            'contain' => ['Livros'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $emprestimo = $this->Emprestimos->patchEntity($emprestimo, $this->request->getData());

            $user = $this->Authentication->getIdentity()->getOriginalData();
            $emprestimo->user_id = $user->id;

            if ($this->Emprestimos->save($emprestimo)) {
                $this->Flash->success(__('Empréstimo salvo!!!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Empréstimo não pode ser salvo. Por favor, tente novamente!!!'));
        }
        $users = $this->Emprestimos->Users->find('list', ['limit' => 200])->all();
        $livros = $this->Emprestimos->Livros->find('list', ['limit' => 200])->all();
        $this->set(compact('emprestimo', 'users', 'livros'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emprestimo = $this->Emprestimos->get($id);
        if ($this->Emprestimos->delete($emprestimo)) {
            $this->Flash->success(__('Empréstimo deletado!!!'));
        } else {
            $this->Flash->error(__('Empréstimo não pode ser deletado. Por favor, tente novamente!!!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
