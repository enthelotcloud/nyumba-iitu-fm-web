@extends('layouts.guest.app')
@section('title', 'Nyumba iitu FM - Privacy Policy')
@section('meta_description', 'Nyumba iitu FM is a streaming live on 91.5 FM in MT.Kenya Region and online. Tune in for music, news, and cultural Shows. Listen live on our website or mobile app. Wiigue wi mucii!')
@section('content')
<div class="min-h-screen py-10 px-5 text-slate-200" style="background: linear-gradient(135deg, #0a0a1a 0%, #1a1a2e 100%);">
    <div class="max-w-7xl mx-auto">
        <div>

            <h1 class="text-4xl md:text-5xl font-bold mb-3 bg-linear-to-r from-blue-500 to-blue-400 bg-clip-text text-transparent">
                Privacy Policy
            </h1>
            <div class="text-slate-400 text-sm mb-8 pb-5 border-b border-blue-500/20">
                <p><strong>Effective Date:</strong> April 28, 2026</p>
                <p><strong>Last Updated:</strong> April 28, 2026</p>
            </div>

            <p class="mb-4 text-slate-300">
                Nyumba iitu FM ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our website, mobile application, and streaming services (collectively, the "Service").
            </p>

            <div class="bg-blue-500/10 p-6 rounded-xl border-l-4 border-blue-500 my-6">
                <p class="text-slate-200">
                    <strong>Summary:</strong> Nyumba iitu FM is a radio streaming service. We collect minimal data necessary to provide our service. We do not sell your personal information.
                </p>
            </div>

            <div class="space-y-8">
                <section>
                    <h2 class="text-2xl font-semibold text-blue-400 mb-4">1. Information We Collect</h2>

                    <h3 class="text-xl text-blue-300 mt-4 mb-2">1.1 Information You Provide to Us</h3>
                    <p class="mb-2">We may collect information you voluntarily provide to us, including:</p>
                    <ul class="list-disc pl-8 space-y-2 text-slate-300">
                        <li><strong>Contact Information:</strong> Name, email address, phone number (when you contact us via WhatsApp, email, or phone).</li>
                        <li><strong>Feedback and Communications:</strong> Messages, suggestions, or requests you send to us.</li>
                    </ul>

                    <h3 class="text-xl text-blue-300 mt-6 mb-2">1.2 Information Automatically Collected</h3>
                    <p class="mb-2">When you use our Service, we may automatically collect:</p>
                    <ul class="list-disc pl-8 space-y-2 text-slate-300">
                        <li><strong>Device Information:</strong> IP address, device type, operating system, and browser type.</li>
                        <li><strong>Usage Data:</strong> Pages visited, time spent, streaming duration, and features used.</li>
                        <li><strong>Audio Streaming Data:</strong> Connection quality and stream timing for service optimization.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-400 mb-4">2. How We Use Your Information</h2>
                    <ul class="list-disc pl-8 space-y-2 text-slate-300">
                        <li>Provide and maintain our radio streaming service</li>
                        <li>Improve and optimize stream quality and user experience</li>
                        <li>Respond to your inquiries and support requests</li>
                        <li>Monitor and prevent technical issues or abuse</li>
                        <li>Analyze usage trends to enhance our content</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-400 mb-4">3. Data Security</h2>
                    <p class="mb-4">We implement industry-standard security measures to protect your information, including:</p>
                    <ul class="list-disc pl-8 space-y-2 text-slate-300">
                        <li>Encryption of data in transit (SSL/TLS)</li>
                        <li>Regular security assessments and updates</li>
                        <li>Restricted access to personal data</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-400 mb-4">4. Your Rights</h2>
                    <p>Depending on your location, you may have the right to access, correct, delete, or restrict how we use your data. To exercise these rights, please contact us using the information below.</p>
                </section>
            </div>

            <div class="mt-10 p-8 bg-blue-500/5 rounded-xl border border-blue-500/10 text-center">
                <h2 class="text-xl font-bold text-slate-200 mb-4">Contact Us</h2>
                <div class="space-y-2 text-slate-300">
                    <p><strong>Nyumba iitu FM</strong></p>
                    <p>Phone/WhatsApp: <a href="tel:+254714505050" class="text-blue-400 hover:underline">0792 40 40 40</a></p>
                    <p>Email: <a href="mailto:info@nyumbaiitufm.co.ke" class="text-blue-400 hover:underline">info@nyumbaiitufm.co.ke</a></p>
                    <p>Location: Ruiru Kihunguro Essy Height 1st Floor</p>
                </div>
            </div>

            <div class="my-8 h-px bg-linear-to-r from-transparent via-blue-500 to-transparent opacity-30"></div>

            <div class="text-center">
                <p class="text-xs text-slate-500 mb-6">
                    This Privacy Policy applies solely to Nyumba iitu FM and its streaming services.
                </p>
                <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-400 transition-colors inline-flex items-center">
                    &larr; Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
