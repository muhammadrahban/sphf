@extends('layouts.master')
@section('contain')
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Survey Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">User Table</li> --}}
                </ol>
                <a href="{{ route('survey.form') }}"><button type="button"
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
                            <th>Name</th>
                            <th>Subtitle</th>
                            <th>Fdp</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($surveys as $survey)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $survey->name }}</td>
                                <td>{{ $survey->subtitle }}</td>
                                <td>{{ $survey->fdp }}</td>
                                <td>
                                    <a href="{{ URL::asset($survey->image_url != null ? env('MEDIA_URL') . $survey->image_url : 'images/placeholder_blue_user.png') }}"
                                        target="_blank">
                                        <img src="{{ $survey->image_url != null ? env('MEDIA_URL') . $survey->image_url : asset('images/placeholder_blue_user.png') }}"
                                            class="img-circle" width="35" style="height: 35px" />
                                    </a>
                                </td>
                                <td class="text-canter">
                                    <a title="Edit" href="{{ route('survey.edit', $survey->id) }}"><i class="far fa-edit"
                                            style="font-size:20px"></i></a>

                                            <a
                                               title="info" onclick="openSurveyModal('{{ $survey->name }}', {{ json_encode($survey->questions) }})"><i class="fa fa-info-circle" style="font-size:20px;color:rgb(71, 181, 196)"></i></a>
                                    <a title="Delete" type="button" onclick="swalll({{ $survey->id }})"><i
                                            class="fa fa-trash " aria-hidden="true"></i></a>
                                    <form id="delete-form-{{ $survey->id }}"
                                        action="{{ route('survey.delete', $survey->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                        @endforeach
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   <!-- Modal for displaying survey questions and answers -->
<div class="modal" id="surveyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="font-size: small;">
            <div class="modal-header bg-primary text-white" style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                <h5 class="modal-title" id="surveyModalLabel">Survey Questions and Answers</h5>
                {{-- <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"> --}}
                    {{-- <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                {{-- <h3 id="surveyName" class="text-primary"></h3> --}}
                <ul id="surveyContent" class="list-group">
                    <!-- Questions and answers will be populated here -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function openSurveyModal(surveyName, surveyContent) {
        $('#surveyModalLabel').text('Survey Questions and Answers');
        $('#surveyName').text('Survey: ' + surveyName);
        $('#surveyName').addClass('text-primary');
        $('#surveyContent').empty();

        surveyContent.forEach(function(survey, index) {
            var questionItem = document.createElement('li');
            questionItem.classList.add('list-group-item');
            questionItem.classList.add('list-group-item-primary');
            questionItem.textContent = 'Question ' + (index + 1) + ': ' + survey.question_text;

            var answersList = document.createElement('ul');
            answersList.classList.add('list-group');

            survey.answers.forEach(function(answer, answerIndex) {
                var answerItem = document.createElement('li');
                answerItem.classList.add('list-group-item');
                answerItem.textContent = 'Answer ' + (answerIndex + 1) + ': ' + answer.answer_text;
                answersList.appendChild(answerItem);
            });

            questionItem.appendChild(answersList);
            $('#surveyContent').append(questionItem);
        });

        $('#surveyModal').modal('show');
    }
</script>



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
