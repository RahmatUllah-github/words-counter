<template>
    <div>
        <div class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="box_div d-flex flex-wrap text-secondary">
                            <button class="box text-secondary">
                                <i class="fas fa-undo"></i>
                                <span>Undo</span>
                            </button>
                            <button class="box text-secondary">
                                <i class="fas fa-redo"></i>
                                <span>Redo</span>
                            </button>
                            <button class="box text-secondary">
                                <i class="fas fa-copy"></i>
                                <span>Copy</span>
                            </button>
                            <button class="box text-secondary">
                                <i class="fa fa-eraser"></i>
                                <span>Clear All</span>
                            </button>
                            <div class="box">
                                <span style="font-size: 1rem; cursor: pointer;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown">Case Change</span>
                                <div class="dropdown-menu p-0">
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('uppercase')">Upper Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('lowercase')">Lower Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('titlecase')">Title Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('sentencecase')">Sentence Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('togglecase')">Toggle Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('camelcase')">Camel Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('pascalcase')">Pascal Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('snakecase')">Snake Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="changeCase('kebabcase')">Kebab Case</a>
                                </div>
                            </div>
                            <div class="box_sub">
                                <span>Upper Case</span>
                            </div>
                        </div>
                        <div class="word-count">
                            <ul class="count-top-bar">
                                <li>
                                    <p>Words</p><span class="words">{{ wordsCount }}</span>
                                </li>
                                <li>
                                    <p>Characters</p><span class="chars">{{ charactersCount }}</span>
                                </li>
                                <li class="px-3">
                                    <p>White Spaces</p><span class="paras">{{ whiteSpacesCount }}</span>
                                </li>
                                <li>
                                    <p>Sentences</p><span class="sentences">{{ sentencesCount }}</span>
                                </li>
                                <li class="border-0">
                                    <p>Paragraphs</p><span class="pages">{{ paragraphsCount }}</span>
                                </li>
                            </ul>
                            <label><span style="position:absolute;z-index:-10;">Type or paste your text</span>
                                <textarea v-model="text" @keydown="handleKeyDown" class="perfecttense" name="content"
                                    placeholder="Type or paste your text" spellcheck="true"></textarea>
                            </label>
                            <div class="count-bot-bar text-secondary">
                                <div class="col-bot-bar">
                                    <div class="bot-bar-title">
                                        <p class="social_icon">Facebook</p>
                                    </div>
                                    <div class="bot-bar-number">
                                        250/250
                                    </div>
                                </div>
                                <div class="col-bot-bar">
                                    <div class="bot-bar-title">
                                        <p class="social_icon">Twitter</p>
                                    </div>
                                    <div class="bot-bar-number">
                                        <span class="chars-twitter">280</span>/280
                                    </div>
                                </div>
                                <div class="col-bot-bar">
                                    <div class="bot-bar-title">
                                        <p class="social_icon">Google</p>
                                    </div>
                                    <div class="bot-bar-number">
                                        <span class="chars-google">300</span>/300
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ms-lg-4 ms-xl-3 righ_side_border">
                            <div>
                                <p class="box_heading">Details</p>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>

                        </div>
                        <div class="ms-lg-4 ms-xl-3 righ_side_border">
                            <div>
                                <p class="box_heading">Details</p>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>

                        </div>
                        <div class="ms-lg-4 ms-xl-3 righ_side_border mb-4">
                            <div>
                                <p class="box_heading">Details</p>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>
                            <div class="right_side_box">
                                <p class="margin_bottom">words</p>
                                <div class="circle">
                                    <span class="digit">7 (10%)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="container text-secondary">
                <div>
                    <h3 class="h3_heading">What Is Character Count?</h3>
                    <p class="p_para">Although some think that character count is the total number of letters in a text, it
                        is
                        the total count of all characters, including spaces. It is mostly needed when a text or a document
                        must
                        stay within certain numbers of characters. Additionally, some translators use character count
                        without
                        spaces to determine the price of a translation job.</p>
                    <h3 class="h3_heading">What Is the Difference Between Word Count and Character Count? </h3>
                    <p class="p_para">Word count is the number of words in a text, while the character count is the number
                        of
                        all characters in a text. If you want to learn how many characters in a text, you need to count all
                        the
                        characters, including special characters.</p>
                    <h3 class="h3_heading">How Can You Count Characters?</h3>
                    <p class="p_para">To find out the number of characters in the text, you can open your document with Word
                        or
                        LibreOffice. Alternatively, you can use an online tool like the Character Counter to count the
                        number of
                        characters in a document.</p>
                    <h3 class="h3_heading">Does Character Count Include Spaces?</h3>
                    <p class="p_para">Yes. Character count without spaces is another metric that is completely different
                        from
                        the character count.</p>
                    <h3 class="h3_heading">How Can I Check My Character Count Online?</h3>
                    <p class="p_para">With the Character Calculator, you can check character count online easily and for
                        free.
                    </p>
                    <h3 class="h3_heading">What Is the Character Calculator?</h3>
                    <p class="p_para">Character Counter is an online character count calculator tool, which is simple and
                        free
                        to use. It is especially useful for services like Twitter and Reddit.</p>
                    <h3 class="h3_heading">How Do You Use the Character Calculator?</h3>
                    <p class="p_para">Type in or copy and paste your text to the input above. Then, the Character Calculator
                        will show you the character count, with or without spaces, as well as the word count.</p>
                    <h3 class="h3_heading">How Do I Do a Character Count in Word for Mac?</h3>
                    <p class="p_para">Within the "Review" tab, click to "Word Count" icon, next to "Spelling & Grammar".
                        You'll
                        see statistics for both Characters (no spaces) and Characters (with spaces).</p>
                    <h3 class="h3_heading">How Many Characters Are in a Text Message?</h3>
                    <p class="p_para">For a single SMS, the character limit is 160 characters.</p>
                    <h3 class="h3_heading">How Many Characters in a Tweet?</h3>
                    <p class="p_para">The original character length used to be 140 characters for a tweet as Twitter began
                        its
                        operations as an SMS based service. In 2023, the answer to the question of how many characters in a
                        tweet is 280.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container px-2 px-md-3 px-lg-5">
        <div class="p-3 mx-0 my-3 bg-light-blue text-white rounded-0 row">
            <div class="col">
                <h3>
                    <span>{{ wordsCount }}</span>
                    <span> Words</span>
                </h3>
            </div>
            <div class="col">
                <h3>
                    <span>{{ charactersCount }}</span>
                    <span> Characters</span>
                </h3>
            </div>
            <div class="col">
                <h3>
                    <span>{{ whiteSpacesCount }}</span>
                    <span> White Spaces</span>
                </h3>
            </div>
            <div class="col">
                <h3>
                    <span>{{ sentencesCount }}</span>
                    <span> Sentences</span>
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
                    <a class="dropdown-item" @click="changeCase('uppercase')" href="javascript:void(0)">Uppercase</a>
                    <a class="dropdown-item" @click="changeCase('lowercase')" href="javascript:void(0)">Lowercase</a>
                    <a class="dropdown-item" @click="changeCase('titlecase')" href="javascript:void(0)">Title Case</a>
                    <a class="dropdown-item" @click="changeCase('sentencecase')" href="javascript:void(0)">Sentance Case</a>
                    <a class="dropdown-item" @click="changeCase('togglecase')" href="javascript:void(0)">Toggle Case</a>
                    <a class="dropdown-item" @click="changeCase('camelcase')" href="javascript:void(0)">Camel Case</a>
                    <a class="dropdown-item" @click="changeCase('pascalcase')" href="javascript:void(0)">Pascal Case</a>
                    <a class="dropdown-item" @click="changeCase('snakecase')" href="javascript:void(0)">Snake Case</a>
                    <a class="dropdown-item" @click="changeCase('kebabcase')" href="javascript:void(0)">Kebab Case</a>
                </div>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" @click="undo"
                    :disabled="disableUndo">
                    <span class="mr-1">Undo</span> <i class="fas fa-undo"></i>
                </button>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" @click="redo"
                    :disabled="disableRedo">
                    <span class="mr-1">Redo</span> <i class="fas fa-redo"></i>
                </button>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" @click="copy"
                    :disabled="text == ''">
                    <span class="mr-1">Copy</span> <i class="fas fa-copy"></i>
                </button>
            </div>
            <div class="mb-1 mb-md-0">
                <button class="btn btn-white shadow-none text-white border-white" type="button" @click="clear">
                    <span class="mr-1">Clear All</span> <i class="fas fa-eraser"></i>
                </button>
            </div>

        </div>

        <div class="form-group m-0">
            <textarea class="form-control rounded-0 shadow-none" placeholder="Type or paste your text" v-model="text" col
                mb-1 mb-md-0s="30" @keydown="handleKeyDown" rows="10"></textarea>
        </div>

        <div class="p-2 bg-light-secondary rounded-bottom d-flex justify-content-around flex-wrap mb-4">
            <div class="facebook">
                <h4>Facebook <span>{{ facebookCount }}</span>/250</h4>
            </div>
            <div class="twitter">
                <h4>Twitter <span>{{ twitterCount }}</span>/280</h4>
            </div>
            <div class="google">
                <h4>Google <span>{{ googleCount }}</span>/300</h4>
            </div>
        </div>

        <div class="bg-light-secondary rounded p-4">
            <ul>
                <li class="row">
                    <span class="col-4 col-md-3 px-0">Special Characters counts:</span> <span class="col-2 pl-0">{{
                        specialCharactersCount }}</span>
                </li>
            </ul>

            <ul>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">A counts:</span> <span class="col-2 pl-0">{{ aCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">B counts:</span> <span class="col-2 pl-0">{{ bCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">C counts:</span> <span class="col-2 pl-0">{{ cCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">D counts:</span> <span class="col-2 pl-0">{{ dCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">E counts:</span> <span class="col-2 pl-0">{{ eCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">F counts:</span> <span class="col-2 pl-0">{{ fCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">G counts:</span> <span class="col-2 pl-0">{{ gCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">H counts:</span> <span class="col-2 pl-0">{{ hCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">I counts:</span> <span class="col-2 pl-0">{{ iCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">J counts:</span> <span class="col-2 pl-0">{{ jCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">K counts:</span> <span class="col-2 pl-0">{{ kCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">L counts:</span> <span class="col-2 pl-0">{{ lCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">M counts:</span> <span class="col-2 pl-0">{{ mCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">N counts:</span> <span class="col-2 pl-0">{{ nCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">O counts:</span> <span class="col-2 pl-0">{{ oCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">P counts:</span> <span class="col-2 pl-0">{{ pCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">Q counts:</span> <span class="col-2 pl-0">{{ qCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">R counts:</span> <span class="col-2 pl-0">{{ rCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">S counts:</span> <span class="col-2 pl-0">{{ sCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">T counts:</span> <span class="col-2 pl-0">{{ tCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">U counts:</span> <span class="col-2 pl-0">{{ uCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">V counts:</span> <span class="col-2 pl-0">{{ vCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">W counts:</span> <span class="col-2 pl-0">{{ wCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">X counts:</span> <span class="col-2 pl-0">{{ xCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">Y counts:</span> <span class="col-2 pl-0">{{ yCount }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">Z counts:</span> <span class="col-2 pl-0">{{ zCount }}</span>
                </li>
            </ul>


            <ul>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">0 counts:</span> <span class="col-2 pl-0">{{ count_0 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">1 counts:</span> <span class="col-2 pl-0">{{ count_1 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">2 counts:</span> <span class="col-2 pl-0">{{ count_2 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">3 counts:</span> <span class="col-2 pl-0">{{ count_3 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">4 counts:</span> <span class="col-2 pl-0">{{ count_4 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">5 counts:</span> <span class="col-2 pl-0">{{ count_5 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">6 counts:</span> <span class="col-2 pl-0">{{ count_6 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">7 counts:</span> <span class="col-2 pl-0">{{ count_7 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">8 counts:</span> <span class="col-2 pl-0">{{ count_8 }}</span>
                </li>
                <li class="row">
                    <span class="col-4 col-md-1 px-0">9 counts:</span> <span class="col-2 pl-0">{{ count_9 }}</span>
                </li>


            </ul>
        </div>
    </div> -->
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    data() {
        return {
            text: '',
            currentValue: '',
            undoHistory: [],
            redoHistory: [],
            wordsCount: 0,
            charactersCount: 0,
            whiteSpacesCount: 0,
            sentencesCount: 0,
            paragraphsCount: 0,
            facebookCount: 0,
            twitterCount: 0,
            googleCount: 0,
            specialCharactersCount: 0,
            aCount: 0,
            bCount: 0,
            cCount: 0,
            dCount: 0,
            eCount: 0,
            fCount: 0,
            gCount: 0,
            hCount: 0,
            iCount: 0,
            jCount: 0,
            kCount: 0,
            lCount: 0,
            mCount: 0,
            nCount: 0,
            oCount: 0,
            pCount: 0,
            qCount: 0,
            rCount: 0,
            sCount: 0,
            tCount: 0,
            uCount: 0,
            vCount: 0,
            wCount: 0,
            xCount: 0,
            yCount: 0,
            zCount: 0,
            count_0: 0,
            count_1: 0,
            count_2: 0,
            count_3: 0,
            count_4: 0,
            count_5: 0,
            count_6: 0,
            count_7: 0,
            count_8: 0,
            count_9: 0,
            disableUndo: true,
            disableRedo: true,
        }
    },
    watch: {
        text(oldVal, newVal) {
            this.currentValue = newVal;

            var previous = this.undoHistory[this.undoHistory.length - 1];
            if (this.currentValue !== previous) {
                this.undoHistory.push(this.currentValue);
                this.redoHistory = [];
            }
            this.updateCounts();
            this.updateButtonStates();
        }
    },
    methods: {
        updateButtonStates() {
            this.disableUndo = this.undoHistory.length === 0;
            this.disableRedo = this.redoHistory.length === 0;
        },
        updateCounts() {
            this.wordsCount = this.text.trim().split(/\s+/).filter(Boolean).length;
            this.charactersCount = this.text.length;
            this.whiteSpacesCount = this.text.split(' ').length - 1;
            this.sentencesCount = this.text.split(/[.!?]+/).filter(Boolean).length;
            this.facebookCount = Math.min(250, this.charactersCount);
            this.twitterCount = Math.min(280, this.charactersCount);
            this.googleCount = Math.min(300, this.charactersCount);
            this.specialCharactersCount = (this.text.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g) || []).length;
            this.aCount = (this.text.match(/a/gi) || []).length;
            this.bCount = (this.text.match(/b/gi) || []).length;
            this.cCount = (this.text.match(/c/gi) || []).length;
            this.dCount = (this.text.match(/d/gi) || []).length;
            this.eCount = (this.text.match(/e/gi) || []).length;
            this.fCount = (this.text.match(/f/gi) || []).length;
            this.gCount = (this.text.match(/g/gi) || []).length;
            this.hCount = (this.text.match(/h/gi) || []).length;
            this.iCount = (this.text.match(/i/gi) || []).length;
            this.jCount = (this.text.match(/j/gi) || []).length;
            this.kCount = (this.text.match(/k/gi) || []).length;
            this.lCount = (this.text.match(/l/gi) || []).length;
            this.mCount = (this.text.match(/m/gi) || []).length;
            this.nCount = (this.text.match(/n/gi) || []).length;
            this.oCount = (this.text.match(/o/gi) || []).length;
            this.pCount = (this.text.match(/p/gi) || []).length;
            this.qCount = (this.text.match(/q/gi) || []).length;
            this.rCount = (this.text.match(/r/gi) || []).length;
            this.sCount = (this.text.match(/s/gi) || []).length;
            this.tCount = (this.text.match(/t/gi) || []).length;
            this.uCount = (this.text.match(/u/gi) || []).length;
            this.vCount = (this.text.match(/v/gi) || []).length;
            this.wCount = (this.text.match(/w/gi) || []).length;
            this.xCount = (this.text.match(/x/gi) || []).length;
            this.yCount = (this.text.match(/y/gi) || []).length;
            this.zCount = (this.text.match(/z/gi) || []).length;
            this.count_0 = (this.text.match(/0/g) || []).length;
            this.count_1 = (this.text.match(/1/g) || []).length;
            this.count_2 = (this.text.match(/2/g) || []).length;
            this.count_3 = (this.text.match(/3/g) || []).length;
            this.count_4 = (this.text.match(/4/g) || []).length;
            this.count_5 = (this.text.match(/5/g) || []).length;
            this.count_6 = (this.text.match(/6/g) || []).length;
            this.count_7 = (this.text.match(/7/g) || []).length;
            this.count_8 = (this.text.match(/8/g) || []).length;
            this.count_9 = (this.text.match(/9/g) || []).length;
        },
        // updateCounts() {
        //     const specialCharacters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        //     const length = this.text.length;
        //     const words = $.trim(this.text).split(/\s+/);
        //     const sentences = this.text.split(/[.?!]+/);

        //     this.clearAllCounts();

        //     this.wordsCount = this.text.length == 0 ? 0 : words.length;
        //     this.charactersCount = length;
        //     this.whiteSpacesCount = (this.text.match(/\s/g) || []).length;
        //     this.sentencesCount = sentences.length - 1;
        //     this.facebookCount = 250 - this.charactersCount;
        //     this.twitterCount = 280 - this.charactersCount;
        //     this.googleCount = 300 - this.charactersCount;

        //     for (var i = 0; i < length; i++) {

        //         if (specialCharacters.test(this.text[i])) {
        //             this.specialCharactersCount++;
        //         }

        //         if (this.text[i].toLowerCase() === 'a') {
        //             this.aCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'b') {
        //             this.bCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'c') {
        //             this.cCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'd') {
        //             this.dCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'e') {
        //             this.eCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'f') {
        //             this.fCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'g') {
        //             this.gCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'h') {
        //             this.hCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'i') {
        //             this.iCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'j') {
        //             this.jCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'k') {
        //             this.kCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'l') {
        //             this.lCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'm') {
        //             this.mCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'n') {
        //             this.nCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'o') {
        //             this.oCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'p') {
        //             this.pCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'q') {
        //             this.qCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'r') {
        //             this.rCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 's') {
        //             this.sCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 't') {
        //             this.tCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'u') {
        //             this.uCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'v') {
        //             this.vCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'w') {
        //             this.wCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'x') {
        //             this.xCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'y') {
        //             this.yCount++;
        //         }
        //         if (this.text[i].toLowerCase() === 'z') {
        //             this.zCount++;
        //         }

        //         if (this.text[i] === '0') {
        //             this.count_0++;
        //         }
        //         if (this.text[i] === '1') {
        //             this.count_1++;
        //         }
        //         if (this.text[i] === '2') {
        //             this.count_2++;
        //         }
        //         if (this.text[i] === '3') {
        //             this.count_3++;
        //         }
        //         if (this.text[i] === '4') {
        //             this.count_4++;
        //         }
        //         if (this.text[i] === '5') {
        //             this.count_5++;
        //         }
        //         if (this.text[i] === '6') {
        //             this.count_6++;
        //         }
        //         if (this.text[i] === '7') {
        //             this.count_7++;
        //         }
        //         if (this.text[i] === '8') {
        //             this.count_8++;
        //         }
        //         if (this.text[i] === '9') {
        //             this.count_9++;
        //         }
        //     }
        // },
        undo() {
            console.log(this.undoHistory);
            if (this.undoHistory.length > 1) {
                this.redoHistory.push(this.undoHistory.pop());
                this.text = this.undoHistory[this.undoHistory.length - 1];
            } else if (this.undoHistory.length === 1) {
                this.redoHistory.push(this.undoHistory.pop());
                this.text = '';
            }
            this.updateButtonStates();
        },
        redo() {
            if (this.redoHistory.length > 0) {
                this.undoHistory.push(this.redoHistory.pop());
                this.text = this.undoHistory[this.undoHistory.length - 1];
            }
            this.updateButtonStates();
        },
        handleKeyDown(event) {
            if (event.ctrlKey && event.key === 'z') {
                event.preventDefault();
                this.undo();
            } else if ((event.ctrlKey || event.metaKey) && event.key === 'y') {
                event.preventDefault();
                this.redo();
            }
        },
        changeCase(caseData) {
            this.text = this.currentValue;

            if (caseData === 'uppercase') {
                this.text = this.text.toUpperCase();
            } else if (caseData === 'lowercase') {
                this.text = this.text.toLowerCase();
            } else if (caseData === 'titlecase') {
                this.text = this.text.toLowerCase().replace(/(?:^|\s)\S/g, function (value) {
                    return value.toUpperCase();
                });
            } else if (caseData === 'sentencecase') {
                var sentences = this.text.split('. ');
                for (var i = 0; i < sentences.length; i++) {
                    sentences[i] = sentences[i].charAt(0).toUpperCase() + sentences[i].slice(1);
                }
                this.text = sentences.join('. ');
            } else if (caseData === 'togglecase') {
                this.text = this.text.split('. ').map(function (sentence) {
                    return sentence.split('').map(function (value) {
                        return value === value.toUpperCase() ? value.toLowerCase() : value.toUpperCase();
                    }).join('');
                }).join('. ');
            } else if (caseData === 'camelcase') {
                this.text = this.text.replace(/(?:^\w|[A-Z]|\b\w)/g, function (letter, index) {
                    return index === 0 ? letter.toLowerCase() : letter.toUpperCase();
                }).replace(/\s+/g, '');
            } else if (caseData === 'pascalcase') {
                this.text = this.text.replace(/(?:^\w|[A-Z]|\b\w)/g, function (letter) {
                    return letter.toUpperCase();
                }).replace(/\s+/g, '');
            } else if (caseData === 'snakecase') {
                this.text = this.text.toLowerCase().replace(/\s+/g, '_');
            } else if (caseData === 'kebabcase') {
                this.text = this.text.toLowerCase().replace(/\s+/g, '-');
            }

            if (this.currentValue !== this.text) {
                undoHistory.push(this.text);
                redoHistory = [];
                this.updateButtonStates();
            }
        },
        copy() {
            if (navigator.clipboard && this.text) {
                navigator.clipboard.writeText(this.text)
                    .then(function () {
                        toast.success('Text copied successfully');
                    })
                    .catch(function (error) {
                        toast.error('Failed to copy text');
                        console.error('Failed to copy text to clipboard:', error);
                    });
            }
        },
        clear() {
            this.text = '';
            this.currentValue = '';
            this.undoHistory = [];
            this.redoHistory = [];
            this.updateButtonStates();
            this.updateCounts();

            toast.success('Everything cleared successfully');
        },
        clearAllCounts() {
            this.wordsCount = 0;
            this.charactersCount = 0;
            this.whiteSpacesCount = 0;
            this.sentencesCount = 0;
            this.facebookCount = 0;
            this.twitterCount = 0;
            this.googleCount = 0;
            this.specialCharactersCount = 0;
            this.aCount = 0;
            this.bCount = 0;
            this.cCount = 0;
            this.dCount = 0;
            this.eCount = 0;
            this.fCount = 0;
            this.gCount = 0;
            this.hCount = 0;
            this.iCount = 0;
            this.jCount = 0;
            this.kCount = 0;
            this.lCount = 0;
            this.mCount = 0;
            this.nCount = 0;
            this.oCount = 0;
            this.pCount = 0;
            this.qCount = 0;
            this.rCount = 0;
            this.sCount = 0;
            this.tCount = 0;
            this.uCount = 0;
            this.vCount = 0;
            this.wCount = 0;
            this.xCount = 0;
            this.yCount = 0;
            this.zCount = 0;
            this.count_0 = 0;
            this.count_1 = 0;
            this.count_2 = 0;
            this.count_3 = 0;
            this.count_4 = 0;
            this.count_5 = 0;
            this.count_6 = 0;
            this.count_7 = 0;
            this.count_8 = 0;
            this.count_9 = 0;
        }
    }
}
</script>
