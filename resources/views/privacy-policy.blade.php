@extends('layouts.layout')

@section('title')
    Privacy Policy - Umeboshi
@endsection

@section('content')
    <section class="max-w-[800px] mx-auto">
        <section
            class="my-2 shadow-lg shadow-purple-800/50 border border-purple-500 p-6 mb-10 bg-purple-950 text-white rounded">
            <h1 class="font-light tracking-[6px] lg:tracking-[10px] text-2xl lg:text-4xl uppercase border-b-[0.5px] mb-4 pb-2">
    Privacy Policy
</h1>

<p class="font-light lg:text-lg mb-6">
    This Privacy Policy explains what information the Umeboshi app ("Umeboshi," "the app," "we," "us," or "our") collects, how that information is used, and the choices available to you.
</p>

<p class="font-light lg:text-lg mb-6">
    Umeboshi is a language-learning and flashcard application that uses OpenAI's API to generate vocabulary information, translations, and example sentences.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Information We Collect</h2>

<h3 class="font-semibold text-lg mb-2">Anonymous device identifier</h3>

<p class="font-light lg:text-lg mb-6">
    To provide a limited number of free translation requests without requiring you to create an account, Umeboshi uses an anonymous identifier associated with your installation through our subscription and billing provider, RevenueCat.
</p>

<p class="font-light lg:text-lg mb-6">
    This identifier is not based on your name, email address, advertising ID, or other information intended to directly identify you.
</p>

<p class="font-light lg:text-lg mb-6">
    We use this identifier to distinguish installations for purposes such as managing free usage limits and subscription access.
</p>

<h3 class="font-semibold text-lg mb-2">Usage counts</h3>

<p class="font-light lg:text-lg mb-6">
    Our server may associate your anonymous device identifier with information about your use of the app's free translation allowance, such as the number of requests you have used or have remaining.
</p>

<p class="font-light lg:text-lg mb-6">
    We use this information only to operate and enforce the app's free-tier usage limits.
</p>

<h3 class="font-semibold text-lg mb-2">Words and sentences submitted for translation</h3>

<p class="font-light lg:text-lg mb-6">
    When you enter text for translation, or scan text with your camera and select a recognized word or phrase, the text you choose to submit is sent to the translation service used by Umeboshi.
</p>

<p class="font-light lg:text-lg mb-6">
    When using Umeboshi's provided translation service, the submitted text is sent to our server and forwarded to OpenAI's API so that OpenAI can generate information such as translations, definitions, vocabulary information, and example sentences.
</p>

<p class="font-light lg:text-lg mb-6">
    Umeboshi does not store the text you submit for translation in our database after the request has been processed.
</p>

<p class="font-light lg:text-lg mb-6">
    Text recognition performed through the camera occurs locally on your device. Images captured or selected for text recognition are not uploaded to our servers for this purpose. Only the word, phrase, or text that you explicitly choose to submit for translation is sent for processing.
</p>

<h3 class="font-semibold text-lg mb-2">Your own OpenAI API key (optional)</h3>

<p class="font-light lg:text-lg mb-6">
    Umeboshi may allow you to provide your own OpenAI API key instead of using the translation requests provided through Umeboshi's free tier or subscription service.
</p>

<p class="font-light lg:text-lg mb-6">
    When this feature is used, your API key is stored using secure credential storage on your device and is used to communicate with OpenAI. Your API key is not stored on Umeboshi's servers.
</p>

<p class="font-light lg:text-lg mb-6">
    <strong>If you choose to use your own OpenAI API key, you are responsible for all usage associated with that key, including the number of tokens consumed and any fees, charges, limits, or other costs imposed by OpenAI.</strong> Umeboshi does not control OpenAI's pricing, token accounting, billing practices, or usage limits and is not responsible for charges resulting from your use of your own API key through the app.
</p>

<p class="font-light lg:text-lg mb-6">
    The amount of API usage required for a particular request may vary depending on factors such as the text submitted, the generated response, the model used, and changes made by OpenAI to its services.
</p>

<p class="font-light lg:text-lg mb-6">
    You should monitor your OpenAI account's usage and billing settings if you choose to use your own API key.
</p>

<h3 class="font-semibold text-lg mb-2">Subscription and purchase information</h3>

<p class="font-light lg:text-lg mb-6">
    If you purchase a subscription, payment is processed through Apple's App Store or Google Play, as applicable. Subscription status is managed on our behalf by RevenueCat.
</p>

<p class="font-light lg:text-lg mb-6">
    We may receive information necessary to determine whether your subscription is active, but we do not directly receive or store your payment card or other payment details.
</p>

<h3 class="font-semibold text-lg mb-2">AnkiDroid integration (Android only)</h3>

<p class="font-light lg:text-lg mb-6">
    On Android, Umeboshi may provide an optional integration with AnkiDroid.
</p>

<p class="font-light lg:text-lg mb-6">
    If you enable this feature, Umeboshi communicates directly with the AnkiDroid application installed on your device to add flashcards to your Anki deck.
</p>

<p class="font-light lg:text-lg mb-6">
    This integration occurs locally on your device. Umeboshi does not send the contents of your Anki decks or flashcards to our servers as part of this integration.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">How We Use Information</h2>

<p class="font-light lg:text-lg mb-6">
    We use the information described in this Privacy Policy only as necessary to operate and improve Umeboshi, including to provide requested translations, vocabulary information, and example sentences; enforce free-tier usage limits; determine and verify subscription status; provide optional integrations and app functionality; and diagnose technical problems and maintain the reliability of the app.
</p>

<p class="font-light lg:text-lg mb-6">
    We do not sell your personal information, and we do not use your information for targeted advertising.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Third-Party Services</h2>

<p class="font-light lg:text-lg mb-6">
    Umeboshi relies on third-party services that may process limited information as necessary to provide their respective services.
</p>

<ul class="font-light lg:text-lg mb-6 list-disc pl-6 space-y-2">
    <li>
        <strong>OpenAI</strong> — Processes text submitted for AI-powered translation, vocabulary generation, definitions, and example sentences.
    </li>
    <li>
        <strong>RevenueCat</strong> — Processes anonymous app identifiers and purchase or subscription information in order to manage subscription access.
    </li>
    <li>
        <strong>Apple App Store</strong> — Processes purchases and subscriptions made through the iOS version of Umeboshi.
    </li>
    <li>
        <strong>Google Play</strong> — Processes purchases and subscriptions made through the Android version of Umeboshi.
    </li>
</ul>

<p class="font-light lg:text-lg mb-6">
    These third parties process information according to their own terms and privacy policies. Umeboshi does not control the independent privacy practices of these third-party services.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Data Retention</h2>

<p class="font-light lg:text-lg mb-6">
    Our server retains the anonymous identifier and associated usage information necessary to operate the app's free tier and subscription functionality.
</p>

<p class="font-light lg:text-lg mb-6">
    Words and sentences submitted through Umeboshi's server for AI processing are not retained in our application database after the request has been processed.
</p>

<p class="font-light lg:text-lg mb-6">
    Please note that third-party services, including OpenAI, RevenueCat, Apple, and Google, may have their own data-retention practices. Their handling of information is governed by their respective privacy policies and terms.
</p>

<p class="font-light lg:text-lg mb-6">
    Locally stored information, such as saved flashcards and settings, remains on your device until it is removed through the app, cleared by your operating system, or deleted when the app is uninstalled.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Children's Privacy</h2>

<p class="font-light lg:text-lg mb-6">
    Umeboshi is not directed to children under the age of 13, and we do not knowingly collect personal information from children under 13.
</p>

<p class="font-light lg:text-lg mb-6">
    If we become aware that we have collected personal information from a child under 13 in a manner inconsistent with applicable law, we will take appropriate steps to delete it.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Your Choices</h2>

<p class="font-light lg:text-lg mb-6">
    Depending on your device and version of Umeboshi, you may have several choices regarding how your information is processed.
</p>

<p class="font-light lg:text-lg mb-6">
    You may use your own OpenAI API key where this feature is supported, allowing eligible AI requests to be made using your own OpenAI account rather than Umeboshi's provided translation allowance. As described above, you are responsible for any API usage and charges associated with your own key.
</p>

<p class="font-light lg:text-lg mb-6">
    You may cancel an Umeboshi subscription at any time through the subscription-management features provided by Apple or Google.
</p>

<p class="font-light lg:text-lg mb-6">
    Umeboshi does not require a traditional user account. Locally stored app data can generally be removed by deleting it within the app or uninstalling Umeboshi.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Changes to This Privacy Policy</h2>

<p class="font-light lg:text-lg mb-6">
    We may update this Privacy Policy from time to time to reflect changes to Umeboshi, our third-party services, or applicable requirements.
</p>

<p class="font-light lg:text-lg mb-6">
    When we make changes, we will update the effective date displayed with this Privacy Policy. Continued use of Umeboshi after an updated Privacy Policy becomes effective constitutes acknowledgment of the updated policy to the extent permitted by applicable law.
</p>

<h2 class="font-light tracking-[3px] text-xl lg:text-2xl uppercase mb-3">Contact</h2>

<p class="font-light lg:text-lg mb-6">
    If you have questions, concerns, or requests regarding this Privacy Policy or Umeboshi's privacy practices, please contact us using the contact form provided on the <a class="underline" href="/">home page</a>.
</p>

        </section>
    </section>
@endsection
