-> Edit


* Controller :

  Route::get('photos/edit/{id}', 'PhotoController@edit');

* View :

  <a href="{{ url('photos/edit/'.$d->id)}}">Edit</a> 

* Edit :

  {{ $data->name }}







-> UPDATE (Query Builder):





	public function admin_product_update(Request $request){
		
		$id = $request->id;
		
		$imageName = time().'.'.$request->picture->getClientOriginalExtension();

		$request->picture->move(public_path('images'), $imageName);

		$product->picture = $imageName; 
		
		DB::update("
		
			update products set database_fieldname= '$request->fieldname' where id = '$id' 
		
		");
			
		$old_img = $request->old_img;
		
		unlink("images/".$old_img);
		
		return redirect()->back()->with('message', 'IT UPDATES!');