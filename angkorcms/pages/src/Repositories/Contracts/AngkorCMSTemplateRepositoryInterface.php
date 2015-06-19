<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSTemplateRepositoryInterface {

	public function store();
	public function update($id);
	public function destroy($id);

}