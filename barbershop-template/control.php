<?php
include('connect.php');
class data
{
    function login($tendn, $mk)
    {
        global $conn;
        $sql = "select * from taikhoan where taikhoan='$tendn' and matkhau = '$mk' and level=2 and xoa=0";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function dangky($id, $mk, $ten, $sdt, $ngaysinh, $gioitinh, $diachi)
    {
        global $conn;
        $sql = "insert into taikhoan(taikhoan,matkhau,hoten,sdt,ngaysinh,gioitinh,diachi,level) 
            values ('$id','$mk','$ten','$sdt','$ngaysinh','$gioitinh','$diachi','2')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function checktk($tk){
        global $conn;
        $sql = "select * from taikhoan where taikhoan='$tk' and level=2";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function chinhanh(){
        global $conn;
        $sql = "select DISTINCT chinhanh from cuahang ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function diachi($cn){
        global $conn;
        $sql = "select * from cuahang where chinhanh='$cn'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function idch($cn){
        global $conn;
        $sql = "select * from cuahang where diachi='$cn'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function cuahang(){
        global $conn;
        $sql = "select * from cuahang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function cuahangid($id){
        global $conn;
        $sql = "select * from cuahang where ID_CH='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dv()
    {
        global $conn;
        $sql = "select * from dichvu";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dv_id($id)
    {
        global $conn;
        $sql = "select * from dichvu where ID_DV='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function searchdv($id)
    {
        global $conn;
        $sql = "select * from dichvu where dichvu like '%$id%' or chitiet like '%$id%'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function search_dv_lm($id,$start,$end)
    {
        global $conn;
        $sql = "select * from dichvu where dichvu like '%$id%' or chitiet like '%$id%' limit $start,$end";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function rand_dv_lm()
    {
        global $conn;
        $sql = "select * from dichvu order by RAND() limit 8";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dv_lm($start,$end)
    {
        global $conn;
        $sql = "select * from dichvu limit $start,$end";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dm()
    {
        global $conn;
        $sql = "select * from danhmuc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dm_id($dm)
    {
        global $conn;
        $sql = "select * from danhmuc where danhmuc='$dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dm_ten($dm)
    {
        global $conn;
        $sql = "select * from danhmuc where ID_DM='$dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_ha_iddv($dm)
    {
        global $conn;
        $sql = "select * from hinhanh where ID_DV='$dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function datlich($tk, $time, $dv, $ch)
    {
        global $conn;
        $sql = "insert into khodatlich (ID_TK, thoigian, ID_DV, ID_CH, tinhtrang) 
        VALUES ('$tk', '$time', '$dv', '$ch', 0)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dv_ten($dv)
    {
        global $conn;
        $sql = "select * from dichvu where dichvu='$dv'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function searchdm($id)
    {
        global $conn;
        $sql = "select * from dichvu where ID_DM = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function search_dm_lm($id,$start,$end)
    {
        global $conn;
        $sql = "select * from dichvu where ID_DM = '$id' limit $start,$end";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dl($id)
    {
        global $conn;
        $sql = "select * from khodatlich where ID_TK = '$id' order by thoigian DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dl_time($id,$time)
    {
        global $conn;
        $sql = "select * from khodatlich where ID_TK = '$id' and thoigian='$time' and (tinhtrang=0 or tinhtrang=1)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function huydl($id)
    {
        global $conn;
        $sql = "UPDATE khodatlich SET tinhtrang = 2 WHERE ID_KDL = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function dmk($id,$mk)
    {
        global $conn;
        $sql = "UPDATE taikhoan SET matkhau = '$mk' WHERE ID_TK = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }function dtt($id,$ten,$ngay,$sex,$dc)
    {
        global $conn;
        $sql = "UPDATE taikhoan SET hoten = '$ten', ngaysinh = '$ngay', gioitinh = '$sex', diachi = '$dc' WHERE ID_TK = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}