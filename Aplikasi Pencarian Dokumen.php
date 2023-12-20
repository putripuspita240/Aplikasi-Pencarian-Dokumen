<?php

$documents = [];

while (true) {
    echo "\n=== Pencarian Dokumen ===\n";
    echo "Menu:\n";
    echo "1. Tambah Dokumen\n";
    echo "2. Pencarian Dokumen\n";
    echo "3. Hapus Dokumen\n";
    echo "4. Keluar\n";
    echo "Pilih opsi (1-4): ";

    $option = readline();

    switch ($option) {
        case '1':
            tambahDokumen();
            break;
        case '2':
            cariDokumen();
            break;
        case '3':
            hapusDokumen();
            break;
        case '4':
            exitProgram();
            break;
        default:
            echo "Opsi tidak valid. Silakan pilih opsi 1-4.\n";
            break;
    }
}

function tambahDokumen()
{
    global $documents;
    echo "Masukkan nama dokumen: ";
    $namaDokumen = readline();
    $documents[] = $namaDokumen;
    echo "Dokumen '{$namaDokumen}' berhasil ditambahkan.\n";
}

function cariDokumen()
{
    global $documents;
    echo "Masukkan kata kunci: ";
    $keyword = readline();
    $found = false;

    echo "Hasil Pencarian untuk '{$keyword}':\n";
    foreach ($documents as $document) {
        if (stripos($document, $keyword) !== false) {
            echo "- {$document}\n";
            $found = true;
        }
    }

    if (!$found) {
        echo "Tidak ditemukan dokumen yang cocok dengan kata kunci '{$keyword}'\n";
    }
}

function hapusDokumen()
{
    global $documents;
    echo "Masukkan nama dokumen yang akan dihapus: ";
    $namaDokumen = readline();

    $key = array_search($namaDokumen, $documents);
    if ($key !== false) {
        unset($documents[$key]);
        echo "Dokumen '{$namaDokumen}' berhasil dihapus.\n";
    } else {
        echo "Dokumen '{$namaDokumen}' tidak ditemukan.\n";
    }
}

function exitProgram()
{
    echo "Program selesai. Terima kasih!\n";
    exit();
}