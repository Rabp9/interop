<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accesos Controller
 *
 * @property \App\Model\Table\AccesosTable $Accesos
 *
 * @method \App\Model\Entity\Acceso[] paginate($object = null, array $settings = [])
 */
class AccesosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Sistemas']
        ];
        $accesos = $this->paginate($this->Accesos);

        $this->set(compact('accesos'));
        $this->set('_serialize', ['accesos']);
    }

    /**
     * View method
     *
     * @param string|null $id Acceso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $acceso = $this->Accesos->get($id, [
            'contain' => ['Personas', 'Sistemas']
        ]);

        $this->set('acceso', $acceso);
        $this->set('_serialize', ['acceso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $acceso = $this->Accesos->newEntity();
        if ($this->request->is('post')) {
            $acceso = $this->Accesos->patchEntity($acceso, $this->request->getData());
            if ($this->Accesos->save($acceso)) {
                $this->Flash->success(__('The acceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The acceso could not be saved. Please, try again.'));
        }
        $personas = $this->Accesos->Personas->find('list', ['limit' => 200]);
        $sistemas = $this->Accesos->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('acceso', 'personas', 'sistemas'));
        $this->set('_serialize', ['acceso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Acceso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $acceso = $this->Accesos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acceso = $this->Accesos->patchEntity($acceso, $this->request->getData());
            if ($this->Accesos->save($acceso)) {
                $this->Flash->success(__('The acceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The acceso could not be saved. Please, try again.'));
        }
        $personas = $this->Accesos->Personas->find('list', ['limit' => 200]);
        $sistemas = $this->Accesos->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('acceso', 'personas', 'sistemas'));
        $this->set('_serialize', ['acceso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Acceso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $acceso = $this->Accesos->get($id);
        if ($this->Accesos->delete($acceso)) {
            $this->Flash->success(__('The acceso has been deleted.'));
        } else {
            $this->Flash->error(__('The acceso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
