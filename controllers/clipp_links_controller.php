<?php
class ClippLinksController extends ClippingAppController {

	var $name = 'ClippLinks';

	function admin_index() {
		$this->ClippLink->recursive = 0;
		$this->set('clippLinks', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid clipp link', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('clippLink', $this->ClippLink->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ClippLink->create();
			if ($this->ClippLink->save($this->data)) {
				$this->Session->setFlash(__('The clipp link has been saved', true));
				$this->redirect(array('controller'=>'clipps', 'action' => 'view',$this->data['ClippLink']['clipp_id']));
			} else {
				$this->Session->setFlash(__('The clipp link could not be saved. Please, try again.', true));
			}
		}
		if(!empty($this->params['named']['clipp'])) {
			$clipps = $this->ClippLink->Clipp->find('list',array('conditions'=>array('id'=>$this->params['named']['clipp'])));
		} else {
			$clipps = $this->ClippLink->Clipp->find('list');
		}
		$this->set(compact('clipps'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid clipp link', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ClippLink->save($this->data)) {
				$this->Session->setFlash(__('The clipp link has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clipp link could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ClippLink->read(null, $id);
		}
		$clipps = $this->ClippLink->Clipp->find('list');
		$this->set(compact('clipps'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for clipp link', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ClippLink->delete($id)) {
			$this->Session->setFlash(__('Clipp link deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Clipp link was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>