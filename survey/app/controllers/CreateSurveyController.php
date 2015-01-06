<?php

class CreateSurveyController extends BaseController {

	public function createtab()
	{
	
		$rules = array(
			'tabname'    => 'required|alphaNum', 
		);

		$validator = Validator::make(Input::all(), $rules);

	
		if ($validator->fails()) {
			Session::put('message', 'Invalid tab name.');
			return Redirect::back()
				->withInput(); 
		} 
		else 
		{
				$tab = new Tab;
				$tab->tab_name = Input::get('tabname');
				$tab->status = 0;
				$tab->save();
				Session::put('message', 'Created tab.');
				return Redirect::to('/createcontents/'.$tab->id);
		}
	}
	

}
