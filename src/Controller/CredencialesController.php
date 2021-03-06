<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Credenciales Controller
 *
 * @property \App\Model\Table\CredencialesTable $Credenciales
 *
 * @method \App\Model\Entity\Credencial[] paginate($object = null, array $settings = [])
 */
class CredencialesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sistemas']
        ];
        $credenciales = $this->paginate($this->Credenciales);

        $this->set(compact('credenciales'));
        $this->set('_serialize', ['credenciales']);
    }

    /**
     * View method
     *
     * @param string|null $id Credencial id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $credencial = $this->Credenciales->get($id, [
            'contain' => ['Sistemas']
        ]);

        $this->set('credencial', $credencial);
        $this->set('_serialize', ['credencial']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $credencial = $this->Credenciales->newEntity();
        if ($this->request->is('post')) {
            $credencial = $this->Credenciales->patchEntity($credencial, $this->request->getData());
            if ($this->Credenciales->save($credencial)) {
                $this->Flash->success(__('El credencial fue guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El credencial no pudo ser guardado. Por favor, inténtalo de nuevo.'));
        }
        $sistemas = $this->Credenciales->Sistemas->find('list');
        $this->set(compact('credencial', 'sistemas'));
        $this->set('_serialize', ['credencial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Credencial id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $credencial = $this->Credenciales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $credencial = $this->Credenciales->patchEntity($credencial, $this->request->getData());
            if ($this->Credenciales->save($credencial)) {
                $this->Flash->success(__('The credencial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The credencial could not be saved. Please, try again.'));
        }
        $sistemas = $this->Credenciales->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('credencial', 'sistemas'));
        $this->set('_serialize', ['credencial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Credencial id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $credencial = $this->Credenciales->get($id);
        if ($this->Credenciales->delete($credencial)) {
            $this->Flash->success(__('The credencial has been deleted.'));
        } else {
            $this->Flash->error(__('The credencial could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
