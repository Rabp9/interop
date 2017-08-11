<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;
use Cake\Utility\Hash;

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
        $sistema_id = $this->request->query('sistema_id');
        $acceso_u = $this->request->query('acceso_u');
        $acceso_p = $this->request->query('acceso_p');
        $sistema_destino_id = $this->request->query('sistema_destino_id');
        
        $sistema_destino = $this->Sistemas->get($sistema_destino_id);
        
        $credenciales = $this->Sistemas->Credenciales->find()
            ->where([
                'sistema_id' => $sistema_id
            ])
            ->toArray();
        
        if ($credenciales) {
            $credenciales = Hash::extract($credenciales, '{n}.id');
            
            $detalle_acceso_user = $this->Sistemas->Credenciales->DetalleAccesos->find()
                ->where([
                    'credencial_id IN' => $credenciales,
                    'descripcion' => $acceso_u
                ])
                ->first();
            $detalle_acceso_pass = $this->Sistemas->Credenciales->DetalleAccesos->find()
                ->where([
                    'credencial_id IN' => $credenciales,
                    'descripcion' => $acceso_p
                ])
                ->first();
          
            if ($detalle_acceso_user && $detalle_acceso_pass) {
                $acceso = $this->Sistemas->Accesos->find()
                    ->where(['id' => $detalle_acceso_user->acceso_id])
                    ->first();
                $acceso_destino = $this->Sistemas->Accesos->find()
                    ->where([
                        'persona_id' => $acceso->persona_id,
                        'sistema_id' => $sistema_destino_id
                    ])
                    ->first();
                $detalle_accesos = $this->Sistemas->Accesos->DetalleAccesos->find()
                    ->where(['acceso_id' => $acceso_destino->id])
                    ->contain(['Credenciales'])
                    ->toArray();
            }
        }
        
        $this->set(compact('sistema_destino', 'detalle_accesos'));
        $this->set('_serialize', ['sistema_destino', 'detalle_accesos']);
        /*
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
        */
    }
}