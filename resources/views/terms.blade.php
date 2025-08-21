@extends('layout.masterp')

@section('title', 'Terms & Conditions - Barter Brains')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4" style="color: #1f3d85; font-weight: bold;">Terms & Conditions</h2>
    <p class="text-center mb-4" style="color: #1f3d85;">Last Updated: {{ $lastUpdated }}</p>


    <div class="card shadow p-4">
        <h4>1. Introduction</h4>
        <p>
            Welcome to <strong style="color: #1f3d85; font-style:italic">Barter Brains</strong>. By accessing or using our platform, you agree 
            to comply with and be bound by the following Terms & Conditions. Please read them carefully 
            before using the website.
        </p>

        <h4>2. Eligibility</h4>
        <p>
            You must be at least 16 years old to use this platform. By registering, you confirm that 
            the information you provide is accurate and up to date.
        </p>

        <h4>3. Nature of Service</h4>
        <p>
            Barter Brains allows users to exchange skills (e.g., cooking lessons for graphic design help). 
            We do not sell products or charge for skill exchanges. Any agreements made between users 
            are their own responsibility.
        </p>

        <h4>4. User Responsibilities</h4>
        <ul>
            <li>Provide truthful information in your profile.</li>
            <li>Respect other users and avoid offensive content or behavior.</li>
            <li>Do not misuse the platform for illegal, harmful, or commercial activities.</li>
        </ul>

        <h4>5. Limitations of Liability</h4>
        <p>
            Barter Brains is only a connecting platform. We are not responsible for the quality, 
            safety, or outcome of any skill exchange between users.
        </p>

        <h4>6. Certificates</h4>
        <p>
            Certificates issued by Barter Brains are for recognition purposes only. They do not 
            represent professional accreditation or official training licenses.
        </p>

        <h4>7. Privacy</h4>
        <p>
            Your data is protected under our Privacy Policy. By using Barter Brains, you agree 
            that we may use your information to operate the platform and improve our services.
        </p>

        <h4>8. Termination</h4>
        <p>
            We reserve the right to suspend or terminate any account that violates these Terms, 
            without prior notice.
        </p>

        <h4>9. Modifications</h4>
        <p>
            We may update these Terms & Conditions at any time. Continued use of the platform 
            after changes means you accept the new Terms.
        </p>

        <h4>10. Contact Us</h4>
        <p>
            If you have any questions, please contact us at 
            <a href="{{ url('contact') }}">support@barterbrains.com</a>.
        </p>
    </div>
</div>
@endsection
