<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_mdl extends CI_Model {

	public function __construct()
        {
                parent::__construct();

                $this->courses_tb="courses";//courses tb
                $this->courses_view="courses_view";//courses view

                
        }


       // fetch all couses
        public function getAll($limit=FALSE,$start=FALSE,$getFeatured=FALSE){

        	if($limit)
            $this->db->limit($limit,$start);

          if($getFeatured)
            $this->db->where('isFeatured',1);

            $this->db->where('isPublished',1);
            $this->db->limit($limit,$start);
            $this->db->order_by('updated_at','DESC');
        	$query=$this->db->get($this->courses_view);

        	$results = $query->result();  //courses

          return $this->attachLessons($results);

        }
        
        
        function searchResources($term){
            
            $this->db->where('isPublished',1);
            
            $this->db->group_start();
            $this->db->like('title', '%'.$term.'%');
            $this->db->or_like('overview', '%'.$term.'%');
            $this->db->or_like('management', '%'.$term.'%');
            $this->db->group_end();
            
           // $this->db->limit(40,0);
            $this->db->order_by('updated_at','DESC');
        	$query=$this->db->get($this->courses_view);

        	$results = $query->result();  //courses

          return $this->attachLessons($results);
            
        }

          //class courses

    public function classCourses($limit=FALSE,$start=FALSE,$classId){

            $this->db->where("class_id",$classId);

            if($limit!==FALSE){

            $this->db->limit($limit,$start);

               }
               $this->db->where('isPublished',1);
             $this->db->limit($limit,$start);
            $this->db->order_by('updated_at','DESC');
            $query=$this->db->get($this->courses_view);

            $results = $query->result();  //courses

          return $this->attachLessons($results);

        }

      //count class courses

  public function count_classCourses($classId){
        
        $this->db->where("class_id",$classId);
         $this->db->where('isPublished',1);
        $query = $this->db->get($this->courses_view);
        $num = $query->num_rows();
        return $num;
    }

        public function attachLessons($results){

          foreach ($results as $row):
            $row->lessons = $this->getCourseLessons($row->course_id);
            $row->audio_prefix="https://bpkarlassociates.com/solverclasses/assets/audios/";
            $row->file_prefix="https://bpkarlassociates.com/solverclasses/assets/pdfs/";
          endforeach;

          return $results;
        }

        public function getCourseLessons($courseId){
          $this->db->where("course_id",$courseId);
          $query = $this->db->get('lessons_view');
          return  $query->result();
        }


        public function getQuickAccessResources($limit=FALSE,$start=FALSE){

            $this->db->where('quick_access',1);
            $this->db->where('isPublished',1);
            $this->db->limit($limit,$start);
            $this->db->order_by('updated_at','DESC');
            $query=$this->db->get($this->courses_view);

          return $query->result();  //courses
        }

        // fetch all couses
        public function getFeatured($limit=FALSE,$start=FALSE){

          if($limit!==FALSE){

          $this->db->limit($limit,$start);

               }

          if(!empty($this->session->userdata()['class_id'])){
            //suggest courses close to the user's class 
            $class= $this->session->userdata()['class_id'];
            $this->db->where_in('class_id',[$class,($class-1),($class+1)]);
          }
             $this->db->where('isPublished',1);
            $this->db->order_by('updated_at','DESC');
          $query=$this->db->get($this->courses_view);

          return $query->result();  //courses

        }


      //get  specific course
        public function getById($courseId){

        	$this->db->where('course_id',$courseId);
        	$query=$this->db->get($this->courses_view);

        	return $query->row();
        }


        //courses for auhtor
        public function getByAuthor($limit=FALSE,$start=FALSE,$authorId){

            if($limit!==FALSE){
            $this->db->limit($limit,$start);
               }
             $this->db->where('isPublished',1);
            $this->db->where('author_id',$authorId);
            $query=$this->db->get($this->courses_view);
            return $query->result();
        }


        //count total rows
public function count_courses(){
	    
	   return  $this->db->count_all($this->courses_tb);
	}




public function count_author_courses($authorId){
             $this->db->where('isPublished',1);
              $this->db->where('author_id',$authorId);
              $query=$this->db->get($this->courses_tb);
        
       return  $query->num_rows();
    }

    //when user searches for a course
  
  public function searchCourses($limit=FALSE,$start=FALSE,$term){

               
            $this->db->like('title',$term);//, NULL, FALSE
            $this->db->or_like('description',$term);
            $this->db->or_like('subject',$term);
            $this->db->or_like('class',$term);
             $this->db->where('isPublished',1);
           
            if($limit!==FALSE){

            $this->db->limit($limit,$start);

               }
             $this->db->limit($limit,$start);
            $this->db->order_by('date','DESC');
            $query=$this->db->get($this->courses_view);

            return $query->result();  //courses

        }

    
    //count total rows
public function count_searchResults($term){
        
         $this->db->like('title',$term);//, NULL, FALSE
            $this->db->or_like('description',$term);
            $this->db->or_like('subject',$term);
            $this->db->or_like('class',$term);
             $this->db->where('isPublished',1);
        $query = $this->db->get($this->courses_view);
        $num = $query->num_rows();
        return $num;
    }

  

    public function schoolCourses($limit=FALSE,$start=FALSE,$school_id){
               
            $this->db->where("school_id",$school_id);

            if($limit!==FALSE){

            $this->db->limit($limit,$start);

               }
             $this->db->limit($limit,$start);
              $this->db->where('isPublished',1);
            $this->db->order_by('date','DESC');
            $query=$this->db->get($this->courses_view);
            return $query->result();  //courses

        }
     public function count_schoolCourses($school_id){
        
        $this->db->where("school_id",$school_id);
         $this->db->where('isPublished',1);
        $query = $this->db->get($this->courses_view);
        $num = $query->num_rows();
        return $num;
    }

      
      public function userCourses($limit=FALSE,$start=FALSE,$userId){

           $qry= $this->db->query("select * from courses_view where isPublished='1' and course_id in (SELECT course_id from user_courses where user_id=$userId)  ORDER BY date DESC LIMIT $start,$limit");

            return  $qry->result();

           // return $this->db->last_query(); //courses

        }

//count class courses

  public function count_userCourses($userId){
         $this->db->where('isPublished',1);
        $this->db->where("author_id",$userId);
        $query = $this->db->get('courses');
        $num = $query->num_rows();
        return $num;
    }





    //category courses

    public function categoryCourses($limit=FALSE,$start=FALSE,$categoryId){

               
            $this->db->where("category_id",$categoryId);

            if($limit!==FALSE){

            $this->db->limit($limit,$start);

               }
             $this->db->limit($limit,$start);
            $this->db->order_by('date','DESC');
            $query=$this->db->get($this->courses_view);

            return $query->result();  //courses

        }

//count category courses

  public function count_categoryCourses($categoryId){
        
        $this->db->where("category_id",$categoryId);
        $query = $this->db->get($this->courses_view);
        $num = $query->num_rows();
        return $num;
    }


  public function getComments($courseId){

        $this->db->select('comments.comment_id,comments.comment,users.firstname,users.lastname,users.photo,users.user_id,comments.date');
        $this->db->where('course_id',$courseId);
       $this->db->join('users','users.user_id=comments.user_id');

        return $this->db->get('comments')->result();
        }




}
