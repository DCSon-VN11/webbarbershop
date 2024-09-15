<?php
    include_once('control.php');
    $get=new data();
if(isset($_GET['nv']))
{
    $id=$_GET['nv'];
    $se=$get->se_tk_nv_id($id);
    foreach($se as $r)
    unlink("../assets/images/nhanvien/".$r['anhtaikhoan']);
    $del=$get->del_tk_nv($id);
}
if(isset($_GET['kh'])){
    $id=$_GET['kh'];
    $del=$get->del_kh($id);
}
if(isset($_GET['ch'])){
    $id=$_GET['ch'];
    $del=$get->del_ch($id);
}
if(isset($_GET['dv'])){
    $id=$_GET['dv'];
    $se=$get->se_dv_id($id);
    foreach($se as $r)
    unlink("../assets/images/dichvu/".$r['anhdichvu']);
    $seha=$get->se_ha_iddv($id);
    foreach($seha as $r){
        unlink("../assets/images/dichvu/".$r['hinhanh']);
    }
    $delha=$get->del_ha($id);
    $del=$get->del_dv($id);
}
if(isset($_GET['dm'])){
    $id=$_GET['dm'];
    $del=$get->del_dm($id);
}
if ($del) echo "<script>alert('Thành công')</script>";
else echo "<script>alert('Không thành công')</script>";
if(isset($_GET['nv'])) echo "<script>window.location='../nhanvien.php';</script>";
if(isset($_GET['ch'])) echo "<script>window.location='../cuahang.php';</script>";
if(isset($_GET['dv'])) echo "<script>window.location='../dichvu.php';</script>";
if(isset($_GET['dm'])) echo "<script>window.location='themdichvu.php';</script>";
if(isset($_GET['kh'])) echo "<script>window.location='../khachhang.php';</script>";
?>