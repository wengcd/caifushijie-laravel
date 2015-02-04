<?php

class Content extends \Eloquent {
	protected $fillable = [];

	public function issue()
	{
		return $this->belongsTo('Cover', 'cover_id');
	}
}