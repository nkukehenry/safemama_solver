<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authoring extends MX_Controller {

	public function __construct(){

		parent::__construct();

		$this->module="authoring";
		$this->load->model('authoring_mdl');
		$this->load->library('pagination');
		Modules::run("auth/isLegal");

	}


	public function index()
	{
		$data['module']='authoring';
		$data['view']='author_dash';
		echo Modules::run("templates/author",$data,true);
	}
	
	public function createCourse()
	{
		$data['module']='authoring';
		$data['view']='make_course';

		echo Modules::run("templates/author",$data,true);
	}



//image in editor
	public function uploadImage(){

		$target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        
        $file=$_FILES["image"]["name"];
        $data['success']=true;
        $data['file']=base_url()."uploads/".$file;
        
        echo json_encode($data);
	}


public function saveCourse(){
	    ini_set("max_execution_time",0);

$coursedata=$this->input->post();
$coursedata['video_url']=str_replace(YOUTUBE_PREFIX, '', $coursedata['video_url']);
$coursedata['school_id'] = $this->session->userdata()['school_id'];
$coursedata["isYoutube"]=1;

$coursedata['course_body']=$coursedata['overview'];
$coursedata['description']=$coursedata['overview'];


if($_FILES['cover_image']){


$target_dir = "assets/images/course/";
$target_file = $target_dir . basename($_FILES["cover_image"]["name"]);

move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);
    $file=$_FILES["cover_image"]["name"];
    $coursedata['cover_image']=$file;
   }

   //atatchment
   $user = $this->session->userdata();

   if(!empty($_FILES['attachment']['tmp_name'])){

      $config['upload_path']   = 'assets/pdfs/'; 
      $config['allowed_types'] = 'pdf'; 
      $config['max_size']      = 15000;
      $config['file_name']      = "attachment_".time().$user['user_id'].$user['school_id'];
       $this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('attachment')) {
         $error = $this->upload->display_errors(); 
         $errors = " <br> <font color='red'>For the attachment: ".strip_tags($error)."</font>";

      }else { 
         $data = $this->upload->data();

         $attachedfile =$data['file_name'];
         $coursedata['attachment']=$attachedfile;
      } 

     }//attachment uploaded

     //audio upload
     if(!empty($_FILES['audio']['tmp_name'])){

      $config2['upload_path']   = 'assets/audios/'; 
      //$config2['allowed_types'] = 'mp3'; 
      $config2['max_size']      = 50000;
      $config2['file_name']      = "audio".time().$user['user_id'].$user['school_id'];
       $this->load->library('upload', $config2);
	if ( ! $this->upload->do_upload('audio')) {
         $error = $this->upload->display_errors(); 
         $errors .= " <font color='red'>For audio: ".strip_tags($error)."</font>";

      }else { 
         $data2 = $this->upload->data();
         $attachedAudio =$data2['file_name'];
         $coursedata['audio']=$attachedAudio;
      } 

     }//attachment uploaded

   $saved=$this->authoring_mdl->saveCourse($coursedata);

	if($saved){
		$msg ="<font color='green'>Course has been saved successfully</font> $errors";
	}
	else{

	$msg ="<font color='red'>Course couldn't be saved, Please try again</font> $errors";
	}

     Modules::run("utility/setFlash",$msg);

   redirect('authoring/createCourse');

	}


	public function editCourse($courseId){

		$data['course']=Modules::run("courses/getCourseById",$courseId);
		$data['module']='authoring';
		$data['view']='edit_course';

		echo Modules::run("templates/author",$data,true);

	}

	public function updateCourse(){
	    
	    ini_set("max_execution_time",0);


        $coursedata=$this->input->post();
        $coursedata['video_url']= str_replace(YOUTUBE_PREFIX, '',$coursedata['video_url']);
        $courseId=$this->input->post('course_id');
        $coursedata['school_id'] = $this->session->userdata()['school_id'];
        
        $coursedata['course_body'] = $coursedata['overview'];
        $coursedata['description'] = $coursedata['overview'];
        $coursedata['update_at']   = date("Y-m-d H:i:s");

     //audio upload
     if($_FILES['audio']["size"]>0){

      $config2['upload_path']   = 'assets/audios/'; 
      $config2['allowed_types'] = '*'; 
      $config2['max_size']      = 50000;
      $config2['file_name']      = "audio".time().$user['user_id'].$user['school_id'];
       $this->load->library('upload', $config2);
       
	if (!$this->upload->do_upload('audio')) {
         $error = $this->upload->display_errors(); 
        // $errors .= " <font color='red'>For audio: ".strip_tags($error)."</font>";
          print_r($error);
         exit();

      }else { 
          unlink($config2['upload_path'].$coursedata['audio']); //delete old
         $data2 = $this->upload->data();
         $attachedAudio = $data2['file_name'];
         $coursedata['audio'] = $attachedAudio;
      } 

     }//attachment uploaded

 if($_FILES['cover_image']["size"]>0){

    $target_dir = "assets/images/course/";
    $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);

    if(move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file)){
    
        unlink($target_dir.$coursedata['oldcover']); //delete old cover image
        $file=$_FILES["cover_image"]["name"];
        $coursedata['cover_image'] = $file;
    }

   }
   
   if($_FILES['attachment']["size"]>0){

      $config['upload_path']   = 'assets/pdfs/'; 
      $config['allowed_types'] = 'pdf'; 
      $config['max_size']      = 15000;
      $config['file_name']      = "attachment_".time().$user['user_id'].$user['school_id'];
       $this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('attachment')) {
         //$error = $this->upload->display_errors(); 
         //$errors = " <br> <font color='red'>For the attachment: ".strip_tags($error)."</font>";

      }else { 
          unlink($config['upload_path'].$coursedata['attachment']); //delete old cover image
         $data = $this->upload->data();
         $attachedfile =$data['file_name'];
         $coursedata['attachment']=$attachedfile;
      } 

     }//attachment uploaded



unset($coursedata['oldcover']);  //remove old cover image from data to send to db

  $saved=$this->authoring_mdl->saveEdits($coursedata);

if($saved){

	$msg ="<font color='green'>Course has been updated successfully, Check My Courses</font>";
}

else{

$msg ="<font color='red'>Course couldn't be updated, Please try again</font>";

}

     Modules::run("utility/setFlash",$msg);

   redirect('authoring/editCourse/'.$courseId);

	}


public function authorCourses($authorId){

	     $config=array();
	   
	    $config['base_url']=base_url()."authoring/authorCourses/".$authorId;
	    $config['per_page']=10; //records per page
	    $config['uri_segment']=4; //segment in url
	    
	    //pagination links styling
	    $config['full_tag_open'] = "<ul class='pagination text-center'>";
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
    
    
    
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        //$config['use_page_numbers'] = FALSE;
        
	    Modules::run("courses/share_model");  //access courses model


	    $config['total_rows']=$this->courses_mdl->count_author_courses($authorId);
        
	    $this->pagination->initialize($config);
	    
	    $page=($this->uri->segment(4))? $this->uri->segment(4):0; //default starting point for limits

	    $data['courses']=$this->courses_mdl->getByAuthor($config['per_page'],$page,$authorId);
	    $data['total_rows'] = $config['total_rows'];
	    $data['page']       = $config['page'];

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='mycourses';
		
		
	//	var_dump($data['links']);
	//	exit();


		
		echo Modules::run("templates/author",$data,true);

	}

	public function schoolCourses($schoolId){

	     $config=array();
	   
	    $config['base_url']=base_url()."authoring/schoolCourses/".$schoolId;
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

	    Modules::run("courses/share_model");  //access courses model

	    $config['total_rows']=$this->courses_mdl->count_schoolCourses($schoolId);

	    $data['courses']=$this->courses_mdl->schoolCourses($config['per_page'],$page,$schoolId);

	    $data['links']=$this->pagination->create_links();

	    $data['module']=$this->module;
		$data['view']='schoolcourses';

		echo Modules::run("templates/author",$data,true);

	}
	public function countMyCourses($authorId){

		Modules::run("courses/share_model");  //access courses model

	    $totalcourses=$this->courses_mdl->count_author_courses($authorId);

	    return $totalcourses;
	}

	public function mySchool(){

		 $data['module']=$this->module;
		 $data['view']='myschool';
		echo Modules::run("templates/author",$data,true);

	}

	public function getSubscribers($schoolId){
		$subscribers =$this->authoring_mdl->getSubscribers($schoolId);
		return $subscribers;
	}

	public function contribute(){

		ini_set('max_execution_time', '300'); 

		$phone = $this->input->post('msisdn');

		 $url = 'https://www.easypay.co.ug/api/'; 
		 $payload = array( 'username' => '03590082bdba1450', 
		 'password' => '104dfd69d552c31a', 
		 'action' => 'mmdeposit', 
		 'amount' => SUPPORT_AMMOUNT, 
		 'phone'=>str_replace($phone[0], '256',$phone[0]).substr($phone,1, 9), 
		 'currency'=>'UGX', 
		 'reference'=>time().mt_rand(1991,date('Y')),
		 'reason'=>APP_NAME
		 ); 
		 //open connection 
		 $ch = curl_init(); 
		  
		 //set the url, number of POST vars, POST data 
		 curl_setopt($ch,CURLOPT_URL, $url); 
		 curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($payload)); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,15); 
		 curl_setopt($ch, CURLOPT_TIMEOUT, 0); //timeout in seconds 
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		 //execute post 
		 $result = curl_exec($ch); 
		  
		 //close connection 
		 curl_close($ch); 
         
         $response = json_decode($result); 

         $userdata  = $this->session->userdata();

         $dbData =array(
         	"msisdn" =>$phone,
         	"amount" =>$payload['amount'],
         	"reference" =>$payload['reference'],
         	"school_id" => $userdata['school_id'],
         	"telecomId" => $response->details->telecomId,
         	"payStatus" => $response->success,
         	"tranid" => $response->details->transactionId,
         	"paymentResponse" => $result
         );


         $this->db->insert('payments',$dbData);

         if($response->success){

         	$msg ="<h3><font color='green'><i class='fa fa-check'></i> Contribution Received, Thank you </font></h3>";

         	$this->db->where('school_id',$userdata['school_id']);
         	$this->db->update('schools', array('isVerified'=>1));
         }
         else{

         	$msg = "<h3><font color='red'>Contribution Failed, Try again</font></h3>";

         }

         Modules::run("utility/setFlash",$msg);
         redirect('authoring');


 
	}
	




}
