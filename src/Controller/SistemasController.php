<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;

/**
 * Sistemas Controller
 *
 * @property \App\Model\Table\SistemasTable $Sistemas
 *
 * @method \App\Model\Entity\Sistema[] paginate($object = null, array $settings = [])
 */
class SistemasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sistemas = $this->paginate($this->Sistemas);

        $this->set(compact('sistemas'));
        $this->set('_serialize', ['sistemas']);
    }

    /**
     * View method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => ['Accesos', 'Credenciales']
        ]);

        $this->set('sistema', $sistema);
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sistema = $this->Sistemas->newEntity();
        if ($this->request->is('post')) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
        $this->set('_serialize', ['sistema']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sistema = $this->Sistemas->get($id);
        if ($this->Sistemas->delete($sistema)) {
            $this->Flash->success(__('The sistema has been deleted.'));
        } else {
            $this->Flash->error(__('The sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function redirectSystem() {
        $credencial_descripcion = array_keys($this->request->getQuery())[0];
        $credencial_query = $this->Sistemas->Credenciales->findByDescripcion($credencial_descripcion);
        $credencial = $credencial_query->first();
        $detalle_acceso_descripcion = $this->request->getQuery($credencial_descripcion);
        $sistema_redirect = 2;
        
        $detalle_acceso = $this->Sistemas->Credenciales->DetalleAccesos->find()
            ->where([
                'descripcion' => $detalle_acceso_descripcion,
                'credencial_id' => $credencial->id
            ])
            ->contain(['Accesos'])
            ->first();
        
        $persona = $this->Sistemas->Accesos->Personas->find()
            ->where(['Personas.id' => $detalle_acceso->acceso->persona_id])
            ->contain(['Accesos' => function($q) use ($sistema_redirect) {
                return $q->where(['sistema_id' => $sistema_redirect]);
            }])
            ->first();
        
        debug($persona);
        // return $this->redirect('http://172.20.1.2:82/tmt/SISTRAMDOC/index.php');
    }
}