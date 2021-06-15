<?php

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
        include("db.php");
        $sql = "SELECT * FROM video where status=1";
        $result = mysqli_query($conn, $sql);
       
        while($row = mysqli_fetch_array($result)){
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
        include("db.php");
        $sql = "SELECT * FROM video where status=2";
        $result = mysqli_query($conn, $sql);
       
        while($row = mysqli_fetch_array($result)){
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