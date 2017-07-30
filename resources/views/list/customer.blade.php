@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3> List Customer </h3>
                </div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="pull-left form-group">
                        <a href="{{ route('customer.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                        
                        <a href="{{ route('customer.restore', ['authorize' => csrf_token()]) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-plus"></i> Restore
                        </a>
                    </div>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID Card Number</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->card_numb }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ ($customer->gender == '1') ? 'Male' : 'Female' }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-xs"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-customer').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-customer" action="{{ route('customer.delete', $customer->id) }}" method="POST" style="display: none;">
                                        {{ method_field('DELETE') }}

                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection