const itemSets = document.querySelectorAll('.itemSet');

const nextbtns = document.querySelectorAll('.nextbtn');

for (const nextbtn of nextbtns) {
    nextbtn.addEventListener('click', () => {
        for (let itemSet of itemSets) {
            itemSet.classList.toggle('hide');
            itemSet.classList.add('fadein');
        }
    });
}