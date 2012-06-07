<?php
class SubjectsController extends ClippingAppController {

	var $name = 'Subjects';

	function admin_index() {
		$this->Subject->recursive = 0;
		$this->set('subjects', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Subject->create();
			if ($this->Subject->save($this->data)) {
				$this->Session->setFlash(__('The subject has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid subject', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Subject->save($this->data)) {
				$this->Session->setFlash(__('The subject has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Subject->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for subject', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Subject->delete($id)) {
			$this->Session->setFlash(__('Subject deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Subject was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>