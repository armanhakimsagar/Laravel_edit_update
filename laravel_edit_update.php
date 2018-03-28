-> Edit


* Controller :

  Route::get('photos/edit/{id}', 'PhotoController@edit');

* View :

  <a href="{{ url('photos/edit/'.$d->id)}}">Edit</a> 

* Edit :

  {{ $data->name }}







-> UPDATE (Query Builder):


Research_file_detail::where('post_id',$request->id)
                ->where('destination', 'San Diego')
                ->update(['$UpdateResearch->path' => $request->training_youtube]);




   public function Research_Update(Request $request){

  	// find all old data

    	$UpdateResearch = Research::find($request->old_id);

    	// update file & delete previous file

    	// research file update


		    if($request->hasFile('file')) {

	            $original_name = $request->file('file');
	            // file re name
	            
	            $enc_file_name = time() . '.' . $original_name->getClientOriginalExtension();
	            // resize file destination path

	            $destinationPath = public_path('project/backend/research/file/');

	            // Image upload method
	            $original_name->move($destinationPath, $enc_file_name);
	            
	            $old_img = $UpdateResearch->file;
		
				unlink("project/backend/research/file/".$old_img);


        	}


		$UpdateResearch->file = $enc_file_name;
		$UpdateResearch->cover_image = $enc_cover_image;
		$UpdateResearch->remember_token = $request->remember_token;

		$UpdateResearch->save();
}
