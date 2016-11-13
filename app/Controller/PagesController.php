<?php

App::uses('AppController', 'Controller');


class PagesController extends AppController {

    public $uses = array('User','Article','Category','ArticleCategory','Query');
    public $components = array('Paginator','Misc');
    
    public $paginateArticle = array(
        'conditions'=>array('deleted'=>1),
        'limit' => 12,
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
			$this->set('categoryData',$categoryData);
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
    
    public function search(){
    	if(!empty($this->request->query['k'])){
    	    $keyword = mysql_real_escape_string($this->request->query['k']);
			$cond=array('deleted'=>1,'OR'=>array("headline LIKE '%$keyword%'","subheadline LIKE '%$keyword%'", "content LIKE '%$keyword%'", "content LIKE '%$keyword%'", "keywords LIKE '%$keyword%'", "meta_desc LIKE '%$keyword%'", "page_title LIKE '%$keyword%'")  );
			$this->paginateArticle['conditions'] = $cond;
			$this->Paginator->settings = $this->paginateArticle;
			$articles = $this->Paginator->paginate('Article');
			$this->set('articles', $articles);
    	}else{
		 return $this->redirect(array('controller' => 'pages', 'action' => 'index','admin'=>false)); 	
		}
	}
    
    public function contact(){
		$categories = $this->Category->find('all',array('conditions'=>array('deleted'=>1,'category_id'=>0)));
	    $this->set('categories',$categories);
	    
	    if(!empty($this->request->data)){
			$validatedResponse = $this->Misc->validateData($this->request->data['Query'],array('name'=>'Name','content'=>'Content','email'=>'Email Id'),array(),array('email'=>'Email Id'));  
			if(count($validatedResponse)>0){
			  	$this->Flash->set( ucfirst(implode('<br/>',$validatedResponse)) , array('element' => 'dialog'));	
			}else{
				$this->Query->create();
				$this->Query->save($this->request->data);
				$this->Flash->set("Thankyou for contacting us.", array('element' => 'dialog'));	
				$this->request->data = array();
			}
	    }
	} 
}

?>
