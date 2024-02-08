@extends('books::layouts.master')

@section('content')
    <h1 class="text-primary">Add Year</h1>
    <form action="{{ route('add.year') }}" method="POST">
        @csrf
        @method('POST')
        <div class="group-form mb-2">
            <input type="text" class="form-control" name="year" placeholder="add year" required>
        </div>
        <div class="group-form mb-2">
            <button type="submit" class="btn btn-primary btn-sm" style="width: 150px;">ADD</button>
        </div>
    </form>
    <h4>List years</h4>
    @if ($data->isEmpty())
        <p>No available year</p>
    @else
    <table class="table table-borderless text-center bordered">
        <thead>
            <tr>
                <th class="table-secondary">ID</th>
                <th class="table-secondary">YEAR</th>
                <th class="table-primary">CREATE AT</th>
                <th class="table-success">ACTIVE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $i)
                <tr>
                    <td>{{ $i->year_id }}</td>
                    <td>{{ $i->year_number }}</td>
                    <td>{{ $i->created_at }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="#">EDIT</a>
                        <a class="btn btn-danger btn-sm" href="#">DELETE</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection