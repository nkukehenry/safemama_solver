
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give us your Feedback</title>
  <style>
    html,body{
        max-width: 100%;
        padding: 0px;
        margin: 0px;
        min-height: 100vh;
        background-image: url(img/pattern-2.png);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .bg-orange{
        background-color: #F7941E!important;
        color: white!important;
    }

    .text-orange{
        color: #F7941E!important;
    }

    .bg-navy{
        background-color: #d8eef0!important;
    }

    .flexed{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    
  </style>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="flexed bg-white">
 
<form action="" method="post" class="flexed ajax">
<!-- Login 8 - Bootstrap Brain Component -->

  <div class=" flexed mt-3">
    <div class="row flexed">
      <div class="col-12 col-xxl-11 flexed">
        <div class="card border-light-subtle shadow-md    bg-navy">
          <div class="row g-0">
            
            <div class="col-12 col-md-12 d-flex align-items-center justify-content-center   bg-navy">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body">
                
                    <div class="row gy-3 overflow-hidden mt-3">
                        <div class="col-12"><h4>Share Your Feedback</h4></div>
                      
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="name"  id="name" value="" placeholder="Enter Email" required>
                          <label for="name" class="form-label">Your Name</label>
                        </div>
                       <div class="form-floating mb-3">
                          <input type="tel" class="form-control" name="phonenumber"  id="phonenumber" value="" placeholder="Enter Email" required>
                          <label for="phonenumber" class="form-label">Enter Email</label>
                        </div>
                        </div>
                      
                        <div class="col-12">
                        
                        <div class="form-floating mb-3">
                          <textarea class="form-control" name="message" rows="30" ></textarea>
                          <label for="phonenumber" class="form-label">Your Feedback</label>
                        </div>
                        
                        <div class="form-floating mb-3" style="text-align:left;">
                            <small class="text-bold"><strong>Upload Attachment/Screenshot</strong></small>
                          <input type="file" name="attachment"  required>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn bg-orange btn-lg" type="submit" id="submit" name="submit">SUBMIT</button>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-12">
                      <div class="d-flex gap-1 text-center flex-column flex-md-row justify-content-md-center mt-1">
                       <p class="text-center mt-3  mb-3">You can email us on info@moh.co.ug</p>
                      </div>
                    </div>
                  </div>
                
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>

</html>
