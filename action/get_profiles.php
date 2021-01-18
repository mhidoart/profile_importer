<?php
include_once '../action/BusinessFactory.php';

$row = '';
$category = addslashes($_REQUEST["category"]);
$type = addslashes($_REQUEST["type"]);
$res = $service->get_profiles($type, $category);
for ($i = 0; $i < count($res); $i++) {
    $row .=  ' <tr>
                            <td>' . $res[$i]["id"] . '</td>
                            <td>' . $res[$i]["first_name"] . '</td>
                            <td>' . $res[$i]["last_name"] . '</td>
                            <td>' . $res[$i]["email"] . '</td>
                            <td><a  target="_blank" rel="noopener noreferrer" href="' . "./action/uploads/" . $res[$i]["cv_path"] . '">download</a></td>
                            <td>' . $res[$i]["comment"] . '</td>
                            <td>' . $res[$i]["date_apply"] . '</td>';


    if ($res[$i]["avis"] == 0) {
        $row .= '<td class="alert alert-warning"> Pending </td>';
    } else if ($res[$i]["avis"] == 1) {
        $row .= '<td class="alert alert-warning"> Accepted Waiting for interview </td>';
    } else if ($res[$i]["avis"] == 2) {
        $row .= '<td class="alert alert-success"> Accepted </td>';
    } else if ($res[$i]["avis"] == 3) {
        $row .= '<td class="alert alert-danger"> Rejected </td>';
    }
    $row .= '
                            
                            <td class="td-actions">
                                <button class="btn btn-success" onclick="openModal(' . $res[$i]["id"] . ')"> modify </button>

                            </td>
                        </tr>';
}
echo $row;
