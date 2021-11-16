<?php 
/**
 * Main Model
 */
class Docs_m extends CI_Model
{   
	function getRandCategory($limit){
        return $this->db->query('SELECT label FROM category GROUP BY label ORDER BY RAND() LIMIT '.$limit.'')->result_array();
        $this->db->select('label')
                 ->from('category')
                 ->group_by('label')
                 ->order_by('RAND()')
                 ->limit($limit);

        return $this->db->get()->result_array();
    }

    function getRecentDocs($limit=''){
        return $this->db->query('
            SELECT document.id,judul,file,document.desc,jenis,harga,to_base64(thumbnail) as thumbnail64, created_at, label 
            FROM document 
            JOIN category 
            ON document.id = category.id_document
            ORDER BY RAND()
            LIMIT '.$limit.'
            ')->result_array();
    }

    function getDocs($search=''){
        $this->db->select('document.id,judul,file,document.desc,jenis,harga,to_base64(thumbnail) as thumbnail64, created_at, label')
                 ->from('document')
                 ->join('category', 'document.id = category.id_document');

        if($search  != ''){
            $this->db->like('judul', $search);
            $this->db->or_like('label', $search);
        }

        return $this->db->get()->result_array();
    }

    function getCategory(){
        $this->db->select('label, COUNT(document.id) AS num_doc')
                 ->from('category')
                 ->join('document', 'category.id_document = document.id')
                 ->group_by('label');
        
        return $this->db->get()->result_array();
    }

    function checkValidDocs($id, $title){
        return $this->db->query('SELECT * FROM document WHERE md5(id) = "'.$id.'" AND judul = "'.urldecode(str_replace('-', ' ', $title).'"'))->row_array();

    }

}


 ?>