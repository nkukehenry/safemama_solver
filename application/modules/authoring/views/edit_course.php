
<?php

$categories=Modules::run("categories/getCategories");
$subjects=Modules::run("subjects/getSubjects");
$classes=Modules::run("classes/getClasses");

$userdata=$this->session->userdata;


//build options
$class_options="";

foreach ($classes as $cla) {
   
   $class_options .="<option value='".$cla->class_id."'>".$cla->class."</option>";

}

//build options
$category_options="";

foreach ($categories as $cat) {
   
   $category_options .="<option value='".$cat->category_id."'>".$cat->category."</option>";

}

//build options
$subject_options="";

foreach ($subjects as $sub) {
   
   $subject_options .="<option value='".$sub->subject_id."'>".$sub->subject."</option>";

}

?>


<section style="font-size: 13pt;">

    <form method="post" action="<?php echo base_url(); ?>authoring/updateCourse" enctype="multipart/form-data">

<div class="col-md-8">

<!--course id in hidden field -->
    <input type="hidden" name="course_id" value="<?php echo $course->course_id; ?>">

    <div class="form-group col-md-12" style="margin-top: 1em;" >
        <label>Course Title (<a href="<?php echo base_url(); ?>courses/courseDetails/<?php echo $course->course_id; ?>" target="_blank"> Click here to preview course</a>)</label>
        <input type="text" class="form-control" name="title" placeholder="Enter course title"  value="<?php echo $course->title; ?>">
    </div>


<div class="panel">
<div class="form-group row col-md-12" style="margin-top: 1em;" >
        <label>Overview </label>
       
       <textarea id="editor" name="overview" class="editor" style="min-height: 400px;" ><?php echo (!empty($course->overview))?$course->overview:$course->course_body; ?></textarea>
    </div>

<div class="form-group row col-md-12" style="margin-top: 5em;" >
<label>Work Up </label>
<textarea id="editor" name="work_up" class="editor" style="min-height: 300px;" ><?php echo $course->work_up; ?></textarea>
</div>

<div class="form-group row col-md-12" style="margin-top: 1em;" >
<label>Management </label>
<textarea id="editor" name="management" class="editor"  style="min-height: 300px;" ><?php echo $course->management; ?></textarea>
</div>

<div class="form-group row col-md-12" style="margin-top: 1em;" >
<label>Protocol </label>
<textarea id="editor" name="protocol" class="editor" style="min-height: 300px;" ><?php echo $course->protocol; ?></textarea>
</div>

</div>

</div>


<div class="col-md-4" >
   
   <div class="panel panel-default" style="min-height:110%; margin-top: 3em; padding: 15px;">

<?php echo $this->session->flashdata('msg'); ?>
    <div class="form-group">
        <label>Video Link</label>

        <input type="text" class="form-control" name="video_url" value="<?php echo $course->video_url; ?>">
        
    </div>
    
     <div class="form-group">
        <label>Content type (<small>Which content do you have?)</small>)</label>
        <select class="form-control switchon" >
            <option value="all">Multimedia (Text,Video & Audio/Voice)</option>
            <option value="video">Video</option>
            <option value="audio">Audio/Voice</option>
        </select>
    </div>

    <div class="form-group">
        <label>Type</label>

        <select class="form-control" name="category_id">

            <option value="<?php echo $course->category_id; ?>"><?php echo $course->category; ?></option>
            <?php echo $category_options; ?>

        </select> 
        
    </div>

    <div class="form-group">
        <label>Theme</label>

        <select class="form-control" name="subject_id">

            <option value="<?php echo $course->subject_id; ?>"><?php echo $course->subject; ?></option>
            <?php echo $subject_options; ?>

        </select> 
        
    </div>

    <div class="form-group">
        <label>Category</label>

        <select class="form-control" name="class_id">

            <option value="<?php echo $course->class_id; ?>"><?php echo $course->class; ?></option>

            <?php echo $class_options; ?>

        </select> 
        
    </div>


    <div class="form-group pdfs">
         <label>Attachment (pdf only)</label>
          <input type="file" name="attachment" placeholder="Attach a file">
    </div>

    <div class="form-group audios">
         <label>Audio /Voice Clip</label>
          <input type="file" name="audio" placeholder="Attach a file">
    </div>


    <div class="form-group">
        <label>Cover Image</label>

        <input type="hidden" name="oldcover" value="<?php echo $course->cover_image; ?>">

        <input type="file" id="cover" name="cover_image" style="display: none;">


        <!--author id from session-->
        <input type="hidden" value="<?php echo $userdata['user_id']; ?>" name="author_id">

    </div>


<?php 


if($course->cover_image)  {

    //if course has cover image


?>

    <center style="margin-bottom:0.5em; ">
<img onclick="$('#cover').click();" class="img img-thumbnail" src="<?php echo base_url(); ?>assets/images/course/<?php echo $course->cover_image; ?>" id="preview" style="max-width: 200px;">
    </center>


<?php  }  else {


    //if course has NO cover image
    ?>

    <center  style="margin-bottom:0.5em; ">
        <img onclick="$('#cover').click();" class="img img-thumbnail" src="<?php echo base_url(); ?>assets/images/add_image.png" id="preview" style="max-width: 400px;">
    </center>

 <?php  } ?>   


        

   </div> 


    <div class="form-group" style="padding-right: 2em;">
        <button type="submit" class="btn btn-success pull-right"> Save Changes</button>
        <br>
        <br>
    </div>


</div>

</form>

</section>


<?php include('js_resources.php'); ?>


<script type="text/javascript">
    //preview cover image

    function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#cover").change(function() {
  readURL(this);
});

</script>