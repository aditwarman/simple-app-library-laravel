@extends('layouts.app')
@section('content')
<div class="container">
	<div class="col-md-12">
		<section class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-7 col-md-offset-2">
					<form action="{{ route('transaction.post') }}" class="form form-horizontal" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="" class="control-label col-md-3"> Customer Name </label>
							<div class="col-md-9">
								<select name="customer_id" class="form-control">
									<option value=""> -- Choose -- </option>
									@foreach ($customers as $customer)
									<option value="{{ $customer->id }}">
										{{ $customer->card_numb }} | {{ $customer->name }}
									</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="control-label col-md-3"> Book </label>
							<div class="col-md-9">
								<select name="book_id" class="form-control">
									<option value=""> -- Choose -- </option>
									@foreach ($books as $book)
									<option value="{{ $book->id }}">
										{{ $book->title }} | {{ $book->publisher }}
									</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="control-label col-md-3"> Time Period </label>
							<div class="col-md-9">
								<div class="input-group">
									<input type="text" name="duration" class="form-control">
									<span class="input-group-addon" id="basic-addon2">day`s</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-primary">Order</button>
	                            <a href="{{ route('transaction.index') }}" class="btn btn-default">Back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection