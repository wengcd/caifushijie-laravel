<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admins
	 *
	 * @return Response
	 */
	public function index()
	{
		$covers = Cover::with('contents')->paginate(10);
		//dd($covers);
		return View::make('admin.index', compact('covers'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admins/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admins
	 *
	 * @return Response
	 */
	public function store()
	{
		$cover = new Cover;

		$cover->title = Input::get('title');
		$cover->type = Input::get('type');
		$cover->description = Input::get('description');
		if(Input::hasFile('thumbnail')){
			$uploadfile = Input::file('thumbnail');
			$image = Image::make($uploadfile->getRealPath())->resize(360, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$filename = time().'.'.$uploadfile->getClientOriginalExtension();
			$upload_path = '/img/issues/'.Input::get('title').'/';
			File::exists(public_path().$upload_path) or File::makeDirectory(public_path().$upload_path);
			$uploadSuccess =$image->save(public_path().$upload_path.$filename, 100);
			if($uploadSuccess)
				$cover->thumbnail = $upload_path.$filename;
			else
				return Redirect::route('admin.index')->with('error', '上传失败');
		}
		$cover->save();
		Event::fire('issues.store', array($cover));

		return Redirect::route('admin.index')->with('message', '上传成功');
	}

	public function createContent($id)
	{
		$cover = Cover::find($id);
		$covers = Cover::all();
		$covers_array = array();
		foreach($covers as $c) {
			$covers_array[$c->id] = $c->title;
		}
		return View::make('admin.create-content', compact('cover', 'covers_array'));
	}

	public function storeContent()
	{
		$content = new Content;

		$content->title = Input::get('title');
		$content->cover_id = Input::get('cover_id');
		$content->description = Input::get('description');
		if(Input::hasFile('thumbnail')){
			$uploadfile = Input::file('thumbnail');
			$image1 = Image::make($uploadfile->getRealPath())->resize(360, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$image2 = Image::make($uploadfile->getRealPath());
			$filename1 = 'thumbnail-'.time().'.'.$uploadfile->getClientOriginalExtension();
			$filename2 = time().'.'.$uploadfile->getClientOriginalExtension();
			$upload_path = '/img/pages/';
			File::exists(public_path().$upload_path) or File::makeDirectory(public_path().$upload_path);
			$uploadSuccess1 =$image1->save(public_path().$upload_path.$filename1, 90);
			$uploadSuccess2 =$image2->save(public_path().$upload_path.$filename2, 100);
			if($uploadSuccess1 && $uploadSuccess2){
				$content->thumbnail = $upload_path.$filename1;
				$content->original_media_url = $upload_path.$filename2;
				$content->save();
				return Redirect::route('admin.index')->with('message', '版面上传成功');
			}
			else
				return Redirect::route('admin.index')->with('error', '版面上传失败');
		}
		else

		return Redirect::route('admin.index')->with('message', '没有上传');
	}

	/**
	 * Display the specified resource.
	 * GET /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cover = Cover::whereId($id)->with('contents')->get()->first();

		return View::make('admin.show', compact('cover'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admins/{id}/edit
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
	 * PUT /admins/{id}
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
	 * DELETE /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	}

}