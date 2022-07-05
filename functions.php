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

function formatPeriode($periode)
{
    // ubah string menjadi format tanggal
    return date('F Y', strtotime($periode));
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


// ------------------------------------------------------ BLT ------------------------------------------------
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
    $rt = $data["rt"];
    $rw = $data["rw"];
    $rtrw = $rt . " / " . $rw;
    $desa = $data["desa"];
    $kecamatan = $data["kecamatan"];
    $kabupaten = "Cianjur";
    $provinsi = "Jawa Barat";
    $kode_pos = "43281";
    $status_dtks = $data["status_dtks"];
    $periode = $data["periode"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $query = "INSERT INTO data_blt_penerima
				VALUES
			(NULL, '$nama_lengkap', '$no_kk', '$no_nik', '$jalan', '$rtrw', '$desa', '$kecamatan', '$kabupaten', '$provinsi', '$kode_pos', '$pekerjaan', '$nama_ibu', '$status_dtks', '$periode', '$date_created', '$is_active')
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
    $rt = $data["rt"];
    $rw = $data["rw"];
    $rtrw = $rt . " / " . $rw;
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
