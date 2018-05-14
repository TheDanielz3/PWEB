<?php
$HAANGA_VERSION  = '1.0.7';
/* Generated from E:\wamp64\www\weblogicmvc\wlstudio\view\home\index.haanga */
function haanga_57c18ca5a677da3138bf41097c9f1fea7e6f7134($vars158f2e70d449c4, $return=FALSE, $blocks=array())
{
    extract($vars158f2e70d449c4);
    if ($return == TRUE) {
        ob_start();
    }
    $buffer1  = '
    <table>
        ';
    foreach ($table as  $row) {
        $buffer1 .= '
            <tr bgcolor="';
        if (isset($def_cycle_0) == FALSE) {
            $def_cycle_0  = Array('#aaaaaa', '#ffffff');
        }
        $index_0  = (isset($index_0) == FALSE ? 0 : (($index_0 + 1) % count($def_cycle_0)));
        $buffer1 .= $def_cycle_0[$index_0].'">
                <td>'.htmlspecialchars($row['id']).'</td>
                <td>'.htmlspecialchars($row['name']).'</td>
            </tr>
        ';
    }
    $buffer1 .= '
    </table>
';
    $blocks['table']  = (isset($blocks['table']) ? (strpos($blocks['table'], '{{block.1b3231655cebb7a1f783eddf27d254ca}}') === FALSE ? $blocks['table'] : str_replace('{{block.1b3231655cebb7a1f783eddf27d254ca}}', $buffer1, $blocks['table'])) : $buffer1);
    echo Haanga::Load('layout/layout.haanga', $vars158f2e70d449c4, TRUE, $blocks);
    if ($return == TRUE) {
        return ob_get_clean();
    }
}