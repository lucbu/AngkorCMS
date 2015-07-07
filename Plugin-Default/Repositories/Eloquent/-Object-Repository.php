<?php namespace -namespace-\Repositories\Eloquent;

use -namespace-\-Object-;
use -namespace-\Repositories\Contracts\-Object-RepositoryInterface;

class -Object-Repository implements -Object-RepositoryInterface {

	public function all(){
		//Return all the module
	}
	
	public function store($id_module){
		//Store the model in DB
	}
	
	public function getByModule($id_module){
		//Return the object matching with the module id 
	}
	
	public function update($id){
		//Update properties of the Object in DB
	}
	
	public function destroy($id){
		// Delete the object
	}
	
}