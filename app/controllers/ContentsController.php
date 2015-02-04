<?php

class ContentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contents
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contents/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contents
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /contents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issue = Content::whereId($id)->with(array(
				'issue' => function($q) {
					return $q->with('contents')
						->get();
					})
				)->get()->first();

		$previous = Content::whereCoverId($issue->issue->id)->where('id', '<', $id)->max('id');

		// get next user id
		$next = Content::whereCoverId($issue->issue->id)->where('id', '>', $id)->min('id');

		$contents = array();
		foreach($issue->issue->contents as $content){
			$contents[$content->id] = $content->title;
		}
		//return $issue;
		return View::make('contents.show', compact('issue', 'contents', 'previous', 'next'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /contents/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /contents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /contents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}