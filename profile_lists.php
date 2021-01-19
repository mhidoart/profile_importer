<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user_id"])) {
    //ok
} else {
    header("Location: ./login.php"); /* Redirect browser */
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="static/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="static/profile_lists.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="static/profiles.js"></script>
    <script src="static/offres.js"></script>
    <link rel="stylesheet" href="static/profile_lists.css">
</head>

<body>

    <div style=" padding: 10px;">

        <div class="container">
            <div class="row">
                <div class="center-block"><img src="static/pics/logo.png" width="130px" alt="" srcset=""></div>
                <div class="center-block">

                </div>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <h4><?php echo "Hello, " . $_SESSION["complete_name"] . ",you are an interviewer!"   ?></h4>
            <small> You can change the state of <b>profiles</b> by clicking on modify button on the right of each row or you can create/modify <b>offers</b></small>
            <hr>
            <h2>Profiles: </h2>
            <hr>

        </div>
        <div class="container widget stacked widget-table action-table">
            <div class="top_table">
                <div class="form-group">
                    <label for="typeSelector">Type</label>
                    <select class="form-control" id="typeSelector" value="Internship">
                        <option value="0">Internship</option>
                        <option value="1">Job Interview</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="avisSelector">Avis</label>
                    <select class="form-control" id="avisSelector" value="All">
                        <option value="0">Pending</option>
                        <option value="1">Accepted Waiting for interview</option>
                        <option value="2">Accepted</option>
                        <option value="3">Rejected</option>
                        <option value="-1">All</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="search_profiles">Search</label>
                    <input type="text" class="form-control" id="search_profiles" size="300" aria-describedby="emailHelp" placeholder="keyword">
                </div>
            </div>

            <div class="widget-content" style="margin-left: auto; margin-right: auto; margin-top: 10px;overflow-y: scroll; height:400px;">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>CV</th>
                            <th>Comment</th>
                            <th>Apply Date</th>
                            <th>Avis</th>
                            <th class="td-actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <tr>
                            <td>12</td>
                            <td>Mehdi</td>
                            <td>ASSABBANE</td>
                            <td>Email</td>
                            <td><a href="#">download</a></td>
                            <td>commentaire</td>
                            <td>Apply Date</td>
                            <td class="alert alert-success"> Favorable</td>
                            <td class="td-actions">
                                <button class="btn btn-success" onclick="openModal(54)"> modify </button>
                                <a href="javascript:;" class="btn btn-small btn-primary">
                                    <i class="btn-icon-only icon-ok"></i>
                                </a>

                                <a href="javascript:;" class="btn btn-small">
                                    <i class="btn-icon-only icon-remove"></i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div> <!-- /widget-content -->
            <div class="row" style="text-align: center;">
                <hr>
                <h2>Offres: </h2>
                <hr>

            </div>
            <a href="add_offre.php"><button class="btn btn-primary"> Add Offre</button></a>

            <div class="widget-content" style="margin-left: auto; margin-right: auto; margin-top: 10px; overflow-y: scroll; height:400px;">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Created by </th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date creation</th>
                            <th>Files</th>

                            <th class="td-actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="offres">
                        <tr>
                            <td>12</td>
                            <td>Mehdi</td>
                            <td>ASSABBANE</td>
                            <td>Email</td>
                            <td><a href="#">download</a></td>
                            <td>commentaire</td>
                            <td>Apply Date</td>
                            <td class="alert alert-success"> Favorable</td>
                            <td class="td-actions">
                                <button class="btn btn-success" onclick="openModal(54)"> modify </button>
                                <a href="javascript:;" class="btn btn-small btn-primary">
                                    <i class="btn-icon-only icon-ok"></i>
                                </a>

                                <a href="javascript:;" class="btn btn-small">
                                    <i class="btn-icon-only icon-remove"></i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div> <!-- /widget-content -->
            <div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" id="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <!--                                 <p>Some text in the modal.</p> -->
                                <div class="form-group">
                                    <label for="modifyAvis">Avis</label>
                                    <select class="form-control" id="modifyAvis">
                                        <option value="0">Pending</option>
                                        <option value="1">Accepted Waiting for interview</option>
                                        <option value="2">Accepted</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                </div>
                                <p id="title"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</body>

</html>