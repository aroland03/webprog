# Alkalmazásfejlesztési alapelvek

- Eseménykezelő függvény
  - beolvasás
  - feldolgozás
  - kiírás
- Biztosan dolgozik a DOM-mal
- Kapcsolatot teremt a DOM és a nyelvi elemek között

## Hol legyen az adat?
```js
// Ebből könnyű HTML-t generálni
let count = 3
const movies = [
    { id: 1, title: 'The Shack', year: 2017, seen: true },
    { id: 2, title: 'Fireproof', year: 2008, seen: true },
    { id: 3, title: 'Courageous', year: 2011, seen: false },
]
```
```html
<!-- ✔ Előfordulnak olyan adatok, amelyeket a HTML attribútumban kell tárolni -->
<div data-id="1">The Shack</div>

<!-- ✖ Ebből nehéz az adatot kinyerni -->
<ul>
  <li data-id="1" class="seen"  >The Shack (2017)</li>
  <li data-id="2" class="seen"  >Fireproof (2008)</li>
  <li data-id="3" class="unseen">Courageous (2011)</li>
</ul>
```

## Tárolás a DOM-ban (1)
```html
<input id="newItem">
<button id="addItem">Add</button>
<ul id="todoList">
  <li>Buy milk</li>
  <li>Learn JavaScript</li>
</ul>
```

```js
const todoList = document.querySelector("#todoList");
const button = document.querySelector("#addItem");
const input = document.querySelector("#newItem");

function handleButtonClick() {
  const newItem = input.value;
  todoList.innerHTML += `<li>${newItem}</li>`;
}

button.addEventListener("click", handleButtonClick);
```

## Tárolás a DOM-ban (2)
```html
<input id="newItem">
<button id="addItem">Add</button>
<ul id="todoList">
  <li>Buy milk</li>
  <li>Learn JavaScript</li>
</ul>
```

```js
const todoList = document.querySelector("#todoList");
const button = document.querySelector("#addItem");
const input = document.querySelector("#newItem");

function handleButtonClick() {
  const newItem = input.value;
  const newListItem = document.createElement("li");
  newListItem.innerHTML = newItem;
  todoList.appendChild(newListItem);
}

button.addEventListener("click", handleButtonClick);
```

## Tárolás a DOM-ban (3)
Todo lista elemei
```html
<ul id="todoList">
  <li>Buy milk</li>
  <li>Learn JavaScript</li>
</ul>
```

```js
const todoList = document.querySelector("#todoList");
const listItems = document.querySelectorAll("li");

function handleButtonClick() {
  // Input
  const newItem = input.value;
  const listContent = Array.from(listItems).map(li => li.innerText);
  // Process
  listContent.push(newItem);
  // Output
  const newListItem = document.createElement("li");
  newListItem.innerHTML = newItem;
  todoList.appendChild(newListItem);
}
```

## Tárolás a DOM-ban (Összefoglalás)
- Az adatot a DOM-ban tároljuk
- Mindig onnan kell kiolvasni
- Nem alap nyelvi elemekkel dolgozunk
- Adat és feldolgozó függvény szétválik
- Probléma: egységbe zárás, tárolás

## Adat és megjelenés szétválasztása
- Alkalmazásfejlesztési alapelv
- Mineél kisebb érintkezési felület az adat és a felület között
- Könnyebb egységbe zárás
- Alapavető nyelvi elemeket használ
- A DOM (I/O) lassú

### Imperatív felületkezelés
```js
const list = [];

const input = document.querySelector("input");
const button = document.querySelector("button");
const todoList = document.querySelector("ul");

function handleButtonClick() {
  // Input
  const newItem = input.value;
  // Process
  list.push(newItem);
  // do something else with the data
  // Output
  const newElement = document.createElement("li");
  newElement.innerHTML = newItem;
  todoList.appendChild(newElement);
}

button.addEventListener("click", handleButtonClick);
```

### Deklaratív felületkezelés
A felület mint az adat leképezése (függvény)
```js
const list = [];

function renderList(list) {
  return list.map(item => `<li>${item}</li>`).join("");
}

// ...

function handleButtonClick() {
  // Input
  const newItem = input.value;
  // Process
  list.push(newItem);
  // Output
  todoList.innerHTML = renderList(list);
}

button.addEventListener("click", handleButtonClick);
```

# Felület kezelése

## Kiírás a DOM-ba

- **Imperatív megközelítés**
  - Ha szükséges megőrizni az adott DOM elemet (van belső állapotunk, pl. input, animáció, DOM-ban tárolás)
  - Direkt manipuláció
- **Deklaratív megközelítés**
  - Ha az elemek újragenerálhatóak (nincs belső állapotuk)
  - Adat leképezése felületi elemekre
  - UI = render(data)
  - HTML generálók

### Imperatív
```js
function handleButtonClick() {
  const newItem = input.value;
  list.push(newItem);
  // Output
  const newElement = document.createElement("li");
  newElement.innerHTML = newItem;
  todoList.appendChild(newElement);
}
```

### Deklaratív
```js
function renderList(list) {
  return list.map(item => `<li>${item}</li>`).join("");
}

const input = document.querySelector("input");
const button = document.querySelector("button");
const todoList = document.querySelector("ul");

function handleButtonClick() {
  // Input
  const newItem = input.value;
  // Process
  list.push(newItem);
  // Output
  todoList.innerHTML = renderList(list);
}
```

# Fizikai és logikai egységek

## Kódszervezés
- Fizikai
  - külön fájl
  - modul
- Logikai
  - függvény
  - osztály (egységbe zárás)
  - modul

## Fizikai csoportosítás
```js
// math.js
const add = (a, b) => a + b;

// app.js
console.log(add(40, 2));
```

```html
<body>
  <!-- ... -->
  <script src="math.js"></script>
  <script src="app.js"></script>
</body>
```

- külön fájlokba: modul
- Függőségek automatikus kezelése

```js
// math.js
const add = (a, b) => a + b;
export { add }

// app.js
import { add } from "./math.js";
console.log(add(40, 2));
```

```html
<body>
  <!-- ... -->
  <script type="module" src="app.js"></script>
```

### Modulok - export
```js
// in-place export
export const add = (a, b) => a + b;
export const multiply = (a, b) => a * b;

// separate export
const add = (a, b) => a + b;
const multiply = (a, b) => a * b;
export { add, multiply };

// default export
export default const add = (a, b) => a + b;

// rename exports
const add = (a, b) => a + b;
const multiply = (a, b) => a * b;
export { add as customAdd, multiply as customMultiply };

// export from module
export * from "./other.js";
```

### Modulok - import
```js
// import entities
import { add, multiply } from "./math.js";

// import defaults
import add from "./math.js";

// rename imports
import { add as mathAdd } from "./math.js";

// import module object
import * as MyMath from "./math.js";

// import just for side effects
import "./something.js";

// import URL
import * as MyMath from "http://some.where.hu/math.js"
```

## Logikai csoportosítás
- Függvények
  - elemi egység
  - műveletek strukturálása

```js
// Helper/utility function
function range(n) {
  return Array.from({length: n}, (e, i) => i + 1);
}

// HTML generator
function genList(list) {
  return `<ul>${list.map(e => `<li>${e}</li>`).join('')}</ul>`;
}

// Business logic
const add = (a, b) => a + b;

// Event handler
function onClick(e) {
  // ...
}
```

- Osztályok
  - magasabb szintű egység
  - műveletek és adatok egységbe zárása

```js
class Tile {
  constructor(x, y) {
    this.x = y;
    this.y = y;
  }

  get coords() {
    return {x, y};
  }

  distance(tile) {
    return Math.sqrt(
      (tile.x - this.x) ** 2 + (tile.y - this.y) ** 2
    );
  }
}
```

# Egységbe zárás

## Glovális változók és metódusok
```js
let number = 0;

function increase() {
  number++;
}

function init() {
  number = 0;
}

increase();
console.log(number); // 1
```

## Objektum, ~névtér

```js
const game = {
  number: 0,
  increase: function() {
    this.number++;
  },
  init: function () {
    this.number = 0;
  }
}

game.init();
game.increase();
console.log(game.number); // 1
```

## Osztály

```js
class Game {
  constructor() {
    this.number = 0;
  }
  increase() {
    this.number++;
  }
}

const game = new Game();
game.increase();
console.log(game.number); // 1
```

## Függvény, saját hatókörrel (felfedő modul minta), IIFE

```js
const game = (function () {
  let number = 0;

  function increase() {
    number++;
  }

  function init() {
    number = 0;
  }

  function getNumber() {
    return number;
  }

  return { init, increase, getNumber};
})();

game.init();
game.increase();
console.log(game.getNumber()); // 1
```

## Modul, függvény
```js
// game.js
let number = 0;

export function increase() {
  number++;
}

export function init() {
  number = 0;
}

export function getNumber() {
  return number;
}

// main.js
import { increase, init, getNumber } from "./game.js";

increase();
console.log(getNumber()); // 1
```

## Modul, osztály
```js
// game.js
export class Game {
  constructor() {
    this.number = 0;
  }
  
  increase() {
    this.number += 1;
  }
}

// main.js
import { Game } from './game.js';

const game = new Game();
game.increase();
console.log(game.number);
```

# Alkalmazásfejlesztés lépései

1. Felhasználói felület (UI)
   - Tervezés
   - HTML, CSS
2. Üzleti logika (BL)
   - adatok
   - függvények
3. Eseménykezelő függvények
   - beolvasás (DOM)
   - feldolgozás (BL)
   - kiírás (DOM)

## Példa - számkitalálós játkék

### Felületi terv
```html
<input id="tipp">
<button id="tippGomb">Tipp!</button>
<ul id="tippek"></ul>
```

### Állapottér
```js
let kitalalandoSzam = 42;
let vege = false;
const tippek = [50, 25, 38, 44];
```

### Állapot változása
```js
function tipp(tippeltSzam) {
  tippek.push(tippeltSzam);
  vege = (tippeltSzam === kitalalandoSzam);
}
```

### Segédfüggvények
```js
function veletlenEgesz(min, max) {
  const veletlen = Math.random();
  const tartomany = max - min + 1;
  return Math.trunc(veletlen * tartomany) + min;
}
```

### Eseménykezelő függvények
```js
const tippInput = document.querySelector("#tipp");
const gomb = document.querySelector("#tippGomb");
const tippLista = document.querySelector("#tippek");

gomb.addEventListener("click", tippeles);
function tippeles(e) {
  // beolvasás
  const tippeltSzam = parseInt(tippInput.value);
  // feldolgozás
  tipp(tippeltSzam);
  // kiírás
  // deklaratív felületkezelés
  tippLista.innerHTML = tippek.map(szam => 
    `<li>${szam} (${hasonlit(szam, kitalalandoSzam)})</li>`
  ).join("");
  // imperatív felületkezelés
  gomb.disabled = vege;
}
function hasonlit(szam, kitalalandoSzam) {
  if (szam < kitalalandoSzam) return "nagyobb";
  if (szam > kitalalandoSzam) return "kisebb";
  return "egyenlő";
}
```

### HTML generátorok
```js
function genLista(tippek, kitalalandoSzam) {
  return tippek.map(szam => 
    `<li>${szam} (${hasonlit(szam, kitalalandoSzam)})</li>`
  ).join("");
}
```

```js
function tippeles(e) {
  // beolvasás
  const tippeltSzam = parseInt(tippInput.value);
  // feldolgozás
  tipp(tippeltSzam);
  // kiírás
  tippLista.innerHTML = genLista(tippek, kitalalandoSzam);
  gomb.disabled = vege;
}
```

