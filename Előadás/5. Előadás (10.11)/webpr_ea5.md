# Időzítők, adattárolás, űrlapok, képek, táblázatok, további nyelvi elemek

# Időzítők

## setTimeout
- `timerId = setTimeout(fn, ms)` - Egy adott függvény futtatása `ms` múlva
- `clearTimeout(timerId)` - A `timerId`-jú időzítő leállítása

```js
// Időzítő létrehozása
function tick() {
    console.log("tick")
}
setTimeout(tick, 1000)

// Időzítő törlése
const timer = setTimeout(() => {}, 1000)
clearTimeout(timer)
```

## setInterval
- `timerId = setTimeout(fn, ms)` - Egy adott függvény futtatása `ms` ms-onként
- `clearInterval(timerId)` - A `timerId`-jú időzítő leállítása

```js
// Időzítő létrehozása
function tick() {
    console.log("tick")
}
const timer = setInterval(tick, 1000)

// Időzítő törlése
clearTimeout(timer)
```

## Időzítők használata
- Késleltetett végrehajtás
- Újrarajzolás megvárása (pl. animáció)
- Emberi léptékű műveletvégrehajtás (pl. animáció)
  - Hosszú folyamat késleltetése
- Hosszú műveletek felbontása


# Adatmentés a böngészőben
- Változók
- (Süti)
- HTML 5 Storage (Web Storage)
  - localStorage
  - sessionStorage
- Web SQL Database (részben támogatott)
- Indexed Database (IndexedDB)
- File API (bináris állományok tárolása)

## localStorage API
- Adatok tárolása a helyi gépen
- Kulcs-érték párok gyűjteménye
- Csak egyszerű értékek tárolhatók -> szerializáció

```js
// Értékek tárolása
localStorage.setItem("foo", 42)

// Vagy
localStorage.bar(42)

// Értékek olvasása
console.log(localStorage.getItem("foo"))
// Vagy
console.log(localStorage.bar)

// Komplex adatok tárolása
const data = [1, 3, 5, 7]
localStorage.setItem('data', JSON.stringify(data))
const loadedData = JSON.parse(localStorage.getItem('data'))
```

# Űrlapok, képek táblázatok

## Űrlapok és űrlapelemek
- Interakció elsődleges eszközei
- Rengeteg attribútum
- Analóg megközelítés működik
  - tabindex -> tabIndex
  - maxlength -> maxLength
  - placeholder -> placeHolder

### Események
- form
  - `submit`, `reset` - megakadályozható
- űrlapelemek
  - `focus`, `blur`
  - `change` (elem elhagyásakor)
  - `input`(`value` változásakor)
  - `invalid`, `search`
- Szöveges elemek
  - `keydown`, `beforeinput` - megakadályozható
  - `input`, `keyup`

### Metódusok
- form
  - `submit()`, `reset()`
- űrlapelemek
  - `click()`
  - `focus()`, `blur()`
- szöveges elemek
  - `select()`
- `step`-es elemek
  - `stepDown()`, `stepUp()`

### Tulajdonságok
- form
  - `elements` (HTMLFormControlsCollection)
    - `elements['id_or_name']` (Element vagy RadioNodeList)
- űrlapelemek
  - `form`, `formAction`, `formEncType`, stb..
  - `defaultValue`, `defaultChecked`
  - `defaultSelected`, (`<option>` elem)
  - `valueAsDate`, `valueAsNumber`
  - `indeterminate` (checkbox, radio)

### Példa: Radio
```html
<form action="">
    <input type="radio" name="fruit" id="fruit1" value="apple"><label for="fruit1">Apple</label>
    <input type="radio" name="fruit" id="fruit2" value="pear"><label for="fruit2">Pear</label>
    <input type="radio" name="fruit" id="fruit3" value="plum"><label for="fruit3">Plum</label>
    <input type="radio" name="fruit" id="fruit4" value="lemon"><label for="fruit4">Lemon</label>
</form>
```

```js
document.addEventListener('click', function (e) {
  if (e.target.matches('[type=radio]')) {
    // RadioNodeList.value
    const value = document.querySelector('form').elements['fruit'].value
    console.log(value);
  }
})
```

### Űrlapelllenőrzés - HTML és CSS
- HTML 5 attribútumok
  - `novalidate`
  - `required`
  - `pattern`
  - `minlength`, `maxlength`
  - `min`, `max`, `step`
- CSS pszeudo-szelektorok
  - `:valid`
  - `:invalid`
  - `:in-range`
  - `:out-of-range`
  - `:required`
  - `:optional`
  - `:read-only`
  - `:read-write`
  - `:checked`

### Űrlapellenőrzés - JS
- `invalid` esemény
- `validationMessage` - hibaüzenet
- `willValidate` - lesz-e ellenőrizve
- `validity` : ValidyState
  - `patternMismatch`, `valueMissing`. `tooLong`, `valid`, ...
- `checkValidity()`
- `setCustomValidity(str)` - egyedi hibaüzenet

## Képek
- `<img src="kep.png" alt="szoveg">`
- Legfontosabb tulajdonsága: `src`
  - Dinamikusan lecseréli a képet
- Tipikus képműveletek
  - Kép lecserélése
  - Kép előtöltése

```js
const mem_kep = document.createElement('img');
mem_kep.src = 'korte.png';
//...
//ha szukseges a csere:
const kep = document.querySelector('img');
kep.src = mem_kep.src;
```

## Táblázat
- Táblázat
  - rows
  - insertRow(index)
  - deleteRows(index)
- Sor
  - `rowIndex` - sor száma
  - `sectionRowIndex`
  - `cells`
  - `insertCell(index)`
  - `deleteCell(index)`
- Cella
  - `cellIndex`
  
```js
// Függvény, ami megmondja a cella x,y koordinátáját a táblázaton belül
function xyKoord(td) {
  const x =  td.cellIndex
  const tr = td.parentNode
  const y =  tr.sectionRowIndex
  return {x, y}
}
```

### Példa
```js
const table = document.querySelector('table')
table.addEventListener('click', function (e) {
  if (e.target.matches('td')) {
    const {x, y} = xyKoord(e.target)
    table.rows[y].cells[x].classList.toggle('piros')
    table.querySelector('caption').innerHTML = `${x}, ${y}`
  }
})
```