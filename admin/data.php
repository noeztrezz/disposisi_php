<?php
require_once("mysqlminang.php");
$p=new Mysqlminang("disposisi","localhost","root","");
$sql="Select * from agenda";
$data=array();
foreach($p->GetAllRows($sql) as $row)
{
 $data[]=array(
    'title'=>$row->judul,
    'start'=>$row->mulai,
    'end'=>$row->selesai,
    );
}
 echo json_encode($data);
?>