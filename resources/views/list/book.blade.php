@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3> List Books </h3>
                </div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="pull-left form-group">
                        <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>

                        <a href="{{ route('book.restore', ['authorize' => csrf_token()]) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-plus"></i> Restore
                        </a>
                    </div>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Title</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Publisher</th>
                            <th>Published Date</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    {{ 
                                        (strlen($book->description) > 100) 
                                            ? substr(substr($book->description, 0, 100), 0, strrpos(substr($book->description, 0, 100), ' ')).'...'
                                            : $book->description
                                    }}
                                </td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->published_date }}</td>
                                <td>
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                    <a class="btn btn-danger btn-xs"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-book').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-book" action="{{ route('book.delete', $book->id) }}" method="POST" style="display: none;">
                                        {{ method_field('DELETE') }}

                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection