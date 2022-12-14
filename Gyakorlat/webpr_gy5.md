# 5. Gyakorlat - Progresszív fejlesztés, stílusok, összetettebb alkalmmazások

## Progresszív fejlesztés
1. Adott egy táblázat az oldalon. JavaScript segítségével tedd lehetővé, hogy az oszlopok fejlécére kattintva a táblázat az adott oszlop szerint rendezve jelenjen meg!
    ```html
    <table>
        <tr>
            <th>Gyümölcs</th>
            <th>Megye</th>
        </tr>
        <tr>
            <td>Alma</td>
            <td>Békés</td>
        </tr>
        <tr>
            <td>Szilva</td>
            <td>Hajdú-Dorog</td>
        </tr>
        <tr>
            <td>Gesztenye</td>
            <td>Vas</td>
        </tr>
    </table>
    ```
2. Adott egy űrlap, ahol több időpontot is fel lehet venni. Minden időpontnál meg kell adni a dátumot és egy tól-ig intervallumot. Ellenőrizzük le JavaScript segítségével, hogy a tól mindig kisebb legyen az ig-nél. Ha rossz, akkor mind a két mező legyen piros keretes. Legyen lehetőség új időpont-blokkot felvenni.
    ```html
    <form action="">
        <div class="idopont">
            <input type="date" name="datum[]">
            <input type="time" name="tol[]">
            <input type="time" name="ig[]">
        </div>
        <div class="idopont">
            <input type="date" name="datum[]">
            <input type="time" name="tol[]">
            <input type="time" name="ig[]">
        </div>
    </form>
    ```
3. Adott egy legördülő menü, benne az opciók csoportosítva. Alakítsd át ezt úgy, hogy két legördülő legyen: az elsőben a csoportok neve, majd abból választva a másodikban a csoporton belüli opciók jelenjenek meg!
    ```html
    <label>Please choose one or more pets:
    <select name="pets">
        <optgroup label="4-legged pets">
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="hamster">Hamster</option>
        </optgroup>
        <optgroup label="Flying pets">
        <option value="parrot">Parrot</option>
        <option value="macaw">Macaw</option>
        <option value="albatross">Albatross</option>
        </optgroup>
    </select>
    </label>
    ```
4. Adott képek listája. Alakítsd át ezt úgy, hogy filmszalag-szerűen egymás mellé rendezed a képeket, de csak egynek hagysz helyet, hogy látszódjon. A jobbra-balra billentyűkkel csúsztasd arrébb a filmszalagot úgy, hogy a következő kép látszódjék!
5. Adott egy űrlap, ahol receptet lehet megadni. Ezen belül van egy többsoros szöveges beviteli mező, amelyben a hozzávalókat soroljuk soronként. Fejleszd fel ezt az oldalt úgy, hogy minden sorhoz két input mezőt rendelsz: elsőben a mennyiség, másodikban a hozzávaló. Legyen lehetőség sorokat törölni, és új sort hozzáadni. Az űrlap elküldésekor az eredeti formátumban kell az adatokat küldeni!
    ```html
    <textarea>1csipet Cordon
    3csipet Bleu
    1tasak szárított burgonyapüré</textarea>
    ```
6. Készíts egy fotóalbumot, ami úgy néz ki, mintha az asztalra kiszórtak volna sok képet. A képek egy felsorolásban legyenek. A képeknek ne csak a pozíciója, hanem elforgatása is változzon. Lehessen a képeket megtekinteni rájuk kattintva, vagy a jobbra-balra billentyűvel navigálva.
    
    A HTML kód:
    ```html
    <ul>
        <li><img src="http://farm3.staticflickr.com/2834/10166297203_76388bb991.jpg"></li>
        <li><img src="http://farm6.staticflickr.com/5461/10151107393_8693d53a24.jpg"></li>
        <li><img src="http://farm6.staticflickr.com/5542/10161316446_57e1677444.jpg"></li>
        <li><img src="http://farm4.staticflickr.com/3729/10163374813_b196c897e9.jpg"></li>
        <li><img src="http://farm8.staticflickr.com/7459/10166043086_fb989fb714.jpg"></li>
    </ul>
    ```
    Stílusok:
    ```css
    <style type="text/css">
    ul.kepkeret {
        width: 100%;
        height: 500px;
        list-style-type: none;
        margin: 0;
        padding: 0;
        position: relative;
        perspective: 500px;
        -webkit-perspective: 500px;
    }
    ul.kepkeret > li {
        position: absolute;
        transition: all 1s;
        -webkit-transition: all 1s;
    }
    ul.kepkeret > li > img {
        border: 10px solid white;
        width: 300px;
    }
    .pelda1 {
        transform: translate3d(100px, 50px, 0px) rotate(30deg) rotateX(0deg);
        -webkit-transform: translate3d(100px, 50px, 0px) rotate(30deg) rotateX(0deg);
    }
    /*ul.kepkeret > li:hover {*/
    .active {
        transform: translate3d(250px, 100px, 200px) rotate(0deg) rotateX(0deg);
        -webkit-transform: translate3d(250px, 100px, 200px) rotate(0deg) rotateX(0deg);
        z-index: 1000;
    }
    </style>
    ```
## Stílusok
7. Adott egy paragrafus.
    - a. Egy gombra kattintva adjunk neki narancssárga keretet, barna hátteret és a szöveg színe legyen fehér. A feladatot a style attribútummal oldd meg.
    - b. Az előző feladatbeli stílusokat rakjuk egy stílusosztályba, és ezzel a stílusosztállyal ruházzuk fel a paragrafust.
    - c. Egy másik gombbal tüntessük el a bekezdést.
    - d. Fejlesszük tovább ezt úgy, hogy a gomb a bekezdés láthatóságát váltogassa (tüntesse el, majd jelenítse meg, majd megint eltüntet, megjelenít, stb.)
    - e. Egy újabb gomb hatására halványítva tüntessük el a bekezdést. Az animációt JavaScripttel oldjuk meg!
    - f. Az előző feladatbeli elhalványítást CSS3 átmenet segítségével érjük el!
8. Adott három fejlécsor és mindegyik alatt egy-egy bekezdés. A bekezdések eleinte el nem látszanak.
    - a. Az egyes fejlécekre kattintva jelenjen meg az alatta lévő bekezdés.
    - b. Újabb kattintásra tűnjön el.
    - c. Fejleszd tovább úgy, hogy a kattintáskor lenyíljon/összecsukódjon a paragrafus.
9. Készíts egy órát!

    - a. Jelenítsd meg az aktuális időt a felületen!
    - b. Frissítsd az időt folyamatosan!
    - c. Jelenítsd meg az időt egy óra formájában. A megfelelő HTML kód:
    ```html
     <ul id="clock"> 
       <li id="sec"></li>
       <li id="hour"></li>
       <li id="min"></li>
     </ul>
     ```
     
    A hozzá tartozó stílusok:
    ```css
     <style type="text/css">
       * {
         margin: 0;
         padding: 0;
       }
       
       #clock {
         position: relative;
         width: 180px;
         height: 180px;
         margin: 20px auto 0 auto;
         background: url(images/clockface.png);
         list-style: none;
       }
       
       #sec, #min, #hour {
         position: absolute;
         width: 9px;
         height: 180px;
         top: 0px;
         left: 85px;
       }
       
       #sec {
         background: url(images/sechand.png);
         z-index: 3;
       }
          
       #min {
         background: url(images/minhand.png);
         z-index: 2;
       }
          
       #hour {
         background: url(images/hourhand.png);
         z-index: 1;
       }
     </style>
     ```
    A képek a webprogramozas szerverről tölthetők le.
10. Készíts egy visszaszámlálót! Egy "Start" feliratú gombbal lehet elindítani.
    - a. Az idő leteltével fessük pirosra a dokumentum hátterét.
    - b. A hátralévő időt jelenítsük meg a felületen szöveges formában.
    - c. A hátralévő idő egy folyamatosan rövidülő piros csíkként jelenjen meg.
11. Rakj fel egy téglalapot az oldalra abszolútan pozicionálva. Tegyél fel négy gombot. A megfelelő gombra kattintva mozgasd le-fel, jobbra-balra a téglalapot a képernyőn.
12. Adott három kis kép egymás alatt. A megfelelőre kattintva nagyítsd fel animálva és pozicionáld a kis képek mellé. Egy újabb képre kattintva a felnagyított tűnjön el, és az újabb jelenjen meg.
13. Készíts egy olyan képnézegetőt, amely a képeket egy háromszögalapú hasáb oldalain jeleníti meg. A balra-jobbra gomb megnyomásakor a hasáb forduljon el az y tengely mentén.

    A HTML szerkezet:
    ```html
    <div id="tarolo">
        <div id="kocka">
            <div class="oldal1">
                <img src="http://farm3.staticflickr.com/2834/10166297203_76388bb991.jpg">
            </div>
            <div class="oldal2">
                <img src="http://farm6.staticflickr.com/5461/10151107393_8693d53a24.jpg">
            </div>
            <div class="oldal3">
                <img src="http://farm6.staticflickr.com/5542/10161316446_57e1677444.jpg">
            </div>
        </div>
    </div>
    ```
    Stílusok:
    ```css
    <style type="text/css">
    #tarolo 
    {
        /*border: 3px solid green;*/
        width: 320px;
        height: 220px;
        position: relative;
        perspective: 1000px;
        -webkit-perspective: 1000px;
    }
    #kocka 
    {
        position: absolute;
        width: 100%;
        height: 100%;
        /*border: 3px solid red;*/
        transform-style: preserve-3d;
        -webkit-transform-style: preserve-3d;
        transform: translateZ(-90px);
        -webkit-transform: translateZ(-90px);
        transition: transform 1s;
        -webkit-transition: transform 1s;
    }
    #kocka div 
    {
        border: 10px solid white;
        position: absolute;
        width: 300px;
        height: 200px;
        padding: 0; 
        backface-visibility: hidden;                        
        -webkit-backface-visibility: hidden;                        
    }
    #kocka img {
        width: 300px;
    }
    #kocka .oldal1
    {
        transform: rotateY(0deg) translateZ(110px);
        -webkit-transform: rotateY(0deg) translateZ(110px);
    }
    #kocka .oldal2
    {
        transform: rotateY(120deg) translateZ(110px);
        -webkit-transform: rotateY(120deg) translateZ(110px);
    }
    #kocka .oldal3
    {
        transform: rotateY(240deg) translateZ(110px);
        -webkit-transform: rotateY(240deg) translateZ(110px);
    }
    </style>
    ```
14. Jeleníts meg egy oldalsó menüt különböző módokon! Használd ki a CSS3 adta 2D-s és 3D-s lehetőségeket!

## Összetettebb alkalmazások
**Pixel-art** Készíts egy pixel-art készítését elősegítő alkalmazást. Legyen lehetőség egy pixel-artot rajzolni, amely során egy rács pontjait különböző színűre színezhetjük. Legyen egy színválasztó rész, ahol új szín választása mellett a már használt színek is fel vannak sorolva. Legyen törlési lehetőség a jobb gomb megnyomásával. Lehessen több pixel-art ábrát kezelni, azaz legyen egy lista, amelyben az ábrák előnézeti képei vannak, és amelyekre kattintva az adott ábra a szerkesztőben megjelenik. Ott szerkesztés után elmentve módosul a listában. A lista elemei automatikusan elmentésre kerülnek a böngésző lokális adattároló rétegében.
```html
<table class="preview">
    <tr>
        <td style="background-color: #ff0000"></td>
        <td style="background-color: #00ff00"></td>
        <td style="background-color: #0000ff"></td>
    </tr>
    </table>
    <hr>
    <table class="edit">
    <tr>
        <td style="background-color: #ff0000"></td>
        <td style="background-color: #00ff00"></td>
        <td style="background-color: #0000ff"></td>
    </tr>
</table>
```
```css
table.preview, table.edit {
   border-collapse: collapse;
}
table.preview td {
    border: none;
    width: 3px;
    height: 3px;
    padding: 0;
}
table.edit td {
    border: 1px solid lightgray;
    width: 20px;
    height: 20px;
    padding: 0;
}
```

1. Rács generálása
    - a. Legyen egy űrlap, amelyen a rács (táblázat) szélességét és magasságát lehet megadni!
    - b. Egy gombra kattintva jelenjen meg az adott dimenziókkal rendelkező rács! Ha szeretnéd, akkor használd a fent megadott edit stílusosztályt!
    - c. *Állítsunk be minimum és maximum értékeket a beviteli mezőknek. Ha rossz érték van beleírva, akkor azt egyrészt jelezzük vizuálisan, másrészt ne engedjünk ekkor a gombra nyomni! Technikai segítség:
    ```css
    form:invalid button {
        pointer-events:none;
        opacity: 0.5;
    }
    ```
    - d. **Egy már meglévő rács esetén készítsünk nem destruktív átméretezést, azaz az eddigi állapotot őrizze meg, és csak a szükséges új elemeket adja hozzá vagy vegye el!
2. Rajzolás
    - a. Egy rácselemre kattintva az adott rácspontot színezd pirosra!
    - b. Tárold el az állapottérben az adott rács állapotát (mátrix)! Minden kattintásnál tárold, hogy az adott helyen milyen színű pont van! Döntsd el, hogy a rács kirajzolását imperatívan vagy dekalartívan kezeled-e!
    - c. *Jobb gombbal kattintva töröld az adott cella színét (az állapottérben is)!
    - d. **Legyen lehetőség vonalakat húzni! Az egérgomb nyomva tartása mellett mozgatva az egeret az áthaladás során érintett cellák a megfelelő színűre színeződnek!
3. Színek
    - a. Tárold el az állapottérben az aktuális színt! A kirajzoláshoz ezt a színt használd!
    - b. Egy külön kis sávban jelezd az aktuális színt!
    - c. Legyen egy külön rész az oldalon, ahol van egy színválasztó mező: `<input type="color">`! Ha ennek értéke megváltozik, akkor azt tárold el az állapottérben!
    - d. *A színválasztó alatt kis négyzetekben sorold fel az eddigi színeket! Ezek valamelyikére kattintva az legyen az aktuális szín!
4. Lista
    - a. Tárolj sok pixel-artot a memóriában (az állapottérben). Válassz ehhez egy megfelelő adatszerkezetet! Például a következőt:
    ```js
    const pixelArts = [
        {
            id: 1,
            pixels: [
                ['#123456', '#234567', '#345678']
            ]
        },
        {
            id: 2,
            pixels: [
                ['#123456'],
                ['#234567'],
                ['#345678']
            ]
        },
    ]
    ```
    - b. Rajzold ki egy listában az eddigi pixel-artokat. Ehhez ugyanolyan táblázatot generálhatsz, mint a szerkesztéshez, csak egy cella nagysága legyen 1-2px. Használhatod ehhez a fent megadott preview stílusosztályt!
    - c. Egy elemre kattintva, betöltődik szerkesztésre: méretei és a rács. Az állapottérben el kell tárolnod, hogy éppen melyik elem az aktív!
    - d. Szerkesztés után egy "Mentés" gombra kattintva a listában cseréljük ki az eddigi pixels mátrixot az újra!
    - e. A lista felett legyen egy "Új pixel-art" gomb. Erre kattintva a lista bővül egy elemmel, és automatikusan az kerül kiválasztásra és szerkesztésre!
5. Tárolás
    - a. *Minden mentésnél a böngésző lokális tárolórétegébe is mentsük el az egész listát!
    - b. *Az oldal betöltésekor nézzük meg, hogy van-e ilyen lista a böngésző lokális tárolójában, és onnan töltsük be!