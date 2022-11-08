<h3>Benutzer:</h3>
<p>Liste aller Benutzer...</p>

<?php

if (isset($GLOBALS['result']))
{
    echo <<<HTML

    <ul>
    HTML;

    foreach ($GLOBALS['result'] as $user)
    {
        echo('<li><a href="#" onclick=getDetails(\'' . $user->guid . '\');>' . $user->username . '</a></li>');
    }

    echo <<<HTML

    </ul>
    <div id="detailsContainer">
    </div>

    HTML;
}

?>