<?php
    require_once("../../connect/connection.php");
    if(isset($_POST['id_pro'])){
        $id_pro=$_POST['id_pro'];
        $id_user=$_POST['id_user'];
        $stid_cn=oci_parse($conn, "SELECT * FROM CHUCNANG WHERE ID_CT=".$id_pro." ORDER BY ID_CN ASC");
        oci_execute($stid_cn);
        while($row_cn=oci_fetch_array($stid_cn, OCI_ASSOC + OCI_RETURN_NULLS)){
            $view=1;
            $edit=1;
            $delete=1;
            $stid_nhom=oci_parse($conn, "SELECT * FROM NHOM_NV WHERE ID_NV=".$id_user." ORDER BY ID_NHOM ASC");
            oci_execute($stid_nhom);
            while($row_nhom=oci_fetch_array($stid_nhom, OCI_ASSOC+OCI_RETURN_NULLS)){
                $stid_quyen_nhom=oci_parse($conn, "SELECT * FROM PHANQUYEN_NHOM WHERE ID_NHOM=".$row_nhom['ID_NHOM']." 
                                                                            AND ID_CN=".$row_cn['ID_CN']."");
                oci_execute($stid_quyen_nhom);
                while($row_quyen_nhom=oci_fetch_array($stid_quyen_nhom, OCI_ASSOC+OCI_RETURN_NULLS)){
                    while($row_quyen_nhom['KHONGXEM']==1){
                        $view=0;
                        break;
                    }
                    while($row_quyen_nhom['KHONGSUA']==1){
                        $edit=0;
                        break;
                    }
                    while($row_quyen_nhom['KHONGXOA']==1){
                        $delete=0;
                        break;
                    }
                }
            }

            $stid_cd=oci_parse($conn, "SELECT * FROM NV_CD WHERE ID_NV=".$id_user." ORDER BY ID_CD ASC");
            oci_execute($stid_cd);
            while($row_cd=oci_fetch_array($stid_cd, OCI_ASSOC+OCI_RETURN_NULLS)){
                $stid_quyen_cd=oci_parse($conn, "SELECT * FROM PHANQUYEN_NV WHERE ID_CD=".$row_cd['ID_CD']." 
                                                                            AND ID_CN=".$row_cn['ID_CN']."");
                oci_execute($stid_quyen_cd);
                while($row_quyen_cd=oci_fetch_array($stid_quyen_cd, OCI_ASSOC+OCI_RETURN_NULLS)){
                    while($row_quyen_cd['KHONGXEM']==1){
                        $view=0;
                        break;
                    }
                    while($row_quyen_cd['KHONGSUA']==1){
                        $edit=0;
                        break;
                    }
                    while($row_quyen_cd['KHONGXOA']==1){
                        $delete=0;
                        break;
                    }
                }
            }

            echo '
                <tr class="row">
                    <td>'.$row_cn["ID_CN"].'</td>
                    <td>'.$row_cn["TENCN"].'</td>
                ';
            if($view==0 && $edit==0 && $delete==0){
                echo '<td><i>Kh??ng cho ph??p truy c???p<i></td>';
            }
            else {
                if($row_cn["LINK"]==''){
                    echo '<td><i>Kh??ng c??<i></td>';
                }
                else{
                    echo '<td><a href="'.$row_cn["LINK"].'" target="_blank">'.$row_cn["LINK"].'</a></td>';
                }
            }
            if($view==1){
                echo '<td style="text-align: center;"><ti class="ti-check"></ti></td>';
            }
            else {
                echo '<td></td>';
            }
            if($edit==1){
                echo '<td style="text-align: center;"><ti class="ti-check"></ti></td>';
            }
            else {
                echo '<td></td>';
            }
            if($delete==1){
                echo '<td style="text-align: center;"><ti class="ti-check"></ti></td>';
            }
            else {
                echo '<td></td>';
            }
            // Ch???n
            if($view==1){
                echo '<td></td>';
            }
            else {
                echo '<td style="text-align: center;"><ti class="ti-close"></ti></td>';
            }
            if($edit==1){
                echo '<td></td>';
            }
            else {
                echo '<td style="text-align: center;"><ti class="ti-close"></ti></td>';
            }
            if($delete==1){
                echo '<td></td>';
            }
            else {
                echo '<td style="text-align: center;"><ti class="ti-close"></ti></td>';
            }
            echo '
                </tr>
            ';
        }
    }
// Hi???n quy???n c???a ch???c n??ng ???????c ch???n
    if(isset($_POST['id_func'])){
        $id_func=$_POST['id_func'];
        $id_user=$_POST['id_user'];
        $stid_cn=oci_parse($conn, "SELECT * FROM CHUCNANG WHERE ID_CN=".$id_func." ORDER BY ID_CN ASC");
        oci_execute($stid_cn);
        while($row_cn=oci_fetch_array($stid_cn, OCI_ASSOC + OCI_RETURN_NULLS)){
            $view=1;
            $edit=1;
            $delete=1;
            $stid_nhom=oci_parse($conn, "SELECT * FROM NHOM_NV WHERE ID_NV=".$id_user." ORDER BY ID_NHOM ASC");
            oci_execute($stid_nhom);
            while($row_nhom=oci_fetch_array($stid_nhom, OCI_ASSOC+OCI_RETURN_NULLS)){
                $stid_quyen_nhom=oci_parse($conn, "SELECT * FROM PHANQUYEN_NHOM WHERE ID_NHOM=".$row_nhom['ID_NHOM']." 
                                                                            AND ID_CN=".$row_cn['ID_CN']."");
                oci_execute($stid_quyen_nhom);
                while($row_quyen_nhom=oci_fetch_array($stid_quyen_nhom, OCI_ASSOC+OCI_RETURN_NULLS)){
                    while($row_quyen_nhom['KHONGXEM']==1){
                        $view=0;
                        break;
                    }
                    while($row_quyen_nhom['KHONGSUA']==1){
                        $edit=0;
                        break;
                    }
                    while($row_quyen_nhom['KHONGXOA']==1){
                        $delete=0;
                        break;
                    }
                }
            }

            $stid_cd=oci_parse($conn, "SELECT * FROM NV_CD WHERE ID_NV=".$id_user." ORDER BY ID_CD ASC");
            oci_execute($stid_cd);
            while($row_cd=oci_fetch_array($stid_cd, OCI_ASSOC+OCI_RETURN_NULLS)){
                $stid_quyen_cd=oci_parse($conn, "SELECT * FROM PHANQUYEN_NV WHERE ID_CD=".$row_cd['ID_CD']." 
                                                                            AND ID_CN=".$row_cn['ID_CN']."");
                oci_execute($stid_quyen_cd);
                while($row_quyen_cd=oci_fetch_array($stid_quyen_cd, OCI_ASSOC+OCI_RETURN_NULLS)){
                    while($row_quyen_cd['KHONGXEM']==1){
                        $view=0;
                        break;
                    }
                    while($row_quyen_cd['KHONGSUA']==1){
                        $edit=0;
                        break;
                    }
                    while($row_quyen_cd['KHONGXOA']==1){
                        $delete=0;
                        break;
                    }
                }
            }

            echo '
                <tr class="row">
                    <td>'.$row_cn["ID_CN"].'</td>
                    <td>'.$row_cn["TENCN"].'</td>
                ';
            if($view==0 && $edit==0 && $delete==0){
                echo '<td><i>Kh??ng cho ph??p truy c???p<i></td>';
            }
            else {
                if($row_cn["LINK"]==''){
                    echo '<td><i>Kh??ng c??<i></td>';
                }
                else{
                    echo '<td><a href="'.$row_cn["LINK"].'" target="_blank">'.$row_cn["LINK"].'</a></td>';
                }
            }
            if($view==1){
                echo '<td style="text-align: center;"><ti class="ti-check"></ti></td>';
            }
            else {
                echo '<td></td>';
            }
            if($edit==1){
                echo '<td style="text-align: center;"><ti class="ti-check"></ti></td>';
            }
            else {
                echo '<td></td>';
            }
            if($delete==1){
                echo '<td style="text-align: center;"><ti class="ti-check"></ti></td>';
            }
            else {
                echo '<td></td>';
            }
            // Ch???n
            if($view==1){
                echo '<td></td>';
            }
            else {
                echo '<td style="text-align: center;"><ti class="ti-close"></ti></td>';
            }
            if($edit==1){
                echo '<td></td>';
            }
            else {
                echo '<td style="text-align: center;"><ti class="ti-close"></ti></td>';
            }
            if($delete==1){
                echo '<td></td>';
            }
            else {
                echo '<td style="text-align: center;"><ti class="ti-close"></ti></td>';
            }
            echo '
                </tr>
            ';
        }
    }

    if(isset($_POST['id_pro_info'])){
        $id=$_POST['id_pro_info'];
        $stid=oci_parse($conn, 'SELECT * FROM CHUONGTRINH WHERE ID_CT='.$id.'');
        oci_execute($stid);
        while($row=oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
            $a=date_create($row["THOIGIANBATDAU"]);
            date_format($a,'d-M-y');
            $date=$a->format("Y-m-d");
            echo '
                <div class="div-flex">
                    <div class="div-width">
                        <label class="div-grid">T??n Ch????ng tr??nh:</label>
                        <textarea cols="1" rows="1" class="content" readonly>'.$row["TENCT"].'</textarea>
                    </div>
                    <div class="div-width-margin">
                        <label class="div-grid">Th???i gian th???c hi???n:</label>
                        <input type="text" class="content" value="'.$date.'" readonly>
                    </div>
                    <div class="div-width-margin">
                        <label class="div-grid">Ng?????i th???c hi???n:</label>
                        <input type="text" class="content" readonly value="'.$row["NGUOITHUCHIEN"].'">
                    </div>
                    <div class="div-width-margin">
                        <label class="div-grid">Link:</label>
                        <a href="'.$row["LINK"].'" target="_blank">'.$row["LINK"].'</a>
                    </div>
                </div>
                <div class="div-flex">
                    <div class="div-50">
                        <label class="div-grid">????n v??? th???c hi???n:</label>
                        <textarea cols="1" rows="3" class="content" readonly>'.$row["DVTHUCHIEN"].'</textarea>
                    </div>
                    <div class="div-50-margin">
                        <label class="div-grid">M?? t???</label>
                        <textarea cols="1" rows="3" class="content" readonly>'.$row["MO_TA_CT"].'</textarea>
                    </div>
                </div>
                <div class="div-flex">
                    <div class="div-50">
                        <label class="div-grid">Th??ng tin:</label>
                        <textarea cols="1" rows="4" class="content" readonly>'.$row["THONGTINCT"].'</textarea>
                    </div>
                    <div class="div-50-margin">
                        <label class="div-grid">Ghi ch??:</label>
                        <textarea cols="1" rows="4" class="content" readonly>'.$row["GHICHU"].'</textarea>
                    </div>
                </div>
            ';
        }
    }
?>