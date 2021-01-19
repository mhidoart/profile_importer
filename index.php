<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(E_ERROR | E_PARSE);

include_once './dao/Database.php';
include_once './controller/MainController.php';
include_once './action/BusinessFactory.php';




$res = $service->get_offres();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for a job</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/styles.css">
    <script>
        $(document).ready(function() {
            console.log("ready!");
            $('#apply_for_internship').click(function() {
                window.location.href = 'internship.php';
            })
            $('#apply_for_job').click(function() {
                window.location.href = 'apply_for_job.php';
            })

        });
    </script>
</head>

<body>

    <div class="social-box">
        <div class="container" style="text-align: center;">



            <div class="row" id="APPLY">

                <div class="col-lg-4 col-xs-12  text-center" id="apply_for_internship">
                    <div class="box">
                        <img src="static/pics/internship_logo.png" alt="">
                        <div class="box-title">
                            <h3>Apply for an <b>internship</b></h3>
                        </div>
                        <div class="box-text">
                            <span>This is your chance to earn real experiences from the experts in the domain, we are looking to see you soon !</span>
                        </div>
                        <div class="box-btn">
                            <a href="./internship.php">Learn More</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-xs-12 text-center" id="apply_for_job">
                    <div class="box">
                        <img src="static/pics/businessman.png" alt="">
                        <div class="box-title">
                            <h3>Apply for a <b>job</b></h3>
                        </div>
                        <div class="box-text">
                            <span>Yes! you can apply for a job and have the chance to became one of our well known <b>Experts</b>! </span>
                        </div>
                        <div class="box-btn">
                            <a href="./apply_for_job.php">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-12  text-center">
                    <div class="box">
                        <img src="static/pics/logo.png" style="width: 100px;" alt="">
                        <div class="box-title">
                            <h3>Visit our <b>website </b></h3>
                        </div>
                        <div class="box-text">
                            <span> The place where you will find all our provided Services, national and international Relationships, Regulations, News ...etc</span>
                        </div>
                        <div class="box-btn">
                            <a href="https://expert-abid.com/">Learn More</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <hr style="color: white;">
                <h2>Offres</h2>
            </div>

            <div class="row">

                <?php for ($i = 0; $i < count($res); $i++) { ?>
                    <div class="col-lg-4 col-xs-12  text-center">
                        <div class="box">
                            <div class="box-title">
                                <h3><?= $res[$i]["title"] ?></b></h3>
                            </div>
                            <div class="box-text">
                                <span><?= $res[$i]["description"] ?></span>
                            </div>
                            <div class="box-btn">
                                <small> created by : <?php
                                                        $user = $service->get_interviewer($res[$i]["id_user"]);
                                                        echo  $user[0]["complete_name"];
                                                        ?> on: <?= $res[$i]["date_creation"] ?></small>
                                <br> <small> more details:<?php
                                                            if ('no_file' == $res[$i]["document_path"]) {
                                                                // nothing
                                                            } else {
                                                                echo '<a  target="_blank" rel="noopener noreferrer" href="' . "./action/uploads/offre_upploads/" . $res[$i]["document_path"] . '">download</a></td>';
                                                            }
                                                            ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</body>

</html>