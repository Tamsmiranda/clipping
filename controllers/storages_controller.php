<?php
class StoragesController extends ClippingAppController {

	var $name = 'Storages';

	function index() {
		$this->Storage->recursive = 0;
		$this->set('storages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid storage', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('storage', $this->Storage->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Storage->create();
			if ($this->Storage->save($this->data)) {
				$this->Session->setFlash(__('The storage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The storage could not be saved. Please, try again.', true));
			}
		}
		$clipps = $this->Storage->Clipp->find('list');
		$createdBies = $this->Storage->CreatedBy->find('list');
		$modifiedBies = $this->Storage->ModifiedBy->find('list');
		$this->set(compact('clipps', 'createdBies', 'modifiedBies'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid storage', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Storage->save($this->data)) {
				$this->Session->setFlash(__('The storage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The storage could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Storage->read(null, $id);
		}
		$clipps = $this->Storage->Clipp->find('list');
		$createdBies = $this->Storage->CreatedBy->find('list');
		$modifiedBies = $this->Storage->ModifiedBy->find('list');
		$this->set(compact('clipps', 'createdBies', 'modifiedBies'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for storage', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Storage->delete($id)) {
			$this->Session->setFlash(__('Storage deleted', true));
			$this->redirect(array('controller'=>'clipps', 'action' => 'index'));
		}
		$this->Session->setFlash(__('Storage was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
		function admin_add() {
		if (!empty($this->data)) {
			$this->Storage->create();
			if ($this->Storage->save($this->data)) {
				$this->Session->setFlash(__('The storage has been saved', true));
				$this->redirect(array('controller'=>'clipps', 'action' => 'view',$this->data['Storage']['clipp_id']));
			} else {
				$this->Session->setFlash(__('The storage could not be saved. Please, try again.', true));
			}
		}
		if(!empty($this->params['named']['clipp'])) {
			$clipps = $this->Storage->Clipp->find('list',array('conditions'=>array('id'=>$this->params['named']['clipp'])));
		} else {
			$clipps = $this->Storage->Clipp->find('list');
		}
		$createdBies = $this->Storage->CreatedBy->find('list');
		$modifiedBies = $this->Storage->ModifiedBy->find('list');
		$this->set(compact('clipps', 'createdBies', 'modifiedBies'));
	}
}
?>