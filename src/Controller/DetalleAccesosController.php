<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetalleAccesos Controller
 *
 * @property \App\Model\Table\DetalleAccesosTable $DetalleAccesos
 *
 * @method \App\Model\Entity\DetalleAcceso[] paginate($object = null, array $settings = [])
 */
class DetalleAccesosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accesos', 'Credenciales']
        ];
        $detalleAccesos = $this->paginate($this->DetalleAccesos);

        $this->set(compact('detalleAccesos'));
        $this->set('_serialize', ['detalleAccesos']);
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Acceso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleAcceso = $this->DetalleAccesos->get($id, [
            'contain' => ['Accesos', 'Credenciales']
        ]);

        $this->set('detalleAcceso', $detalleAcceso);
        $this->set('_serialize', ['detalleAcceso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleAcceso = $this->DetalleAccesos->newEntity();
        if ($this->request->is('post')) {
            $detalleAcceso = $this->DetalleAccesos->patchEntity($detalleAcceso, $this->request->getData());
            if ($this->DetalleAccesos->save($detalleAcceso)) {
                $this->Flash->success(__('The detalle acceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle acceso could not be saved. Please, try again.'));
        }
        $accesos = $this->DetalleAccesos->Accesos->find('list', ['limit' => 200]);
        $credenciales = $this->DetalleAccesos->Credenciales->find('list', ['limit' => 200]);
        $this->set(compact('detalleAcceso', 'accesos', 'credenciales'));
        $this->set('_serialize', ['detalleAcceso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Acceso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleAcceso = $this->DetalleAccesos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleAcceso = $this->DetalleAccesos->patchEntity($detalleAcceso, $this->request->getData());
            if ($this->DetalleAccesos->save($detalleAcceso)) {
                $this->Flash->success(__('The detalle acceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle acceso could not be saved. Please, try again.'));
        }
        $accesos = $this->DetalleAccesos->Accesos->find('list', ['limit' => 200]);
        $credenciales = $this->DetalleAccesos->Credenciales->find('list', ['limit' => 200]);
        $this->set(compact('detalleAcceso', 'accesos', 'credenciales'));
        $this->set('_serialize', ['detalleAcceso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Acceso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleAcceso = $this->DetalleAccesos->get($id);
        if ($this->DetalleAccesos->delete($detalleAcceso)) {
            $this->Flash->success(__('The detalle acceso has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle acceso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
