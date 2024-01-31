<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller
{
	public function __construct()
	{
        parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
        Modules::run('courses/share_model');
        Modules::run('auth/share_model');


		// Set CORS headers
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Content-Type: application/json');

	}
	
	public function search($term){

      $courses    = $this->courses_mdl->searchResources($term);
	  $response =array(
	  	'message'=>$courses,
	  );

	  die(json_encode($response));
	}
	
	public function getResourses($per_page=15 ,$start_page=0,$getFeatured=false){

	  $total_rows = $this->courses_mdl->count_courses(); 
      $courses    = $this->courses_mdl->getAll($per_page,$start_page,$getFeatured);

	  $response =array(
	  	'message'=>$courses,
	  	'count' =>count($courses),
	  	'pagination'=>['start_page'=>$start_page,'per_page'=>$per_page,'total_rows'=>$total_rows]
	  );

	  die(json_encode($response));
	}

	public function getCategoryResources($per_page=15 ,$start_page=0,$classId=false){

	  $total_rows = $this->courses_mdl->count_classCourses($classId); 
      $courses    = $this->courses_mdl->classCourses($per_page,$start_page,$classId);

	  $response =array(
	  	'message'=>$courses,
	  	'count' =>count($courses),
	  	'pagination'=>['start_page'=>$start_page,'per_page'=>$per_page,'total_rows'=>$total_rows]
	  );

	  die(json_encode($response));
	}
    
    public function appData(){
        
        $categories=Modules::run("categories/getCategories");
        $subjects=Modules::run("subjects/getSubjects");
        $classes=Modules::run("classes/getClasses");
        $schools = Modules::run('classes/getSchools');
        $sliders = $this->db->get('sliders')->result();
        
        $data = array(
            "classes"=>$classes,
            "categories"=>$categories,
            "subjects"=>$subjects,
            "schools" =>$schools,
            "slides"=>$sliders,
            "featured"=>$this->courses_mdl->getAll(15,0,1),
            "quick_access"=>$this->courses_mdl->getQuickAccessResources(10,0),
            "policy"=>PRIVACY_POLICY
            );

        $response = array('message'=>$data);

        echo json_encode($response);
        
    }
    
    public function uploadCourse(){
        
        $video_url ='';
        $audio ='';
        
        if(isset($_FILES["video"])){
        $target_dir = "assets/videos/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);
        $upload = move_uploaded_file($_FILES["video"]["tmp_name"], $target_file);
        $video_url = basename($_FILES["video"]["name"]);
        } else{
            
        $target_dir = "assets/audios/";
        $target_file = $target_dir . basename($_FILES["audio"]["name"]);
        $upload = move_uploaded_file($_FILES["audio"]["tmp_name"], $target_file);
              $audio = basename($_FILES["audio"]["name"]);
        }
     

        file_put_contents('logs.txt',json_encode($_POST));
        
        $coursedata = $_POST;
        
        $data = array(
                "title"=>$coursedata['title'],
                "description"=>$coursedata['description'],
                "course_body"=>$coursedata['course_body'],
                "class_id"=>$coursedata['classId'],
                "author_id"=>$coursedata['authorId'],
                "category_id"=>$coursedata['categoryId'],
                "subject_id"=>$coursedata['subjectId'],
                "video_url" => $video_url,
                "audio"=>$audio,
                "isFree" => (($coursedata['isFree'])? 1:0),
                "isPublished" =>0
            );
        
     try{
            $save = $this->db->insert('courses',$data);
        }
        catch(Exception $error)
        {
            $save = $error;
        }
        
        echo json_encode(array("status"=>$save));

	}
	
	public function classCourses($classId,$schoolId=false){
	    $courses = $this->courses_mdl->classCourses(false,false,$classId);
	    echo json_encode($courses);
	}
	
	public function webinars(){
	    $webinars = [
	        [
	            "title"=>"Public Health Promotion 2024 Webinar",
	            "description"=>"This webinar is menat to raise awareness towards the proactive enagement of health works in the field of public health.",
	            "webinar_date"=>"2024-02-20",
	            "link"=>"https://www.health.go.ug/",
	            "ended"=>false
	         ]
	        ];
	        
	    die(json_encode($webinars));
	}

	
	public function register(){
	    
	    $postdata = json_decode(file_get_contents("php://input"));
	    
	    $userdata = array(
	        "username" =>$postdata->username,
	        "password" =>md5($postdata->password),
	        "firstname" =>$postdata->firstname,
	        "lastname" =>$postdata->lastname,
	        "email" =>$postdata->email,
	        "phone" =>$postdata->phone,
	        "role"=>"Learner",
	        "state"=>1
	        );
	    
	    $save = $this->addUser($userdata);
	    
	    $response = array("status"=>"Failed","message"=>"Operation Failed");
	    
	    if(!empty($save)){
	        
	        $userdata['password'] = "";
	        $response['status'] = "Success";
	        $response['message'] = $save;
	    }
	    
	    echo json_encode($response);
	}
	
	function addUser($postdata){
	    
      $person=$this->auth_mdl->addUser($postdata);

     if(!empty($person->user_id)){

      $this->db->where('user_id',$person->user_id);
      $mine = $this->db->get('user_courses')->result();

      $mycourses = array();
      foreach ($mine as $row) {
         array_push($mycourses,$row->course_id);
      }
      
      $userdata=array(

        "names"=>$person->lastname." ".$person->firstname,
        "user_id"=>$person->user_id,
        "photo"=>$person->photo,
        "username"=>$person->username,
        "role"=>$person->role,
        "state"=>$person->state,
        "changed"=>$person->pass_change,
        "mycourses" =>$mycourses,
        "isLoggedIn"=>true,
       // "class_id"=>$person->class_id,
        //"school_id"=>$person->school_id,
        "phone"=>$person->phone
      );
      
     return $userdata;
	}
	
	return array();
	
	}
	
	
  public function userLogin(){
      
	   $postdata = json_decode(file_get_contents("php://input"));
	   $usercred = array("username"=>$postdata->user,"pass"=>$postdata->pass);
	   
	   $person = $this->auth_mdl->loginChecker($usercred);

     if(!empty($person->user_id)){

      $this->db->where('user_id',$person->user_id);
      $mine = $this->db->get('user_courses')->result();

      $mycourses = array();
      foreach ($mine as $row) {
         array_push($mycourses,$row->course_id);
      }
      
      $userdata=array(

        "names"=>$person->lastname." ".$person->firstname,
        "user_id"=>$person->user_id,
        "photo"=>$person->photo,
        "username"=>$person->username,
        "role"=>$person->role,
        "state"=>$person->state,
        "changed"=>$person->pass_change,
        "mycourses" =>$mycourses,
        "isLoggedIn"=>true,
        "class_id"=>$person->class_id,
        "school_id"=>$person->school_id,
        "phone"=>$person->phone
      );
      
            $response = array();
	        $userdata['password'] = "";
	        $response['status'] = "Success";
	        $response['message'] = $userdata;
	    
	}
	else{
	
	$response = array("status"=>"Failed","message"=>"Incorrect username or password");
	}
	
	echo json_encode($response);
	
	}
	
	public function addComment(){
	    
	     $postdata = json_decode(file_get_contents("php://input"));
	    $comment = array("user_id"=>$postdata->user_id,"course_id"=>$postdata->course_id,"comment"=>$postdata->comment);
	    //to be improved
	   $save = $this->db->insert('comments',$comment);
	   
	   echo "yeah".$postdata->comment;
	    
	}

	public function news(){

		//$data = $this->fetchRssFeed("https://rssfeeds.webmd.com/rss/rss.aspx?RSSSource=RSS_PUBLIC");

		$xmlString = strval(file_get_contents("https://rssfeeds.webmd.com/rss/rss.aspx?RSSSource=RSS_PUBLIC"));

		die ($this->convertRssToJSON($xmlString));
	}


   function convertRssToJSON($xmlString) {

    $xml = simplexml_load_string($xmlString);

    $rssData = [];

     $count = 0;

    foreach ($xml->channel->item as $item) {

    	if($count>24)
	    		continue;

	    $image = (string)$item->children('media', true)->content->attributes()->url;
	    
	    if($image !== "https://www.webmd.com/"):

	        $itemData = [
	            'title' => (string) $item->title,
	            'description' => (string) $item->description,
	            'link' => (string) $item->link,
	            'pubDate' => (string) $item->pubDate,
	            'image' => $image,
	            
	        ];

	        $rssData[] = $itemData;

		    $count ++;
	   endif;
    }

    return json_encode($rssData, JSON_PRETTY_PRINT);
}
	

}