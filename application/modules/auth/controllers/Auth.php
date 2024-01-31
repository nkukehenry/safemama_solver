<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct()
  {
      parent::__construct();
      $this->load->model('auth_mdl');
      $this->module="auth";
  }
  
  public function index()
	{
		$this->load->view("sign_in");
	}
    
    public function recovery()
	{
		$this->load->view("recover_password");
	}

   public function myprofile()
	{
		$data['module']="auth";
		$user_role=$this->session->userdata('role');
    if($user_role=='sadmin' || $user_role=='author'){
      $data['view']="profile";
		echo Modules::run("templates/author",$data);
		}
		else{
		$data['view']="userprofile";
		echo Modules::run("templates/general",$data);
		
		}
		
	}

	
	public function login()
	{
		$person=$this->auth_mdl->loginChecker();

		if(intval($person->user_id)>0){

			$userdata=array(

				"names"=>$person->lastname." ".$person->firstname,
				"user_id"=>$person->user_id,
				"photo"=>$person->photo,
				"username"=>$person->username,
				"role"=>$person->role,
				"state"=>$person->state,
				"changed"=>$person->pass_change,
				"isLoggedIn"=>true,
        "class_id"=>$person->class_id,
        "school_id"=>$person->school_id,
        "phone"=>$person->phone
			);
			
			$this->checkerUser($userdata);

		}

		else{

			$this->session->set_flashdata('msg',"Login Failed, please check your username and password");
			redirect("auth");
		}
		
	}


//user /student login
  public function user_login()
  {
    $person=$this->auth_mdl->loginChecker();

    if(intval($person->user_id) > 0){

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

      $this->session->set_userdata($userdata);

      if($userdata['role']=='author'){
          redirect("authoring/");
      }
      redirect(base_url());
    }
    else{

      $this->session->set_flashdata('msg',"<center><font color='red'><h4>Login Failed, please check your username and password</h4></font></center>");
      redirect(base_url());
    }
    
  }

	public function checkerUser($userdata){


	if(!$userdata['isLoggedIn']){
		redirect("auth");
	}

	else{


  $this->session->set_userdata($userdata);
    
		if($userdata['role']=='sadmin'){
        redirect("authoring/");
		}
		else if($userdata['role']=='author'){
        redirect("authoring/");
		}

    else{

      redirect("auth");
    }

	}
  }



      public function adminLegal(){

      	if( $this->session->userdata['role']!=="sadmin"){

      		redirect("auth");
      	}

      }


       public function isLegal(){

      	if(empty($this->session->userdata['role'])){

      		redirect("auth");
      	}

      }

       public function unlock($pass){

       	$res=$this->auth_mdl->unlock($pass);
      		echo $res;
      }


      public function logout(){
      	session_unset();
      	session_destroy();
      	redirect(base_url());
      }

      //student logout

      public function user_logout(){
        session_unset();
        session_destroy();
        redirect(base_url());
      }

      public function getUserByid($id){

      	$userrow=$this->auth_mdl->getUser($id);
      	//print_r($userrow);
      	return $userrow;
      }


// all users
    public function getAll(){
		  $users=$this->auth_mdl->getAll();
		  return $users;
     }

    public function users(){

        $data['module']="auth";
		$data['view']="add_users";
		$data['page']="User management";

		echo Modules::run("templates/admin",$data);


     }

    public function addUser(){

     	$postdata=$this->input->post();
     	$userfile=$postdata['username'];
     	//CHECK whether user upload a photo

     	if(!empty($_FILES['photo']['tmp_name'])){

      $config['upload_path']   = './assets/images/sm/'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $config['max_size']      = 15000;
      $config['file_name']      = $userfile;

      $this->load->library('upload', $config);

	
	if ( ! $this->upload->do_upload('photo')) {

         $error = $this->upload->display_errors(); 

         echo strip_tags($error);

      }else { 

         $data = $this->upload->data();

         $photofile =$data['file_name'];

         $path=$config['upload_path'].$photofile;
         //water mark the photo
         $this->photoMark($path);

         $postdata['photo']=$photofile;

         $res=$this->auth_mdl->addUser($postdata);

      } 


     }//user uploaded with a photo

     else{

     	$res=$this->auth_mdl->addUser($postdata);

     }//no photo

     echo $res;

 }//ftn end

 function userExists($username){
      $this->db->where('username',$username);
      $qry = $this->db->get('users');
      $row =$qry->row();
      if(count($row)>0)
        return true;

      return false;
 }

public function userRegistration(){

      $postdata=$this->input->post();
      $postdata['photo'] ='student.jpg';
      $postdata['role'] ='Learner';

      if($this->userExists($postdata['username'])){

        $this->session->set_flashdata('msg',"<center><h4><font color='red'>The Username ". $postdata['username'] ." is already taken</font></h4></center>");

        redirect(base_url());

      }

      $person=$this->auth_mdl->addUser($postdata);
      
      
    
     if(!empty($person->user_id)){
         
         
        //Send email Data
        
        $names = $person->lastname." ".$person->firstname;
        $phone = $person->phone;
        $role = $person->role; 
        $email = $person->email; 
        $created = $person->created_at;
        
        $titleAdmin = "Solver Classes: New user Creation";
        $titleClient = "Solver Classes: Registration Successful";
        
        $this->send_email_to_admin($names, $phone, $role, $email, $created, $titleAdmin);
        
        $this->send_email_to_client($names, $phone, $role, $email, $created, $titleClient);

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

      $this->session->set_userdata($userdata);

      $this->session->set_flashdata('msg',"<center><font color='green'><h4>Hello ".$person->lastname." ".$person->firstname." we wish you the best!</h4></font></center>");
    }
    else {

       $this->session->set_flashdata('msg',"<center><h4><font color='red'>Registration failed</font></h4></center>");
    }

      redirect(base_url());

 }//ftn end
 
 

public function authorRegistration(){

       $postdata=$this->input->post();
       $postdata['role'] ='author';
       $postdata['photo'] ='author.jpg';

       if($this->userExists($postdata['username'])){

        $this->session->set_flashdata('msg',"<center><h4><font color='red'>Username ". $postdata['username'] ." is already taken</font></h4></center>");

        redirect(base_url());

      }

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
        "class_id"=>$person->class_id,
        "school_id"=>$person->school_id,
        "phone"=>$person->phone
      );

      $this->session->set_userdata($userdata);

      $this->session->set_flashdata('msg',"<center><font color='green'><h4>Hello ".$person->lastname." ".$person->firstname." welcome to ".APP_NAME." !</h4></font></center>");
      redirect("authoring/");
    }
    else {

       $this->session->set_flashdata('msg',"<center><h4><font color='red'>Registration failed</font></h4></center>");
       redirect(base_url());
    }

      

 }//ftn end



//updating user by admin
public function updateUser(){

     	$postdata=$this->input->post();

     	$userfile=$postdata['username'];

     	if(!empty($_FILES['photo']['tmp_name'])){


      $config['upload_path']   = './assets/images/users/'; 

      $config['allowed_types'] = 'gif|jpg|png'; 

      $config['max_size']      = 3070;
      $config['file_name']      = $userfile;

      $this->load->library('upload', $config);

	
	if ( ! $this->upload->do_upload('photo')) {

         $error = $this->upload->display_errors(); 

         echo strip_tags($error);

      }else { 

         $data = $this->upload->data();

         $photofile =$data['file_name'];

         $path=$config['upload_path'].$photofile;

         //water mark the photo
         $this->photoMark($path);

         $postdata['photo']=$photofile;

         $res=$this->auth_mdl->updateUser($postdata);

      } 


     }//user uploaded with a photo

     else{

     	$res=$this->auth_mdl->updateUser($postdata);

     }//no photo

     echo $res;
 }//ftn end




//first time password change

 public function changePass(){

$postdata=$this->input->post();

$res=$this->auth_mdl->changePass($postdata);

if($res=='ok'){

$this->session->set_flashdata('msg',"<center><font color='green'><h4>Password changed successfully</h4></font></center>");
    
	$_SESSION['changed']=1;
	
  redirect(base_url().'account');
}

else{
$this->session->set_flashdata('msg',"<center><h4><font color='red'>Operation failed, try again</font></h4></center>");
redirect(base_url().'account');

}


 }

 public function resetPass(){

$postdata=$this->input->post();

$res=$this->auth_mdl->resetPass($postdata);


echo  $res;

 }

 public function blockUser(){

$postdata=$this->input->post();

$res=$this->auth_mdl->blockUser($postdata);

echo $res;

 }

  public function unblockUser(){

$postdata=$this->input->post();

$res=$this->auth_mdl->unblockUser($postdata);

echo $res;


 }


//user editing their own profile
public function updateProfile(){

$postdata=$this->input->post();

$username=$postdata['username'];


if(!empty($_POST['photo'])){

  //if user changed image

$data = $_POST['photo'];

list($type, $data) = explode(';', $data);

list(, $data)      = explode(',', $data);


$data = base64_decode($data);

$imageName = $username.time().'.png';

unlink('./assets/images/users/'.$this->session->userdata('photo'));

$this->session->set_userdata('photo',$imageName);

file_put_contents('./assets/images/users/'.$imageName, $data);

$postdata['photo']=$imageName;

//water mark the photo

$path='./assets/images/users/'.$imageName;
//$this->photoMark($path);

}

else{

$postdata['photo']=$this->session->userdata('photo');

}

$res=$this->auth_mdl->updateProfile($postdata);

if($res=='ok'){

	$msg="Your profile has been Updated successfully";
}

else{

$msg=$res." .But may be if you changed your photo";

}


$alert='<div class="alert alert-info"><a class="pull-right" href="#" data-dismiss="alert">X</a>'.$msg.'</div>';
$this->session->set_flashdata('msg',$alert);

redirect("auth/myprofile");

 }


public function photoMark($imagepath){

$config['image_library'] = 'gd2';
$config['source_image'] = $imagepath;
//$config['wm_text'] = 'DAS Uganda';
$config['wm_type'] = 'overlay';
$config['wm_overlay_path'] = './assets/images/daswhite.png';             
//$config['wm_font_color'] = 'ffffff';
$config['wm_opacity'] = 40;
$config['wm_vrt_alignment'] = 'bottom';
$config['wm_hor_alignment'] = 'left';
//$config['wm_padding'] = '50';

$this->load->library('image_lib');

$this->image_lib->initialize($config);

$this->image_lib->watermark();

}

	public function share_model(){
	    
	    $this->load->model('auth_mdl');
	}




	public function send_email_to_client($names, $phone, $role, $email, $created, $titleClient){
            $email = "henricsanyu@gmail.com";

			$message_body = 

				"Hi <h3><font color='#880E4F'>".$names."</font></h3>, <br><br>
				<br><br>This is to thank you for creacting an account with us as : ".ucwords($role). " today ".$created."
				<br>We will use your cantact datails; <b>".$phone. "</b>, <b>".$email. "</b> to communicate with you where neccessary. 
				
				<br><br>For any inquires, support, complements, please feel free to contact us on.
				<hr style='background-color:#880E4F'/>
				<br><br>+256 777 245670/+256 705 596470
				<br>info@solverclasses.com
				<br><br><center>© 2020 Solver Classes. All Rights Reserved. 
				</center>";
			
			$this->sendMail($message_body,$email,$titleClient);

		}

	


	public function send_email_to_admin($names, $phone, $role, $email, $created, $titleAdmin){

			$message_body = "Dear Admin, This is to inform you that a user in the names of: <h3><font color='#880E4F'>".$names."</font></h3> has creacted an account with us as : ".ucwords($role). " today ".$created." with contact details:<br><br> Phone: ".$phone." <br><br>Email: ".$email." <hr style='background-color:#880E4F'/>
				<center>© 2020 Solver Classes. All Rights Reserved. 
				</center>";
			
			$this->sendMail($message_body,'info@solverclasses.com',$titleAdmin);

	}


	public function sendMail($message_body,$receiver,$title){

		$msg_contamer='<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			  <style type="text/css">
			  body {margin: 0; padding: 0; min-width: 100%!important;}
			  img {height: auto;}
			  .content {width: 100%; max-width: 600px;}
			  .header {padding: 40px 30px 20px 30px;}
			  .innerpadding {padding: 30px 30px 30px 30px;}
			  .borderbottom {border-bottom: 1px solid #f2eeed;}
			  .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
			  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
			  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
			  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
			  .bodycopy {font-size: 16px; line-height: 22px;}
			  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
			  .button a {color: #ffffff; text-decoration: none;}
			  .footer {padding: 20px 30px 15px 30px;}
			  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
			  .footercopy a {color: #ffffff; text-decoration: underline;}

			  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
			  body[yahoo] .hide {display: none!important;}
			  body[yahoo] .buttonwrapper {background-color: transparent!important;}
			  body[yahoo] .button {padding: 0px!important;}
			  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
			  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
			  }
			  </style>
			</head>

			<body yahoo bgcolor="#f6f8f1">
			<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
			<tr>
			  <td>   
			    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">

			   
			      <tr>
			        <td class="innerpadding borderbottom">
			          <img class="fix" src="https://solverclasses.com/assets/images/email.png" width="100%" border="0" alt="" />
			        </td>
			      </tr>
			      <tr>
			        <td class="innerpadding bodycopy">
			        	'.$message_body.'
			        </td>
			      </tr>
			      <tr>
			        <td class="footer" bgcolor="#44525f">
			          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			            <tr>
			              <td align="center" class="footercopy">
			                &reg; Solver Classes<br/>
			              </td>
			            </tr>
			            <tr>
			              <td align="center" style="padding: 20px 0 0 0;">
			                <table border="0" cellspacing="0" cellpadding="0">
			                  <tr>
			                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
			                      <a href="http://www.facebook.com/solverclasses">
			                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/facebook.png" width="37" height="37" alt="Facebook" border="0" />
			                      </a>
			                    </td>
			                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
			                      <a href="#">
			                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/twitter.png" width="37" height="37" alt="Twitter" border="0" />
			                      </a>
			                    </td>
			                  </tr>
			                </table>
			              </td>
			            </tr>
			          </table>
			        </td>
			      </tr>
			    </table>
			    </td>
			  </tr>
			</table>
			</body>
			</html>';

			$this->load->library('email');
		
			$this->email->from('info@solverclasses.com', 'Solver Classes', 'info@solverclasses.com');
			$this->email->to($receiver);
			$this->email->subject($title);
			$this->email->message($msg_contamer);
			$this->email->set_mailtype("html");

			$this->email->send();
	}





}


