<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends MX_Controller {

	public function __construct()
        {
                parent::__construct();

                $this->load->model('courses_mdl');
                $this->module="courses";//current module
                
                $this->load->library('pagination');
             //   Modules::run("auth/isLegal");
        }

	
	public function index()
	{
		
		
		$config=array();
	    $config['base_url']=base_url()."courses/index";
	    $config['total_rows']=$this->courses_mdl->count_courses();
	    $config['per_page']=12; //records per page
	    $config['uri_segment']=3; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(3))? $this->uri->segment(3):0; //default starting point for limits

	    $data['courses']=$this->fetchCourses($config['per_page'],$page);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='courses_list';
		echo Modules::run("templates/general",$data,true);
	}


	public function fetchCourses($limit=NULL,$start=NULL){

		 
		$courses=$this->courses_mdl->getAll($limit,$start);

		return $courses;

	}


	public function featuredCourses($limit=NULL,$start=NULL){
		 
		$courses=$this->courses_mdl->getFeatured($limit,$start);

		return $courses;

	}


	public function getCourseById($courseId){

		$course=$this->courses_mdl->getById($courseId);
		return $course;
	   }

//courses for specific author
	   public function getCoursesByAuthor($authorId){

		$courses=$this->courses_mdl->getByAuthor($limit=NULL,$start=NULL,$authorId);
		return $courses;

	   }
	   
	 public function privacy(){

		$data['module']=$this->module;
		$data['view']='privacy';
		$data['privacy_policy']=PRIVACY_POLICY;
		echo Modules::run("templates/general",$data,true);
	}
	
	public function feedback(){
	    
	    if(isset($_POST['message'])){
	    	$this->session->set_flashdata('msg',"<center class='mt-3'><h4><font color='green'>Thank you for sharing your feedback, we shall get back to you soon.</font></h4></center>");
	    }

		$data['module']=$this->module;
		$data['view']='feedback';
		echo Modules::run("templates/general",$data,true);
	}

	public function courseDetails($courseId){

		$this->makeMine($courseId);
		 
		$data['module']=$this->module;
		$data['view']='course_details';
		$data['course_id']=$courseId;
		echo Modules::run("templates/general",$data,true);
		//print_r($courses);
	}

	function makeMine($course_id){ //add  to my courses

		$user_id = $this->session->userdata()['user_id'];

		if(!empty($user_id) && !empty($course_id) || $user_id >0)
		{
		  		$this->db->where('course_id',$course_id);
		  		$this->db->where('user_id',$user_id);
		  		$rows = $this->db->get('user_courses')->result();

		  if(count($rows)==0){
		    $data = array('user_id' =>$user_id,'course_id'=>$course_id,'status'=>0);
		      $this->db->insert('user_courses',$data);
		   }
	     }
	}


   public function classCourses($classId)
	{
		if(!$classId){

			$classId=$this->uri->segment(3);

		}

		$config=array();
	    $config['base_url']=base_url()."courses/classCourses/".$classId;
	    $config['total_rows']=$this->courses_mdl->count_classCourses($classId);
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=4; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(4))? $this->uri->segment(4):0; //default starting point for limits


	    $data['courses']=$this->courses_mdl->classCourses($config['per_page'],$page,$classId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='class_courses';

		
		echo Modules::run("templates/general",$data,true);
	}

	public function mySchool($schoolId)
	{
		if(!$schoolId){
			$schoolId=$this->uri->segment(3);
		}

		$config=array();
	    $config['base_url']=base_url()."courses/mySchool/".$schoolId;
	    $config['total_rows']=$this->courses_mdl->count_schoolCourses($schoolId);
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=4; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(4))? $this->uri->segment(4):0; //default starting point for limits

	    $data['courses']=$this->courses_mdl->schoolCourses($config['per_page'],$page,$schoolId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='school_courses';

		echo Modules::run("templates/general",$data,true);
	}

	
   
   public function otherSchool($schoolId)
	{
		if(!$schoolId){
			$schoolId=$this->uri->segment(3);
		}

		$data['otherschool'] = Modules::run('classes/getSchools',$schoolId);

		$config=array();
	    $config['base_url']=base_url()."school/".$schoolId;
	    $config['total_rows']=$this->courses_mdl->count_schoolCourses($schoolId);
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=2; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(2))? $this->uri->segment(4):0; //default starting point for limits

	    $data['courses']=$this->courses_mdl->schoolCourses($config['per_page'],$page,$schoolId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='other_school';

		echo Modules::run("templates/general",$data,true);
	}


	public function userCourses()
	{
		$userdata =$this->session->userdata();
		$userId =$userdata['user_id'];
		
		$config=array();
	    $config['base_url']=base_url()."mycourses/";
	    $config['total_rows']=$this->courses_mdl->count_userCourses($userId);
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=4; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(4))? $this->uri->segment(4):0; //default starting point for limits


	    $data['courses']=$this->courses_mdl->userCourses($config['per_page'],$page,$userId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='user_courses';
		
		echo Modules::run("templates/general",$data,true);

	}


	public function getUserCourses($per_page,$page,$userId){
		$courses=$this->courses_mdl->userCourses($per_page,$page,$userId);
		return $courses;
	}


	public function categoryCourses($categoryId)
	{
		if(!$categoryId){

			$categoryId=$this->uri->segment(3);

		}

		$config=array();
	    $config['base_url']=base_url()."courses/categoryCourses/".$categoryId;
	    $config['total_rows']=$this->courses_mdl->count_categoryCourses($categoryId);
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=4; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(4))? $this->uri->segment(4):0; //default starting point for limits


	    $data['courses']=$this->courses_mdl->categoryCourses($config['per_page'],$page,$categoryId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='category_courses';

		//print_r($data['courses']);
		echo Modules::run("templates/general",$data,true);
	}



	public function searchCourses()
	{
		

		$term=$this->input->get('term');
		
		$config=array();
	    $config['base_url']=base_url()."courses/searchCourses";
	    $config['total_rows']=$this->courses_mdl->count_searchResults($term);
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=3; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(3))? $this->uri->segment(3):0; //default starting point for limits


	    $data['courses']=$this->courses_mdl->searchCourses($config['per_page'],$page,$term);

	    $data['links']=$this->pagination->create_links();
	    $data['term']=$term;
	    $data['module']=$this->module;
		$data['view']='courses_search_results';

		

		
		echo Modules::run("templates/general",$data,true);
	}





public function fetchVideos(){

$API_key    = 'AIzaSyASU3lSSGGQMu8aAdRXS-3p4wU9YVZZLnQ';
$channelID  = 'UCfj2gEh0pgMS3binrHrV3Lw';
$maxResults = 10;

$videoList = file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.'');


		print_r($videoList);
	}


//author's course list

public function authorCourses($authorId){

	$config=array();
	    $config['base_url']=base_url()."courses/authorCourses";
	    $config['total_rows']=$this->courses_mdl->count_courses();
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=4; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = FALSE;
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(4))? $this->uri->segment(4):0; //default starting point for limits

	    $data['courses']=$this->courses_mdl->getByAuthor($config['per_page'],$page,$authorId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='author_mycourses';

		
		echo Modules::run("templates/author",$data,true);

	}

public function saveComment($courseId){

  $comment = $this->input->post('comment');
  $user =$_SESSION['user_id'];

  $data = array('comment' => $comment,'user_id'=>$user,'course_id'=>$courseId);

   $save = $this->db->insert('comments',$data);

   $this->session->set_flashdata('msg',"<center><font color='green'><h4>Thanks for your feedback, it means alot!</h4></font></center>");
    
     redirect(base_url()."courses/courseDetails/".$courseId);
}

public function getComments($courseId){

	$comments =$this->courses_mdl->getComments($courseId);

	return $comments;
}

public function  removeMyCourse($courseId){

	$this->db->where('course_id',$courseId);
	$this->db->where('user_id',$this->session->userdata()['user_id']);
	$this->db->delete('user_courses');

	$this->session->set_flashdata('msg',"<center><font color='green'><h4>Course has been removed from your list</h4></font></center>");
    
	redirect(base_url().'mycourses');
}

public function share_model(){

  $this->load->model('courses_mdl');

}


}
