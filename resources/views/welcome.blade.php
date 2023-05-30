@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('content')
    <section class="container px-2 px-md-3 px-lg-5">
        <div class="p-3 mx-0 my-3 bg-light-blue text-white rounded-0 row">
            <div class="col">
                <h3>
                    <span class="wordsCount">0</span>
                    <span>Words</span>
                </h3>
            </div>
            <div class="col">
                <h3>
                    <span class="charactersCount">0</span>
                    <span>Characters</span>
                </h3>
            </div>
            <div class="col">
                <h3>
                    <span class="whiteSpacesCount">0</span>
                    <span>White Spaces</span>
                </h3>
            </div>
            <div class="col">
                <h3>
                    <span class="sentencesCount">0</span>
                    <span>Sentences</span>
                </h3>
            </div>
        </div>

        <div class="p-3 m-0 bg-primary text-white rounded-top d-flex justify-content-around flex-wrap">
            <div class="dropdown mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white dropdown-toggle border-white" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Change Case
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item changeCase" case-data="uppercase" href="javascript:void(0)">Uppercase</a>
                    <a class="dropdown-item changeCase" case-data="lowercase" href="javascript:void(0)">Lowercase</a>
                    <a class="dropdown-item changeCase" case-data="titlecase" href="javascript:void(0)">Title Case</a>
                    <a class="dropdown-item changeCase" case-data="sentencecase" href="javascript:void(0)">Sentance Case</a>
                    <a class="dropdown-item changeCase" case-data="togglecase" href="javascript:void(0)">Toggle Case</a>
                    <a class="dropdown-item changeCase" case-data="camelcase" href="javascript:void(0)">Camel Case</a>
                    <a class="dropdown-item changeCase" case-data="pascalcase" href="javascript:void(0)">Pascal Case</a>
                    <a class="dropdown-item changeCase" case-data="snakecase" href="javascript:void(0)">Snake Case</a>
                    <a class="dropdown-item changeCase" case-data="kebabcase" href="javascript:void(0)">Kebab Case</a>
                </div>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" id="undoButton">
                    <span class="mr-1">Undo</span> <i class="fas fa-undo"></i>
                </button>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" id="redoButton">
                    <span class="mr-1">Redo</span> <i class="fas fa-redo"></i>
                </button>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" id="copyButton">
                    <span class="mr-1">Copy</span> <i class="fas fa-copy"></i>
                </button>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" id="clearButton">
                    <span class="mr-1">Clear All</span> <i class="fas fa-eraser"></i>
                </button>
            </div>

        </div>

        <div class="form-group m-0">
            <textarea class="form-control rounded-0 shadow-none" placeholder="Type or paste your text" id="my-editor1" col mb-1
                mb-md-0s="30" rows="10"></textarea>
        </div>

        <div class="p-2 bg-light-secondary rounded-bottom d-flex justify-content-around flex-wrap mb-4">
            <div class="facebook">
                <h4>Facebook <span class="facebookCount">0</span>/250</h4>
            </div>
            <div class="twitter">
                <h4>Twitter <span class="twitterCount">0</span>/280</h4>
            </div>
            <div class="google">
                <h4>Google <span class="googleCount">0</span>/300</h4>
            </div>
        </div>

        <div class="bg-light-secondary rounded p-4">
            <ul>
                <li class="row">
                    <span class="col-4 col-md-3 px-0">Special Characters counts:</span> <span
                        class="specialCharactersCount col-2 pl-0">0</span>
                </li>
            </ul>

            <ul>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">A counts:</span> <span class="a_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">B counts:</span> <span class="b_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">C counts:</span> <span class="c_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">D counts:</span> <span class="d_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">E counts:</span> <span class="e_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">F counts:</span> <span class="f_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">G counts:</span> <span class="g_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">H counts:</span> <span class="h_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">I counts:</span> <span class="i_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">J counts:</span> <span class="j_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">K counts:</span> <span class="k_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">B counts:</span> <span class="b_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">L counts:</span> <span class="l_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">M counts:</span> <span class="m_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">N counts:</span> <span class="n_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">O counts:</span> <span class="o_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">P counts:</span> <span class="p_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">Q counts:</span> <span class="q_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">R counts:</span> <span class="r_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">S counts:</span> <span class="s_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">T counts:</span> <span class="t_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">B counts:</span> <span class="b_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">U counts:</span> <span class="u_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">V counts:</span> <span class="v_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">W counts:</span> <span class="w_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">X counts:</span> <span class="x_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">Y counts:</span> <span class="y_count col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">Z counts:</span> <span class="z_count col-2 pl-0">0</span>
                </li>
            </ul>


            <ul>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">0 counts:</span> <span class="count_0 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">1 counts:</span> <span class="count_1 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">2 counts:</span> <span class="count_2 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">3 counts:</span> <span class="count_3 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">4 counts:</span> <span class="count_4 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">5 counts:</span> <span class="count_5 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">6 counts:</span> <span class="count_6 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">7 counts:</span> <span class="count_7 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">8 counts:</span> <span class="count_8 col-2 pl-0">0</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">9 counts:</span> <span class="count_9 col-2 pl-0">0</span>
                </li>


            </ul>
        </div>
    </section>
@endsection

@section('script')
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">

    </script>

    <script>
        $(document).ready(function() {
            const undoButton = $('#undoButton');
            const redoButton = $('#redoButton');
            const textarea = $('#my-editor1');
            var text = '';
            var currentValue = '';
            var undoHistory = [];
            var redoHistory = [];

            // Update the buttons' states based on the history
            function updateButtonStates() {
                undoButton.prop('disabled', undoHistory.length === 0);
                redoButton.prop('disabled', redoHistory.length === 0);
            }

            function updateCounts() {
                var specialCharacters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                const length = text.length;
                var words = $.trim(text).split(/\s+/);
                var sentences = text.split(/[.?!]+/);

                var wordsCount = text.length == 0 ? 0 : words.length;
                var charactersCount = length;
                var whiteSpacesCount = (text.match(/\s/g) || []).length;
                var sentencesCount = sentences.length - 1;
                var facebookCount = 250 - charactersCount;
                var twitterCount = 280 - charactersCount;
                var googleCount = 300 - charactersCount;
                var specialCharactersCount = 0;
                var a_count = 0;
                var b_count = 0;
                var c_count = 0;
                var d_count = 0;
                var e_count = 0;
                var f_count = 0;
                var g_count = 0;
                var h_count = 0;
                var i_count = 0;
                var j_count = 0;
                var k_count = 0;
                var l_count = 0;
                var m_count = 0;
                var n_count = 0;
                var o_count = 0;
                var p_count = 0;
                var q_count = 0;
                var r_count = 0;
                var s_count = 0;
                var t_count = 0;
                var u_count = 0;
                var v_count = 0;
                var w_count = 0;
                var x_count = 0;
                var y_count = 0;
                var z_count = 0;
                var count_0 = 0;
                var count_1 = 0;
                var count_2 = 0;
                var count_3 = 0;
                var count_4 = 0;
                var count_5 = 0;
                var count_6 = 0;
                var count_7 = 0;
                var count_8 = 0;
                var count_9 = 0;

                for (var i = 0; i < length; i++) {

                    if (specialCharacters.test(text[i])) {
                        specialCharactersCount++;
                    }

                    if (text[i].toLowerCase() === 'a') {
                        a_count++;
                    }
                    if (text[i].toLowerCase() === 'b') {
                        b_count++;
                    }
                    if (text[i].toLowerCase() === 'c') {
                        c_count++;
                    }
                    if (text[i].toLowerCase() === 'd') {
                        d_count++;
                    }
                    if (text[i].toLowerCase() === 'e') {
                        e_count++;
                    }
                    if (text[i].toLowerCase() === 'f') {
                        f_count++;
                    }
                    if (text[i].toLowerCase() === 'g') {
                        g_count++;
                    }
                    if (text[i].toLowerCase() === 'h') {
                        h_count++;
                    }
                    if (text[i].toLowerCase() === 'i') {
                        i_count++;
                    }
                    if (text[i].toLowerCase() === 'j') {
                        j_count++;
                    }
                    if (text[i].toLowerCase() === 'k') {
                        k_count++;
                    }
                    if (text[i].toLowerCase() === 'l') {
                        l_count++;
                    }
                    if (text[i].toLowerCase() === 'm') {
                        m_count++;
                    }
                    if (text[i].toLowerCase() === 'n') {
                        n_count++;
                    }
                    if (text[i].toLowerCase() === 'o') {
                        o_count++;
                    }
                    if (text[i].toLowerCase() === 'p') {
                        p_count++;
                    }
                    if (text[i].toLowerCase() === 'q') {
                        q_count++;
                    }
                    if (text[i].toLowerCase() === 'r') {
                        r_count++;
                    }
                    if (text[i].toLowerCase() === 's') {
                        s_count++;
                    }
                    if (text[i].toLowerCase() === 't') {
                        t_count++;
                    }
                    if (text[i].toLowerCase() === 'u') {
                        u_count++;
                    }
                    if (text[i].toLowerCase() === 'v') {
                        v_count++;
                    }
                    if (text[i].toLowerCase() === 'w') {
                        w_count++;
                    }
                    if (text[i].toLowerCase() === 'x') {
                        x_count++;
                    }
                    if (text[i].toLowerCase() === 'y') {
                        y_count++;
                    }
                    if (text[i].toLowerCase() === 'z') {
                        z_count++;
                    }

                    if (text[i] === '0') {
                        count_0++;
                    }
                    if (text[i] === '1') {
                        count_1++;
                    }
                    if (text[i] === '2') {
                        count_2++;
                    }
                    if (text[i] === '3') {
                        count_3++;
                    }
                    if (text[i] === '4') {
                        count_4++;
                    }
                    if (text[i] === '5') {
                        count_5++;
                    }
                    if (text[i] === '6') {
                        count_6++;
                    }
                    if (text[i] === '7') {
                        count_7++;
                    }
                    if (text[i] === '8') {
                        count_8++;
                    }
                    if (text[i] === '9') {
                        count_9++;
                    }
                }

                $('.wordsCount').text(wordsCount);
                $('.charactersCount').text(charactersCount);
                $('.whiteSpacesCount').text(whiteSpacesCount);
                $('.sentencesCount').text(sentencesCount);
                $('.facebookCount').text(facebookCount);
                $('.twitterCount').text(twitterCount);
                $('.googleCount').text(googleCount);
                $('.specialCharactersCount').text(specialCharactersCount);
                $('.a_count').text(a_count);
                $('.b_count').text(b_count);
                $('.c_count').text(c_count);
                $('.d_count').text(d_count);
                $('.e_count').text(e_count);
                $('.f_count').text(f_count);
                $('.g_count').text(g_count);
                $('.h_count').text(h_count);
                $('.i_count').text(i_count);
                $('.j_count').text(j_count);
                $('.k_count').text(k_count);
                $('.l_count').text(l_count);
                $('.m_count').text(m_count);
                $('.n_count').text(n_count);
                $('.o_count').text(o_count);
                $('.p_count').text(p_count);
                $('.q_count').text(q_count);
                $('.r_count').text(r_count);
                $('.s_count').text(s_count);
                $('.t_count').text(t_count);
                $('.u_count').text(u_count);
                $('.v_count').text(v_count);
                $('.w_count').text(w_count);
                $('.x_count').text(x_count);
                $('.y_count').text(y_count);
                $('.z_count').text(z_count);
                $('.count_0').text(count_0);
                $('.count_1').text(count_1);
                $('.count_2').text(count_2);
                $('.count_3').text(count_3);
                $('.count_4').text(count_4);
                $('.count_5').text(count_5);
                $('.count_6').text(count_6);
                $('.count_7').text(count_7);
                $('.count_8').text(count_8);
                $('.count_9').text(count_9);
            }

            undoButton.on('click', function() {
                if (undoHistory.length > 1) {
                    redoHistory.push(undoHistory.pop());
                    var current = undoHistory[undoHistory.length - 1];
                    textarea.val(current);
                } else if (undoHistory.length === 1) {
                    redoHistory.push(undoHistory.pop());
                    textarea.val('');
                }
                updateButtonStates();
            });

            redoButton.on('click', function() {
                if (redoHistory.length > 0) {
                    undoHistory.push(redoHistory.pop());
                    var current = undoHistory[undoHistory.length - 1];
                    textarea.val(current);
                }
                updateButtonStates();
            });


            // Event handler for the Ctrl+Z key combination (undo using keyboard shortcut)
            $(document).on('keydown', function(event) {
                if (event.ctrlKey && event.key === 'z') {
                    event.preventDefault();
                    undoButton.trigger('click');
                }
                updateButtonStates();
            });

            // Event handler for the Ctrl+Y key combination (redo using keyboard shortcut)
            $(document).on('keydown', function(event) {
                if ((event.ctrlKey || event.metaKey) && event.key === 'y') {
                    event.preventDefault();
                    redoButton.trigger('click');
                }
                updateButtonStates();
            });

            updateButtonStates();


            textarea.on('input', function() {

                text = $(this).val();
                currentValue = text;
                var previous = undoHistory[undoHistory.length - 1];
                if (currentValue !== previous) {
                    undoHistory.push(currentValue);
                    redoHistory = [];
                }
                updateButtonStates();
                updateCounts();
            });

            $('.changeCase').on('click', function() {
                var caseData = $(this).attr('case-data');
                text = currentValue;

                if (caseData === 'uppercase') {
                    text = text.toUpperCase();
                } else if (caseData === 'lowercase') {
                    text = text.toLowerCase();
                } else if (caseData === 'titlecase') {
                    text = text.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                        return a.toUpperCase();
                    });
                } else if (caseData === 'sentencecase') {
                    var sentences = text.split('. ');
                    for (var i = 0; i < sentences.length; i++) {
                        sentences[i] = sentences[i].charAt(0).toUpperCase() + sentences[i].slice(1);
                    }
                    text = sentences.join('. ');
                } else if (caseData === 'togglecase') {
                    text = text.split('. ').map(function(sentence) {
                        return sentence.split('').map(function(c) {
                            return c === c.toUpperCase() ? c.toLowerCase() : c
                                .toUpperCase();
                        }).join('');
                    }).join('. ');
                } else if (caseData === 'camelcase') {
                    text = text.replace(/(?:^\w|[A-Z]|\b\w)/g, function(letter, index) {
                        return index === 0 ? letter.toLowerCase() : letter.toUpperCase();
                    }).replace(/\s+/g, '');
                } else if (caseData === 'pascalcase') {
                    text = text.replace(/(?:^\w|[A-Z]|\b\w)/g, function(letter) {
                        return letter.toUpperCase();
                    }).replace(/\s+/g, '');
                } else if (caseData === 'snakecase') {
                    text = text.toLowerCase().replace(/\s+/g, '_');
                } else if (caseData === 'kebabcase') {
                    text = text.toLowerCase().replace(/\s+/g, '-');
                }

                if (currentValue !== text) {
                    undoHistory.push(text);
                    redoHistory = [];
                }
                updateButtonStates();

                textarea.val(text);
            });

            $('#copyButton').on('click', function() {
                if (navigator.clipboard && text) {
                    navigator.clipboard.writeText(text)
                        .then(function() {
                            toastr.success('Text copied successfully');
                        })
                        .catch(function(error) {
                            toastr.error('Failed to copy text');
                            console.error('Failed to copy text to clipboard:', error);
                        });
                }
            });

            $('#clearButton').on('click', function() {
                text = '';
                currentValue = '';
                textarea.val(text);
                undoHistory = [];
                redoHistory = [];
                updateButtonStates();
                updateCounts();

                toastr.success('Everyting clear successfully');
            });
        });
    </script>
@endsection
