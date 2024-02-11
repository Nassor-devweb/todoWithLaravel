const arrows = document.querySelectorAll('.todo-name')
const btnDelete = document.querySelectorAll('.btnDelete');
const modal = document.querySelector('.modal-contenaire.activeModal')
const contentConfirm = document.querySelector('.content-confirm')
const deleteBtnModal = document.querySelector('#deleteBtnModal');
const cancelModalbtn = document.querySelector('#cancelModalbtn');
const btnAffected = document.querySelectorAll('.affectedContenaire')
let userListe = null;
let currentBntAffect = null;

//---------------------------Gestion affectation-----------

btnAffected.forEach((el) => {
    el.addEventListener('click', (e) => {
        userListe = el.querySelector('.listUserAffected');
        userListe.classList.toggle('activeListe')
        currentBntAffect = el;
    })
})

document.addEventListener('click', (even) => {
    even.stopPropagation();
   btnAffected.forEach((el) => {
        const overUserListe = el.querySelector('.listUserAffected');
        if(userListe != null && el != currentBntAffect && overUserListe.classList.contains('activeListe')){
            overUserListe.classList.toggle('activeListe');
        }
    })
    if(userListe != null && userListe.classList.contains('activeListe') && !currentBntAffect.contains(even.target)){
        userListe.classList.toggle('activeListe');
        userListe = null;
        currentBntAffect = null;
    }
})

//------------------------------Gestion arrow animation------------------
arrows.forEach((el) => {
    el.addEventListener('click', (e) => {
        const currentArrow = el.querySelector('.fa-solid.fa-caret-right')
        currentArrow.classList.toggle('rotate-arrow')
        const description = el.nextElementSibling
        description.classList.toggle('active')
    })
})

//---------------------------------Gestion modal--------------------------

modal.addEventListener('click', (e) => {
    e.stopPropagation()
    if(!contentConfirm.contains(e.target)) {
        modal.classList.toggle('activeModal');
    }
})

deleteBtnModal.addEventListener("click",(even) => {
    modal.classList.toggle('activeModal');
})

cancelModalbtn.addEventListener('click',(e) => {
    e.preventDefault()
    deleteBtnModal.dispatchEvent(new Event('click'))
})

btnDelete.forEach((el) => {
    el.addEventListener('click', (e) => {
        const btn = el.querySelector('.btnDelete');
        const idTodo = el.dataset.deleteid;
        deleteBtnModal.setAttribute('value',idTodo);
        modal.classList.toggle('activeModal');
    })
})
