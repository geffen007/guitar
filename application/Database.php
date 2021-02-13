<?php

class Database {

    public $mysqli;
    protected $showerror = TRUE;
    protected $showsql = TRUE;

    //costruttore della classe
    public function __construct($host, $user, $password, $dbname, $port = "") {
        if ($port == "")
            $this->mysqli = new mysqli($host, $user, $password, $dbname);
        else
            $this->mysqli = new mysqli($host, $user, $password, $dbname, $port);
        $this->mysqli->set_charset("utf8");
        //Verifico se la connessione funziona
        if (mysqli_connect_errno()) {
            $this->mysqli = FALSE;
            exit();
        }
    }



    public function real_escape_string($value) {
        return $this->mysqli->real_escape_string($value);
    }



    //Esegue la SELECT e restituiisce l'array di oggetti che rappresentano il db
    public function GetQuery($sql) {
        if ($result = $this->mysqli->query($sql)) {
            if ($result->num_rows) {
                while ($row = $result->fetch_object())
                    $result_array[] = $row;
                return $result_array;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    //Esegue la SELECT e restituisce la singola row
    public function GetSingleRow($sql) {
        if ($result = $this->mysqli->query($sql)) {
            if ($row = $result->fetch_array()) {
                $result->close();
                return $row;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    //Esegue la SELECT e restituisce il singolo valore
    //Nota: in caso di errore il valore restituito è -1 (non 0)
    public function GetSingleValue($sql) {

        //echo $sql."<br>";
        if ($result = $this->mysqli->query($sql)) {
            if ($row = $result->fetch_array()) {
                $result->close();
                return $row[0];
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }

    public function RawQuery($stringaSql) {
        $ret = $this->mysqli->query($stringaSql);
        if ($ret) {
            return $ret;
        } else {
            return false;
        }
    }


    public function FetchObject($result) {
        return $result->fetch_object();
    }

    //Esegue un comando sql che non ritorna risultati(INSERT, DELETE, UPDATE)
    public function RunQuery($sql) {
        //echo $sql."<br>";
        if ($this->mysqli->real_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function GetLastError() {
        return $this->mysqli->error;
    }

    //Restituisce insert_id
    public function GetInsertId() {
        return $this->mysqli->insert_id;
    }

    //Gestisce la stampa della query
    private function printsql($sql) {
        if ($this->showsql)
            echo htmlspecialchars($sql);
    }

    //Gestisce la stampa del messaggio di errore
    private function printerror($txt) {
        if ($this->showerror)
            echo htmlspecialchars($txt);
    }

    public function NumRows($rs) {
        return mysqli_num_rows($rs);
    }

}

?>
