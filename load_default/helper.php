<?php
function env($name)
{
    return $_ENV[$name];
}

function renderError()
{
    echo 'Params is empty or invalid!';
    die();
}

function renderUserInfo($id, $email, $name, $isToken = false, $link = false, $picture = false)
{
    echo '<b>Logged in as:</b> ' . $name;
    echo "<br/>";
    echo '<b>ID: </b>' . $id;
    echo "<br/>";
    echo '<b>Email: </b>' . $email;
    echo "<br/>";
    if ($link) {
        echo '<b>Link: </b>' . $link;
        echo "<br/>";
    }
    if ($picture) {
        echo '<b>Picture: </b>' . $picture;
        echo "<br/>";
    }
    echo '<b>HasToken: </b>' . ((string)$isToken);
}
