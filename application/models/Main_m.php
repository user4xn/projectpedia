<?php 
/**
 * Main Model
 */
class Main_m extends CI_Model
{
    function getDocs($limit=''){
        return $this->db->query('
            SELECT document.id,judul,file,document.desc,jenis,harga,to_base64(thumbnail) as thumbnail64, created_at, label 
            FROM document 
            JOIN category 
            ON document.id = category.id_document
            ORDER BY RAND()
            LIMIT '.$limit.'
            ')->result_array();
    }
}


 ?>