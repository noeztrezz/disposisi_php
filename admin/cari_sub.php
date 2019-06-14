<?php
    include "conn.php";
   
    $sel_prov="select * from sub_bidang where id_bidang='".$_POST["prov"]."'";
    $q = $conn->query($sel_prov);
    while ($data_prov = $q->fetch_array()){   
   
    ?>
        <option value="<?php echo $data_prov['id_sub'] ?>"><?php echo $data_prov["nama_sub"] ?></option><br>
   
    <?php
    }
    ?>