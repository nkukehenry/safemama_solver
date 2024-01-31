             
             <?php

             /* This file handles security for accessing course details i.e when a user clicks on a course

             If they are logged in, they will go to the course
             else they are prompted to login

             $link is the value of the link that connects to the course or to the login modal

             */
				   $userdata=$this->session->userdata;
			
			//if loggedin

                  if($userdata){
            

              $link="href='".base_url()."courses/courseDetails/$lesson->course_id'"; 

        }

        else

        {

             //if not loggedin

             $link='href="#"  data-toggle="modal" data-target="#login"'; 

         }   
            
            ?>