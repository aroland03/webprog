# 2. Gyakorlat - DOM

## Feladatok

1. Egy gomb megnyomására írd ki a dokumentum valamelyik általad választott részére, hogy "Helló világ!"!
2. Kérj be egy számot, és annyiszor írd ki egymás alá egyre növekvő betűméretekkel a "Hello világ!" szöveget! (szöveges beviteli mező, gomb)
3. Kérj be egy N számot, és készíts azzal egy NxN-es szorzótáblát!
4. Írj egy kör kerületét kiszámoló programot!
5. Egy szöveges beviteli mezőben legyen lehetőség megadni egy interneten elérhető kép URL-jét. Egy mellette lévő gombra kattintva jelenítsd meg a képet a dokumentumban!
6. Másolás
    - a. Adott két szöveges beviteli mező és köztük egy gomb. A gomb lenyomására másold át az egyik szöveges beviteli mező tartalmát a másikba!
    - b. Általánosítsd a feladatot N db szöveges beviteli mezőre! Ha kell, akkor definiáld a megfelelő adatszerkezetet hozzá!
7. Egy űrlapon csak akkor kérd be a leánykori nevet, ha nő az illető! Használd a rádiógombok click eseményét! A megjelenítéshez, eltűntetéshez használd az elemek hidden tulajdonságát!
    ```html
    <input type="radio" name="nem" value="ferfi" checked> férfi
    <input type="radio" name="nem" value="no"> nő
    Leánykori név: <input id="leanykori_nev">
    ```
8. Oldalbetöltéskor listázd ki az oldal összes hiperhivatkozásának a címét!
    ```html
    <a href="http://www.elte.hu">ELTE</a>
    <a href="http://webprogramozas.inf.elte.hu">Webprogramozás az ELTÉn</a>
    <a href="http://www.inf.elte.hu">ELTE Informatikai Kara</a>
    <ul id="hivatkozasok"></ul>
    ```
9. Oldalbetöltéskor készíts tartalomjegyzéket az oldalon található `h1`, `h2`, `h3`, stb. elemek alapján. A `document.querySelectorAll()` metódus ún. dokumentumsorrendben adja vissza az elemeket, az adott szülőelemtől mélységi bejárást használva.
    - a. Működjön csak h1 elemekre!
    - b. Működjön csak h1 és h2 elemekre!
    - c. Működjön csak h1,h2, h3 elemekre!
    - d. Működjön az összes címsorelemre!
10. Készíts egy számlálót komponenst!
    - a. A számláló egy csak olvasható szöveges beviteli mezőből és két gombból (plusz, mínusz) áll! A gombok meg nyomásával a szöveges beviteli mezőben lévő szám eggyel nő vagy csökken.
    - b. Definiálj a szkriptben egy minimum és egy maximum értéket! Ha a számláló eléri valamelyik értéket, akkor a megfelelő gomb ne legyen elérhető!
    - c. *Ha a gombot hosszan nyomjuk le, akkor a számláló automatikusan kezdje el az értéket változtatni.
11. Adott egy három oszlopból álló táblázat! A táblázat felett 3 szöveges beviteli mezővel és egy gombbal. A gombra kattintva a 3 beviteli mező értéke új sorként szúródjon be a táblázatba.
12. Készíts webes alkalmazást kamatos kamat számolására. A számoláshoz meg kell adni a kiindulási összeget, a kamat értékét, valamint azt, hány évvel későbbi összegre vagyunk kíváncsiak. Minden év végén adjuk hozzá a kamatot a tőkéhez, és a következő évben az képezi a kamatozás alapját. A feladat során jelenítsük meg azt is, hogy melyik évben hogyan változik az összeg.
    - a. Tervezd meg a felületet és készítsd el a statikus prototípusát a feladatnak, amely már tartalmazza a megfelelő elemeket!
    - b. Gondold át, milyen adatokat kell tárolni a feladat működtetéséhez! Hozd ezeket létre!
    - c. A felhasználó egy gomb megnyomásával indítja el a számolást. Egy eseménykezelő függvényben reagálj erre, és jelenítsd meg az összeg változását az évek során!
13. Gondoljon a gép egy számra! A mi feladatunk, hogy kitaláljuk. Legyen lehetőség tippelni a számra, a gép pedig annyit válaszoljon, hogy az általa gondolt szám kisebb-e vagy nagyobb az általunk tippeltnél. Véletlen szám generálásához használd a Math.random() függvényt, illetve kerekítéshez a Math.floor() függvényt!
    - a. Tervezd meg a felületet és készítsd el a statikus prototípusát a feladatnak, amely már tartalmazza a megfelelő elemeket!
    - b. Gondold át, milyen adatokat kell tárolni a feladat működtetéséhez! Hozd ezeket létre!
    - c. Végül egy eseménykezelő függvényben reagálj a felhasználó tippelésére, és írd ki, hogy a gondolt szám, nagyobb, kisebb vagy egyenlő vele.
    - d. Opcionálisan tüntesd fel a korábbi tippeléseket is, pl. egy listában!
    - e. Ha kitaláltuk a számot, akkor már ne legyen lehetőség újra tippelni! Ezt vagy a gomb letiltásával, vagy a tippelőelemek eltüntetésével tudod megtenni.
14. Adott egy könyvtári nyilvántartás. Egy könyvről a következő adatokat tároljuk:
    - szerző
    - cím
    - kiadás éve
    - kiadó
    - ISBN szám
    
    a. Felületen kérj be egy évszámot, és listázd ki az abban az évben megjelent könyvcímeket!

    b. Készíts egy legördülő mezőt, amelyben az egyes kiadók vannak felsorolva. Egy gombra kattintva táblázatos formában jelenítsd meg a kiválasztott kiadóhoz tartozó könyveket!