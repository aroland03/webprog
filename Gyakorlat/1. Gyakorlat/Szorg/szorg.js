const allampolgarok = [
    {
        id: 1001,
        nev: 'Lanyesz',
        szuletett: 1997,
        kereset: 2000000
    },
    {
        id: 1002,
        nev: 'Laurka',
        szuletett: 1995,
        kereset: 223003
    },
    {
        id: 1212,
        nev: 'Suwu',
        szuletett: 2019,
        kereset: 0
    },
    {
        id: 69420,
        nev: 'Manyesz',
        szuletett: 2001,
        kereset: 43202
    },
    {
        id: 191114,
        nev: 'Thoca', 
        szuletett: 2069,
        kereset: 2300000
    },
    {
        id: 1111,
        nev: 'Mészi',
        szuletett: 1999,
        kereset: 65000
    },
]

// Megoldás for ciklussal
function before2000( arr )
{
    let result = []
    for(let i of arr)
    {
        if(i.szuletett < 2000)
        {
            result.push(i.id)
        }
    }
    return result
}
console.log(before2000(allampolgarok))

// Megoldás tömbfüggvényekkel
let bef2000 = allampolgarok.filter(citizen => citizen.szuletett < 2000).map(citizen => citizen.id)
console.log(bef2000)


// Megoldás for ciklussal
function bestSalary( arr )
{
    let best = arr[0];
    for(let i of arr)
    {
        if(i.kereset >= best.kereset)
        {
            best = i
        }
    }
    return best.nev
}

console.log(bestSalary(allampolgarok))

function worstSalary( arr )
{
    let worst = arr[0];
    for(let i of arr)
    {
        if(i.kereset <= worst.kereset)
        {
            worst = i
        }
    }
    return worst.nev
}

console.log(worstSalary(allampolgarok.filter(citizen => citizen.szuletett>2000)))