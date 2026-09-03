@extends('layouts.layout')

@section('title')
    Terms of Use - Umeboshi
@endsection

@section('content')
    <section class="max-w-[800px] mx-auto">
        <section
            class="my-2 shadow-lg shadow-purple-800/50 border border-purple-500 p-6 mb-10 bg-purple-950 text-white rounded">
            <h1 class="font-light tracking-[6px] lg:tracking-[10px] text-2xl lg:text-4xl uppercase border-b-[0.5px] mb-4 pb-2">
    Terms of Use
</h1>

<p class="font-light lg:text-lg mb-6">
    These Terms of Use ("Terms") govern your access to and use of the Umeboshi application ("Umeboshi," "the app," "we," "us," or "our"). By downloading, accessing, or using Umeboshi, you agree to these Terms.
</p>

<p class="font-light lg:text-lg mb-6">
    If you do not agree to these Terms, you should not use Umeboshi.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">The Service</h2>

<p class="font-light lg:text-lg mb-6">
    Umeboshi is a language-learning and flashcard application that uses artificial intelligence services, including OpenAI's API, to generate vocabulary information such as translations, readings, definitions, and example sentences from words or text you enter or scan using your device's camera.
</p>

<p class="font-light lg:text-lg mb-6">
    On supported Android devices, Umeboshi may also provide optional integration with AnkiDroid, allowing you to add generated flashcards to an AnkiDroid deck.
</p>

<p class="font-light lg:text-lg mb-6">
    Features may differ between platforms and versions of the app.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Accounts and Free Usage</h2>

<p class="font-light lg:text-lg mb-6">
    Umeboshi does not require you to create a traditional user account.
</p>

<p class="font-light lg:text-lg mb-6">
    We may provide a limited number of AI-powered requests free of charge. Free usage may be tracked using an anonymous identifier associated with your installation or device.
</p>

<p class="font-light lg:text-lg mb-6">
    We may establish or change free-tier limits, request allowances, rate limits, or other usage restrictions as necessary to operate the service.
</p>

<p class="font-light lg:text-lg mb-6">
    After your free allowance has been used, continued access to certain AI-powered features may require an active Umeboshi subscription or, where supported, the use of your own OpenAI API key.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Subscriptions</h2>

<p class="font-light lg:text-lg mb-6">
    Umeboshi may offer automatically renewing subscriptions that provide access to additional or expanded features and usage allowances.
</p>

<p class="font-light lg:text-lg mb-6">
    Subscriptions are purchased and billed through Apple's App Store or Google Play, depending on your device. Payment is charged to the payment method associated with your applicable Apple or Google account.
</p>

<p class="font-light lg:text-lg mb-6">
    Subscriptions automatically renew unless canceled according to the terms and procedures of the applicable app store. You can view, manage, or cancel your subscription through your Apple or Google account settings.
</p>

<p class="font-light lg:text-lg mb-6">
    Prices and available subscription plans may change over time. Any price changes will be handled in accordance with the policies of the applicable app store and applicable law.
</p>

<p class="font-light lg:text-lg mb-6">
    If a free trial or promotional period is offered, its availability and terms may be subject to additional conditions presented at the time of the offer.
</p>

<p class="font-light lg:text-lg mb-6">
    Except where required by applicable law or the policies of Apple or Google, subscription payments are non-refundable. Refund requests may need to be submitted directly to Apple or Google.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Your Own OpenAI API Key</h2>

<p class="font-light lg:text-lg mb-6">
    On supported platforms, Umeboshi may allow you to provide your own OpenAI API key and use your OpenAI account to process AI requests.
</p>

<p class="font-light lg:text-lg mb-6">
    If you choose to use your own API key, <strong>you are solely responsible for usage associated with that key, including token consumption and any fees, charges, limits, or other costs imposed by OpenAI.</strong>
</p>

<p class="font-light lg:text-lg mb-6">
    Umeboshi does not determine or control OpenAI's pricing, token accounting, billing practices, model availability, rate limits, or other API policies. The amount of tokens or API usage required for a request may vary depending on factors including the content submitted, the generated response, the selected or underlying model, and changes to OpenAI's services.
</p>

<p class="font-light lg:text-lg mb-6">
    <strong>Umeboshi is not responsible for charges incurred through your OpenAI API key, including unexpected charges resulting from the number of tokens consumed while using the app.</strong>
</p>

<p class="font-light lg:text-lg mb-6">
    You are responsible for monitoring your OpenAI account's usage and billing information and for configuring any spending limits or other safeguards made available by OpenAI.
</p>

<p class="font-light lg:text-lg mb-6">
    You are also responsible for keeping your API key confidential. You should immediately revoke or replace your key through OpenAI if you believe it has been compromised.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Acceptable Use</h2>

<p class="font-light lg:text-lg mb-6">
    You agree to use Umeboshi only for lawful purposes and in accordance with these Terms.
</p>

<p class="font-light lg:text-lg mb-3">
    You may not use, or attempt to use, Umeboshi to:
</p>

<ul class="font-light lg:text-lg mb-6 list-disc pl-6 space-y-2">
    <li>Violate applicable laws or regulations;</li>
    <li>Abuse, disrupt, overload, or interfere with the operation of Umeboshi or its supporting services;</li>
    <li>Circumvent free-tier limits, rate limits, subscription requirements, or other technical restrictions;</li>
    <li>Use automated systems to make excessive or unauthorized requests to the service;</li>
    <li>Attempt to gain unauthorized access to Umeboshi's servers, systems, APIs, or other infrastructure; or</li>
    <li>Use AI-powered features in a manner that violates the applicable terms or usage policies of the third-party service providing those features.</li>
</ul>

<p class="font-light lg:text-lg mb-6">
    We may restrict or suspend access to server-backed features if we reasonably believe that an installation, device, or user is abusing the service, circumventing usage restrictions, threatening the reliability or security of the service, or violating these Terms.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Third-Party Services</h2>

<p class="font-light lg:text-lg mb-6">
    Certain Umeboshi features depend on third-party services, including OpenAI, RevenueCat, Apple's App Store, Google Play, and, where applicable, AnkiDroid.
</p>

<p class="font-light lg:text-lg mb-6">
    Your use of these third-party services may also be subject to their respective terms, policies, and agreements.
</p>

<p class="font-light lg:text-lg mb-6">
    We do not control these third-party services and cannot guarantee their continued availability, functionality, pricing, or compatibility with Umeboshi.
</p>

<p class="font-light lg:text-lg mb-6">
    Changes, interruptions, outages, or discontinuation of a third-party service may affect Umeboshi's functionality.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Accuracy of AI-Generated Content</h2>

<p class="font-light lg:text-lg mb-6">
    Translations, readings, definitions, example sentences, and other language information provided by Umeboshi may be generated by artificial intelligence.
</p>

<p class="font-light lg:text-lg mb-6">
    AI-generated content can be inaccurate, incomplete, misleading, unnatural, or otherwise incorrect. Umeboshi does not guarantee the accuracy, completeness, or suitability of generated content.
</p>

<p class="font-light lg:text-lg mb-6">
    You should independently verify important translations or language information before relying on them.
</p>

<p class="font-light lg:text-lg mb-6">
    Umeboshi is intended as a language-learning and study aid and is not a substitute for professional translation, interpretation, instruction, or other professional services.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Your Content and Study Data</h2>

<p class="font-light lg:text-lg mb-6">
    You retain any rights you may have in words, sentences, flashcards, notes, and other content you create or provide through Umeboshi. We do not claim ownership of your content merely because you use it with the app.
</p>

<p class="font-light lg:text-lg mb-6">
    Certain information, including flashcards and study data, may be stored locally on your device.
</p>

<p class="font-light lg:text-lg mb-6">
    You are responsible for maintaining any backups you consider necessary. Removing Umeboshi, clearing its application data, resetting your device, or losing access to your device may permanently delete locally stored information.
</p>

<p class="font-light lg:text-lg mb-6">
    We are not responsible for the loss of locally stored flashcards, study progress, settings, or other data except to the extent such liability cannot legally be excluded.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Intellectual Property</h2>

<p class="font-light lg:text-lg mb-6">
    Umeboshi itself, including its software, design, branding, graphics, and other original materials provided as part of the service, is owned by us or our licensors and is protected by applicable intellectual property laws.
</p>

<p class="font-light lg:text-lg mb-6">
    These Terms give you permission to use Umeboshi for its intended purposes. They do not transfer ownership of Umeboshi or its underlying software or intellectual property to you.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Availability and Changes to the Service</h2>

<p class="font-light lg:text-lg mb-6">
    We may modify, add, remove, suspend, or discontinue features of Umeboshi from time to time.
</p>

<p class="font-light lg:text-lg mb-6">
    We do not guarantee that Umeboshi, or any particular feature of Umeboshi, will always be available, uninterrupted, error-free, or compatible with every device or operating system.
</p>

<p class="font-light lg:text-lg mb-6">
    Where reasonably possible, we will attempt to avoid changes that unnecessarily disrupt paid functionality, but we cannot guarantee continued availability of features that depend on third-party services.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Termination</h2>

<p class="font-light lg:text-lg mb-6">
    You may stop using Umeboshi at any time by uninstalling the app. If you have an active subscription, <strong>uninstalling the app does not automatically cancel your subscription.</strong> You must cancel your subscription through the applicable Apple or Google subscription-management system.
</p>

<p class="font-light lg:text-lg mb-6">
    We may suspend or terminate access to free or server-backed portions of Umeboshi if we reasonably believe you have violated these Terms, abused the service, attempted to circumvent usage restrictions, or created a security or operational risk.
</p>

<p class="font-light lg:text-lg mb-6">
    Provisions of these Terms that by their nature should survive termination will remain in effect after termination.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Disclaimer of Warranties</h2>

<p class="font-light lg:text-lg mb-6">
    To the fullest extent permitted by applicable law, Umeboshi is provided on an "as is" and "as available" basis without warranties of any kind, whether express or implied.
</p>

<p class="font-light lg:text-lg mb-6">
    We do not warrant that Umeboshi will be uninterrupted, error-free, completely secure, or free from defects, or that AI-generated translations and other content will be accurate or appropriate for any particular purpose.
</p>

<p class="font-light lg:text-lg mb-6">
    Some jurisdictions do not allow certain warranty exclusions, so some of these exclusions may not apply to you.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Limitation of Liability</h2>

<p class="font-light lg:text-lg mb-6">
    To the fullest extent permitted by applicable law, we will not be liable for indirect, incidental, special, consequential, or similar damages arising from or related to your use of, or inability to use, Umeboshi.
</p>

<p class="font-light lg:text-lg mb-6">
    This includes, where permitted by law, losses resulting from inaccurate AI-generated content, interruption or unavailability of third-party services, loss of locally stored study data, or charges associated with a third-party account or API key that you choose to use with Umeboshi.
</p>

<p class="font-light lg:text-lg mb-6">
    Nothing in these Terms excludes or limits liability that cannot legally be excluded or limited under applicable law.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Privacy</h2>

<p class="font-light lg:text-lg mb-6">
    Your use of Umeboshi is also subject to our <a class="underline" href="/privacy-policy">Privacy Policy</a>, which explains how information is collected, used, and handled in connection with the app.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Changes to These Terms</h2>

<p class="font-light lg:text-lg mb-6">
    We may update these Terms from time to time to reflect changes to Umeboshi, third-party services, legal requirements, or our business practices.
</p>

<p class="font-light lg:text-lg mb-6">
    When we make changes, we will update the effective date associated with these Terms. Where required by applicable law, we will provide additional notice or obtain consent before material changes take effect.
</p>

<p class="font-light lg:text-lg mb-6">
    Your continued use of Umeboshi after updated Terms become effective constitutes acceptance of the updated Terms to the extent permitted by applicable law.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Governing Law</h2>

<p class="font-light lg:text-lg mb-6">
    These Terms are governed by the laws applicable to the provider of Umeboshi, without regard to conflict-of-law principles, except where applicable consumer-protection laws require otherwise.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Contact</h2>

<p class="font-light lg:text-lg mb-6">
    If you have questions about these Terms or Umeboshi, please contact us using the contact form provided on the <a class="underline" href="/">home page</a>.
</p>

        </section>
    </section>
@endsection
