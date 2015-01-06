<?php

class DeleteSurveyController extends BaseController {

	public function deletetab($id)
	{
		$tabCheck = Tab::where('id', $id)->count();

		if($tabCheck == 0)
		{
			Session::put('message', 'Deletion failed.');
			return Redirect::back()
				->withInput(); 
		}
		else
		{
			$tab = Tab::find($id);
					
			$questions = Question::where('tab_id', $tab->id)->get();
			foreach ($questions as $question) 
			{
					Text::where('question_id', $question->id)->delete();
					Multiplechoice::where('question_id', $question->id)->delete();
					Numericchoice::where('question_id', $question->id)->delete();
			}

			Question::where('tab_id', $tab->id)->delete();
			Tab::where('id', $id)->delete();

			Session::put('message', 'Tab Deleted.');
			return Redirect::back();
		}

	}

	public function deletequestion($id)
	{
		$questionCheck = Question::where('id', $id)->count();

		if($questionCheck == 0)
		{
			Session::put('message', 'Deletion failed.');
			return Redirect::back()
				->withInput(); 
		}
		else
		{
			$question = Question::find($id);
			
			Text::where('question_id', $question->id)->delete();
			Multiplechoice::where('question_id', $question->id)->delete();
			Numericchoice::where('question_id', $question->id)->delete();

			Question::where('id', $question->id)->delete();
		

			Session::put('message', 'Question Deleted.');
			return Redirect::back();
		}

	}

	public function deletechoice($id)
	{
		$choiceCheck = Multiplechoice::where('id', $id)->count();

		if($choiceCheck == 0)
		{
			Session::put('message', 'Deletion failed.');
			return Redirect::back()
				->withInput(); 
		}
		else
		{
			
	
			Multiplechoice::where('id', $id)->delete();

			Session::put('message', 'Choice Deleted.');
			return Redirect::back();
		}

	}

	public function deletenumericchoice($id)
	{
		$choiceCheck = Numericchoice::where('id', $id)->count();

		if($choiceCheck == 0)
		{
			Session::put('message', 'Deletion failed.');
			return Redirect::back()
				->withInput(); 
		}
		else
		{
			
	
			Numericchoice::where('id', $id)->delete();

			Session::put('message', 'Choice Deleted.');
			return Redirect::back();
		}

	}
}
