@extends('web.master')
@section('webcontain')
    <main>
        <section style="background-image: url({{ asset('images/shape-8.png') }}); background-size:auto 100%;">
            <div class="container py-5">
                <div style="background-color: #f8f8f8; border-radius: 8px; padding: 20px; text-align: center; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); max-width: 500px; margin: 0 auto;">
                    <h2 style="font-size: 24px; color: #333; margin-bottom: 10px;">Verify Your Email</h2>
                    <p style="font-size: 18px; color: #555;">Please verify your email to adopt the victim.</p>
                </div>
            </div>
        </section>
    </main>
@endsection
