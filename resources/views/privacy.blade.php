@extends('layout.masterp')

@section('title', 'Data Privacy - Barter Brains')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-3" style="color:#0f2862; font-weight: bold;"> Data Privacy Policy</h2>
        <p class="text-muted text-center">Your trust is our priority at <strong style="color: #0f2862">Barter Brains</strong>.</p>
        <hr>

        <h4 style="color:#0f2862;">1. Information Collection</h4>
        <p>
            When you join Barter Brains, we collect basic details like your name, email, skills offered, and skills requested. 
            This information helps us connect you with other learners and skill-sharers in a safe way.
        </p>

        <h4 style="color:#0f2862;">2. Use of Information</h4>
        <p>
            Your information is used only for enabling smooth bartering between members. 
            We do not sell or misuse your data for advertising or third-party promotions.
        </p>

        <h4 style="color:#0f2862;">3. Data Security</h4>
        <p>
            We store all user data securely. Only verified users can view limited profile details required for skill exchange. 
            Sensitive information like passwords is always encrypted.
        </p>

        <h4 style="color:#0f2862;">4. Sharing Policy</h4>
        <p>
            Barter Brains does not share your personal data with outsiders. Only skills-related information is visible to other users for collaboration.
        </p>

        <h4 style="color:#0f2862;">5. Your Control</h4>
        <p>
            You can update or delete your account anytime. Once deleted, your personal data will be permanently removed from our system.
        </p>

        <hr>
        <p class="text-end text-muted" style="color: #0f2862;"> Last Updated: {{ \Carbon\Carbon::now()->format('F d, Y') }}</p>
    </div>
</div>
@endsection
