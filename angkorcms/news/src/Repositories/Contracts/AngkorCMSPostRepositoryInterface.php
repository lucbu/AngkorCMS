<?php namespace AngkorCMS\News\Repositories\Contracts;

interface AngkorCMSPostRepositoryInterface {
    public function liste($n);
    public function read($id);
	public function save();
	public function del($id);
	public function tag($tag, $n);
}