# Űrlapok, képek, táblázatok, BOM, alkalmazások

## Űrlapok
1. Készíts egy űrlapot, amelyen egy nevet, életkort és egy érdeklődési területet kérünk be. A nevet és az életkort szöveges beviteli mezővel adható meg, az érdeklődési terület legördülő listából választható. Ennek első eleme "Kérem, válasszon!" feliratú.
    - a. A feladat az, hogy JavaScript segítségével ellenőrizzük, hogy a következő szabályok teljesülnek-e: név és érdeklődési terület megadása kötelező, életkornak csak számot fogadunk el. Az ellenőrzést elküldéskor végezzük el, a hibákat az űrlap felett egy listában jelenítsük meg.
    - b. Tegyünk fel egy radiogomb-csoportot is az oldalra, és vizsgáljuk azt is, hogy ki lett-e választva ezek közül az egyik.
    ```html
    <form action="">
    <ul id="hibak"></ul>
    Nev: 
    <input type="text" id="nev"> <br>
    Kor: 
    <input type="text" id="kor"> <br>
    Erd:
    <select id="erd">
        <option value="">Kérem, válasszon...</option>
        <option value="film">Film</option>
        <option value="olvasas">Olvasás</option>
        <option value="sport">Sport</option>
    </select> <br>
    <input type="submit" id="Küldés">
    </form>
    ```
2. Tegyünk fel az oldalra két lista űrlapelemet (select). Ezek között legyen két gomb: az egyikre kattintva a bal oldali listában kiválasztott elem átkerül a jobb oldali listába, a másikra kattintva ugyanez történik jobbról balra.
    - a. A listákban csak egy elemet lehet egyszerre kiválasztani.
    - b. A listákban többszörös választás is lehetséges.
3.Egy űrlapra tegyünk fel három radio gombot 1, 2, 3 értékkel és felirattal. Mellette legyen egy gomb. Erre kattintva a kiválasztott radiogombnak megfelelő számosságú szöveges beviteli mezőt generáljunk az űrlapba.
4. Egy űrlapon kérjük be a kitöltő nevét, és radio gomb segítségével a nemét. Ha a "nő" lett kiválasztva, akkor kérjük be a leánykori nevét is. Ellenkező esetben ez meg se jelenjen.
5. Egy űrlapon szöveges beviteli mezők és legördülő listák vannak. Oldjuk meg, hogy ha bármelyik mezőben változás állna be, akkor legyen piros az űrlap kerete.

## Képek
6. Tegyünk fel egy képet az oldalra, mellé pedig egy szöveget (pl. "segítség" felirattal).
    - a. Ha a szöveg fölé visszük az egeret, akkor cseréljük le a képet valami másra.
    - b. Oldjuk meg ezt a problémát a kép előtöltésével!
7. Készíts egy képnézegetőt!
    - a. Az oldalon legyen egy kép és két gomb "Előző", "Következő" felirattal. A gombokra kattintva változzon meg a kép. A képek forrását egy tömbben tároljuk.
    - b. Töltsük előre a következő képet.
    - c. Oldd meg a képváltás stílusátmenettel. Legegyszerűbb halványulással megoldani az átmenetet.
    - d. Ha nincs JavaScript, akkor egyáltalán ne jelenjen meg a képnézegető.

## Táblázat
8. Egy négyzetrácsos térképen el van dugva egy kincs. Kattintgatással keresd meg, hol van! A megtalálás után, a gép újra rejtse el a kincset!
    - a) A tábla legyen 2x2-es méretű!
    - b) Egy szöveges mezőben lehessen megadni, mekkora legyen a tábla. Egy gombra kattintva a megfelelő méretű táblázat jelenik meg.
    - c) Készítsünk számlálót, mely méri hány kattintásból találtuk meg a kincset!

## BOM
9. Rakjunk fel az oldalra három szöveges beviteli mezőt, amelyekben az új ablak nyitásához szükséges paraméterek értékeit kérjük be. Az elsőbe az URL-t, a másodikban az ablak nevét, a harmadikban az ablaknyitási paramétereket adjuk meg. Egy gomb megnyomására a felvitt értékekkel hívjuk meg az ablaknyitási parancsot.
10. Adott néhány hivatkozás az oldalon. a) Ezekre kattintva a linkek által mutatott oldalak új ablakban nyíljanak meg! b) Pozícionáljuk középre az új ablakot! c) Oldjuk meg azt, hogy a fenti metódus minden olyan linkre működjön az oldalon, amelyiknek az "ujablak" stílusosztály be van állítva!
    ```html
    <a href="http://www.elte.hu">ELTE</a> <br>
    <a href="http://www.inf.elte.hu" class="ujablak">ELTE IK</a> <br>
    <a href="http://webprogramozas.inf.elte.hu">Webprogramozás szerver</a> <br>
    ```
11. Az oldalra tegyünk fel egy szöveges beviteli mezőt és egy gombot. A gombra kattintva nyíljon meg új ablak, amelyben megjelenik a mezőben megadott szöveg.
12. Adott egy legördülő lista, benne különböző oldalak neveivel. A lista elemei közül egyet választva töltődjön be az adott oldal!
13. Adott egy "Vissza" feliratú hivatkozás az oldalon. Felhasználói megerősítés után ("Biztos, hogy vissza akar menni az előző oldalra?"), töltődjön be az előző oldal.

## Alkalmazások
14. Készíts akasztófa játékot! A gép egy előre tárolt listából válasszon egy szót, majd rajzoljon ki annyi vonalat, ahány betűből áll. Tegyünk ki egy gombsort is, ahol az egyes betűkre tippelhetünk. Ha eltaláltuk, akkor az eltalált betűket jelenítsük meg a megfelelő helyen. Ha nem találtuk el, akkor számoljuk a hibás találatokat. Ha ez elér egy előre megadott értéket, akkor veszítettünk. Ha a szó összes betűjét ez előtt felfedtük, akkor nyertünk! A számláló mellett SVG elemekkel akasztófát is rajzolhatunk!

[Részletes leírás itt található](http://webprogramozas.inf.elte.hu/#!/subjects/webprog-pti/gyak/akasztofa/akasztofa)