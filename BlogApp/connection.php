<?php
class database{
    private $host;
    private $username;
    private $password;
    private $dbname;

    protected function connect(){
        $this->host='localhost';
        $this->username='root';
		$this->password='';
		$this->dbname='blog_app';

        $con = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        return $con;
    }
}

class query extends database{

    //Function for retrieving data
    public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='',$limit='') {
        $sql = "SELECT $field from $table ";
        if ($condition_arr!='') {
            $sql.=' WHERE ';
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {  /////
                if ($i==$c) {
                    $sql.="$key='$val'";
                } else {
                    $sql.="$key='$val' and ";
                }
                $i++;
            }
        }

        if ($order_by_field!='') {
            $sql.= " order by $order_by_field $order_by_type ";
        }

        if ($limit!='') {
            $sql.=" limit $limit ";
        }

        $result = $this->connect()->query($sql);
        if ($result->num_rows>0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return 0;
        }
    }

    //Function for inserting data
    public function insertData($table,$condition_arr) {
        if ($condition_arr!='') {
            foreach ($condition_arr as $key => $val) {
                $fieldArr[] = $key;
                $valueArr[] = $val;
            }
            $field = implode(",",$fieldArr);
            $value = implode("','",$valueArr);
            $value = "'".$value."'";
            $sql = "INSERT INTO $table($field) VALUES ($value) ";
            $result = $this->connect()->query($sql);
        }
    }

    //Function for deleting data
    public function deleteData($table,$condition_arr){
        if ($condition_arr!='') {
            $sql = "DELETE FROM $table WHERE ";
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($i == $c) {
                    $sql.="$key='$val'";
                } else {
                    $sql.="$key='$val' and "; 
                }
                $i++;
            }
            $result = $this->connect()->query($sql);
        }
    }

    //Function for updating data
    public function updateData($table,$condition_arr,$where_field,$where_value){
        if ($condition_arr!='') {
            $sql = "UPDATE $table SET ";
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($i == $c) {
                    $sql.="$key='$val'";
                } else {
                    $sql.="$key='$val', ";
                }
                $i++;
            }
            $sql.=" WHERE $where_field='$where_value' ";
            $result = $this->connect()->query($sql);
        }
    }

    public function get_safe_str($str){
        if ($str!='') {
            return mysqli_real_escape_string($this->connect(),$str);
        }
    }
}   
?>