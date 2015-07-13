<?php namespace AngkorCMS\Listing\Repositories\Eloquent;

use AngkorCMS\Listing\AngkorCMSListItem;
use AngkorCMS\Listing\Repositories\Contracts\AngkorCMSListItemRepositoryInterface;
use Input;

class AngkorCMSListItemRepository implements AngkorCMSListItemRepositoryInterface {

	public function all() {
		$listItems = AngkorCMSListItem::orderBy('id', 'DESC')
			->get();
		return $listItems;
	}

	public function getById($id) {
		return AngkorCMSListItem::find($id);
	}

	public function store() {
		$listItem = AngkorCMSListItem::create(array(
			'text' => Input::get('text'),
			'url' => Input::get('url'),
			'anchor' => Input::get('anchor'),
			'list_id' => Input::get('list_id'),
		));

		return $listItem;
	}

	public function reorder() {
		$list_id = Input::get('list_id');
		$orders = Input::get('order');
		$listListItems = array();
		foreach ($orders as $value) {
			$listItem = $this->getById($value);
			if ($listItem == null || $listItem->list_id != $list_id) {
				return false;
			}
			$listListItems[] = $listItem;
		}
		$i = 0;
		foreach ($listListItems as $listItem) {
			$listItem->position = $i;
			$listItem->save();
			$i++;
		}
		return true;
	}

	public function destroy($id) {
		$listItem = AngkorCMSListItem::find($id);
		if ($listItem == null) {
			return false;
		}
		$listItem->delete();
		return true;
	}
}
