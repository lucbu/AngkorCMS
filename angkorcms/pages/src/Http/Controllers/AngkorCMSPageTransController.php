<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use AngkorCMS\Pages\Http\Requests\AddAngkorCMSModuleRequest;
use AngkorCMS\Pages\Http\Requests\AngkorCMSPageTransRequest;
use AngkorCMS\Pages\Http\Requests\AngkorCMSPageTransUpdateRequest;
use AngkorCMS\Pages\Http\Requests\ReorderAngkorCMSModuleRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSModuleRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageTransBlockModuleRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageTransBlockRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageTransRepository;
use Redirect;
use Response;

class AngkorCMSPageTransController extends AngkorCMSPageBaseController {

	protected $repository;

	public function __construct(AngkorCMSPageTransRepository $repository) {
		$this->repository = $repository;
		$this->middleware('ajax', array('only' => array('addModuleAjax', 'changePositionModuleAjax')));
	}

	public function create($page_id, AngkorCMSLangRepository $lang_repository, AngkorCMSPageRepository $page_repository) {
		$page = $page_repository->getById($page_id);
		$data = array('langs' => $lang_repository->notInShort($this->repository->getListTradLang($page_id)), "page" => $page);
		return view('angkorcms/pages/page_trans/create', $data);
	}

	public function store($page_id, AngkorCMSPageTransRequest $request) {
		$page_trans = $this->repository->store();
		return Redirect::route('angkorcmspages.angkorcmspagestrans.edit', [$page_id, $page_trans->id])
			->with('info', 'The page has been created.');
	}

	public function edit($page_id, $id, AngkorCMSPageRepository $page_repository, AngkorCMSModuleRepository $module_repository) {
		$page_trans = $this->repository->getById($id);
		if (is_null($page_trans)) {
			return Redirect::route('angkorcmspages.edit', [$page_id])->with('error', 'The page translations doesn\'t exist.');
		}
		$page = $page_trans->page;
		$modules = $module_repository->all();
		$blocks = $page->theme->template->blocks;
		$data = array("page" => $page, "page_trans" => $page_trans, "modules" => $modules, "blocks" => $blocks);
		return view('angkorcms/pages/page_trans/edit', $data);
	}

	public function update($page_id, $id, AngkorCMSPageTransUpdateRequest $request) {
		if (!$page_trans = $this->repository->update($id)) {
			return Redirect::route('angkorcmspages.edit', [$page_id])->with('error', 'The page translations doesn\'t exist.');
		}
		return Redirect::route('angkorcmspages.angkorcmspagestrans.edit', [$page_id, $page_trans->id])
			->with('info', 'The page has been edited.');
	}

	public function postAddModuleAjax(AddAngkorCMSModuleRequest $request, AngkorCMSPageTransBlockModuleRepository $page_trans_block_module_repository, AngkorCMSPageTransBlockRepository $page_trans_block_repository) {

		$newTable = 0;
		$pageTransBlock = $page_trans_block_repository->getByPageTransAndBlockInput();
		if ($pageTransBlock == null) {
			$pageTransBlock = $page_trans_block_repository->store();
			$newTable = 1;
		}

		$pageTransBlockModule = $page_trans_block_module_repository->store($pageTransBlock);
		$pageTransBlock = $page_trans_block_repository->getById($pageTransBlockModule->page_trans_block_id);
		$data = array('block' => $pageTransBlock);
		$html = view('angkorcms/pages/page_trans/blockTable', $data)->render();

		return Response::json(array(
			'ok' => 1,
			'newTable' => $newTable,
			'blockTable_id' => $pageTransBlock->id,
			'html' => $html,
		));
	}

	public function postSaveOrderAjax(ReorderAngkorCMSModuleRequest $request, AngkorCMSPageTransBlockModuleRepository $page_trans_block_module_repository) {
		if ($page_trans_block_module_repository->reorder()) {
			return Response::json(array(
				'ok' => 1,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'An error occurred',
		));
	}

	public function postDelModuleAjax($id, AngkorCMSPageTransBlockModuleRepository $page_trans_block_module_repository) {
		if ($page_trans_block_module_repository->destroy($id)) {
			return Response::json(array(
				'ok' => 1,
				'idToDelete' => $id,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'Module doesn\'t exist',
		));
	}

	public function destroy($page_id, $id) {
		if (!$this->repository->destroy($id)) {
			return Redirect::route('angkorcmspages.edit', [$page_id])->with('error', 'The page translations doesn\'t exist.');
		}
		return Redirect::route('angkorcmspages.edit', [$page_id])
			->with('info', 'The page has been deleted.');
	}
}
