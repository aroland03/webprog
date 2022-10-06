# Eseménykezelés

## Eseménykezelők, mint mini programok

```js
function handleEvent(){
    //Read
    //Process
    //Write
}
```

## Események

- `click` - kattintás
- `mousemove` - egérmozgatás
- `mousedown` - egér gombjának lenyomása
- `moseup` - egér gombjának felengedése
- `input` - input mező értékének megváltoztatása
- `keydown` - billentyűzet gombjának lenyomása
- `keyup` - billentyűzet gombjának felengedése
- `keypress` - billentyűzet gombjának megnyomása
- `submit` - űrlap elküldése
- `scroll` - görgetés az oldalon

## Eseménykezelő függvények regisztrációja
```js
// Egyszerűbb esetekben
element.addEventListener(eventType, eventHandler)
element.removeEventListener(eventType, eventHandler)

//Például
const button = document.querySelector('#button')

button.addEventListener('click', handleButtonClick)
button.removeEventListener('click', handleButtonClick)

function handleButtonClick(){
    // Mi történik kattintáskor
}

// Helyben definiálva
element.addEventListener(eventType, function() {})


// Másképp

target.addEventListener(eventType, eventListener[, options]);
// `options` object:
// - capture: Boolean (elkapás iránya)
// - once: Boolean (egyszeri hívás, majd eltávolítás)
// - passive: Boolean (nincs preventDefault() hívás)

target.removeEventListener(eventType, eventListener[, options]);
// options object
// - capture: Boolean

// Csak a capture flag számít az eseménykezelő azonosításában 
// a type és listener mellett
// Névtelen függvényt nem lehet eltávolítani (nincs rá referencia)
// kivéve: `once` option

target.addEventListener('click', onClick, { once: true });


// Egy elem egy eseményéhez több eseménykezelő függvény
button.addEventListener("click", handleButtonClick1);
button.addEventListener("click", handleButtonClick2);

// Több eseményhez ugyanaz az eseménykezelő függvény
button1.addEventListener("click", handleButtonClick);
button2.addEventListener("click", handleButtonClick);
```

## Eseménykezelő példa
```html
<form>
    Name: <input type="text" id="name"> <br>
    <input type="button" value="Say hello!" id="hello">
    <br>
    <span id ="output"></span>
</form>
```

```js
function greet(name) {
  return `Hello ${name}!`;
}

const input = document.querySelector('#name');
const output = document.querySelector('#output');
const hello = document.querySelector('#hello');

function handleHelloClick() {
  const name = input.value;
  const greeting = greet(name);
  output.innerHTML = greeting;
}

hello.addEventListener('click', handleHelloClick);
```

## Eseményobjektum
Az eseménykezelő függvények függvények első paraméterként megkapják

```js
function handleEvent(event){
    console.log(event)
}
```

### Az eseményobjektum az eseménytől függ
Példák:
- Általános tulajdonságok: `type`, `target`
- Egéresemény: `screenX`, `screenY`, `buttons`
- Billentyűzetesemény: `key`, `code`, `altKey`, `ctrlKey`

## Példafeladat
Adot hivatkozások felsorolása. Ha a SHIFT billentyű lenyomása mellett kattintunk a hivatkozásra, akkor írjuk a konzolra a hivatkozás URL-jét

### A megoldás lépései
- SHIFT lenyomásának vizsgálata
- Alapértelmezett művelet letiltása
- Kattintott elem elérése
- Hozzárendelés az összes elemhez

### Eseményobjektum -- példa
```js
const link = document.querySelector('#link1')
function handleLinkClick(event)
{
    if(!event.shiftKey) {
        return
    }

    const href = link.href
    console.log(href)
}
link.addEventListener('click', handleLinkClick)
```

### Alapértelmezett művelet megakadályozása
- Alapértelmezett műveletek
  - Linkre kattintás -> Oldal betöltése
  - Submit gombra kattintás -> Űrlap elküldése
  - Beviteli mezőbe gépelés -> karakterek beíródnak
- Megakadályozása
  - eseményobjektum `preventDefault()` metódusa

```js
function handleEvent(event) {
    event.preventDefault()
}
```

### Alapértelmezett művelet megakadályozása -- példa
```js
const link = document.querySelector('#link1')
function handleLinkClick(event)
{
    if(!event.shiftKey) {
        return
    }

    event.preventDefault()
    const href = link.href
    console.log(href)
}
link.addEventListener('click', handleLinkClick)
```

## Események buborékolása és delegálása

- **Forrásobjektum**: az eseményt kiváltó objektum (e.target)
- **Események buborékolása**: az esemény a forrásobjektumból kezdve sorban mindegyik szülőjén is bekövetkezik
- Lehetséges magasabb szinten kezelni az eseményt, mint ahol bekövetkezik
- **Kezelőobjektum**: az eseményre figyelő objektum
  - az az objektum, amelyhez az eseménykezelő hozzá van rendelve (`this`)
- **Delegálás**: az eseményt magasabb szinten kezeljük, de egy alacsonyabb szintű objektummal dolgozunk
- **Delegált objektum**: az az objektum, amellyel az eseménykezelőben dolgozni szeretnénk
- **Buborékolás megakadályozása**: e.stopPropagation()
- Pontosabban
  - Föntről lefelé (event capture)
  - Lentről felfelé (event bubbling)

## Esemény delegálása
```js
function handleClick(event)
{
    const handlerElement = this
    const sourceElement = event.target
    const selector = '.foo'

    let element = sourceElement

    while(
        element !== handlerElement && 
        !element.matches(selector))
        {
            element = element.parendNode
        }
    if (element !== handlerElement)
    {
        const targetElement = element
        console.log(targetElement)
    }
}
```

## "OKOS" `delegate` segédfüggvény
```js
function delegate(parent, type, selector, handler) {
    function delegatedFunction(event)
    {
        const handlerElement = this
        const sourceElement = event.target

        const closestElement = sourceElement.closese(selector)

        if(handlerElement.contains(closestElement)) {
            const targetElement = closestElement
            handler.call(targgetElement, event)
        }
    }
    parent.addEventListener(type, delegatedFunction)
}
```

## "ROVID-OKOS" `delegate` segédfüggvény
```js
function delegate(parent, type, selector, handler)
{
    parent.addEventListener(type, function (event) {
        const targetElement = event.target.closest(selector)

        if(this.contains(targetElement))
        handler.call(targetElement, event)
    })
}
```

## Események delegálása
- Hatékony programozási minta (egy elem - egy eseménykezelő)
- Sok elemnél / valamilyen típusú elemre általánosan
- Dinamikusan beszúrt elemeknél
- Viselkedés hozzárendelése elemekhez deklaratívan
  
### Események delegálása -- példa
```html
<a href="http://www.elte.hu" class="info"><span>ELTE</span></a>
<a href="http://www.inf.elte.hu">ELTE<span>Informatikai kar</span></a>
<a href="http://www.inf.elte.hu/mot" class="info">Médiainformatikai tanszék</a>
```

```js
delegate(document, 'click', 'a.info', handleListClick)
function handleListClick(event)
{
    if(!event.shiftKey) {
        return;
    }
    event.preventDefault()
    console.log(this.href)
}
```