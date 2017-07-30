@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3> Form Customer </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-7 col-md-offset-2">
                    <form action="{{ route('customer.postEdit') }}" class="form form-horizontal" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> ID Card Number </label>
                            <div class="col-md-9">
                                <input type="text" name="card_numb" class="form-control" value="{{ $customer->card_numb }}" maxlength="9">
                                @if ($errors->has('card_numb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_numb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Name </label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Gender </label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control" value="{{ $customer->gender }}">
                                    @for ($i = 0; $i < 3; $i++)
                                        @php 
                                            $gender[0] = "";
                                            $gender[1] = "Male";
                                            $gender[2] = "Female";

                                            $selected = ($customer->gender == $i) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $i }}" {{ $selected }}> {{ $gender[$i] }} </option>
                                    @endfor
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Address</label>
                            <div class="col-md-9">
                                <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('customer.list') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection