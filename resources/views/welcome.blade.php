@extends('layouts.master')

@section('meta')
    <meta name="keywords"
        content="words counter, character counter, sentence counter, text case converter, online tool, free tool" />
    <meta name="description"
        content="Enhance your writing with The Words Counter - a free online tool for counting words, characters, and sentences. Analyze, modify, and optimize your text effortlessly!" />
    <meta property="og:title" content="The Words Counter" />
    <meta property="og:description" content="Free online word, character, sentence, and paragraph counter tool." />
    <meta property="og:url" content="https://www.thewordscounter.com" />
    <meta property="og:image" content="{{ asset('images/logos/logo.png') }}" />
    <link rel="canonical" href="https://www.thewordscounter.com" />

    <title>The Words Counter - Free Online Word, Character, and Sentence Counter and Text Case Converter</title>
@endsection

@section('content')
    <counter-component></counter-component>
@endsection
