<?php
class DB {
    // Database configuration
    private $dbHost     = 'localhost';
    private $dbUsername = 'user';
    private $dbPassword = 'pass';
    private $dbName     = 'db';
    private $tblName    = 'table';
    



// INIT DB

// CREATE TABLE `videos` (
//     `id` int(11) NOT NULL,
//     `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
//     `description` text COLLATE utf8_unicode_ci NOT NULL,
//     `privacy` enum('public','private') COLLATE utf8_unicode_ci NOT NULL,
//     `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
//     `youtube_video_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
//     `dailymotion_video_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






    function __construct(){
        // Connect database
        if(!isset($this->db)){
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function getRow($id = ''){
        $con = !empty($id)?" WHERE id = $id ":" ORDER BY id DESC LIMIT 1 ";
        $sql = "SELECT * FROM $this->tblName $con";
        $query = $this->db->query($sql);
        $result = $query->fetch_assoc();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    
    function insert($data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$this->db->real_escape_string($val)."'";
                $i++;
            }
            $query = "INSERT INTO ".$this->tblName." (".$columns.") VALUES (".$values.")";
            $insert = $this->db->query($query);
            return $insert?$this->db->insert_id:false;
        }
    }
    
    function update($id, $youtube_video_id, $dailymotion_video_id){
        $sql = "UPDATE  $this->tblName SET `youtube_video_id` = '".$youtube_video_id."', `dailymotion_video_id` = '".$dailymotion_video_id."' WHERE id = ".$id;
        $update = $this->db->query($sql);
        return $update?true:false;
    }
}