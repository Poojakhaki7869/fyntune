<?php

class Common_modal extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function customQuery($query, $arrayValue, $conn = "") {
        if (empty($conn)) {
            $returnData = $this->db->query($query, $arrayValue);
        } else {
            $db = $this->load->database($conn, true);
            $returnData = $db->query($query, $arrayValue);
        }
        return $returnData;
    }

    function insertQuery($tableName, $arrayKeyValue, $conn = "") {
        if (empty($conn)) {
            $this->db->insert($tableName, $arrayKeyValue);
            $last_id = $this->db->insert_id();
        } else {
            $db = $this->load->database($conn, true);
            $db->insert($tableName, $arrayKeyValue);
            $last_id = $db->insert_id();
        }
        return $last_id;
    }

    function updateQuery($tableName, $arrayKeyValue, $clauseKeyValue, $conn = "") {
        if (empty($conn)) {
            $this->db->update($tableName, $arrayKeyValue, $clauseKeyValue);
            $affectedRows = $this->db->affected_rows();
        } else {
            $db = $this->load->database($conn, true);
            $db->update($tableName, $arrayKeyValue, $clauseKeyValue);
            $affectedRows = $db->affected_rows();
        }
        return $affectedRows;
    }
    
    
    function getTotalRowCount($tableName, $conn = "") {
        if (empty($conn)) {
            return $this->db->count_all($tableName);
        } else {
            $db = $this->load->database($conn, true);
            return $db->count_all($tableName);
        }
    }

    function deleteQuery($tableName, $clauseKeyValue, $conn = "") {
        if (empty($conn)) {
            $this->db->delete($tableName, $clauseKeyValue);
            $affectedRows = $this->db->affected_rows();
        } else {
            $db = $this->load->database($conn, true);
            $db->delete($tableName, $clauseKeyValue);
            $affectedRows = $db->affected_rows();
        }
        return $affectedRows;
    }
    
    function multiDeleteQuery($tableName,$columnName, $clauseKeyValue, $conn = "") {
        if (empty($conn)) {
            $this->db->where_in($columnName,$clauseKeyValue);
            $this->db->delete($tableName);
            $affectedRows = $this->db->affected_rows();
        } else {
            $db = $this->load->database($conn, true);
            $db->where_in($columnName,$clauseKeyValue);
            $db->delete($tableName);
            $affectedRows = $db->affected_rows();
        }
        return $affectedRows;
    }

    function batchInsert($tableName, $arrayKeyValue, $conn = "") {
        if (empty($conn)) {
            $successFlag = ($this->db->insert_batch($tableName, $arrayKeyValue)) ? true : false;
        } else {
            $db = $this->load->database($conn, true);
            $successFlag = ($db->insert_batch($tableName, $arrayKeyValue)) ? true : false;
        }
        return $successFlag;
    }
   
    
   
    

}
