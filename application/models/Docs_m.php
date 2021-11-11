<?php 
/**
 * Main Model
 */
class Docs_m extends CI_Model
{   
	function getRandCategory(){
        return $this->db->query('SELECT * FROM category GROUP BY label ORDER BY RAND() LIMIT 3')->result_array();
    }

    function getDocs($id=''){
        return $this->db->query('
            SELECT document.id,judul,file,document.desc,jenis,harga,to_base64(thumbnail) as thumbnail64, created_at, label 
            FROM document 
            JOIN category 
            ON document.id = category.id_document
            ')->result_array();
    }

    function checkValidDocs($id, $title){
        return $this->db->query('SELECT * FROM document WHERE md5(id) = "'.$id.'" AND judul = "'.urldecode(str_replace('-', ' ', $title).'"'))->row_array();

    }
}


 ?>