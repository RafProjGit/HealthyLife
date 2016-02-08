    <?php

class MenuManager
{

    /**
     * Cerca nel database tutti i menu di un paziente con una certa email
     * @param $email
     * @return array
     */
    public function getMenuByPaziente($email){

        $sqlQuery = "SELECT * FROM menu WHERE emailPaziente='" .$email."'";

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        $menu = array();
        $i=0;
        if (!$result) echo mysqli_error($db);

        while($riga = mysqli_fetch_assoc($result)) {
            $idMenu = $riga['idMenu'];
            $emailPaziente = $riga['emailPaziente'];
            $giornoDellaSettimana = $riga['giornoDellaSettimana'];
            $colazione = $riga['colazione'];
            $spuntinoMattutino = $riga['spuntinoMattutino'];
            $pranzo = $riga['pranzo'];
            $spuntinoPomeridiano = $riga['spuntinoPomeridiano'];
            $cena = $riga['cena'];

            $men = new Menu($idMenu, $emailPaziente, $giornoDellaSettimana, $colazione, $spuntinoMattutino, $pranzo, $spuntinoPomeridiano, $cena);
            $menu[$i]=$men;
            $i++;
        }
        mysqli_close($db);
        return $menu;
    }

    /**
     * Crea sette menu (uno per giorno della settimana) a un paziente con una certa email
     * @param $paziente
     * @return bool
     */
    public function creaMenu($paziente){

        $sqlQuery = "INSERT INTO menu(idMenu, emailPaziente, giornoDellaSettimana)
            VALUES ('".uniqid()."','".$paziente."','Lunedi'),
            ('".uniqid()."','".$paziente."','Martedi'),
            ('".uniqid()."','".$paziente."','Mercoledi'),
            ('".uniqid()."','".$paziente."','Giovedi'),
            ('".uniqid()."','".$paziente."','Venerdi'),
            ('".uniqid()."','".$paziente."','Sabato'),
            ('".uniqid()."','".$paziente."','Domenica')";

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        mysqli_query($db,$sqlQuery);
        echo mysqli_affected_rows($db);
        if(mysqli_affected_rows($db)==7){
            mysqli_close($db);
            return true;
        }else{
            echo mysqli_error($db);
        }

        mysqli_close($db);
        return false;
    }

    public function modificaMenu($fieldName, $val, $menuId){
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $val = strip_tags(trim(mysqli_real_escape_string($db, $val)));
        $sqlQuery = "UPDATE menu SET $fieldName = '$val' WHERE idMenu = '$menuId'";
        //echo $sqlQuery;



        mysqli_query($db,$sqlQuery);
        if(mysqli_affected_rows($db)==1){
            mysqli_close($db);
            return true;
        }else{
            echo mysqli_error($db);
        }

        mysqli_close($db);
        return false;
    }
}
