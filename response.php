<?php
	//include connection file 
	include_once("connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Topic($connString);

	switch($action) {
	 case 'add':
		$empCls->insertTopic($params);
	 break;
		 case 'delete':
		$empCls->deleteTopic($params);
	 break;
	 default:
	 $empCls->getTopics($params);
	 return;
	}
	
	class Topic {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}
	
	public function getTopics($params) {
		
		$this->data = $this->getTopic($params);
		
		echo json_encode($this->data);
	}
	function insertTopic($params) {
		$data = array();;
		$sql = "INSERT INTO `topic` (topic_name, topic_text) VALUES('" . $params["name"] . "', '" . $params["text"] . "');  ";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to insert topic data");
		
	}
	
	
	function getTopic($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .=" ( topic_name LIKE '".$params['searchPhrase']."%' ";    
			$where .=" OR topic_text LIKE '".$params['searchPhrase']."%' ";

			
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `master_db`.`topic` ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot topic data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch topic data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
		}

		$json_data = array(
			"current"            => intval($params['current']), 
			"rowCount"            => 10, 			
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}
		
	function deleteTopic($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `topic` WHERE id='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to delete topic data");
	}
}
?>
	