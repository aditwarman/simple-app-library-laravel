@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3> List Transactions </h3>
                </div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="form-group">
                        <a href="{{ route('transaction.create') }}" class="btn btn-sm btn-default">Create Transaction</a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Item's</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction as $as)
                            <tr>
                                <td> {{ $as['data']->name }} </td>
                                <td> {{ $as['data']->address }} </td>
                                <td> {{ count($as['data']->getTransaction) }} </td>
                                <td>
                                    <a href="{{ route('transaction.detail', $as['data']->id) }}" class="btn btn-default btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection