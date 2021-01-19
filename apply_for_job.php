<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="static/internship.css">
</head>

<body>
    <div class="container contact">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info" style="text-align: center;">
                    <img src="static/pics/logo.png" width="150" alt="image" />
                    <h2>Apply for the job Now!</h2>
                    <h4>You may be one of our <b>Experts</b>!</h4>
                </div>
            </div>
            <div class="col-md-9">
                <form class="contact-form" action="action/apply_for_job.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lname">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="num">Number:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="num" placeholder="Enter Last Name" name="num">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="imageUploader" class="col-sm-2 col-form-label">CV in PDF format</label>
                        <input type="file" name="imageUploader" id="imageUploader" onchange="">


                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="comment">Comment:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>