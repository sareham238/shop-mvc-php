<?php

class Database extends PDO {

    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        global $db;
        $pdo = parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    /**
     * SELECT
     *
     * @param string $SQL
     * @param array $array
     * @param const $fetch_style
     * @return integer
     */
    public function select($SQL, $array = array(), $fetch_style = PDO::FETCH_ASSOC, $fetch_kind = 'fetchAll') {
        $query = $this->prepare($SQL);

        foreach ($array as $key => $value) {

            $query->bindvalue(":$key", $value);
        }

        $query->execute();

        return $query->$fetch_kind($fetch_style);
    }

    /**
     * INSERT
     *
     * @param string $table for insert
     * @param array $data data for bindvalue
     * @return integer
     */
    public function insert($table, $data) {
        ksort($data);
        $fieldkey = implode(', ', array_keys($data));
        $fieldvalue = ':' . implode(', :', array_keys($data));

        $query = $this->prepare("INSERT INTO $table ($fieldkey) VALUES ($fieldvalue)");

        foreach ($data as $key => $value) {

            $query->bindvalue(":$key", $value);
        }

         return $query->execute();

    }

    public function insertid($table, $data) {
        ksort($data);
        $fieldkey = implode(', ', array_keys($data));
        $fieldvalue = ':' . implode(', :', array_keys($data));
        $query = $this->prepare("INSERT INTO $table ($fieldkey) VALUES ($fieldvalue)");

        foreach ($data as $key => $value) {

            $query->bindvalue(":$key", $value);
        }

        $query->execute();
        $id = $this->lastInsertId();
        return $id;
    }

    /**
     * UPDATE
     *
     * @param string $table
     * @param array $data
     * @param string $where
     * @return integer
     */
    public function update($table, $data, $where) {
        ksort($data);
        $fieldDetails = "";
        foreach ($data as $key => $value) {
            $fieldDetails.=" `$key`=:$key ,";
        }
        $fieldDetails = rtrim($fieldDetails, ' ,');



        $query = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {

            $query->bindvalue(":$key", $value);
        }

        return $query->execute();
    }

    public function delete($table, $where) {

        $query = $this->prepare("DELETE FROM $table WHERE $where");
        return $query->execute();
    }

}
