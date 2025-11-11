@extends('layouts.layout')

@section('title')
    Umeboshi
@endsection

@section('content')
    {{-- Pages --}}
    <section class="max-w-[1400px] mx-auto">
        <section
            class="my-2 shadow-lg shadow-purple-800/50 border border-purple-500 p-6 mb-10 bg-purple-950 text-white  rounded">
            <h1 class="font-light tracking-[10px] text-2xl lg:text-4xl uppercase  border-b-[0.5px] mb-4 pb-2">Intro <span
                    class="text-sm lg:text-xl">- 自己紹介</span> </h1>
            <p class="font-light lg:text-lg mb-4 ">Hello! I am the developer working on the Umeboshi app! I started studying
                Japanese when I was in highschool and continued to do so all thoughout college. Despite taking Japanese
                classes for such a long period of time I found that post graduation I was still frustratingly unable to
                really do much with the language other than string together basic sentances
                ( 僕の名前はウィルです。日本語を勉強している。よろしくお願いします。). I don't at all blame this on my teachers, as it is a hard language to
                teach, and it isn't that they weren't providing new grammer and vocabulary. The fact of the matter is that
                Japanese is just an incredibly difficult language to learn and doing os requires more effort and time than
                just attending class and doing homework assignments. I think that the issue lay with the fact that at the
                time I was less informed about the tools that existed to help with learning.
            </p>
            <p class="font-light lg:text-lg mb-4">
                At some point I downloaded a spaced flashcard application called Anki at the recommendation of a friend and
                started studying a premade deck of flashcards. This greatly improved my working vocabulary, but that alone
                wasn't enough. The flashcards were awesome, but as the words were introduced on a daily basis without any
                real world context, some were harder to keep in mind as they weren't words I interacted with on a daily
                basis outside of Anki.
            </p>
            <p class="font-light lg:text-lg mb-4">
                Now the obvious solution to this is to begin reading manga, watching japanese TV, listening to podcasts etc.
                in order to "mine" new words to add to my flashcard decks. Not only is this great for vocab acquisition, but
                as I am sure you have been told by all of your Senseis input like this is a very natural way to learn a
                language on a more intuitive level. I wanted to do this, but the issue that I ran into was that needing to
                constant stop reading to lookup a word to create a flashcard would take so much time (especially if I was
                taking the time to create the nice formatted flashcards complete with example sentences and furigana that I
                had grown accustomed to) that the reading or watching or listening would become very unenjoyable and time
                consuming and as a result I would get burnt out.
            </p>
            <p class="font-light lg:text-lg mb-4">
                After College I sorta fell off my Japanese study and pursued other skills and interests such as coding.
                Recently I began to study again using Anki and realised that I now had the tools to create an app for my
                phone to solve my old issue. Umeboshi is an app that leverages openAI's API to allow users to enter a word
                or snap a photo of Japanese text, and receive a translation complete with contextual example sentences that
                can be added to an Anki deck with the press of a button. At first I was just making it for myself, but I
                thought that it would be helpful for others as well, and decided to increase the scope of my development a
                bit to allow others to access it. If you decide to give it a try it is my sincere hope that it helps you
                enjoy your language studies more!
            </p>
        </section>

        <section
            class="my-2 shadow-lg shadow-purple-800/50 border border-purple-500 p-6 mb-10 bg-purple-950 text-white  rounded">
            <h1 class="font-light tracking-[10px] text-2xl lg:text-4xl uppercase  border-b-[0.5px] mb-2 pb-2">Usage <span
                    class="text-sm lg:text-xl">- 使い方</span></h1>
            <p class="font-light lg:text-lg mb-4 ">
                If the above sounds interesting to you and you would like to try out the app, all you need in addition to
                the Umeboshi itself is an Android phone and the AnkiDroid application (this is a client for reviewing Anki
                cards on your phone). AnkiDroid is available for free on the play store <a
                    href="https://play.google.com/store/apps/details?id=com.ichi2.anki&hl=en_US">here</a>. Unfortunately for
                iPhone users I have not created this app for ios for a few reasons, primarily that I myself have an Android,
                the Anki app for ios is not free ($25), and publishing to the Apple app store is significantly more
                expensive than the play store. If there is significant interest in the future I may begin working on an ios
                version of Umeboshi. Even if you do have an iPhone and are unable to use Umeboshi, I would still recommend
                Anki. It is free on desktop, and if you want to use it on your phone I honestly believe the $25 dollar price
                is worth it as it is that powerful of a study tool.
            </p>
            <p class="font-bold lg:text-lg mb-4">
                Currently Umeboshi is in closed beta, but if you are interested in trying it please enter your email below
                so I can add you as an approved tester. Once that is done you will be able to download it through google
                play!
            </p>
            <p class="font-light lg:text-lg mb-4">
                Once you have those two apps you should be good to go! Simply boot up the app, you should be prompted to
                grant it permission to access AnkiDroid. Once that is granted you can begin entering words or taking
                pictures to receive translations. In order to put them in Anki just press the send to Anki button next to
                the word. By default the app will place the cards in a deck named Umeboshi. If you would like the cards to
                be inserted into a different deck you can provide one on the app's settings screen. Users are given a
                certain amount of requests a day for free. To make additional requests you may either purchase a
                subscription from the settings page or, if you are technically inclined, provide your own OpenAI API key to
                make requests on your own behalf. I am sorry that there is a subscription fee, but making API requests to
                receive the translations from OpenAI is not free for me. However, <span class="font-bold">as the app is
                    currently in a testing phase I will be temporarily increasing the number of free requests a day.</span>
            </p>
        </section>

        <section class="my-2 shadow-lg shadow-purple-800/50 border border-purple-500 p-6 bg-purple-950 text-white  rounded">
            <h1 class="font-light tracking-[10px] text-2xl lg:text-4xl uppercase  border-b-[0.5px] mb-2 pb-2">Contact <span
                    class="text-sm lg:text-xl">- お問い合わせ </span></h1>
            <form class="flex flex-col space-y-2 lg:w-1/2" action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="1dfd7f4d-6403-408e-ab68-b4d36126c2d7">
                <div class="mb-4">
                    <label class="block" for="name">Name: </label>
                    <input id="name"
                        class="bg-white w-full border-black text-black placeholder:text-purple-400 p-1 pl-2"
                        placeholder="Your name..." type="text" name="name" required>
                </div>
                <div class="mb-4">
                    <label class="block" for="email">Email: </label>
                    <input id="email"
                        class="bg-white w-full border-black text-black placeholder:text-purple-400 p-1 pl-2"
                        placeholder="Your email..." type="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label class="block" for="message">Message: </label>
                    <textarea id="message" class="bg-white w-full border-black text-black placeholder:text-purple-400 p-1 pl-2"
                        placeholder="Message" name="message" required>I am interested in beta testing Umeboshi!</textarea>
                </div>

                <div>

                    <button class="bg-purple-600 p-2 px-4 cursor-pointer mt-2" type="submit">Submit</button>
                </div>
            </form>
        </section>
    </section>
@endsection
