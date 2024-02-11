@extends('books::layouts.master')

@section('content')
    <h4>List years</h4>
    <button class="btn btn-primary btn-sm" id="btn_add">Add</button>
    @if ($data->isEmpty())
        <p>No available year</p>
    @else
    <table class="table table-borderless text-center bordered" id="tbyear">
            <tr>
                <th class="table-secondary">ID</th>
                <th class="table-secondary">YEAR</th>
                <th class="table-primary">CREATE AT</th>
                <th class="table-success">ACTIVE</th>
            </tr>
            @foreach ( $data as $i)
                <tr>
                    <td>{{ $i->year_id }}</td>
                    <td>{{ $i->year_number }}</td>
                    <td>{{ $i->created_at }}</td>
                    <td>
                        <button class="btn btn-success btn-sm btnedit">EDIT</button>
                        <form action="{{ route('delete.year',$i->year_id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button 
                        onclick="return confirm('Are you sure you want to delte this year?')"
                        type="submit" class="btn btn-danger btn-sm">DELETE
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
    @endif

    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Year</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div align="right"><a href="#" id="addyear"
                                class="btn btn-primary btn-sm p-1">Add</a></div>
                        <table class="table-border text-center" id="addrow">
                            <tr>
                                <th>Years</th>
                            </tr>
                            <tbody id="trow">
                                <tr>
                            <td>
                                <div class="group-form mb-3">
                                    <input type="text" class="form-control year" placeholder="Year number" name="year">
                            </td>
                    </div>
                    </tr>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnsave">Add</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Edit -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Year</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <div class="group-form mb-3">
                            <input type="text" id="year" placeholder="Year Name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnEdit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $("#btn_add").click(function(){
                $("#addModal").modal('show');
            });

            $('#addyear').click(function(){
                $('#trow').append(`
                <tr>
                    <td>
                    <div class="group-form mb-3">
                        <input type="text" placeholder="Year Name" class="year form-control"/>
                    </div>
                    </td>
                    <td>
                    <div class="group-form mb-3">
                        <button class="btn btn-sm btn-danger btnremove">Remove</button>
                    </div>
                    </td>
                </tr>
                `);
            });

            $("#addrow").on('click', '.btnremove', function(){
                $(this).closest('tr').remove();
            });

            $('#btnsave').click(function(){
                var err = 0;
                var years = $('.year').map(function(){
                    var val = $(this).val();
                    if(val == ''){
                        err = 1;
                    }else{
                        return $(this).val();
                    }
                }).get();

                $.post(`{{ route("add.year") }}`, {'years[]':years}, function(data){
                    if(data == 1){
                        alert("Year added successfully.");
                        location.href = `{{ route('years')}}`;
                    }
                })
            });

            //Edit
            $("#tbyear tr").on("click", '.btnedit', function(){
                var row = $(this).closest('tr');
                var id = row.find('td').eq(0).text();
                var year = row.find('td').eq(1).text();

                $('#id').val(id);
                $("#year").val(year);

                $("#editModal").modal('show');
            });

            $('#btnEdit').click(function(){
                var id = $("#id").val();
                var year = $("#year").val();

                $.post(`{{ route('edit.year') }}`, {id:id, year:year}, function(data){
                    if(data == 1){
                        alert("Year updated successfully.");
                        location.href = `{{ route('years') }}`;
                    }
                })
            });

        });
    </script>
@endpush