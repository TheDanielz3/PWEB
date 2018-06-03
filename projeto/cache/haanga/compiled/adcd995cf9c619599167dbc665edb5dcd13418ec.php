<?php
$HAANGA_VERSION  = '1.0.7';
/* Generated from E:\wamp64\www\weblogicmvc\wlstudio\view\layout\layout.haanga */
function haanga_adcd995cf9c619599167dbc665edb5dcd13418ec($vars158f2e70d449c4, $return=FALSE, $blocks=array())
{
    extract($vars158f2e70d449c4);
    if ($return == TRUE) {
        ob_start();
    }
    echo '
<html>
<head>
    <title>'.htmlspecialchars($title).'</title>
</head>
<body>
<h2>An example with '.htmlspecialchars(ucwords(strtolower($title))).'</h2>
<b>Table with '.htmlspecialchars($number).' rows</b>
';
    $buffer1  = '';
    echo (isset($blocks['table']) ? (strpos($blocks['table'], '{{block.1b3231655cebb7a1f783eddf27d254ca}}') === FALSE ? $blocks['table'] : str_replace('{{block.1b3231655cebb7a1f783eddf27d254ca}}', $buffer1, $blocks['table'])) : $buffer1).'
</body>
</html>';
    if ($return == TRUE) {
        return ob_get_clean();
    }
}