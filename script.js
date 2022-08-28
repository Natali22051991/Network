const backdrop = document.querySelector('.backdrop');
const container = document.querySelector('.container');
const like = document.querySelector('.like-btn');
const reg = document.querySelector('#reg');
const names = document.querySelector('#name');
const vhod = document.querySelector('#vhod');

console.log(backdrop,container,reg,names,vhod);

like.addEventListener('click',()=>{
    console.log('ghbdtn');
})
backdrop.addEventListener('click', modal);
function modal() {
    backdrop.classList.remove('hidden');
}
// vhod.addEventListener('click',()=>{
//     // backdrop.classList.remove('hidden');
// // names.getAttribute('href');
// //     console.log(names.getAttribute('href'));
//     console.log('jjhhj');
//
// })


