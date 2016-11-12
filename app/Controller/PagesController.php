<?php

App::uses('AppController', 'Controller');


class PagesController extends AppController {

    public $uses = array('User','Article','Category','ArticleCategory');
    public $components = array('Paginator');
    
    public $paginateArticle = array(
        'conditions'=>array('deleted'=>1),
        'limit' => 3,
        'order' => array('Article.id desc')
    );


	public function index() {  
	    $this->Paginator->settings = $this->paginateArticle;
	    $this->Paginator->settings['paramType'] = 'querystring';

	    $articles = $this->Paginator->paginate('Article');
	    $this->set('articles', $articles);
    
	    $categories = $this->Category->find('all',array('conditions'=>array('deleted'=>1,'category_id'=>0)));
	    $this->set('categories',$categories);
	}
	
	public function display(){
		return $this->redirect(array('controller' => 'pages', 'action' => 'index','admin'=>false)); 
	}
	
	public function category($slug){
		if(!empty($slug)){
			$categoryData = $this->Category->find('first',array('conditions'=>array('deleted'=>1,'alias'=>$slug)));
			if(!empty($categoryData)){
				// calculate $categories and subcategories
				$categoryIdArray = array();
				$categoryIdArray[] = $categoryData['Category']['id'];
				foreach($categoryData['Categories'] as $subCategory ){
					$categoryIdArray[] = $subCategory['id'];
				}
				// get all article ids for $categoryIdArray category ids
				$articleIds = $this->ArticleCategory->find('list',array('conditions'=>array('ArticleCategory.category_id'=>$categoryIdArray),'fields'=>array('article_id')));
				$this->paginateArticle['conditions'] = array('deleted'=>1,'id'=>$articleIds);
				$this->Paginator->settings = $this->paginateArticle;
				$articles = $this->Paginator->paginate('Article');
			    $this->set('articles', $articles);
		    
			    $categories = $this->Category->find('all',array('conditions'=>array('deleted'=>1,'category_id'=>0)));
			    $this->set('categories',$categories);
				
			}else{
				return $this->redirect(array('controller' => 'pages', 'action' => 'index','admin'=>false)); 
			}
		}else{
			return $this->redirect(array('controller' => 'pages', 'action' => 'index','admin'=>false)); 
		}
	}
	
	public function admin_index(){
		
	  $this->layout = 'admin_login'; 
		
	  if(!empty($this->request->data)){
	  	
	  	if(( $this->request->data['User']['username'] !=  "" )&&(  $this->request->data['User']['password'] !=  "" )){
	  		 
	  		  $userData = $this->User->find('first', array('conditions' => array('User.username' => $this->request->data['User']['username'],'User.password' => $this->request->data['User']['password'],'admin'=>'1')));
	  		  
	  		  if(count($userData)>0){
			  	$this->Session->write("ADMIN_USER",true);
			  	return $this->redirect(array('controller' => 'pages', 'action' => 'dashboard','admin'=>true)); 
			  }else{
			    $this->Flash->set('Username and Password do not match.', array('element' => 'warning'));	
		      } 
	  		
		}else{
			  $this->Flash->set('Username and Password cannot be blank.', array('element' => 'warning'));	
		}
	  }
	
	}

    public function admin_logout(){
    	$this->Session->destroy("ADMIN_USER");
		return $this->redirect(array('controller' => 'pages', 'action' => 'display','admin'=>false));
	}

    public function admin_dashboard(){
    	if($this->Session->read('ADMIN_USER')){
			$this->layout = "admin_dashboard";
		}else{
		  return $this->redirect(array('controller' => 'pages', 'action' => 'display','admin'=>false));	
		}
    }
}

?>
