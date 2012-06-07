<?php
class LoginsController extends ClippingAppController {

	var $name = 'Logins';

	function admin_index() {
		$this->Status->recursive = 0;
		$this->set('logins', $this->paginate());
	}

	/*function admin_add() {
		if (!empty($this->data)) {
			$this->Status->create();
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('The status has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status could not be saved. Please, try again.', true));
			}
		}
	}*/
}
?>