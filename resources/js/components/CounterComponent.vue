<template>
    <div>
        <div class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="box_div d-flex flex-wrap text-secondary">
                            <button class="box text-secondary" @click="undo" :disabled="disableUndo">
                                <i class="fas fa-undo"></i>
                                <span>Undo</span>
                            </button>
                            <button class="box text-secondary" @click="redo" :disabled="disableRedo">
                                <i class="fas fa-redo"></i>
                                <span>Redo</span>
                            </button>
                            <button class="box text-secondary" @click="copy" :disabled="text.length == 0">
                                <i class="fas fa-copy"></i>
                                <span>Copy</span>
                            </button>
                            <button class="box text-secondary" @click="clear">
                                <i class="fa fa-eraser"></i>
                                <span>Clear All</span>
                            </button>
                            <div class="box">
                                <span style="font-size: 1rem; cursor: pointer;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown">Case Change</span>
                                <div class="dropdown-menu p-0">
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('uppercase')">Upper Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('lowercase')">Lower Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('titlecase')">Title Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('sentencecase')">Sentence Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('togglecase')">Toggle Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('camelcase')">Camel Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('pascalcase')">Pascal Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('snakecase')">Snake Case</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"
                                        @click="changeCase('kebabcase')">Kebab Case</a>
                                </div>
                            </div>
                            <div class="box_sub">
                                <span>{{ ucfirst(currentTextCase) }}</span>
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
                                        {{ facebookCount }}/{{ facebookTotal }}
                                    </div>
                                </div>
                                <div class="col-bot-bar">
                                    <div class="bot-bar-title">
                                        <p class="social_icon">Twitter</p>
                                    </div>
                                    <div class="bot-bar-number">
                                        {{ twitterCount }}/{{ twitterTotal }}
                                    </div>
                                </div>
                                <div class="col-bot-bar">
                                    <div class="bot-bar-title">
                                        <p class="social_icon">Google</p>
                                    </div>
                                    <div class="bot-bar-number">
                                        {{ googleCount }}/{{ googleTotal }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ms-lg-4 ms-xl-3 righ_side_border">
                            <div>
                                <p class="box_heading">Characters Details</p>
                            </div>
                            <div v-show="specialCharactersCount" class="right_side_box">
                                <p class="margin_bottom">Special Characters</p>
                                <div class="circle">
                                    <span class="digit">{{ specialCharactersCount }} ({{ percentageSpecialCharacters
                                    }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_a" class="right_side_box">
                                <p class="margin_bottom">A Counts</p>
                                <div class="circle">
                                    <span class="digit">{{ count_a }} ({{ percentage_a }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_b" class="right_side_box">
                                <p class="margin_bottom">B Counts</p>
                                <div class="circle">
                                    <span class="digit">{{ count_b }} ({{ percentage_b }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_c" class="right_side_box">
                                <p class="margin_bottom">C Counts</p>
                                <div class="circle">
                                    <span class="digit">{{ count_c }} ({{ percentage_c }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_d" class="right_side_box">
                                <p class="margin_bottom">D Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_d }} ({{ percentage_d }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_e" class="right_side_box">
                                <p class="margin_bottom">E Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_e }} ({{ percentage_e }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_f" class="right_side_box">
                                <p class="margin_bottom">F Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_f }} ({{ percentage_f }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_g" class="right_side_box">
                                <p class="margin_bottom">G Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_g }} ({{ percentage_g }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_h" class="right_side_box">
                                <p class="margin_bottom">H Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_h }} ({{ percentage_h }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_i" class="right_side_box">
                                <p class="margin_bottom">I Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_i }} ({{ percentage_i }}%)</span>
                                </div>
                            </div>

                            <div v-show="count_j" class="right_side_box">
                                <p class="margin_bottom">J Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_j }} ({{ percentage_j }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_k" class="right_side_box">
                                <p class="margin_bottom">K Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_k }} ({{ percentage_k }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_l" class="right_side_box">
                                <p class="margin_bottom">L Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_l }} ({{ percentage_l }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_m" class="right_side_box">
                                <p class="margin_bottom">M Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_m }} ({{ percentage_m }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_n" class="right_side_box">
                                <p class="margin_bottom">N Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_n }} ({{ percentage_n }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_o" class="right_side_box">
                                <p class="margin_bottom">O Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_o }} ({{ percentage_o }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_p" class="right_side_box">
                                <p class="margin_bottom">P Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_p }} ({{ percentage_p }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_q" class="right_side_box">
                                <p class="margin_bottom">Q Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_q }} ({{ percentage_q }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_r" class="right_side_box">
                                <p class="margin_bottom">R Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_r }} ({{ percentage_r }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_s" class="right_side_box">
                                <p class="margin_bottom">S Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_s }} ({{ percentage_s }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_t" class="right_side_box">
                                <p class="margin_bottom">T Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_t }} ({{ percentage_t }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_u" class="right_side_box">
                                <p class="margin_bottom">U Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_u }} ({{ percentage_u }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_v" class="right_side_box">
                                <p class="margin_bottom">V Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_v }} ({{ percentage_v }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_w" class="right_side_box">
                                <p class="margin_bottom">W Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_w }} ({{ percentage_w }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_x" class="right_side_box">
                                <p class="margin_bottom">X Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_x }} ({{ percentage_x }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_y" class="right_side_box">
                                <p class="margin_bottom">Y Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_y }} ({{ percentage_y }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_z" class="right_side_box">
                                <p class="margin_bottom">Z Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_z }} ({{ percentage_z }}%)</span>
                                </div>
                            </div>
                        </div>


                        <div class="ms-lg-4 ms-xl-3 righ_side_border">
                            <div>
                                <p class="box_heading">Numeric Character Details</p>
                            </div>

                            <div v-show="count_0" class="right_side_box">
                                <p class="margin_bottom">0 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_0 }} ({{ percentage_0 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_1" class="right_side_box">
                                <p class="margin_bottom">1 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_1 }} ({{ percentage_1 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_2" class="right_side_box">
                                <p class="margin_bottom">2 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_2 }} ({{ percentage_2 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_3" class="right_side_box">
                                <p class="margin_bottom">3 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_3 }} ({{ percentage_3 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_4" class="right_side_box">
                                <p class="margin_bottom">4 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_4 }} ({{ percentage_4 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_5" class="right_side_box">
                                <p class="margin_bottom">5 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_5 }} ({{ percentage_5 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_6" class="right_side_box">
                                <p class="margin_bottom">6 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_6 }} ({{ percentage_6 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_7" class="right_side_box">
                                <p class="margin_bottom">7 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_7 }} ({{ percentage_7 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_8" class="right_side_box">
                                <p class="margin_bottom">8 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_8 }} ({{ percentage_8 }}%)</span>
                                </div>
                            </div>
                            <div v-show="count_9" class="right_side_box">
                                <p class="margin_bottom">9 Count</p>
                                <div class="circle">
                                    <span class="digit">{{ count_9 }} ({{ percentage_9 }}%)</span>
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
</template>

<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    data() {
        return {
            text: '',
            currentValue: '',
            currentTextCase: '',
            undoHistory: [],
            redoHistory: [],
            facebookTotal: 250,
            twitterTotal: 280,
            googleTotal: 300,
            disableUndo: true,
            disableRedo: true,
        }
    },
    watch: {
        text(val) {
            if (this.currentTextCase == '' || this.currentTextCase == 'uppercase' || this.currentTextCase == 'lowercase') {
                this.currentValue = val;
            }

            var previous = this.undoHistory[this.undoHistory.length - 1];
            if (this.text !== previous) {
                this.undoHistory.push(this.text);
            }
            this.updateButtonStates();
        }
    },
    computed: {
        wordsCount() {
            return this.text.trim().split(/\s+/).filter(Boolean).length;
        },
        charactersCount() {
            return this.text.length;
        },
        whiteSpacesCount() {
            return this.text.split(' ').length - 1;
        },
        sentencesCount() {
            return this.text.split(/[.!?]+/).filter(Boolean).length;
        },
        paragraphsCount() {
            return this.text.split('\n').filter(Boolean).length;
        },
        facebookCount() {
            return this.facebookTotal - this.charactersCount;
        },
        twitterCount() {
            return this.twitterTotal - this.charactersCount;
        },
        googleCount() {
            return this.googleTotal - this.charactersCount;
        },
        specialCharactersCount() {
            return (this.text.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g) || []).length;
        },
        percentageSpecialCharacters() {
            const percentage = (this.specialCharactersCount / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_a() {
            return (this.text.match(/a/gi) || []).length;
        },
        percentage_a() {
            const percentage = (this.count_a / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_b() {
            return (this.text.match(/b/gi) || []).length;
        },
        percentage_b() {
            const percentage = (this.count_b / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_c() {
            return (this.text.match(/c/gi) || []).length;
        },
        percentage_c() {
            const percentage = (this.count_c / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_d() {
            return (this.text.match(/d/gi) || []).length;
        },
        percentage_d() {
            const percentage = (this.count_d / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_e() {
            return (this.text.match(/e/gi) || []).length;
        },
        percentage_e() {
            const percentage = (this.count_e / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_f() {
            return (this.text.match(/f/gi) || []).length;
        },
        percentage_f() {
            const percentage = (this.count_f / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_g() {
            return (this.text.match(/g/gi) || []).length;
        },
        percentage_g() {
            const percentage = (this.count_g / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_h() {
            return (this.text.match(/h/gi) || []).length;
        },
        percentage_h() {
            const percentage = (this.count_h / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_i() {
            return (this.text.match(/i/gi) || []).length;
        },
        percentage_i() {
            const percentage = (this.count_i / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_j() {
            return (this.text.match(/j/gi) || []).length;
        },
        percentage_j() {
            const percentage = (this.count_j / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_k() {
            return (this.text.match(/k/gi) || []).length;
        },
        percentage_k() {
            const percentage = (this.count_k / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_l() {
            return (this.text.match(/l/gi) || []).length;
        },
        percentage_l() {
            const percentage = (this.count_l / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_m() {
            return (this.text.match(/m/gi) || []).length;
        },
        percentage_m() {
            const percentage = (this.count_m / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_n() {
            return (this.text.match(/n/gi) || []).length;
        },
        percentage_n() {
            const percentage = (this.count_n / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_o() {
            return (this.text.match(/o/gi) || []).length;
        },
        percentage_o() {
            const percentage = (this.count_o / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_p() {
            return (this.text.match(/p/gi) || []).length;
        },
        percentage_p() {
            const percentage = (this.count_p / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_q() {
            return (this.text.match(/q/gi) || []).length;
        },
        percentage_q() {
            const percentage = (this.count_q / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_r() {
            return (this.text.match(/r/gi) || []).length;
        },
        percentage_r() {
            const percentage = (this.count_r / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_s() {
            return (this.text.match(/s/gi) || []).length;
        },
        percentage_s() {
            const percentage = (this.count_s / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_t() {
            return (this.text.match(/t/gi) || []).length;
        },
        percentage_t() {
            const percentage = (this.count_t / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_u() {
            return (this.text.match(/u/gi) || []).length;
        },
        percentage_u() {
            const percentage = (this.count_u / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_v() {
            return (this.text.match(/v/gi) || []).length;
        },
        percentage_v() {
            const percentage = (this.count_v / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_w() {
            return (this.text.match(/w/gi) || []).length;
        },
        percentage_w() {
            const percentage = (this.count_w / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_x() {
            return (this.text.match(/x/gi) || []).length;
        },
        percentage_x() {
            const percentage = (this.count_x / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_y() {
            return (this.text.match(/y/gi) || []).length;
        },
        percentage_y() {
            const percentage = (this.count_y / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_z() {
            return (this.text.match(/z/gi) || []).length;
        },
        percentage_z() {
            const percentage = (this.count_z / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_0() {
            return (this.text.match(/0/gi) || []).length;
        },
        percentage_0() {
            const percentage = (this.count_0 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_1() {
            return (this.text.match(/1/gi) || []).length;
        },
        percentage_1() {
            const percentage = (this.count_1 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_2() {
            return (this.text.match(/2/gi) || []).length;
        },
        percentage_2() {
            const percentage = (this.count_2 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_3() {
            return (this.text.match(/3/gi) || []).length;
        },
        percentage_3() {
            const percentage = (this.count_3 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_4() {
            return (this.text.match(/4/gi) || []).length;
        },
        percentage_4() {
            const percentage = (this.count_4 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_5() {
            return (this.text.match(/5/gi) || []).length;
        },
        percentage_5() {
            const percentage = (this.count_5 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_6() {
            return (this.text.match(/6/gi) || []).length;
        },
        percentage_6() {
            const percentage = (this.count_6 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_7() {
            return (this.text.match(/7/gi) || []).length;
        },
        percentage_7() {
            const percentage = (this.count_7 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_8() {
            return (this.text.match(/8/gi) || []).length;
        },
        percentage_8() {
            const percentage = (this.count_8 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
        count_9() {
            return (this.text.match(/9/gi) || []).length;
        },
        percentage_9() {
            const percentage = (this.count_9 / (this.charactersCount - this.whiteSpacesCount)) * 100;
            return percentage % 1 === 0 ? percentage.toFixed(0) : percentage.toFixed(1);
        },
    },
    methods: {
        updateButtonStates() {
            this.disableUndo = this.undoHistory.length === 0;
            this.disableRedo = this.redoHistory.length === 0;
        },
        undo() {
            if (this.undoHistory.length > 1) {
                this.redoHistory.push(this.undoHistory.pop());
                this.text = this.undoHistory[this.undoHistory.length - 1];
            } else if (this.undoHistory.length === 1) {
                const value = this.undoHistory.pop();
                if (value != '') {
                    this.redoHistory.push(value);
                }
                this.text = '';
            }
            this.updateButtonStates();
        },
        redo() {
            if (this.redoHistory.length > 0) {
                this.text = this.redoHistory[this.redoHistory.length - 1];
                this.redoHistory.pop();
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
            this.currentTextCase = caseData;
            const data = this.currentValue.toLowerCase();

            if (caseData === 'uppercase') {
                this.text = data.toUpperCase();
            } else if (caseData === 'lowercase') {
                this.text = data.toLowerCase();
            } else if (caseData === 'titlecase') {
                this.text = data.toLowerCase().replace(/(?:^|\s)\S/g, function (value) {
                    return value.toUpperCase();
                });
            } else if (caseData === 'sentencecase') {
                var sentences = data.split('. ');
                for (var i = 0; i < sentences.length; i++) {
                    sentences[i] = sentences[i].charAt(0).toUpperCase() + sentences[i].slice(1);
                }
                this.text = sentences.join('. ');
            } else if (caseData === 'togglecase') {
                this.text = data.split('. ').map(function (sentence) {
                    return sentence.split('').map(function (value) {
                        return value === value.toUpperCase() ? value.toLowerCase() : value.toUpperCase();
                    }).join('');
                }).join('. ');
            } else if (caseData === 'camelcase') {
                this.text = data.replace(/(?:^\w|[A-Z]|\b\w)/g, function (letter, index) {
                    return index === 0 ? letter.toLowerCase() : letter.toUpperCase();
                }).replace(/\s+/g, '');
            } else if (caseData === 'pascalcase') {
                this.text = data.replace(/(?:^\w|[A-Z]|\b\w)/g, function (letter) {
                    return letter.toUpperCase();
                }).replace(/\s+/g, '');
            } else if (caseData === 'snakecase') {
                this.text = data.toLowerCase().replace(/\s+/g, '_');
            } else if (caseData === 'kebabcase') {
                this.text = data.toLowerCase().replace(/\s+/g, '-');
            }

            if (this.currentValue !== this.text) {
                this.undoHistory.push(this.text);
                this.redoHistory = [];
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

            toast.success('Everything cleared successfully');
        },
        ucfirst(string) {
            if (typeof string !== 'string') {
                throw new Error('ucfirst() expects a string argument.');
            }

            if (string.length === 0) {
                return string;
            }

            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    }
}
</script>
