<?php
/*connexion a la base*/
function sessionDestroy(){
    if (isset($_POST['deco'])) {
        header("location:../index.php");
        session_destroy();
    }
}
function connectiondd()
{
    $connect = mysqli_connect("localhost", "root", "", "reservationsalles");
    return $connect;
}

connectiondd();
/*selection de tout les utilisateur de la base*/
function requestall()
{
    $req = mysqli_query(connectiondd(), "SELECT* FROM utilisateurs");
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
/*sessions destroy*/
function sessionDestroy(){
    if (isset($_POST['deco'])) {
        header("location:../index.php");
        session_destroy();
    }
}