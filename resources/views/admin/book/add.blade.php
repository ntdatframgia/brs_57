@extends('admin.admin')
@section('content')
<div class="container">
    <h1>@lang('messages.add_book')</h1>
    <hr>
    <div class="row">
            <div class="col-md-7 personal-info">
              {!! Form::open([
                  'class' => 'form-horizontal',
                  'role' => 'form',
                  'files' => true,
                  'method' => 'POST',
                  'action' => 'BookController@store',
              ]) !!}

                  <div class="{!! Form::showErrClass('parent') !!}">
                      {!! Form::label('parent', trans('messages.parent_category'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          <select name="parent" required="required" class ="form-control" id="parent" autofocus >
                              <option value="">Please Choose Parent Category</option>
                              <?php saiki_category($listcate, 0, '--', 0);?>
                          </select>
                          {{ Form::showErrField('parent') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('name') !!}">
                      {!! Form::label('name', trans('messages.book_name'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('name', null, [
                              'class' => 'form-control',
                              'id' => 'name',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('name') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('author') !!}">
                      {!! Form::label('author', trans('messages.author'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('author', null, [
                              'class' => 'form-control',
                              'id' => 'author',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('author') }}
                      </div>
                  </div>
                  <div class=" {!! Form::showErrClass('public_date') !!}">
                      {!! Form::label('public_date', trans('messages.public_date'), ['class'=> 'col-md-4 control-label']) !!}
                        <div class="col-md-7 ">
                          {!! Form::text('public_date', null, [
                              'class' => 'form-control',
                              'id' => 'datepicker',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('public_date') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('number') !!}">
                      {!! Form::label('number_of_page', trans('messages.number_of_page'),
                          ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::input('number','number_of_page',null,[
                              'class' => 'form-control',
                              'id' => 'number_of_page',
                          ]) !!}
                          {!! Form::showErrField('number_of_page') !!}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('image') !!}">
                      {!! Form::label('Image', trans('messages.book_image'),
                          ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::file('image', [
                              'class' => 'form-control',
                              'id' => 'image',
                          ]) !!}
                          {!! Form::showErrField('image') !!}
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-7 col-md-offset-4">
                          {!! Form::submit(trans('messages.add_book'), ['class' => 'btn btn-primary']) !!}
                      </div>
                  </div>
                  {!! Form::close() !!}
              </div>
          </div>
    <hr>
</div>
@endsection
