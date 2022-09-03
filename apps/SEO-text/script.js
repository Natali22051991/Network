const button = document.querySelector('img/otter/jpgsend');
const button1 = document.querySelector('img/otter/jpgclear');
const inputTextform = document.querySelector('.inputText');
const txt1 = document.querySelector('img/otter/jpgtxt1');
const txt2 = document.querySelector('img/otter/jpgtxt2');
const txt3 = document.querySelector('img/otter/jpgtxt3');
const txt4 = document.querySelector('img/otter/jpgtxt4');
const txt5 = document.querySelector('img/otter/jpgtxt5');
const txt6 = document.querySelector('img/otter/jpgtxt6');
const txt7 = document.querySelector('img/otter/jpgtxt7');
const paragraf = document.querySelector('img/otter/jpgblock');
// получила элементы
console.log(inputTextform.value);

let txt;  // создала переменные
let txt_len;


function getTxt(event) {
    txt = inputTextform.value;
    txt_len = txt.length;
    console.log(txt);
    txt1.textContent = getMainCount(txt); // подсчет кол-ва знаков по клику кнопки
    txt2.textContent = getnWordsCount(txt); // подсчет кол-ва слов по клику кнопки
    txt3.textContent = getShortesWordCount(txt); // подсчет самого короткого слова по клику кнопки
    txt4.textContent = getlongestWordCount(txt); // подсчет самого длинного слова по клику кнопки
    txt5.textContent = getOffersCount(txt); // подсчет количества предложений по клику кнопки
    txt6.textContent = getLettersCount(txt); // подсчет количества букв по клику кнопки
    txt7.textContent = getNumbersCount(txt); // подсчет количества цифр по клику кнопки

}
function deliteText(event) { // очистка поля ввода по клику кнопки
    inputTextform.value = "";
    getTxt(event); // очистка параграфа и возврат нулей по клику кнопки
}


button.addEventListener('click', getTxt); // создала кнопку
button1.addEventListener('click', deliteText); // создала кнопку


function getStrSplitFilter(str = '') {
    return !!str && !!str.length && typeof str === 'string'
        ? str.replaceAll('—', ' ').split(/\s|\n|\?|\,|\.|\:|\-/).filter(el => !!el)
        : null
            ? null : 0
}


function getMainCount(str = '') { // посчитала количество знаков
    return !!str && !!str.length && typeof str === 'string'
        ? getStrSplitFilter(str).join('').length
        : 0
            ? null : 0
}


function getnWordsCount(str = '') {
    return !!str && !!str.length && typeof str === 'string'// посчитала количество слов
        ? getStrSplitFilter(str).length
        : 0
            ? null : 0
}


function getShortesWordCount(str = '') { // посчитала самое короткое слово
    let strSplit = getStrSplitFilter(str); //получила массив
    if (!strSplit) {   //если немассив, то 0
        return 0;
    }
    let shortesWord = strSplit[0].length; //получила длину первого массива
    for (let i = 0; i < strSplit.length; i++) {  // перебираем массив и сравниваем с первым, если его длина меньше длины
        if (strSplit[i].length < shortesWord) { // если его длина меньше длины первого массива, то заменяем его на shortesWord
            shortesWord = strSplit[i].length;
        }
    }
    return shortesWord;
}


function getlongestWordCount(str = '') {  //посчитала самое длинное слово
    let strSplit = getStrSplitFilter(str); //получила массив
    if (!strSplit) {   //если немассив, то 0
        return 0;
    }
    let longestWord = strSplit[0].length; //получила длину первого массива
    for (let i = 0; i < strSplit.length; i++) {  // перебираем массив и сравниваем с первым, если его длина меньше длины
        if (strSplit[i].length > longestWord) { // если его длина больше длины первого массива, то заменяем его на longestWord
            longestWord = strSplit[i].length;
        }
    }
    return longestWord;
}

function getOffersCount(str = '') {  // посчитала количество предложений
    return !!str && !!str.length && typeof str === 'string'
        ? str.split(/[.!?](?!\d)/g).filter(Boolean).length
        : null
            ? null : 0;
}


function getLettersCount(str = '') { // посчитала количество букв
    return !!str && !!str.length && typeof str === 'string'
        ? str.match(/[a-zA-Zа-яА-Я]/g).length
        : null
            ? null : 0;
}


function getNumbersCount(str = '') { // посчитала количество цифр
    let i = str.length;
    return i - str.replace(/\d/gm, '').length;
}
