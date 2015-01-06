@extends('layouts.default')

@section('content')
<?php
  $tab = Tab::find($id);
?>
<div>
	<h2>{{$tab->tab_name}}</h2>
</div>

<div>
  <h2>Question Panel</h2>
</div>
<div>
  <form class="form-horizontal templatemo-signin-form" role="form" action="/createquestion" method="post" enctype="multipart/form-data">
    <input type='hidden' name='tab_id' value="{{$tab->id}}">
        @if(Session::get('message'))
          <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              {{Session::get('message')}}
        </div>
        <br>
        <br>
    </div>
        {{Session::forget('message')}}
        @endif

        <div class="form-group">
          <div class="col-md-12">
            <label for="name" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="question" name="question" placeholder="Question Description">
            </div>
          </div>              
        </div>
      <div class="form-group">
          <div class="col-md-12">
            <label for="name" class="col-sm-2 control-label">Question Type</label>
            <div class="col-sm-10">
            <select  class="input-group" name="questiontype"  style="margin-top: 12px;">
              <option value="multiplechoice" selected="" style="">Multiple Choice</option>
              <option value="numericchoices">Numeric Choices</option>
              <option value="text">Text</option>
            </select>
            </div>
          </div>              
        </div>
<br>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Add Question" class="btn btn-default">
            </div>
          </div>
        </div>
      </form>
</div>

<br>
<br>
<br>
<?php
$questionsCheck = Question::where('tab_id', $tab->id)->count();
?>

<div>
  <h2>Questions</h2>
</div>
<div>    
@if($questionsCheck != 0)

<?php $questions = Question::where('tab_id', $tab->id)->get(); ?>

@foreach($questions as $question)
<div>
  <h3>{{$question->description}} <a href="/deletequestion/{{$question->id}}">X</a></h3>
</div>


<!--Add Choices-->
<div>
  <h3>
    Choices Panel
  </h3>
<div>

  @if ($question->question_type == "multiplechoice")
 
   <form class="form-horizontal templatemo-signin-form" role="form" action="/createchoice" method="post" enctype="multipart/form-data">
    <input type='hidden' name='question_id' value="{{$question->id}}">
        <div class="form-group">
          <div class="col-md-12">
            <label for="name" class="col-sm-2 control-label">Choice Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="choicedescription" name="choicedescription" placeholder="Choice Description">
            </div>
          </div>              
        </div>
        <br>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Add Choice" class="btn btn-default">
            </div>
          </div>
        </div>
      </form>

      <div>
        <h3>Choices</h3>
      </div>
      <div>
      <?php $choicesCheck = Multiplechoice::where('question_id', $question->id)->count(); ?>
      @if($choicesCheck != 0)
      <?php $choices = Multiplechoice::where('question_id', $question->id)->get(); ?>
      <ul>
        @foreach($choices as $choice)
         <li>{{$choice->choice_description}}  <a href="/deletechoice/{{$choice->id}}">X</a></li>
        @endforeach
      </ul>  
      @else
      No choices found.
      @endif
      </div>

  @elseif ($question->question_type == "text")

    Text has no choices.

  @elseif ($question->question_type == "numericchoices")

   <form class="form-horizontal templatemo-signin-form" role="form" action="/createnumericchoice" method="post" enctype="multipart/form-data">
    <input type='hidden' name='question_id' value="{{$question->id}}">
        <div class="form-group">
          <div class="col-md-12">
            <label for="name" class="col-sm-2 control-label">Choice Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="choicedescription" name="choicedescription" placeholder="Choice Description">
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="name" class="col-sm-2 control-label">Numeric Value</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="numericvalue" name="numericvalue" placeholder="Numeric Value">
            </div>
          </div>              
        </div>
        <br>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Add Choice" class="btn btn-default">
            </div>
          </div>
        </div>
      </form>
      <div>
        <h3>Choices</h3>
      </div>
      <div>
      <?php $choicesCheck = Numericchoice::where('question_id', $question->id)->count(); ?>
      @if($choicesCheck != 0)
      <?php $choices = Numericchoice::where('question_id', $question->id)->get(); ?>
      <ul>
        @foreach($choices as $choice)
         <li>{{$choice->numeric_description}} = {{$choice->numeric_value}}  <a href="/deletenumericchoice/{{$choice->id}}">X</a></li>
        @endforeach
      </ul>  
      @else
      No choices found.
      @endif
      </div>
  @else

    Error.

  @endif

@endforeach 


@else
  <p>No questions found.</p>
@endif
</div>



@stop