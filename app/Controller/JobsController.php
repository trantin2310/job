<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 */
class JobsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Jobs->recursive = 0;
		$this->set('jobs', $this->paginate());
	}
    public function index_tin() {
		//$this->Jobs->recursive = 0;
		$this->set('jobs', $this->paginate());
		//$this->Jobs->recursive = 0; for test brand
	}
    
    public function add() {
		if ($this->request->is('post')) {
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('The Jobs has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Jobs could not be saved. Please, try again.'));
			}
		}
	}
    public function view($id = null) {
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid Job'));
		}
		$this->set('job', $this->Job->read(null, $id));
	}
    public function edit($id = null) {
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid Job'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('The Job has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Job could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Job->read(null, $id);
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid Job'));
		}
		if ($this->Job->delete()) {
			$this->Session->setFlash(__('Job deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Job was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
