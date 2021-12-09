<?php
/*connexion a la base*/

function connectionbdd()
{
    $connect = mysqli_connect("localhost:3306", "yoni", "Marseille,13", "yonathan-darmon_reservationsalles"); /*connexion a la base*/
    return $connect;
}

connectionbdd();
/*selection de tout les utilisateur de la base*/
function requestall()
{
    $req = mysqli_query(connectionbdd(), "SELECT* FROM utilisateurs");
    return $req;
}

/*resultat de la requete d avant*/
function result()
{
    $res = mysqli_fetch_all(requestall(), MYSQLI_ASSOC);
    return $res;
}

result();
/*verification si le login est dans la base de données */
function isLoginInDatabase()
{
    foreach (result() as $key => $value) {
        if ($_POST['login'] === $value['login']) {
            return true;
        }
    }
    return false;
}

function timestampToDateSQL($timestamp)
{
    $date = new DateTime();
    $date->setTimestamp($timestamp);
    return $date->format('Y-m-d H:i:s');
}
