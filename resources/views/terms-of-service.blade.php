@extends('layouts.guest.app')
@section('title', 'Nyumba iitu FM - Terms of Service')
@section('meta_description', 'Nyumba iitu FM is a streaming live on 91.5 FM in MT.Kenya Region and online. Tune in for music, news, and cultural Shows. Listen live on our website or mobile app. Wiigue wi mucii!')
@section('content')
<div class="min-h-screen py-10 px-5 bg-white text-slate-800 font-['Poppins']">
    <div class="max-w-7xl mx-auto">
        <div>

            <h1 class="text-2xl md:text-2xl font-bold mb-3 bg-gradient-to-r from-blue-900 to-blue-600 bg-clip-text text-transparent">
                General Terms and Conditions
            </h1>
            <div class="text-slate-500 text-sm mb-8 pb-5 border-b border-slate-200">
                <p><strong>Effective Date:</strong> May 3, 2026</p>
                <p><strong>Last Updated:</strong> May 3, 2026</p>
            </div>

            <p class="mb-4 text-slate-600 leading-relaxed">
                Welcome to Nyumba iitu FM. These General Terms and Conditions ("Terms") govern your access to and use of our website, mobile application, and radio streaming services (collectively, the "Service"). By accessing or using our Service, you agree to be bound by these Terms.
            </p>

            <div class="bg-blue-50 p-6 rounded-xl border-l-4 border-blue-600 my-6">
                <p class="text-slate-800">
                    <strong>Summary:</strong> Our streaming service is provided for your personal, non-commercial entertainment. Please do not misuse our streams, attempt to redistribute our content without permission, or disrupt the service for other listeners.
                </p>
            </div>

            <div class="space-y-8">
                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">1. Use of the Service</h2>
                    <p class="mb-2 text-slate-600">We grant you a personal, non-exclusive, non-transferable, and revocable license to use our Service for personal, non-commercial purposes. You agree not to:</p>
                    <ul class="list-disc pl-8 space-y-2 text-slate-600">
                        <li>Modify, copy, distribute, or reverse engineer any part of the Service.</li>
                        <li>Use the Service for any illegal or unauthorized purpose.</li>
                        <li>Interfere with or disrupt the servers or networks connected to the Service.</li>
                        <li>Use automated systems (like bots or scrapers) to access our streams or website.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">2. Intellectual Property Rights</h2>
                    <p class="mb-2 text-slate-600">All content provided through the Service is protected by intellectual property laws.</p>
                    <ul class="list-disc pl-8 space-y-2 text-slate-600">
                        <li><strong>Station Content:</strong> The Nyumba iitu FM name, logos, broadcasts, original shows, and website design are the exclusive property of Nyumba iitu FM.</li>
                        <li><strong>Audio Streams:</strong> The music, interviews, and advertisements broadcast on our station remain the property of their respective copyright holders.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">3. User-Generated Content</h2>
                    <p class="mb-4 text-slate-600 leading-relaxed">If you submit requests, feedback, or messages to us (e.g., via WhatsApp or SMS), you grant Nyumba iitu FM the right to read or broadcast these submissions on air, unless you explicitly request otherwise. We reserve the right to review and remove any user-submitted content at our discretion.</p>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">4. Third-Party Links and Services</h2>
                    <p class="mb-4 text-slate-600 leading-relaxed">Our Service may contain links to third-party websites or services that are not owned or controlled by Nyumba iitu FM. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites. We strongly advise you to read the terms and conditions and privacy policies of any third-party sites you visit.</p>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">5. Disclaimer of Warranties</h2>
                    <p class="mb-4 text-slate-600 leading-relaxed">The Service is provided on an "AS IS" and "AS AVAILABLE" basis. Nyumba iitu FM makes no representations or warranties of any kind, express or implied, regarding the operation of the Service or the information, content, or materials included. We do not warrant that the audio stream will be uninterrupted, secure, or free of errors.</p>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">6. Limitation of Liability</h2>
                    <p class="mb-4 text-slate-600 leading-relaxed">In no event shall Nyumba iitu FM, its directors, employees, or partners be liable for any indirect, incidental, special, consequential, or punitive damages arising out of your access to or use of, or inability to access or use, the Service.</p>
                </section>

                <section>
                    <h2 class="text-2xl font-semibold text-blue-900 mb-4">7. Changes to Terms</h2>
                    <p class="mb-4 text-slate-600 leading-relaxed">We reserve the right to modify or replace these Terms at any time. We will provide notice of any significant changes by posting the new Terms on this page and updating the "Effective Date" at the top. Your continued use of the Service after any such changes constitutes your acceptance of the new Terms.</p>
                </section>
            </div>

            <div class="mt-10 p-8 bg-slate-50 rounded-2xl border border-slate-200 ">
                <h2 class="text-xl font-bold text-slate-900 mb-4">Questions about these Terms?</h2>
                <div class="space-y-2 text-slate-600">
                    <p class="font-semibold text-slate-800">Nyumba iitu FM</p>
                    <p>Phone/WhatsApp: <a href="tel:+254792404040" class="text-blue-600 hover:text-blue-800 hover:underline transition-colors">0792 40 40 40</a></p>
                    <p>Email: <a href="mailto:info@nyumbaiitufm.co.ke" class="text-blue-600 hover:text-blue-800 hover:underline transition-colors">info@nyumbaiitufm.co.ke</a></p>
                    <p>Location: Ruiru Kihunguro Essy Height 1st Floor</p>
                </div>
            </div>

            <div class="my-8 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

            <div >
                <p class="text-xs text-slate-400 mb-6">
                    By tuning in and using our services, you acknowledge that you have read and understood these Terms.
                </p>
                <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 transition-colors inline-flex items-center font-medium">
                    &larr; Back to Home
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
