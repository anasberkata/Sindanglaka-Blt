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
