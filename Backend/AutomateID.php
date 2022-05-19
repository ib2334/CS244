<?php
    function CalcID($filename, &$id_count){
        $file=fopen($filename, 'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($file)){
            $line=fgets($file);
            $Arrline=explode($seperator,$line);
            $Arrline[0]=$id_count;
            fwrite($file,$Arrline[0]);
            $id_count++;
        }
        return $id_count;
        fclose($file);
    }
    $CoursesID="130";
    //echo intval ($line = fgets(fopen("../Invoices/Courses.txt", 'r'))+1);
    echo intval($CoursesID++);
    //echo var_dump($CoursesID);
    //fclose((fopen("../Invoices/Courses.txt", 'r')));
    //CalcID("../Invoices/Courses.txt", $CoursesID);
    //echo $CoursesID;
?>