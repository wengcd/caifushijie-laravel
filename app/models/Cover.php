<?php

class Cover extends \Eloquent {
	protected $fillable = [];

	public function contents()
	{
		return $this->hasMany('Content');
	}
}