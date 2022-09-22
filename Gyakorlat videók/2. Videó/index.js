/*
1. Felületi terv (rajz)
2. HTML prototípus
3. Adatok és feldolgozó függvények (csak JS)
4. Eseménykezelő függvények
*/

function kerulet(r)
{
    return 2 * r * Math.PI
}

const gomb = document.querySelector('#szamol')
gomb.addEventListener('click', kattintas)

function kattintas()
{
    const output = document.querySelector('#eredmeny')
    const input = document.querySelector('#inputRadius')
    // beolvas
    //input.style.borderColor=""
    input.classList.remove('hibas')
    output.innerHTML = ""
    const r = parseFloat(input.value)
    if(isNaN(r))
    {
        //input.style.borderColor = "red"
        input.classList.add('hibas')
        return
    }
    //feldolgozas
    const ker = kerulet(r)
    //kiírás: felületre
    document.querySelector('#eredmeny').textContent = ker
}