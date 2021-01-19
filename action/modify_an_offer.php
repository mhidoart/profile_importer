<!DOCTYPE html>
<html lang="en">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user_id"])) {
    //ok
} else {
    header("Location: ../login.php"); /* Redirect browser */
    exit();
}
?>
<?php
include_once 'BusinessFactory.php';



$id = $_REQUEST['id'];
$res = $service->get_offre_by_id($id);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add offre</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="../static/internship.css">
</head>

<body>
    <div class="container contact">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info" style="text-align: center;">
                    <img src="../static/pics/logo.png" width="150" alt="image" />
                    <h2>Here you can Modify an Offre!</h2>
                    <h4>An offre is described by a title and a description the date of creation and who created it is added automatically!</h4>
                </div>
            </div>
            <div class="col-md-9">
                <form class="contact-form" action="modify_offre_action.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" value="<?= $res[0]["id"] ?>" name="id" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Enter First Name" value="<?= $res[0]["title"] ?>" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="comment">Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="comment" name="comment" value="<?= $res[0]["description"] ?>"><?= $res[0]["description"] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="doc" class=" col-form-label">A document that explains more about the offre (if multiple zip all docs)</label>
                        <input type="file" name="doc" id="doc" onchange="">


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