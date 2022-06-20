<?php

// KONEKSI DATABASE =====================================================
$conn = mysqli_connect("localhost", "root", "", "db_sdlk_blt");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// RT RW
function rtrw_add($data)
{
    global $conn;

    $rw = $data["rw"];
    $rt = $data["rt"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO data_rtrw
				VALUES
			(NULL, '$rw', '$rt', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function rtrw_edit($data)
{
    global $conn;

    $id = $data["id"];
    $rw = $data["rw"];
    $rt = $data["rt"];

    $query = "UPDATE data_rtrw SET
			rukun_warga = '$rw',
			rukun_tetangga = '$rt'

            WHERE id_rtrw = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function rtrw_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM data_rtrw WHERE id_rtrw = $id");
    return mysqli_affected_rows($conn);
}


// STATUS PEKERJAAN
function status_pekerjaan_add($data)
{
    global $conn;

    $nama_pekerjaan = $data["nama_pekerjaan"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO data_status_pekerjaan
				VALUES
			(NULL, '$nama_pekerjaan', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function status_pekerjaan_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama_pekerjaan = $data["nama_pekerjaan"];

    $query = "UPDATE data_status_pekerjaan SET
			nama_pekerjaan = '$nama_pekerjaan'

            WHERE id_status_pekerjaan = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function status_pekerjaan_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM data_status_pekerjaan WHERE id_status_pekerjaan = $id");
    return mysqli_affected_rows($conn);
}


// JABATAN
function jabatan_add($data)
{
    global $conn;

    $nama_jabatan = $data["nama_jabatan"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO data_jabatan
				VALUES
			(NULL, '$nama_jabatan', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function jabatan_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama_jabatan = $data["nama_jabatan"];

    $query = "UPDATE data_jabatan SET
			nama_jabatan = '$nama_jabatan'

            WHERE id_jabatan = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function jabatan_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM data_jabatan WHERE id_jabatan = $id");
    return mysqli_affected_rows($conn);
}


// PETUGAS
function petugas_add($data)
{
    global $conn;

    $nama = $data["nama"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $jabatan = $data["jabatan"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO users
				VALUES
			(NULL, '$nama', '$email', '$username', '$password', '$jabatan', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function petugas_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];
    $jabatan = $data["jabatan"];

    $query = "UPDATE users SET
			nama = '$nama',
			email = '$email',
			username = '$username',
			password = '$password',
			jabatan = '$jabatan'

            WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function petugas_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// ------------------------------------------------------ BLT ------------------------------------------------------
// BLT
function blt_add($data)
{
    global $conn;

    $nama_lengkap = $data["nama_lengkap"];
    $no_kk = $data["no_kk"];
    $no_nik = $data["no_nik"];
    $pekerjaan = $data["pekerjaan"];
    $nama_ibu = $data["nama_ibu"];
    $jalan = $data["jalan"];
    $rtrw = $data["rtrw"];
    $desa = $data["desa"];
    $kecamatan = $data["kecamatan"];
    $kabupaten = "Cianjur";
    $provinsi = "Jawa Barat";
    $kode_pos = "43281";


    $status_dtks = $data["status_dtks"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO data_blt_penerima
				VALUES
			(NULL, '$nama_lengkap', '$no_kk', '$no_nik', '$jalan', '$rtrw', '$desa', '$kecamatan', '$kabupaten', '$provinsi', '$kode_pos', '$pekerjaan', '$nama_ibu', '$status_dtks', '$date_created', '$is_active')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function blt_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama_lengkap = $data["nama_lengkap"];
    $no_kk = $data["no_kk"];
    $no_nik = $data["no_nik"];
    $pekerjaan = $data["pekerjaan"];
    $nama_ibu = $data["nama_ibu"];
    $jalan = $data["jalan"];
    $rtrw = $data["rtrw"];
    $desa = $data["desa"];
    $kecamatan = $data["kecamatan"];
    $kabupaten = "Cianjur";
    $provinsi = "Jawa Barat";
    $kode_pos = "43281";
    $status_dtks = $data["status_dtks"];

    $query = "UPDATE data_blt_penerima SET
			nama_lengkap = '$nama_lengkap',
			no_kk = '$no_kk',
			no_nik = '$no_nik',
			jalan = '$jalan',
			rtrw = '$rtrw',
			desa = '$desa',
			kecamatan = '$kecamatan',
			kabupaten = '$kabupaten',
			provinsi = '$provinsi',
			kode_pos = '$kode_pos',
			pekerjaan = '$pekerjaan',
			nama_ibu = '$nama_ibu',
			status_dtks = '$status_dtks'

            WHERE id_blt = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function blt_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM data_blt_penerima WHERE id_blt = $id");
    return mysqli_affected_rows($conn);
}
