# 3. Gyakorlat - Eseménykezelés

## Feladatok

1. Adott egy paragrafusbeli szöveg, amelyben néhány szó `span` elembe van foglalva vagy hivatkozásként van megadva. A paragrafusra kattintáskor írd ki a konzolra:
    - a) az eseményt jelző objektumot;
    - b) az esemény típusát;
    - c) a kattintás közben lenyomott egérgombot;
    - d) az egér kattintáskori pozícióját;
    - e) az eseményt eredetileg jelző objektumot;
    - f) span elemre kattintva a span elem szövegét.
    - g) Ha a hivatkozás szövege "libero", akkor ne kövesse a hivatkozást.

```html
<p>Lorem ipsum <a href="http://translate.google.com/#la/hu/dolor">dolor</a> sit amet, <span>consectetur</span> adipiscing elit. <span>Proin ut faucibus justo.</span> Nullam vulputate iaculis blandit. Sed at placerat mi. Cras volutpat, urna sed accumsan dapibus, <a href="http://www.libero.hu">libero</a> massa cursus felis, eget consectetur libero orci ut sem. Fusce id mollis nibh. In vulputate et turpis eu semper. Sed pharetra tincidunt velit. Fusce pharetra eros vitae placerat luctus. <span>Fusce cursus ultrices tellus et lobortis.</span></p>
```
2. Írd ki az oldalra folyamatosan az alábbi adatokat:
    - a) A felhasználó egere két kattintás között átlagosan hány pixelnyi utat tesz meg?
    - b) Átlagosan mennyi idő telik el két kattintás között?
3. Egy listában kattints két listaelemre, és cseréld fel őket (a tartalmukat)!
4. Készítsünk egy csak számokat elfogadó mezőt.
    - a) Gépelés közben meg se jelenjenek a számoktól eltérő karakterek.
    - b) A megoldás működjön minden olyan szöveges beviteli mezőre, amelynek szam stílusosztály be van állítva.
5. Az oldalon minden olyan hivatkozást tiltsunk le, amelyik nem ELTÉs címre mutat!
```html
<a href="http://www.elte.hu">ELTE honlapja</a><br>
<a href="http://webprogramozas.inf.elte.hu">Webprogramozás szerver</a><br>
<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">JavaScript referencia</a><br>
<a href="http://jsfiddle.net/">JavaScript homokozó</a><br>
```
6. Valahány mozifilmről tároljuk a címét, megjelenési évét, hosszát és rendezőjét. Mivel sok film is lehet, ezért olyan felületet szeretnénk, ahol egy szűrőmezőbe írva csak azok a filmcímek jelennek meg, amelyek tartalmazzák a szűrőmezőbe írt szöveget. A kiválasztott filmcím fölé víve az egeret pedig jelenítsük meg az adott film összes részletét!
7. Készíts "kézi" amőbát! Adott egy táblázat üres cellákkal. Valamelyik cellájába kattintva írjunk felváltva "X"-et és "O"-t. Ha egy cella tartalma nem üres, akkor ne történjen semmi.
8. Készíts memóriajátékot! A páros számú cellában rejts el számokat, és találd meg úgy a párokat, hogy egyszerre csak kettőt fordíthatsz fel! Számold meg, hogy hány lépésben sikerül kitalálni a feladatot! Legyen lehetőség több játékos megadására, ebben az esetben jelezd, hogy éppen ki van soron!
9. Készíts akasztófa játékot! A gép egy előre tárolt listából válasszon egy szót, majd rajzoljon ki annyi vonalat, ahány betűből áll. Tegyünk ki egy gombsort is, ahol az egyes betűkre tippelhetünk. Ha eltaláltuk, akkor az eltalált betűket jelenítsük meg a megfelelő helyen. Ha nem találtuk el, akkor számoljuk a hibás találatokat. Ha ez elér egy előre megadott értéket, akkor veszítettünk. Ha a szó összes betűjét ez előtt felfedtük, akkor nyertünk! A számláló mellett SVG elemekkel akasztófát is rajzolhatunk!
```html
    <svg width="200px" height="200px">
        <line x1="0" y1="99%" x2="100%" y2="99%" stroke="black" />
        <line x1="20%" y1="99%" x2="20%" y2="5%" stroke="black" />
        <line x1="20%" y1="5%" x2="60%" y2="5%" stroke="black" />
        <line x1="60%" y1="5%" x2="60%" y2="20%" stroke="black" />
        <circle cx="60%" cy="30%" r="10%" />
        <line x1="60%" y1="30%" x2="60%" y2="70%" stroke="black" />
        <line x1="40%" y1="50%" x2="80%" y2="50%" stroke="black" />
        <line x1="60%" y1="70%" x2="50%" y2="90%" stroke="black" />
        <line x1="60%" y1="70%" x2="70%" y2="90%" stroke="black" />
    </svg>
```
10. Adott egy range beviteli mező.
    - a. A csúszkát húzogatva jelenítsük meg a slider értékét a mező mellett! Gondold át a használandó eseményt! Az értéket a csúszka mögött valamilyen elembe írd ki! Próbáld meg ezt az elemet dinamikusan létrehozni és beszúrni az insertAdjacentElement() DOM metódussal!
    - b. Működjön a fenti megoldás minden olyan csúszka értékre, aminek display-value stílusosztály be van állítva!
    - c. A csúszkát húzogatva az értéket mindig a csúszka felett jelenítsük meg!

11. Adott egy GYIK oldal. Ezen egy `faq` stílusosztályú elemen belül vannak a kérdések válaszok. A kérdések h2 elemben, a válaszok közvetlenül utána p elemekben vannak. Oldjuk meg, hogy egy kérdésre kattintva a válasz eltűnjön/megjelenjen!
```html
<div class="faq">
    <h2>Kérdés1</h2>
    <p>Hosszú válasz a kérdés1-re.</p>
    <h2>Kérdés2</h2>
    <p>Hosszú válasz a kérdés2-re.</p>
    <h2>Kérdés3</h2>
    <p>Hosszú válasz a kérdés3-re.</p>
    <h2>Kérdés4</h2>
    <p>Hosszú válasz a kérdés4-re.</p>
</div>
```
12. Készíts egy bankszámlaszámot elfogadó mezőt, amely 4-es csoportonként szóközt helyez el számok között!
13. Készíts screencast módot egy oldalon! A lenyomott billentyűk kódját jeleníts meg egy átlátszó sávban az oldal alsó részén. Kezeld külön a speciális karaktereket, azaz pl. `Ctrl + A`.
14. Készíts saját kontext menüt jobb egérgombra! Használd a `contextmenu` eseményt!