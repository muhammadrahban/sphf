@extends('web.master')
@section('webcontain')
    <main>
        <section style="background-image: url({{ asset('images/shape-8.png') }}); background-size:auto 100%;">
            <div class="container py-5">
                <div style="background-color: #f8f8f8; border-radius: 8px; padding: 20px; text-align: center; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); max-width: 500px; margin: 0 auto;">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 style="font-size: 24px; color: #333; margin-bottom: 10px;">Hi {{ Auth::user()->first_name }}</h2>
                    <p style="font-size: 18px; color: #555;">Unlock the power of giving. Verify your email now to make a difference through donations.</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Resend Email Verification</button>
                    </form>
                    <p style="font-size: 14px; color: #888; margin-top: 20px;">Regards,<br>Team, Sindh People's Housing For Flood Affectees (SPHF).</p>
                </div>
            </div>
        </section>
    </main>
@endsection
