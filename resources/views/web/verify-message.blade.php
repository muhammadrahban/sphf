@extends('web.master')
@section('webcontain')
    <main>
        <section style="background-image: url({{ asset('images/shape-8.png') }}); background-size:auto 100%;">
            <div class="container py-5">
                <!-- Your message displayed here -->
                <p>{{ $data['message'] }}</p>
            </div>
        </section>
    </main>
@endsection
