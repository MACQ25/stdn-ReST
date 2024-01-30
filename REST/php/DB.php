<?PHP

    function dbAccess(){
        $dbh = null;
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=REST","root","");
        } catch (Exception $e) {
            echo "Error: Could not connect. {$e->getMessage()}";
            exit(-1);
        }
        return $dbh;
    }

?>