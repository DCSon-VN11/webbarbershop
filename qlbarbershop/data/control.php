<?php
include('connect.php');

class data
{
    function login($tendn, $mk)
    {
        global $conn;
        $sql = "select * from taikhoan where taikhoan='$tendn' and matkhau = '$mk' and (level=0 or level=1)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_tk()
    {
        global $conn;
        $sql = "select * from taikhoan";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function doimk($mk, $id)
    {
        global $conn;
        $sql = "UPDATE taikhoan SET matkhau = '$mk' WHERE ID_TK = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //----------NHÂN VIÊN----------//
    function se_tk_nv()
    {
        global $conn;
        $sql = "select * from taikhoan where level = 1";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_tk_nv_id($id)
    {
        global $conn;
        $sql = "select * from taikhoan where taikhoan='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_tk_nv($idnv, $ten, $anhnv, $sdt, $ngaysinh, $gioitinh, $diachi)
    {
        global $conn;
        $sql = "insert into taikhoan(taikhoan,matkhau,hoten,anhtaikhoan,sdt,ngaysinh,gioitinh,diachi,level) 
            values ('$idnv','123456','$ten','$anhnv','$sdt','$ngaysinh','$gioitinh','$diachi','1')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_tk_nv($id)
    {
        global $conn;
        $sql = "delete from taikhoan where ID_TK='$id' and level= 1";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_tk_nv($id, $tk, $ten,$anh,$sdt,$ngay,$gioitinh,$diachi)
    {
        global $conn;
        $sql = "UPDATE taikhoan SET taikhoan='$tk',hoten='$ten',anhtaikhoan='$anh',sdt='$sdt',ngaysinh='$ngay',gioitinh='$gioitinh',diachi='$diachi'   WHERE ID_TK = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //----------CỬA HÀNG----------//
    function in_ch($chinhanh, $diachi,$map)
    {
        global $conn;
        $sql = "insert into cuahang(chinhanh,diachi,googlemap) values ('$chinhanh','$diachi','$map')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_ch()
    {
        global $conn;
        $sql = "select * from cuahang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dch()
    {
        global $conn;
        $sql = "select DISTINCT chinhanh from cuahang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_ch_id($ch)
    {
        global $conn;
        $sql = "select * from cuahang where ID_CH='$ch'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_ch($id)
    {
        global $conn;
        $sql = "delete from cuahang where ID_CH='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_ch($id,$cn,$diachi,$map)
    {
        global $conn;
        $sql = "UPDATE cuahang SET chinhanh='$cn',diachi='$diachi',googlemap='$map'   WHERE ID_CH = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //----------DỊCH VỤ----------//
    function in_dv($dv,$gia,$chitiet,$iddm,$anh){
        global $conn;
        $sql = "insert into dichvu(dichvu,gia,chitiet,ID_DM,anhdichvu) values ('$dv', '$gia', '$chitiet','$iddm', '$anh')";
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
    function del_dv($id)
    {
        global $conn;
        $sql = "delete from dichvu where ID_DV='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_dv($id,$dv,$gia,$ct,$dm,$anh)
    {
        global $conn;
        $sql = "UPDATE dichvu SET dichvu='$dv',gia='$gia',chitiet='$ct',ID_DM='$dm',anhdichvu='$anh'   WHERE ID_DV = '$id'";
        $run = mysqli_query($conn, $sql);
        echo $sql;
        return $run;
    }
    //----------DANH MỤC----------//
    function in_dm($dm){
        global $conn;
        $sql = "insert into danhmuc(danhmuc) values ('$dm')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_dm($id)
    {
        global $conn;
        $sql = "delete from danhmuc where ID_DM='$id' ";
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
    //----------HÌNH ẢNH----------//
    function in_ha($ha,$iddv){
        global $conn;
        $sql = "insert into hinhanh(hinhanh, ID_DV) VALUES ('$ha','$iddv')";
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
    function del_ha($id)
    {
        global $conn;
        $sql = "delete from hinhanh where ID_DV='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //----------KHÁCH HÀNG----------//
    function se_kh(){
        global $conn;
        $sql = "select * from taikhoan where level = 2 and xoa= 0";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_kh($id)
    {
        global $conn;
        $sql = "update taikhoan set xoa =1 where ID_TK='$id' and level= 2";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_kh_id($tk){
        global $conn;
        $sql = "select * from taikhoan where ID_TK='$tk' and level=2";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //----------ĐẶT LỊCH----------//
    function se_dl(){
        global $conn;
        $sql = "select * from khodatlich order by thoigian desc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dl_lm(){
        global $conn;
        $sql = "select DISTINCT ID_DV from khodatlich order by thoigian desc limit 10";
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
    function cndl($id)
    {
        global $conn;
        $sql = "UPDATE khodatlich SET tinhtrang = 1 WHERE ID_KDL = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dl_huy(){
        global $conn;
        $sql = "select * from khodatlich where tinhtrang = 2";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //----------THỐNG KÊ----------//
    function tktheocn(){
        global $conn;
        $sql = "SELECT khodatlich.ID_DV,cuahang.chinhanh,dichvu.gia
        FROM khodatlich,cuahang,dichvu
        WHERE khodatlich.ID_CH=cuahang.ID_CH and khodatlich.ID_DV=dichvu.ID_DV and khodatlich.tinhtrang= 1;";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function tktheonam(){
        global $conn;
        $sql = "SELECT khodatlich.ID_DV,MONTH(khodatlich.thoigian)AS 'thang',dichvu.gia FROM khodatlich,dichvu WHERE khodatlich.ID_DV=dichvu.ID_DV AND YEAR(khodatlich.thoigian)=YEAR(CURDATE()) and MONTH(khodatlich.thoigian)<=MONTH(CURDATE()) and khodatlich.tinhtrang=1 ORDER BY `thang` DESC;";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function tktheongay(){
        global $conn;
        $sql = "SELECT ID_KDL,ID_TK,ID_DV,TIME(thoigian) as 'gio',thoigian,ID_CH,tinhtrang from khodatlich order by gio desc;";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}