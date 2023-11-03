@extends('layouts.master')
@section('contain')
    <!-- Page titles -->
    <div class="row page-titles">
        <!-- Title based on whether you're updating or adding a survey -->
        <div class="col-md-5 align-self-center">
            @if (isset($survey))
                <h4 class="card-title">Update Survey</h4>
            @else
                <h4 class="card-title">Add Survey</h4>
            @endif
        </div>
        <div class="col-md-7 align-self-center text-end">
            <!-- Breadcrumbs -->
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ Route('survey.list') }}">Surveys</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Page titles -->

    <!-- survey Form -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            @if (isset($survey))
                <!-- Form for updating an existing survey -->
                <form method="POST" action={{ Route('survey.update', $survey->id) }} enctype="multipart/form-data"
                    data-parsley-validate>
                    @csrf
                    @method('PUT')
                @else
                    <!-- Form for adding a new survey -->
                    <form action="{{ Route('survey.add') }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate>
                        @csrf
            @endif
            <!-- Form fields -->
            <div class="form-row col-md-12">
                <!-- Title field -->
                <div class="col-md-6 mb-3">
                    <label class="font-bold">Name*</label>
                    <!-- Input for the name -->
                    <input required data-parsley-required-message="name field is required" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $survey->name ?? old('name') }}" autocomplete="off" placeholder="Enter name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <!-- subtitle field -->
                <div class="col-md-6 mb-3">
                    <label class="font-bold">Subtitle*</label>
                    <!-- Input for the subtitle -->
                    <input required data-parsley-required-message="subtitle field is required" type='text'
                        name="subtitle" value="{{ $survey->subtitle ?? old('subtitle') }}"
                        class=" form-control @error('subtitle') is-invalid @enderror" placeholder="Enter subtitle">
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-bold">FDP*</label>
                    <!-- Input for the fdp (read-only) -->
                    <input required data-parsley-required-message="FDP field is required" type="number" name="fdp"
                        min="5" oninput="this.value = this.value.replace(/\D/g, '')"
                        value="{{ $survey->fdp ?? old('fdp') }}" class="form-control @error('fdp') is-invalid @enderror"
                        autocomplete="off" placeholder="Enter days range">
                    @error('fdp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- image field -->
                <div class="col-md-6 mb-3">
                    <label class="font-bold">Image</label>
                    <!-- Textarea for the image -->
                    @if (isset($survey))
                        <input data-parsley-required-message="image field is required" type="file" accept="image/*"
                            placeholder="Add image" class="form-control @error('image') is-invalid @enderror" name="image"
                            rows="5">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <a href="{{ URL::asset($survey->image_url != null ? env('MEDIA_URL') . $survey->image_url : 'images/placeholder_blue_user.png') }}"
                            target="_blank">
                            <img src="{{ $survey->image_url != null ? env('MEDIA_URL') . $survey->image_url : asset('images/placeholder_blue_user.png') }}"
                                class="img-circle" width="50" />
                        </a>
                    @else
                        <input required data-parsley-required-message="image field is required" type="file"
                            accept="image/*" placeholder="Add image"
                            class="form-control @error('image') is-invalid @enderror" name="image" rows="5">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endif
                </div>
                <div class="faqs_list col-md-12 mb-3">
                    @if (@isset($survey))
                        @php
                            $questionCount = count($survey->questions);
                        @endphp
                        @foreach ($survey->questions as $questionIndex => $question)
                            <div class="row dynamic-wrap" id="dynamic-wrap-{{ $questionIndex }}" data-index="{{ $questionIndex }}">
                                <div class="col-md-11 mb-3">
                                    <label class="font-bold">Question*</label>
                                    <div style="position: relative;">
                                        <input required data-parsley-required-message="question field is required"
                                            data-parsley-errors-container="#questionerrorContainer{{ $questionIndex }}"
                                            style="border-color: #00cbff;" type='text' name="question[{{ $questionIndex }}][text]"
                                            value="{{ $question->question_text ?? old('question') }}"
                                            class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter question" />
                                        @if ($questionIndex > 0)
                                            <button
                                                style="position: absolute; right: -40px; top: 50%; transform: translateY(-50%);"
                                                class="btn btn-success btn-increment btn-add btn-question" type="button">+</button>
                                            <button
                                                style="position: absolute; right: -81px; top: 50%; transform: translateY(-50%);"
                                                class="btn btn-danger btn-decrement btn-question-minus" type="button">-</button>
                                        @else
                                        <button
                                            style="position: absolute; right: -79px;width: 9%; top: 50%; transform: translateY(-50%);"
                                            class="btn btn-success btn-add btn-question " type="button">+</button>
                                        @endif
                                    </div>
                                    <div id="questionerrorContainer{{ $questionIndex }}" class="text-danger"></div>
                                </div>
                                @foreach ($question->answers as $answerIndex => $answer)
                                <div class="answer-main-div offset-1 col-md-10 mb-3">
                                    <label class="font-bold">Answer*</label>
                                    <div style="position: relative;">
                                        <input required data-parsley-required-message="answer field is required"
                                            data-parsley-errors-container="#answererrorContainer{{ $questionIndex }}_{{ $answerIndex }}" type='text'
                                            name="question[{{ $questionIndex }}][answer][]"
                                            value="{{ $answer->answer_text ?? old('subtitle') }}"
                                            class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter answer">
                                        @if ($answerIndex > 0)
                                        <button
                                            style="position: absolute; right: -41px; top: 50%; transform: translateY(-50%);"
                                            class="btn btn-success btn-increment btn-add-answer" type="button">+</button>
                                        <button
                                            style="position: absolute; right: -82px; top: 50%; transform: translateY(-50%);"
                                            class="btn btn-danger btn-decrement btn-answer-minus" type="button">-</button>
                                        @else
                                        <button
                                            style="position: absolute; right: -82px;width:10%; top: 50%; transform: translateY(-50%);"
                                            class="btn btn-success btn-add-answer" type="button">+</button>
                                        @endif
                                    </div>
                                    <div id="answererrorContainer{{ $questionIndex }}_{{ $answerIndex }}" class="text-danger"></div>
                                </div>
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <div class="row dynamic-wrap" id="dynamic-wrap-0" data-index="0">
                            <div class="col-md-11 mb-3">
                                <label class="font-bold">Question*</label>
                                <div style="position: relative;">
                                    <input required data-parsley-required-message="question field is required"
                                        data-parsley-errors-container="#questionerrorContainer"
                                        style="border-color: #00cbff;" type='text' name="question[0][text]"
                                        value="{{ $survey->subtitle ?? old('question') }}"
                                        class="form-control @error('subtitle') is-invalid @enderror"
                                        placeholder="Enter question" />
                                    <button
                                        style="position: absolute; right: -79px;width: 9%; top: 50%; transform: translateY(-50%);"
                                        class="btn btn-success btn-add btn-question" type="button">+</button>
                                </div>
                                <div id="questionerrorContainer" class="text-danger"></div>
                            </div>
                            <div class=" answer-main-div offset-1 col-md-10 mb-3">
                                <label class="font-bold">Answer*</label>
                                <div style="position: relative;">
                                    <input required data-parsley-required-message="answer field is required"
                                        data-parsley-errors-container="#answererrorContainer" type='text'
                                        name="question[0][answer][]" value="{{ $survey->subtitle ?? old('subtitle') }}"
                                        class=" form-control @error('subtitle') is-invalid @enderror"
                                        placeholder="Enter answer">
                                    <button style="position: absolute; right: -79px;width: 10%; top: 50%; transform: translateY(-50%);"
                                        class="btn btn-success btn-add-answer" type="button">+</button>
                                </div>
                                <div id="answererrorContainer" class="text-danger"></div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Submit button -->
                <div class="col-md-12">
                    @if (isset($survey))
                        <button type="submit" class="btn btn-warning me-2 text-white">Update</button>
                    @else
                        <button type="submit" class="btn btn-success me-2 text-white">Submit</button>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function cloneQuestionUpdate($questionIndex) {
            $questionIndex++;
            var cloneDiv = '<div class="row dynamic-wrap" id="dynamic-wrap-' + $questionIndex + '"  data-index="' +
                $questionIndex + '">';
            cloneDiv += '<div class="col-md-11 mb-3">';
            cloneDiv += '<label class="font-bold">Question*</label>';
            cloneDiv += '<div style="position: relative;">';
            cloneDiv +=
                '<input style="border-color: #00cbff;" required="" data-parsley-required-message="question field is required" data-parsley-errors-container="#questionerrorContainer-' +
                $questionIndex + '" type="text" name="question[' +
                $questionIndex + '][text]" value="" class="form-control " placeholder="Enter question">';
            cloneDiv +=
                '<button style="position: absolute;right: -78px;top: 50%;transform: translateY(-50%);" class="btn btn-danger btn-add btn-question-minus" type="button">-</button>';
            cloneDiv +=
                '<button style="position: absolute;right: -40px;top: 50%;transform: translateY(-50%);" class="btn btn-success btn-add-' +
                $questionIndex + ' btn-question" type="button">+</button>';
            cloneDiv += '</div>';
            cloneDiv += '<div id="questionerrorContainer-' + $questionIndex + '" class="text-danger"></div>';

            cloneDiv += '</div>';
            cloneDiv += '<div class="answer-list">';
            cloneDiv += '<div class="answer-main-div offset-1 col-md-10 mb-3">';
            cloneDiv += '<label class="font-bold">Answer*</label>';
            cloneDiv += '<div style="position: relative;">';
            cloneDiv +=
                '<input required data-parsley-required-message="answer field is required" data-parsley-errors-container="#answererrorContainer-' +
                $questionIndex + '" type="text" name="question[' +
                $questionIndex +
                '][answer][]" value="{{ $survey->subtitle ?? old('subtitle') }}" class=" form-control @error('subtitle') is-invalid @enderror" placeholder="Enter answer">';
            cloneDiv +=
                '<button style="position: absolute; right: 1px; top: 50%; transform: translateY(-50%);" class="btn btn-success btn-add-answer" type="button">+</button>';
            cloneDiv += '</div>';
            cloneDiv += '<div id="answererrorContainer-' + $questionIndex + '" class="text-danger"></div>';

            cloneDiv += '</div>';
            cloneDiv += '</div>';
            cloneDiv += '</div>';
            $('.faqs_list').append(cloneDiv);
        }
        $(document).ready(function() {
            @if (@isset($survey))
                var start = {{$questionCount}};
            @else
                var start = 1;
            @endif
            var errorindex = 1;

            function cloneQuestion() {
                var cloneDiv = '<div class="row dynamic-wrap" id="dynamic-wrap-' + start + '"  data-index="' +
                    start + '">';
                cloneDiv += '<div class="col-md-11 mb-3">';
                cloneDiv += '<label class="font-bold">Question*</label>';
                cloneDiv += '<div style="position: relative;">';
                cloneDiv +=
                    '<input style="border-color: #00cbff;" required="" data-parsley-required-message="question field is required" data-parsley-errors-container="#questionerrorContainer-' +
                    start + '" type="text" name="question[' +
                    start + '][text]" value="" class="form-control " placeholder="Enter question">';
                cloneDiv +=
                    '<button style="position: absolute;right: -81px;top: 50%;transform: translateY(-50%);" class="btn btn-danger btn-add btn-question-minus" type="button">-</button>';
                cloneDiv +=
                    '<button style="position: absolute;right: -40px;top: 50%;transform: translateY(-50%);" class="btn btn-success btn-add-' +
                    start + ' btn-question" type="button">+</button>';
                cloneDiv += '</div>';
                cloneDiv += '<div id="questionerrorContainer-' + start + '" class="text-danger"></div>';

                cloneDiv += '</div>';
                cloneDiv += '<div class="answer-list">';
                cloneDiv += '<div class="answer-main-div offset-1 col-md-10 mb-3">';
                cloneDiv += '<label class="font-bold">Answer*</label>';
                cloneDiv += '<div style="position: relative;">';
                cloneDiv +=
                    '<input required data-parsley-required-message="answer field is required" data-parsley-errors-container="#answererrorContainer-' +
                    errorindex + '" type="text" name="question[' +
                    start +
                    '][answer][]" value="{{ $survey->subtitle ?? old('subtitle') }}" class=" form-control @error('subtitle') is-invalid @enderror" placeholder="Enter answer">';
                cloneDiv +=
                    '<button style="position: absolute; right: -89px;width:11%; top: 50%; transform: translateY(-50%);" class="btn btn-success btn-add-answer" type="button">+</button>';
                cloneDiv += '</div>';
                cloneDiv += '<div id="answererrorContainer-' + errorindex + '" class="text-danger"></div>';

                cloneDiv += '</div>';
                cloneDiv += '</div>';
                cloneDiv += '</div>';
                $('.faqs_list').append(cloneDiv);

                // Bind click event to the cloned question button
                $('.btn-add-' + start).on('click', function() {
                    cloneQuestion(); // Call the function to clone another question
                    start++; // Increment start for the next question
                });
            }

            function cloneAnswer(button, index) {
                errorindex++
                var answerDiv = '<div class="answer-main-div offset-1 col-md-10 mb-3">';
                answerDiv += '<label class="font-bold">Answer*</label>';
                answerDiv += '<div style="position: relative;">';
                answerDiv +=
                    '<input required data-parsley-required-message="answer field is required" data-parsley-errors-container="#answererrorContainer-' +
                    errorindex + '" type="text" name="question[' +
                    index +
                    '][answer][]" value="{{ $survey->subtitle ?? old('subtitle') }}" class=" form-control @error('subtitle') is-invalid @enderror" placeholder="Enter answer">';
                answerDiv +=
                    '<button style="position: absolute;right: -82px;top: 50%;transform: translateY(-50%);" class="btn btn-danger btn-add btn-answer-minus" type="button">-</button>';
                answerDiv +=
                    '<button style="position: absolute; right: -41px; top: 50%; transform: translateY(-50%);" class="btn btn-success btn-add-answer" type="button">+</button>';
                answerDiv += '</div>';
                answerDiv += '<div id="answererrorContainer-' + errorindex + '" class="text-danger"></div>';

                answerDiv += '</div>';

                // Append the answer fields after the button's parent answer-list div
                button.closest('.answer-main-div').after(answerDiv);
            }

            $(".btn-question").on("click", function() {
                cloneQuestion();
                start++;
            });
            // $(".btn-question-updte").on("click", function() {
            //     cloneQuestionUpdate();
            //     start++;
            // });

            $('.faqs_list').on('click', '.btn-question-minus', function() {
                $(this).closest('.dynamic-wrap').remove();

                // Re-index the questions
                $('.dynamic-wrap').each(function(index) {
                    $(this).attr('id', 'dynamic-wrap-' + index);
                    $(this).find('input[name^="question"]').each(function() {
                        var newName = $(this).attr('name').replace(/\[(\d+)\]/, '[' +
                            index + ']');
                        $(this).attr('name', newName);
                    });
                    start = index;
                });
                start++;
            });
            // Event delegation for answer buttons
            $('.faqs_list').on('click', '.btn-answer-minus', function() {
                $(this).closest('.answer-main-div').remove();
            });

            // Event delegation for answer buttons
            $('.faqs_list').on('click', '.btn-add-answer', function() {
                var index = $(this).closest('.dynamic-wrap').data('index');
                cloneAnswer($(this), index);
            });
        });
    </script>
@endsection
