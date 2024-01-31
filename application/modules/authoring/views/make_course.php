
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

<form method="post" action="<?php echo base_url(); ?>authoring/saveCourse" enctype="multipart/form-data">

<div class="col-md-8">

    <div class="form-group col-md-11" style="margin-top: 1em;" >
        <label>Topic</label>
        <input type="text" class="form-control" name="title" placeholder="Enter course title" required>
    </div>
<div class="panel">
<div class="form-group row col-md-12" style="margin-top: 1em;" >
        <label>Overview </label>
       
       <textarea id="editor" name="overview" class="editor" style="min-height: 400px;" required></textarea>
    </div>

<div class="form-group row col-md-12" style="margin-top: 5em;" >
<label>Work Up </label>
<textarea id="editor" name="work_up" class="editor" style="min-height: 300px;" ></textarea>
</div>

<div class="form-group row col-md-12" style="margin-top: 1em;" >
<label>Management </label>
<textarea id="editor" name="management" class="editor"  style="min-height: 300px;" ></textarea>
</div>

<div class="form-group row col-md-12" style="margin-top: 1em;" >
<label>Protocol </label>
<textarea id="editor" name="protocol" class="editor" style="min-height: 300px;" ></textarea>
</div>

</div>

</div>


<div class="col-md-4" >
   
   <div class="panel panel-default" style="min-height:100%; margin-top: 3em; padding: 30px;">
    <div class="form-group">
        <label>Content type (<small>Which content do you have?)</small>)</label>
        <select class="form-control switchon" >
            <option value="all">Multimedia (Text,Video & Audio/Voice)</option>
            <option value="video">Video</option>
            <option value="audio">Audio/Voice</option>
        </select>
    </div>

    <div class="form-group videos">
        <label>Video Link</label>
        <input type="text" placeholder="Youtube Video Link (Optional)" class="form-control" name="video_url">
        
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
        <label>Type</label>

        <select class="form-control" name="category_id" required>

            <option>--Select Type--</option>
            <?php echo $category_options; ?>

        </select> 
        
    </div>

    <div class="form-group">
        <label>Theme</label>

        <select class="form-control" name="subject_id" required>

            <option>--Select Theme--</option>
            <?php echo $subject_options; ?>

        </select> 
        
    </div>

    <div class="form-group">
        <label>Category</label>

        <select class="form-control" name="class_id" required>

            <option>--Select Category--</option>

            <?php echo $class_options; ?>

        </select> 
        
    </div>

    <!--   <div class="form-group">-->
    <!--    <label>Course Access</label>-->

    <!--    <select class="form-control" name="schoolOnly">-->

    <!--        <option value="0" selected>Every can use</option>-->

    <!--        <?php if(!empty($userdata['school_id'])): ?>-->
    <!--        <option value="1">Allow my school only</option>-->
    <!--         <?php endif; ?>-->

    <!--    </select> -->
        
    <!--</div>-->



    <div class="form-group">
        <label>Cover Image</label>

        <input type="file" id="cover" name="cover_image" style="display: none;">


        <!--author id from session-->
        <input type="hidden" value="<?php echo $userdata['user_id']; ?>" name="author_id">

    </div>

    <center>
        <img onclick="$('#cover').click();" class="img img-thumbnail" src="<?php echo base_url(); ?>assets/images/add_image.png" id="preview" style="max-width: 300px;">
    </center>


   </div> 


    <div class="form-group" style="padding-right: 2em;">
        <button type="submit" class="btn btn-success pull-right"> Save Resource</button>
        <br>
        <br>
    </div>


</div>

</form>

</section>
<script type="text/javascript">

    document.addEventListener("change",function(e){

        e.preventDefault();

        var coursetype = $('.switchon').val();
        console.log(coursetype);

        if(coursetype=='videos'){

            $('.video').show();
            $('.audio').hide();
            $('.pdf').hide();
        }
        if(coursetype=='audios'){

            $('.video').hide();
            $('.audio').show();
            $('.pdf').hide();
        }
        if(coursetype=='all'){

            $('.video').show();
            $('.audio').show();
            $('.pdf').show();
        }
    },{ passive: false });

</script>

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