@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3> Form Book </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-7 col-md-offset-2">
                    <form action="{{ route('book.post') }}" class="form form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Title </label>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Description </label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Author</label>
                            <div class="col-md-9">
                                <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Publisher</label>
                            <div class="col-md-9">
                                <input type="text" name="publisher" class="form-control" value="{{ old('publisher') }}">
                                @if ($errors->has('publisher'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Published Date </label>
                            <div class="col-md-9">
                                <input type="text" name="published_date" class="form-control" value="{{ old('published_date') }}">
                                @if ($errors->has('published_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('published_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('book.list') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection