let a = 420
let b = `fa`
let c = [1, 4, 3, "alma", "körte"]
console.log(a, b)
console.log(c)

let fak = ["alma", "korte", "barack", "szilva"]

for(let i = 0; i<fak.length; i++)
{
    console.log(fak[i] + "fa")
}

for(let i = 0; i<fak.length; i++) console.log(fak[i] + "fa")

for(let elem of fak) console.log(elem + b)

let obj = {
    "key" : "value",
    "key2" : a,
    "key3" : c
}

console.log(obj.key)
console.log(obj[`key2`])

/*
let pelda = [
    {
        "hallgato" : "Sanyi",
        "atlag" : 2.5
    },
    {
        "hallgato" : "Bela",
        "atlag" : 3
    },
    {
        "hallgato" : "Jani",
        "atlag" : 4.1
    }
]

function legjobbatlag(tomb)
{
    let max = tomb[0]
    for (let i = 1;i<tomb.length; i++)
    {
        if(max.atlag < tomb[i].atlag)
        {
            max = tomb[i]
        }
    }
    return max
}

console.log(legjobbatlag(pelda))
*/

let pelda = [
    {
        "hallgato" : "Sanyi",
        "atlag" : 2.5,
        "szuletett" : 1996
    },
    {
        "hallgato" : "Bela",
        "atlag" : 3,
        "szuletett" : 1995
    },
    {
        "hallgato" : "Jani",
        "atlag" : 4.1,
        "szuletett" : 2000
    },
    {
        "hallgato" : "Bence",
        "atlag" : 3.1,
        "szuletett" : 2001
    },
    {
        "hallgato" : "Petya",
        "atlag" : 4.5,
        "szuletett" : 2003
    },
]

/*
function tmp(prev, next)
{
    return prev.atlag > next.atlag ? prev:next
}

function legjobbatlag_2000_utan(tomb)
{
    return tomb.filter(elem => elem.szuletett >= 2000).reduce(tmp)
}

console.log(legjobbatlag_2000_utan(pelda))
*/

function legjobbatlag_2000_utan(tomb)
{
    return tomb.filter(elem => elem.szuletett >= 2000).reduce((prev, next) => next)
}

console.log(legjobbatlag_2000_utan(pelda))