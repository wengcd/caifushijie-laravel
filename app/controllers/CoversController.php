<?php

class CoversController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /covers
	 *
	 * @return Response
	 */
	public function index()
	{
		$newspapers = Cover::whereType('报刊')->orderBy('created_at', 'DESC')->limit(7)->get();
		$magazines = Cover::whereType('杂志')->orderBy('created_at', 'DESC')->limit(7)->get();
		return View::make('covers.index', compact('newspapers', 'magazines'));
	}

	public function newspaper()
	{
		$newspapers = Cover::whereType('报刊')->orderBy('created_at', 'DESC')->paginate(4);
		return View::make('covers.newspaper', compact('newspapers'));
	}

	public function magazine()
	{
		$magazines = Cover::whereType('杂志')->orderBy('created_at', 'DESC')->paginate(4	);
		return View::make('covers.magazine', compact('magazines'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /covers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /covers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /covers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$issue = Cover::whereId($id)->with('contents')->get()->first();

		return View::make('covers.show', compact('issue'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /covers/{id}/edit
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
	 * PUT /covers/{id}
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
	 * DELETE /covers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cover = Cover::find($id);

		if(!$cover){
			return Redirect::route('admin.index')->with('message', '删除失败，没有找到想要删除的资源');
		}

		$cover->delete();

		return Redirect::route('admin.index')->with('message', '删除成功');
	}

}