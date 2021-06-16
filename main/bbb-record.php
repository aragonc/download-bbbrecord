<?php

require_once 'main/db.php';
class videoRecord{
    // colocamos todas las funciones

    public static function getUrl($url){
       $text = "https://cloud.playschool.edu.pe/playback/presentation/2.0/playback.html?meetingId=".$url;
       return $text;
    }

    public function getListVideoNotProcess(){
        //traer todos los videos no procesados  status1
        //devuelve un array
        //url-meeting
        $db = new db();
        $result = $db->query('SELECT * FROM video where status=?',[1])->fetchAll();
        
        foreach($result as $row){
            $list[] = [
            'id' =>$row['id'],
            'id_meeting' =>$row['id_meeting'],
            'id_category' =>$row['id_category'],
            'name' =>$row['name'],
            'minutes' =>$row['minutes'],
            'seconds' =>$row['seconds'],
            'date_meeting' =>$row['date_meeting'],
            'status' =>$row['status'],
            'url'=>self::getUrl($row['id_meeting'])
            ];
        }
        return $list;
    }

    public function getListVideoProcess(){
        //traer todos los videos procesados status2
        //devuelve un array
        //url-meeting
        $db = new db();
        $result = $db->query('SELECT * FROM video where status=?',[2])->fetchAll();
       
        foreach($result as $row){
            $list[] = [
            'id' =>$row['id'],
            'id_meeting' =>$row['id_meeting'],
            'id_category' =>$row['id_category'],
            'name' =>$row['name'],
            'minutes' =>$row['minutes'],
            'seconds' =>$row['seconds'],
            'date_meeting' =>$row['date_meeting'],
            'status' =>$row['status'],
            'url'=>self::getUrl($row['id_meeting'])
            ];
        }
        return $list;
    }






}

?>