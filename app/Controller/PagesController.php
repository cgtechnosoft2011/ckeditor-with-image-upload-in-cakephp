<?php
/****************************************
***** For more information contact ******
*********** kkhatti@gmail.com ***********
****************************************/

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {

	public $uses = array();
	public $components = array('Auth'  ,'RequestHandler','Email');
	public $helpers = array('Html','Form');	

	public function beforeFilter(){

	}
	
	public function admin_add(){
		$this->set("title",__('Add - Page'));	
		if ($this->Auth->login()){	
			if ($this->request->is('post')){
				$data = $this->request->data;
				$already_exists = $this->Page->hasAny(array('p_title' => trim($data['Page']['p_title'])));			
				$this->Page->create();				
				if(!$already_exists){
					if($this->Page->validates()){
						if ($this->Page->save($data)) {
							$this->Session->setFlash('Page has been saved','success');
							$this->redirect(array('action'=>'index'));
						} else {
							$this->Session->setFlash('Page could not be saved. Please, try again.','error');
						}
					}
				}else{
					$this->Session->setFlash('Page title already exist.','warning');	
				}
			}
		}else{
			$this->Session->setFlash(__('Unauthorized access'),'error');
			$this->redirect($this->Auth->redirect());
		}		
	}

	
	public function admin_edit($id=NULL){
		
		$this->set("title",'Edit - Page');	
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			$this->Session->setFlash('Unauthorized access.','error');
			$this->redirect(array('action' => 'admin_index'));
		}
		if ($this->Auth->login()) {	

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->request->data['Page']['p_id'] = $id;
				
				$data = $this->request->data;
				$already_exists = $this->Page->hasAny(array('p_title' => trim($data['Page']['p_title']), 'p_id <>'=>$data['Page']['p_id']));
				if(!$already_exists){
				  if($this->Page->validates()){
						if ($this->Page->save($data)) {
							$this->Session->setFlash('Page has been updated','success');
							$this->redirect(array('action'=>'admin_index'));
						} else {
							$this->Session->setFlash('Page could not be saved. Please, try again.','error');
						}
					}
				}else{
					$this->Session->setFlash('Page title already exist.','warning');	
				}
			}else{
				$this->request->data = $this->Page->read(null, $id);
			}
		}else {
			$this->Session->setFlash('Unauthorized access.','error');
			$this->redirect($this->Auth->redirect());
		}	
	} 
	
}
