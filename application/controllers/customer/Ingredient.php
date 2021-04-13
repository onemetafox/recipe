<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/CustomerController.php');

class Ingredient extends CustomerController {
	
	public function __contruct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function api(){
		$filter = $this->input->post();
		if(isset($filter["query"]["search"])){
			$url = "https://world.openfoodfacts.org/cgi/suggest.pl?lc=en&tagtype=ingredients&string=". $filter["query"]["search"];
		}else{
			$url = "https://world.openfoodfacts.org/cgi/suggest.pl?lc=en&tagtype=ingredients&string=";
		}
		
		$curlSession = curl_init();
		curl_setopt($curlSession, CURLOPT_URL, $url);
		curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
		$ingredients = json_decode(curl_exec($curlSession));
		curl_close($curlSession);

		// if(isset($filter["pagination"])){
		// 	$pagination = $filter["pagination"];
		// 	if(!$pagination["perpage"]){
		// 		$pagination["perpage"] = 10;
		// 	}
		// 	if(!$pagination["page"]){
		// 		$pagination["page"] = 1;
		// 	}
		// 	$pagination["total"] = count($ingredients);
		// 	$pagination["pages"] = ceil($pagination["total"]/$pagination["perpage"]);

		// 	$limit["start"] = ($pagination["page"]-1) * $pagination["perpage"];
		// 	$limit["end"] = $pagination["perpage"];
		// 	$data["pagination"] = $pagination;
		// }

		$result = array();
		// for($i = $limit["start"]; $i < $limit["end"]; $i++){
		for($i = 0; $i < count($ingredients); $i++){
			$item = $ingredients[$i];
			$temp["name"] = $item;
			$temp["type"] = "raw";
			$allergen = $this->allergen->checkAllergen(str_replace("'","", $item));
			if($allergen){
				$temp["allergen"] = $allergen["name"];
				$temp["img"] = $allergen["img"];
			}else {
				$temp["allergen"] = "";
			}
			array_push($result, $temp);
		}
		$data["data"] = $result;
		// $data["meta"] = $pagination;
		$this->json($data);
	}
}
