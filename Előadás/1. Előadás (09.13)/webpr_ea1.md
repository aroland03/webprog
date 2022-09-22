<style>
.filename {
  text-align: right;
}
</style>

# Webprogramozás bevezetés

## Kliens-szerver architektúra

- Web: kliens és kiszolgáló kommunikációja
  - HTTP: a kommunikáció protkollja
  - URL: erőforrások azonosítója
  - HTML: dokumentumleíró nyelv
- Lépések
   1. Kliens kérést intéz a szervernek
   2. Szerver válaszol
   3. A kliens feldolgozza a választ

## Statikus oldalak

- **Szerver szempontjából** statikus
  - Kérés pillanatában a szerveren megtalálható az a tartalom, amely leküldésre kerül a válaszban
  - Fájlkiszolgálás
- **Kliens szempontjából** statikus
  - A letöltött és a létrejött tartalom az oldal élettartamának a végéig ugyanaz
  - Nem változik meg sem a böngésző állapota, sem a betöltött dokumentum szerkezete
  - Nem fut le benne programkód, leíró nyelv, deklaratív

## Dinamikus oldalak

- **Szerver szempontjából** dinamikus
  - A válaszként leküldött tartalmaz a program állítja elő
  - A kérés pillanatában a válasz még nem létezik a szerveren
- **Kliens szempontjából** dinamikus
  - A letöltött tartalomban programkód fut le
  - Ez megváltoztathatja a böngésző állapotát és a dokumentum szerkezetét
- --> Programozás
<br></br>

# Kliensoldali webprogramozás

## Környezet

A JavaScript kódokat a html dokumentum body részében a `<script>` tag segítségével tudunk beszúrni.

Lehet a html dokumentumban közvetlenül is megírni a scriptet, vagy pedig beilleszteni azt egy külső fájlból (ajánlott).

## Egy példa

Adottak a Webprogramozás tárgy eredményei név-jegy párokban. Add meg az 5-öst szerző hallgatók nevét!

<p class="filename"><code>index.html</code>

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filter</title>
</head>
<body>
  <script src="data.js"></script>
  <script src="filter-01.js"></script>
  <script src="filter-02.js"></script>
</body>
</html>
```

<p class="filename"><code>data.js</code>

```js
const wpResults = [
  { name: "Henry Edwards",      grade: 3 },
  { name: "John Young",         grade: 2 },
  { name: "Noah Williams",      grade: 4 },
  { name: "Julie Moore",        grade: 5 },
  { name: "Jeffrey Roberts",    grade: 5 },
  { name: "Brandon Turner",     grade: 3 },
  { name: "Mia Wright",         grade: 5 },
  { name: "Catherine Mitchell", grade: 4 },
  { name: "Kevin Johnson",      grade: 4 },
  { name: "Thomas James",       grade: 5 },
];
```

Megoldás (régi)
<p class = "filename"><code>filter-01.js</code>

```js
function filterGrade5(students) {
  const result = [];
  for (const student of students) {
    if (student.grade === 5) {
      result.push(student.name);
    }
  }
  return result;
}

console.log( filterGrade5(wpResults) );
```

Megoldás (új, lambda)
<p class = "filename"><code>filter-02.js</code>

```js
const result = wpResults
  .filter(student => student.grade === 5)
  .map(student => student.name);

console.log(result);
```

## Fejlesztőeszközök

- Webfejlesztő eszköztár (F12)
  - Elemek
  - JavaScript konzol (`console`)
  - Debugger
  - Erőforrások
  - Hálozati forgalom
  - Teljesítményprofilozás
- Parancssori eszközök

## Dokumentáció
- Hivatalos: ECMAScript szabvány
- Mozzila Developer Network: JavaScript

## Futási környezet
- Böngésző
- Parancssor (Node.js)

## Hova írhatjuk a kódot

- JavaScript konzolba (böngésző)
  - Az adott oldal kontextusában értelmezésre kerül
  - Kipróbálásra jó
- HTML kódba (böngésző)
  - Inline script, `<script>` tag, bárhova rakhatjuk
  - Külső állományba, `<script>` tag `src` attribőtumával töltjük be
- Parancssori értelmezőbe (parancssor, Node.js)

```html
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Webfejlesztés 2.</title>
    <script>
      //JavaScript code here
    </script>
    <script src="jscode.js"></script>
  </head>
  <body>
    <script>
      //JavaScript code here
    </script>
    <p>Hello world!</p>
    <script src="jscode2.js"></script>
  </body>
</html>
```

# A JavaScript nyelv - alapok
- Dinamikusan típusos
- Interpretált
- Szkriptnyelv

## Dinamikusan típusos
- A változók típusa a benne tárolt érték típusától függ
- A típusok az értékekhez tartoznak, nem a változókhoz
- Automatikus típuskonverziók (lehetőleg kerüljük)

## Interpretált
- A böngészőben futó értelmező értelmezi a JavaScript kódsorokat sorról sorra
- Nincs fordítási fázis, nem a lefordított kód fut
- Minimális előfeldolgozás történik
- A kód a hibáig lefut, ott elakad:
  - Az adott `<script>` blokk futása megáll
  - A `<script>` blokk után folytatódik az oldal betöltése

## További jellemzők
- Kis egy nagybetűk különböznek (case sensitive)
- Nincs főprogram (main)
- Nincs input/output (csak API-kon keresztül)
- Nincs fájlkezelés (csak API-kon keresztül)
- Objektumorientált
- Prototípusos
- Automatikus pontosvessző beszúrás

## Típusok
- Primitív értékek
  - `null`
  - `undefined`
- Egyszerű típusok
  - `Boolean` - logikai
  - `Number` - szám
  - `String` - szöveg
- Összetett típusok
  - `Object` - objektum
  - `Array` - tömb
  - `Function` - függvény

## Literálformák

### Logikai literál
```js
true
false
```

### Szám literál
```js
12
12.34
```

### Szöveg literál
```js
'Szöveg'
"Szöveg"
`Szöveg`

`Tetszőleges ${kifejezés}`

'Idézőjelben "így" macsakörmölök'
"Macskakörömben 'így' idézek"
'Idézőjelben \' idézőjel'
"Macskakörömben \" macskaköröm"
'Escape: \t \n \\ '
```

## Változók
- `let`, `const` kulcsszóval deklarálunk új változót
- Ezek elhagyásával -> globális változó - KERÜLENDŐ!
- Ha nincs kezdőérték megadva -> undefined

```js
let nev = `Sanyi`  //`Sanyi`
let masik          //undedined
```

## Operátorok
- Aritmetikai operátorok
  - `+`, `-`, `*`, `/`, `%`, `++`, `--`
- Értékadás operátorai
  - `=`, `*=`, `/=`, `%=`, `+=`, `-=`, stb.
- Összehasonlító operátor
  - `===`, `!==`, `==`, `!=`, `>`, `>=`, `<`, `<=`
  - `===` és `!==` típus és érték szerint
  - `==` és `!=` csak érték szerint

```js
12 == '12'    //True
12 === '12'   //False
```

- Logikai operátorok
  - `&&`, `||`, `!`
- Szövegösszefűzés operátorai
  - `+`, `+=`
- Bitenkénti operátorok
  - `&`, `|`, `^`, `~`, `<<`, `>>`, `>>>`
- Speciális operátorok
  - `? :` feltételes operátor
  - `,` több kifejezés végrehajtása egy utasításba, visszatérési értéke az utolsó kifejezés

## Vezérlési szerkezetek

### Elágazás

```js
if (felt) {
  utasítások
}

if (felt) {
  utasítások
} else {
  utasítások
}
```

### Többirányú elágazás

```js
switch(kifejezés) {
  case érték1:
    utasítások
    break;
  case érték2:
    utasítások
    break;
  default:
    utasítások 
}
```

### Ciklusok

```js
while (felt) {
  utasítások
}

do {
  utasítások
} while (felt);

for (let i=1; i<=n; i++) {
  utasítások
}
```

# Függvények

## Alapértelmezett értékek

A függvények változóinak megadhatunk alapértelmezett értékeket. Ilyenkor ha a függvény meghívásánál nem adunk át paramétert, akkor a függvényben beállított alapértelmezett paramétert fogja használni. Az általunk megadott paraméter értelemszerűen felülírja az alapértelmezett értéket.

```js
function add(a, b = 3) {
  return a + b;
}

add(40, 2)      // 42
add(10)         // 13
add(50, 20, 10) // 70
add()           // NaN
```

## Létrehozási formák

```js
// function declaration
function add(a, b) {
  return a + b;
}

// function expression
const add = function (a, b) {
  return a + b;
}

// fat arrow
const add = (a, b) => {
  return a + b;
}
const add = (a, b) => a + b;
```

## Függvény mint paraméter

JavaScriptben lehet függvényenek függvényt is paraméterként adni.
A lenti példában a `count` függvény paraméterként vár egy stringet és egy függvényt. Amikor meghívjuk a függvényt az `"apple"` és a `c => c === 'a'` paraméterekkel, akkor a függvénytörzsben az `if` feltétele az `fn` függvény lesz, azaz a `c === 'a'`.

```js
function count(str, fn) {
  let db = 0;
  for (const c of str) {
    if (fn(c)) {
      db++;
    }
  }
  return db;
}

console.log(
  count("apple", c => c === 'a')
)
```

# Tömb

## Létrehozás, olvasás
- Tömb elemeit `[]` jelek között tudjuk megadni.
- A tömbnek lehetnek különböző típusú elemei
```js
// creation
const uresTomb = [];
const tomb = [12, 'alma', true];

// referencing an element
tomb[0]; // => 12;
tomb[1]; // => 'alma';
tomb[2]; // => true;

// length
tomb.length; // => 3
```

## Módosítás
```js
const tomb = [12, 'alma', true];

// modification
tomb[0] = 13;

// new element at the end
tomb.push("new");

// new element somewhere (not recommended)
tomb[100] = 'far away';
tomb.length; // => 101
tomb[99]; // => undefined

// deleting (size remains the same)
delete tomb[1];
tomb[1]; // => undefined
tomb.length; // => 101
```

## Mátrix
Tömbök tömbje.
```js
const m = [
  [1, 2, 3], 
  [4, 5, 6],
];

m[1][2]; // => 6
```

## Iteratív feldolgozás
```js
const gyumolcsok = [
  'alma',
  'korte',
  'szilva'
];

//A gyümölcsök kiírása a konzolra
for (let i = 0; i < gyumolcsok.length; i++) {
  console.log(gyumolcsok[i]);
}

// for..of ciklus (ES6)
for (const gyumolcs of gyumolcsok) {
  console.log(gyumolcs);
}
```

## Tömb műveletek

- `pop()`, `push(e)`, `shift()`, `unshift(e)`
  - végéről, végére, elejéről, elejére
- `reverse()` - megfordítás
- `splice(honnan, mennyit)` - kivágás
- `join(szeparátor)` - szöveggé fűz
- `indexOf(elem)` - keresés
- `includes(elem)` - tartalmazza-e

```js
const t = [1, 2, 3, 4, 5];

t.push(6);      // [1, 2, 3, 4, 5, 6]
t.pop();        // --> 6, [1, 2, 3, 4, 5]
t.unshift(0);   // [0, 1, 2, 3, 4, 5]
t.shift();      // --> 0, [1, 2, 3, 4, 5]
t.reverse();    // [5, 4, 3, 2, 1]
t.splice(2, 1); // [5, 4, 2, 1]
t.join('###');  // "5###4###2###1"
```

## Tömbfüggvények
Programozási tételek megvalósítása
- `foreEach` - általános ciklus
- `some` - eldöntés
- `every` - optimista eldöntés
- `map` - másolás
- `filter` - kiválogatás
- `reduce` - összegzés (sorozatszámítás)
- `find` - keresés (elem)
- `findIndex` - keresés (index)

### Példák

```js
// Kiválogatás
const numbers = [1, 2, 3, 4, 5];

function filter(x, fn) {
  const out = [];
  for (const e of x) {
    if (fn(e)) {
        out.push(e);
    }
  }
  return out;
}
const evens = filter(numbers, e =>e % 2 === 0);

// helyett

const evens = numbers.filter(e =>e % 2 === 0);
```

```js
// Összegzés
function sum(x) {
  let s = 0;
  for (const e of x) {
    s = s + e;
  }
  return s;
}

// helyett

x.reduce((s, e) => s + e, 0);
```

## Referenciatípus
```js
// const reference, content dynamic
const x = []
x.push(10)

// copy reference
const x1 = [1, 2, 3]
const x2 = x1
x2[1] = 20
console.log(x1) // --> [1, 20, 3]

// shallow copy
const x3 = [1, 2, 3]
const x4 = x3.slice()
// const x4 = x3.concat()
x4[1] = 20
console.log(x3) // --> [1, 2, 3]

const m1 =  [
  [1, 2, 3],
  [4, 5, 6],
]
const m2 = m1.concat()
m2[0][1] = 20
console.log(m1[0]) // --> [1, 20, 3]

// deep copy
const m3 =  [
  [1, 2, 3],
  [4, 5, 6],
]
const m4 = JSON.parse(JSON.stringify(m3))
m4[0][1] = 20
console.log(m3[0]) // --> [1, 2, 3]
```

# Objektum
- Kulcs-érték párok gyűjteménye
- Asszociatív tömbhöz hasonlít (hash)
- Rekord, osztálypéldány szimulálható
- JavaScriptben nagyon fontos szerepük van
- Majdnem mindegyik objektum
- Ha az érték függvény -> metódus

## Létrehozás, olvasás
```js
const uresObj = {};
const obj = {
  mezo1: 12,
  'mezo2': 'alma',
};

obj.mezo1;      // => 12
obj['mezo1'];   // => 12
```

## Módosítás
```js
const obj = {
  mezo1: 12,
  'mezo2': 'alma',
};

// módosítás
obj.mezo2 = 'korte';

// extending
obj.mezo3 = true;

// törlés
delete obj.mezo1;
obj.mezo1; // => undefined
```

## Metódus (függvény, mint adattag)
Objektum adattagjának lehetőségünk van függvényt is megadni.
```js
const obj = {
  data: 42,
  metodus: function () {
    console.log('Foo: ', this.data);
  },
  metodus2() {
    console.log('Foo: ', this.data);
  }
};

obj.metodus();
obj.metodus2();
```

## Getter és Setter
Objektum adattagjának `getter` és `setter` meetódusai
```js
const obj = {
  _data: 42,
  get data() {
    return _data;
  },
  set data(value) {
    _data = value;
  }
};

obj.data = 52;
obj.data; // 52
```

## Példák objektumokra
```js
//Tömb az objektumban
const zsofi = {
  kor: 7,
  kedvencEtelek: [
    'krumplipüré',
    'rántott hús',
    'tejberizs'
  ]
};
//Elem elérése
zsofi.kedvencEtelek[1]; // => 'rántott hús'
```

```js
//Objektum az objektumban
const david = {
  kor: 4,
  cim: {
    iranyitoszam: '1241',
    varos: 'Budapest',
    utca: 'Egyszervolt utca',
    hazszam: 63
  }
};
//Elem elérése
david.cim.utca; 
// => 'Egyszervolt utca'
```

## Feldolgozás
```js
const matyi = {
  kor: 1.5,
  fiu: true,
  cuki: true
}

// Feldolgozás a for..in ciklussal
for (const i in matyi) {
  console.log(i, matyi[i]);
}
// Eredmény
// => kor 1.5
// => fiu true
// => cuki true
```

## Adatszerkezetek modellezése
```js
//C++ vector --> JS tömb
const kutyuk = [
  'telefon',
  'fülhallgató',
  'pendrive',
  'e-könyv olvasó'
];
```
```js
//C++ struct --> JS objektum
const hallgato = {
  nev: 'Mosolygó Napsugár',
  neptun: 'kod123',
  szak: 'Informatika BSc'
};
```
```js
//Rekordok tömbje
const hallgatok = [
  {
    nev: 'Mosolygó Napsugár',
    neptun: 'kod123',
    szak: 'Informatika BSc'
  },
  {
    nev: 'Kék Ibolya',
    neptun: 'kod456',
    szak: 'Informatika BSc'
  }
];
```
```js
//Tömböt tartalmazó rekordok tömbje
const hallgatok = [
  {
    nev: 'Mosolygó Napsugár',
    neptun: 'kod123',
    szak: 'Informatika BSc',
    targyak: [
      'Programozás',
      'Webfejlesztés 2.',
      'Számítógépes alapismeretek'
    ]
  },
  {
    nev: 'Kék Ibolya',
    neptun: 'kod456',
    szak: 'Informatika BSc',
    targyak: [
      'Programozás',
      'Webfejlesztés 2.',
      'Diszkrét matematika',
      'Testnevelés'
    ]
  }
];
```

## Refernciatípus
```js
// const reference, content dynamic
const o = {}
o.field1 = 12

// copy reference
const o1 = { field1: 2 }
const o2 = o1
o2.field1 = 20
console.log(o1) // --> { field1: 20 }

// shallow copy
const o3 = { field1: 2 }
const o4 = {}
for (let key in o3) {
  o4[key] = o3[key]
}
// Object.assign(o4, o3)
o4.field1 = 20
console.log(o3) // --> { field1: 2 }

const n1 =  {
  field1: { subfield1_1: 1 },
  field2: { subfield2_1: 2 },
}
const n2 = Object.assign({}, n1)
n2.field2.subfield2_1 = 20
console.log(n1.field2) // --> { subfield2_1: 20 }

// deep copy
const n3 =  {
  field1: { subfield1_1: 1 },
  field2: { subfield2_1: 2 },
}
const n4 = JSON.parse(JSON.stringify(n3))
n4.field2.subfield2_1 = 20
console.log(n3.field2) // --> { subfield2_1: 2 }
```

# Osztályok
```js
class Rectangle {
  constructor(height, width) {
    this.height = height;
    this.width = width;
  }
  // Getter
  get area() {
    return this.calcArea();
  }
  // Method
  calcArea() {
    return this.height * this.width;
  }
}

const square = new Rectangle(10, 10);

console.log(square.area); // 100
```

## Osztályok publikus mezői
```js
class Product {
  name;
  tax = 0.2;
  basePrice = 0;
  price;

  constructor(name, basePrice) {
    this.name = name;
    this.basePrice = basePrice;
    this.price = (basePrice * (1 + this.tax)).toFixed(2);
  }
}
```

# Tesztlés a kódban
```js
function add(a, b) {
  return a + b;
}
// console.assert
console.assert(add(3, 2)  === 5,   '3 + 2 should be equal 5');
console.assert(add(10, 0) === 10,  '10 + 0 should be equal 10');
```