@extends('layouts.master')
@section('contain')
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">product Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">User Table</li> --}}
                </ol>
                <a href="{{ route('product.form') }}"><button type="button"
                        class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                        New</button></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h6 class="card-subtitle">Data table example</h6> --}}
            <div class="table-responsive">
                <table id="myTablenanny" class="table table-striped border dataTable no-footer">
                    <thead>
                        <tr style="background-color: gray " class="text-white">
                            <th>S.No</th>
                            <th>Title</th>
                            {{-- <th>Subtitle</th> --}}
                            <th>Fdp</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $product->title }}</td>
                                {{-- <td>{{ $product->subtitle }}</td> --}}
                                <td>{{ $product->fdp }}</td>
                                <td>
                                    <a href="{{ URL::asset($product->image != null ? env('MEDIA_URL') . $product->image : 'images/placeholder_blue_user.png') }}"
                                        target="_blank">
                                        <img src="{{ $product->image != null ? env('MEDIA_URL') . $product->image : asset('images/placeholder_blue_user.png') }}"
                                            class="img-circle" width="50" style="height: 50px" />
                                    </a>
                                </td>
                                <td>{{ $product->description }}</td>
                                @if ($product->status == 1)
                                    <td><span class="badge bg-success">Active</span></td>
                                @else
                                    <td><span class="badge bg-danger">Deactive</span></td>
                                @endif
                                <td class="text-canter">
                                    <a title="Edit" href="{{ route('product.edit', $product->id) }}"><i
                                            class="far fa-edit" style="font-size:20px"></i></a>
                                    @if ($product->status == 1)
                                        <a title="change status" href="{{ route('product.status', ['product_id'=>$product->id,'status' =>0]) }}"><i
                                                class="fa fa-unlock " style="font-size:20px;color: #00c292;"></i></a>
                                    @else
                                        <a title="change status" href="{{ route('product.status', ['product_id'=>$product->id ,'status' =>1]) }}"><i
                                                class="fa fa-lock" style="font-size:20px;color:#e46a76;"></i></a>
                                    @endif
                                    {{-- <a title="Delete" type="button" onclick="swalll({{ $product->id }})"><i class="fa fa-trash "
                                            aria-hidden="true"></i></a>
                                    <form id="delete-form-{{ $product->id }}"
                                        action="{{ route('product.delete', $product->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}

                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function swalll(id) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary field!",
                icon: "warning",
                showCancelButton: true, // This displays the cancel button
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel" // Provide the text for the cancel button
            }).then((result) => {
                if (result.isConfirmed) {
                    var formId = "delete-form-" + id;
                    document.getElementById(formId).submit();
                }
            });
        }
        $(function() {
            $('#myTablenanny').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": [6]
                }]
            });
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                'btn btn-primary me-1');
        });
    </script>
@endsection
