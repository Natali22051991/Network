const backdrop = document.querySelector('.backdrop');
const container = document.querySelector('.container');
const likes = document.querySelector('.like-btn');
const reg = document.querySelector('#reg');
const names = document.querySelector('#name');
const vhod = document.querySelector('#vhod');
const clicks = document.querySelector('.clicks');
// console.log(likes);
let i = 1;
let sum;
likes.addEventListener('click',()=>{
 sum = i++;
    console.log(sum);
clicks.innerHTML = `${sum}`;
});


// backdrop.addEventListener('click', modal);
// function modal() {

console.log(backdrop,container,reg,names,vhod);

like.addEventListener('click',()=>{
    console.log('ghbdtn');
})
backdrop.addEventListener('click', modal);
function modal() {
    console.log("hello");
    // backdrop.classList.remove('hidden');
    console.log('ghbdtn');
}
// vhod.addEventListener('click',()=>{

//     // backdrop.classList.remove('hidden');
//     console.log('ghbdtn');
// }



