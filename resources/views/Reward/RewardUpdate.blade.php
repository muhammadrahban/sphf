@extends('layouts.master')
@section('contain')

<!-- Page titles -->
<div class="row page-titles">
    <!-- Title based on whether you're updating or adding a reward -->
    <div class="col-md-5 align-self-center">
        @if (isset($reward))
            <h4 class="card-title">Update Reward</h4>
        @else
            <h4 class="card-title">Add Offer</h4>
        @endif
    </div>
    <div class="col-md-7 align-self-center text-end">
        <!-- Breadcrumbs -->
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a class="text-cyan" href="{{Route('reward.list')}}">Rewards</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page titles -->

<!-- reward Form -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
        @if (isset($reward))
            <!-- Form for updating an existing reward -->
            <form method="POST" action={{ Route('reward.update',$reward->id) }} enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('PUT')
        @else
            <!-- Form for adding a new reward -->
            <form action="{{ Route('reward.add')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @csrf
        @endif
                <!-- Form fields -->
                <div class="form-row col-md-6">
                    <!-- Title field -->
                    <div class="col-md-12 mb-3">
                        <label class="font-bold">Title*</label>
                        <!-- Input for the title -->
                        <input required data-parsley-required-message="Title field is required" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $reward->title ?? old('title') }}" autocomplete="off" placeholder="Enter title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <!-- subtitle field -->
                    <div class="col-md-12 mb-3">
                        <label class="font-bold">Subtitle*</label>
                        <!-- Input for the subtitle -->
                        <input required data-parsley-required-message="subtitle field is required" type='text' name="subtitle"  value="{{ $reward->subtitle ?? old('subtitle') }}" class=" form-control @error('subtitle') is-invalid @enderror" placeholder="Enter subtitle">
                        @error('subtitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="col-md-12 mb-3">
                        <label class="font-bold">Subtitle*</label>
                        <input name="kuch[]" id="loo" multiple data-role="tagsinput">
                    </div>
                    <span class="invalid-feedback" id="custom_error" style="display:none;" role="alert">
                        <strong></strong>
                    </span> --}}

                    <div class="col-md-12 mb-3">
                        <label class="font-bold">FDP*</label>
                        <!-- Input for the fdp (read-only) -->
                        <input required data-parsley-required-message="FDP field is required"

                        name="fdp[]" id="loo" multiple data-role="tagsinput" style="width: 127vh"
                               value="{{implode(',', $reward->values)}}"
                               class="form-control @error('fdp') is-invalid @enderror"
                               autocomplete="off"
                               >
                        @error('fdp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback" id="custom_error" style="display:none;" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    <!-- image field -->
                    <div class="col-md-12 mb-3">
                        <label class="font-bold">Image</label>
                        <input  type="file" accept="image/*"  placeholder="Add image" class="form-control @error('image') is-invalid @enderror" name="image" rows="5" >
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if (isset($reward))
                        <a href="{{ URL::asset($reward->image != null ? env('MEDIA_URL') . $reward->image : 'images/placeholder_blue_user.png') }}"
                            target="_blank">
                            <img src="{{ $reward->image != null ? env('MEDIA_URL') . $reward->image : asset('images/placeholder_blue_user.png') }}"
                                class="img-circle" width="50" />
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Submit button -->
                <div class="col-md-12">
                    @if (isset($reward))
                        <button type="submit" class="btn btn-warning me-2 text-white submit_btn">Update</button>
                    @else
                        <button type="submit" class="btn btn-success me-2 text-white submit_btn">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Initialize bootstrap-tagsinput with the modified behavior
        $('#loo').tagsinput({
            // Your options here
        });

        // Modify the behavior to treat Enter key as Space key
        $('#loo').on('keypress', function(e) {
            if (e.keyCode === 13) { // Enter key
                e.preventDefault();
                var currentValue = $(this).val();
                $(this).val(currentValue + ' '); // Treat Enter as Space
            }
        });
    });
</script>

<script>
    // $('input').tagsinput({
    //     freeInput: true
    // });
    $('#loo').on('beforeItemAdd', function(event) {
    // Replace Enter key with Space key
    if (event.item === '\n') {
        event.item = ' '; // Replace Enter with Space
    }

    if (!/^\d+$/.test(event.item)) {
        $('#custom_error').css("display", "block");
        $('#custom_error > strong').text("Only numeric values are acceptable!");
        $('.submit_btn').attr('disabled', true); // Disable the submit button
        event.cancel = true; // Cancel the item add event
    } else {
        $('#custom_error').css("display", "none");
        $('#custom_error > strong').text("");
        $('.submit_btn').attr('disabled', false); // Enable the submit button
    }
});

</script>
@endsection
