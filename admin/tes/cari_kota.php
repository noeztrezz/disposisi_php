<?php
    include "conn.php";
   
    $sel_prov="select * from kota where id_prov='".$_POST["prov"]."'";
    $q = $conn->query($sel_prov);
    while ($data_prov = $q->fetch_array()){   
   
    ?>
        <option value="<?php echo $data_prov['id_kota'] ?>"><?php echo $data_prov["nm_kota"] ?></option><br>
   
    <?php
    }
    ?>