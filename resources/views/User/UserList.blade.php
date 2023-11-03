@extends('layouts.master')
@section('contain')
    <div class="row page-titles" style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Users Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li ><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">User Table</li> --}}
                </ol>
                {{-- <a href="{{ Route('address.swform') }}"><button type="button"
                    class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                    New</button></a> --}}
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
                                {{-- <th>First Name</th>
                                <th>Last Name</th> --}}
                                <th>Full Name</th>
                                <th>Email</th>
                                {{-- <th>Phone</th>
                                <th>Gender</th> --}}
                                {{-- <th>DOB</th> --}}
                                {{-- <th>Provider</th> --}}
                                {{-- <th>Profile Image</th> --}}
                                {{-- <th>User Role</th> --}}
                                {{-- <th>Caregiver's Status</th> --}}
                                <th >Status</th>
                                <th >Media Approval</th>
                                {{-- <th>Latitude</th>
                                <th>Longitude</th> --}}
                                {{-- <th>Service_id</th>
                                <th>Vehicle_category_id</th> --}}
                                <th >Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($userData as $Ndata)
                            <tr>
                                <td>{{ $num++ }}</td>
                                {{-- <td>{{ $Ndata->first_name }}</td>
                                <td>{{ $Ndata->last_name }}</td> --}}
                                <td>{{ $Ndata->full_name }}</td>
                                <td>{{ $Ndata->email }}</td>
                                {{-- <td>{{ $Ndata->phone }}</td>
                                <td>{{ $Ndata->gender }}</td> --}}
                                {{-- <td>{{ $Ndata->dob }}</td> --}}
                                {{-- <td>{{ $Ndata->provider }}</td> --}}
                                {{-- <td>{{ $Ndata->profile_image }}</td> --}}
                                {{-- <td>{{ $Ndata->user_role }}</td> --}}
                                {{-- <td>@if ($Ndata->is_online == 0)
                                    <p class="badge rounded-pill bg-danger ms-auto mb-2 mb-md-0">offline</p>
                                    @else
                                    <p class="badge rounded-pill bg-success ms-auto mb-2 mb-md-0">online</p>
                                    @endif</td> --}}
                                <td>@if ($Ndata->is_verified == 2)
                                    <p class="badge rounded-pill bg-danger ms-auto mb-2 mb-md-0">rejected</p>
                                    @elseif ($Ndata->is_verified == 1)
                                    <p class="badge rounded-pill bg-success ms-auto mb-2 mb-md-0">approved</p>
                                    @else
                                    <p class="badge rounded-pill bg-warning ms-auto mb-2 mb-md-0">pending</p>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" @if ($Ndata->verification_status === 'approved' || $Ndata->verification_status === 'rejected') disabled style="background-color: #6c757d; border-color: #6c757d;" @endif>
                                                @if ($Ndata->verification_status === 'approved' || $Ndata->verification_status === 'rejected') Disabled @else Media Action @endif
                                            </button>
                                            {{-- {{$Ndata->verification_status}} --}}
                                            <ul class="dropdown-menu" style="background-color: #f0ad4e;">
                                                <li><a class="dropdown-item" href="{{ Route('userMedia.aprove', $Ndata->id) }}">Approve Media</a></li>
                                                <li><a class="dropdown-item" href="{{ Route('userMedia.delete', $Ndata->id) }}">Reject Media</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                            </ul>
                                        </div>
                                    </td>
                                </td>
                                {{-- <td>{{ $Ndata->latitude }}</td>
                                <td>{{ $Ndata->longitude }}</td> --}}
                                {{-- <td>{{ $Ndata->service_id }}</td>
                                <td>{{ $Ndata->vehicle_category_id }}</td> --}}
                                <td class="text-canter">
                                        @if ($Ndata->user_type != "admin")
                                        {{-- <a href="{{ Route('nannies.edit', $Ndata->id) }}"><i title="Edit" class="far fa-edit" style="font-size:20px"></i></a> --}}
                                            <a href="{{ Route('nannies.info', $Ndata->id) }}"> <i title="User Info" class="far fa-eye" style="font-size:20px"></i></a>
                                            @else
                                                    <i style="text-decoration: underline;">Not Modify</i>
                                            @endif
                                            {{-- <a title="delete" class="btn" onclick="swalll({{ $Ndata->id }})"><i class="fa fa-trash" style="font-size:20px"></i></a>
                                            <form id="delete-form-{{ $Ndata->id }}"
                                                action="{{ route('nannies.delete', $Ndata->id) }}" method="POST" class="d-none">
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
        function swalll(id)
        {
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary field !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var formId = "delete-form-" + id;
                            document.getElementById(formId).submit();
                            // swal("Poof! Your imaginary file has been deleted!", {
                            //     icon: "success",
                            // });
                        } else {
                            // swal("Your imaginary file is safe!");
                        }
                    });
        }
        $(function() {
            $('#myTablenanny').DataTable({
                columnDefs:[
                    {
                        orderable: false,
                        "targets":[5,4]
                    }
                ]
            });
            var table = $('#example').DataTable({
                "columnDefs": [
                    {
                        "visible": false,
                        "targets": 2
                    }
                ],
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
