<?php
class MainController
{
    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }
    public function start_session()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function login($email, $pass)
    {
        $this->start_session();
        $req = "SELECT * FROM interviewer WHERE email = '" . $email . "' and pass ='" . $pass . "'";
        $res = $this->dao->executeSelect($req);
        if (count($res) == 0) {
            return false;
        } else {
            // save credentianl of logged user in session we will need it later
            $_SESSION["user_id"] = $res[0]["id"];
            $_SESSION["complete_name"] = $res[0]["complete_name"];
            $_SESSION["email"] = $res[0]["email"];
            $_SESSION["pass"] = $res[0]["pass"];
            $_SESSION["rank"] = $res[0]["rank"];
            return true;
        }
    }
    public function update_avis($id, $avis)
    {
        $req = " UPDATE `profile_cv` SET avis = " . $avis . " where id =" . $id;
        $this->dao->executeQuery($req);
    }
    public function get_profile($id)
    {
        $req = "SELECT * FROM `profile_cv` where id=" . $id;
        $res = $this->dao->executeSelect($req);
        return $res;
    }
    public function get_interviewer($id)
    {
        $req = "SELECT * FROM `interviewer` where id=" . $id;
        $res = $this->dao->executeSelect($req);
        return $res;
    }
    public function get_offres()
    {
        $tri = " order BY id DESC";
        $params = " where archieve = 0 ";


        $req = "SELECT * FROM `offre` " . $params . $tri;
        $res = $this->dao->executeSelect($req);
        return $res;
    }
    public function    get_offre_by_id($id)
    {
        $tri = " order BY id DESC";
        $params = " where archieve = 0 AND id = " . $id;


        $req = "SELECT * FROM `offre` " . $params . $tri;
        $res = $this->dao->executeSelect($req);
        return $res;
    }
    public function search_profiles($keyword, $type, $category)
    {
        $tri = " order BY id DESC";
        if ($category != -1) {
            $params = ' where intern_or_job = ' . $type . " AND avis=" . $category;
        } else {
            $params = ' where intern_or_job = ' . $type;
        }

        $params .= "  AND first_name LIKE '%" . $keyword . "%'  OR last_name LIKE '%" . $keyword . "%'  ";

        $req = "SELECT * FROM `profile_cv` " . $params . $tri;
        $res = $this->dao->executeSelect($req);
        return $res;
    }
    public function get_profiles($type, $category)
    {
        $tri = " order BY id DESC";
        if ($category != -1) {
            $params = ' where intern_or_job = ' . $type . " AND avis=" . $category;
        } else {
            $params = ' where intern_or_job = ' . $type;
        }


        $req = "SELECT * FROM `profile_cv` " . $params . $tri;
        $res = $this->dao->executeSelect($req);
        return $res;
    }

    public function apply_for_internship($fname, $lname, $num, $email, $cv_path, $comment)
    {
        $req = "INSERT INTO `profile_cv`( `first_name`, `last_name`, `num`, `email`, `cv_path`, `comment`, `date_apply`, `intern_or_job`, `avis`) VALUES('" . $fname . "','" . $lname . "','" . $num . "','" . $email . "','" . $cv_path . "','" . $comment . "','" . date('Y-m-d') . "',0,0)";
        $this->dao->executeQuery($req);
    }
    public function apply_for_job($fname, $lname, $num, $email, $cv_path, $comment)
    {
        $req = "INSERT INTO `profile_cv`( `first_name`, `last_name`, `num`, `email`, `cv_path`, `comment`, `date_apply`, `intern_or_job`, `avis`) VALUES('" . $fname . "','" . $lname . "','" . $num . "','" . $email . "','" . $cv_path . "','" . $comment . "','" . date('Y-m-d') . "',1,0)";
        $this->dao->executeQuery($req);
    }

    public function add_offre($title, $docPath, $comment)
    {
        $this->start_session();
        $req = "INSERT INTO `offre`( `id_user`, `title`, `description`, `date_creation`, `document_path`,`archieve`) VALUES (" . $_SESSION["user_id"] . ",'" . $title . "','" . $comment . "','" . date('Y-m-d') . "','" . $docPath . "',0)";
        $this->dao->executeQuery($req);
    }
    public function modify_offre($id, $title, $docPath, $comment)
    {
        $this->start_session();
        $req = "UPDATE `offre` set `id_user` = " . $_SESSION["user_id"] . ", `title` = '" . $title . "', `description` = '" . $comment . "', `date_creation` = '" . date('Y-m-d') . "', `document_path` = '" . $docPath . "' WHERE id =  " . $id;
        $this->dao->executeQuery($req);
    }

    public function archieve_offre($id)
    {
        $this->start_session();
        if (isset($_SESSION["user_id"])) {
            $req = "UPDATE `offre` SET archieve = 1 where id = " . $id;
            $this->dao->executeQuery($req);
        }
    }
}
