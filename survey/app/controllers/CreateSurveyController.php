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
	public function createquestion()
	{
	
		$rules = array(
			'question'    => 'required|alphaNum', 
			'questiontype' => 'required|in:multiplechoice,text,numericchoices',
		);

		$validator = Validator::make(Input::all(), $rules);

	
		if ($validator->fails()) {
			Session::put('message', 'Invalid Question.');
			return Redirect::back()
				->withInput(); 
		} 
		else 
		{
				$question = new Question;
				$question->description = Input::get('question');
				$question->question_type = Input::get('questiontype');
				$question->tab_id = Input::get('tab_id');
				$question->save();
				Session::put('message', 'Created question.');
				return Redirect::back(); 
		}
	}
	public function createchoice()
	{
	
		$rules = array(
			'choicedescription'    => 'required|alphaNum', 
				);

		$validator = Validator::make(Input::all(), $rules);

	
		if ($validator->fails()) {
			Session::put('message', 'Invalid choice.');
			return Redirect::back()
				->withInput(); 
		} 
		else 
		{
				$choice = new Multiplechoice;
				$choice->choice_description = Input::get('choicedescription');
				$choice->question_id = Input::get('question_id');
				$choice->save();
				Session::put('message', 'Created choice.');
				return Redirect::back(); 
		}
	}
	public function createnumericchoice()
	{
	
		$rules = array(
			'choicedescription'    => 'required|alphaNum', 
			'numericvalue'			=> 'required|numeric'
				);

		$validator = Validator::make(Input::all(), $rules);

	
		if ($validator->fails()) {
			Session::put('message', 'Invalid choice.');
			return Redirect::back()
				->withInput(); 
		} 
		else 
		{
				$choice = new Numericchoice;
				$choice->numeric_description = Input::get('choicedescription');
				$choice->numeric_value = Input::get('numericvalue');
				$choice->question_id = Input::get('question_id');
				$choice->save();
				Session::put('message', 'Created choice.');
				return Redirect::back(); 
		}
	}
	

}
