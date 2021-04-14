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
			$url = "https://en.openfoodfacts.org/ingredient/". $filter["query"]["search"] . ".json";

			$curlSession = curl_init();
			curl_setopt($curlSession, CURLOPT_URL, $url);
			curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
			curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
			$ingredients = json_decode(curl_exec($curlSession));
			curl_close($curlSession);
			// if(isset($filter["pagination"])){
			// 	$pagination = $filter["pagination"];
			// 	if(!$pagination["perpage"]){
			// 		$pagination["perpage"] = 24;
			// 	}
			// 	if(!$pagination["page"]){
			// 		$pagination["page"] = 1;
			// 	}
			// 	$pagination["total"] = $ingredients->count;
			// 	$pagination["pages"] = ceil($pagination["total"]/$pagination["perpage"]);

			// 	$limit["start"] = ($pagination["page"]-1) * $pagination["perpage"];
			// 	$limit["end"] = $pagination["perpage"];
			// 	$data["pagination"] = $pagination;
			// }

			$result = array();
			// for($i = $limit["start"]; $i < $limit["end"]; $i++){
			$products = $ingredients->products;
			for($i = 0; $i < 24; $i++){
				if(isset($products[$i]->brands)){
					$temp["name"] = $products[$i]->brands;
					$temp["type"] = "raw";
					$temp["img"] = array();
					$temp["allergen"] = $products[$i]->allergens;
					$allergen_tags = $products[$i]->allergens_tags;
					
					foreach($allergen_tags as $tag){
						$aller = explode(":", $tag);
						$image = $this->allergen->getOneByParam(array("name"=>$aller[1]));
						if($image)
							array_push($temp["img"], $image["img"]);
					}
					array_push($result, $temp);
				}
				
				
			}
			$data["data"] = $result;
			// $data["meta"] = $pagination;
			$this->json($data);
		}
	}
}
