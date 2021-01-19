<?php
include_once '../action/BusinessFactory.php';

$row = '';

$res = $service->get_offres();
for ($i = 0; $i < count($res); $i++) {
    $user = $service->get_interviewer($res[$i]["id_user"]);
    $row .=  ' <tr>
                            <td>' . $res[$i]["id"] . '</td>
                            <td>' . $user[0]["complete_name"]  . '</td>
                            <td>' . $res[$i]["title"] . '</td>
                            <td>' . $res[$i]["description"] . '</td>
                            <td>' . $res[$i]["date_creation"] . '</td>';
    if ('no_file' == $res[$i]["document_path"]) {
        $row .= ' <td>No files</td>
                            ';
    } else {
        $row .= '<td><a  target="_blank" rel="noopener noreferrer" href="' . "./action/uploads/offre_upploads/" . $res[$i]["document_path"] . '">download</a></td>
                            ';
    }




    $row .= '
                            
                            <td class="td-actions">
                                <button class="btn btn-success" onclick="modifyOffre(' . $res[$i]["id"] . ')"> modify </button>
                                <button class="btn btn-danger" onclick="archive_offre(' . $res[$i]["id"] . ')"> Archive</button>

                            </td>
                        </tr>';
}
echo $row;
