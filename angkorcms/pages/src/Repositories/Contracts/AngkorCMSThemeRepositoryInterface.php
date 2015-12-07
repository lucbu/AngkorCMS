<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSThemeRepositoryInterface {

	public function store($template_name);
	public function update($id);
	public function destroy($id);

}