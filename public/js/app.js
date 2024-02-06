const arrows = document.querySelectorAll('.todo-name')

arrows.forEach((el) => {
    el.addEventListener('click', (e) => {
        const currentArrow = el.querySelector('.fa-solid.fa-caret-right')
        currentArrow.classList.toggle('rotate-arrow')
        const description = el.nextElementSibling
        description.classList.toggle('active')
    })
})