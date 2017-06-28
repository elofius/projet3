<?php
class Back
{
    static function intro($bdd)
    {
    $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
    foreach($dbh->query('SELECT * from intro WHERE id=2') as $row) {
        $contenu = utf8_encode($row[1]);
        $dbh = NULL;
        return $contenu;
    }
    }
}
