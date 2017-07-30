@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <button class="btn btn-xs" onclick="window.history.back()">Back</button>
                   <h3> Detail Transaction <strong>{{ $customer->name }}</strong> </h3>
                </div>
                <div class="panel-body">
                    @include('flash::message')

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Time Period</th>
                            <th>Status</th>
                            <!-- <th></th> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaction as $data)
                            <tr>
                                <td> {{ $data->getBook->title }} </td>
                                <td> {{ $data->getBook->description }} </td>
                                <td> {{ $data->duration }} </td>
                                <td> <span class="label label-info"> On Progress </span> </td>
                                <!-- <td>
                                    <button class="btn btn-sm btn-success">Clear</button>
                                </td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection