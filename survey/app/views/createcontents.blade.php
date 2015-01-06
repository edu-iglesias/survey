@extends('layouts.default')

@section('content')
<?php
  $tab = Tab::find($id);
?>
<div>
	<h2>{{$tab->tab_name}}</h2>
</div>

<div>
  <form class="form-horizontal templatemo-signin-form" role="form" action="/createquestion" method="post" enctype="multipart/form-data">
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

?>










@stop