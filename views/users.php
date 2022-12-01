<h3>User List:</h3>
<p>
    Info zur User Liste...
</p>

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
    HTML;

    echo <<<HTML
    <div id="detailsContainer">
    </div>
    HTML;
}

?>

<hr/>