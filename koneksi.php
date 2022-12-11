<?php 
class Dbh{
 
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "crud";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
 
	function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"select * from warga");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
 
	function tambah_data($id,$nama,$jk,$kota)
	{
		mysqli_query($this->koneksi,"INSERT INTO warga VALUES ('$id','$nama','$jk','$kota')");
	}
	
	function get_by_id($id)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM warga where id='$id'");
		return $query->fetch_array();
	}
	function update_data($id,$nama,$jk,$kota)
	{
		$query = mysqli_query($this->koneksi,"UPDATE warga SET nama='$nama',jk='$jk',kota='$kota' where id='$id'");

	}
	function delete_data($id)
	{
		$query = mysqli_query($this->koneksi,"DELETE FROM warga WHERE id='$id'");
	}
}

?>