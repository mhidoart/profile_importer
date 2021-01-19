<?php
include_once '../action/BusinessFactory.php';


$id = addslashes($_REQUEST["id"]);
$res = $service->get_profile($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: #fbfbfb;
        }

        .card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            min-height: 400px;
            background: #fff;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .1);
            border-radius: 10px;
            transition: 0.5s;
        }

        .card:hover {
            box-shadow: 0 30px 70px rgba(0, 0, 0, .2);
        }

        .card .box {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            width: 100%;
        }

        .card .box .img {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
        }

        .card .box .img img {
            width: 100%;
            height: 100%;
        }

        .card .box h2 {
            font-size: 20px;
            color: #262626;
            margin: 20px auto;
        }

        .card .box h2 span {
            font-size: 14px;
            background: #e91e63;
            color: #fff;
            display: inline-block;
            padding: 4px 10px;
            border-radius: 15px;
        }

        .card .box p {
            color: #262626;
        }

        .card .box span {
            display: inline-flex;
        }

        .card .box ul {
            margin: 0;
            padding: 0;
        }

        .card .box ul li {
            list-style: none;
            float: left;
        }

        .card .box ul li a {
            display: block;
            color: #aaa;
            margin: 0 10px;
            font-size: 20px;
            transition: 0.5s;
            text-align: center;
        }

        .card .box ul li:hover a {
            color: #e91e63;
            transform: rotateY(360deg);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="box">
            <div class="img">
                <img src="user.png">
            </div>
            <h2><?php echo $res[0]["last_name"] . " " . $res[0]["first_name"]  ?><br>
                <?php
                if ($res[0]["avis"] == 0) {
                    echo '<span class="text-white bg-warning">Pending</span>';
                } else if ($res[0]["avis"] == 1) {
                    echo '<span class="text-white bg-warning">Accepted Waiting for interview</span>';
                } else if ($res[0]["avis"] == 2) {
                    echo '<span class="text-white bg-success">Accepted</span>';
                } else if ($res[0]["avis"] == 3) {
                    echo  '<span class="text-white bg-danger">Rejected</span>';
                }
                ?>

            </h2>
            <?php
            if ($res[0]["avis"] == 0) {
                echo '<p> your profile is being analysed, we will answer you soon ! be patient.</p>';
            } else if ($res[0]["avis"] == 1) {
                echo '<p> your profile is accepted and you should receive an email with the date of the interview </p>';
            } else if ($res[0]["avis"] == 2) {
                echo '<p> your profile is accepted !</p>';
            } else if ($res[0]["avis"] == 3) {
                echo  '<p>Am sorry, but we are not in need of your profile right now but we might call you later!</p>';
            }
            ?>

        </div>
    </div>
</body>

</html>