<?php
class Layouts{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
    function utama($content, $data = NULL, $footClass = NULL){
        $data['contentnya'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footernya'] = $this->_ci->load->view('Layout/footer', $data, TRUE);
        
        if($footClass != NULL){
        	$data['footClass'] = $this->_ci->load->view($footClass, $data, TRUE);
        }else{
        	$data['footClass'] = '';
        }
        
        $this->_ci->load->view('v_halamanAwal', $data);
    }
}