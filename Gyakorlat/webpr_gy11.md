# 11. Gyakorlat

## Feladatok

1. Készíts olyan oldalt, ahol a felhasználónak lehetősége van a háttérszínt megadni, megváltoztatni, és ezt a beállítás minden oldalon érvényesüljön. Tárold a háttérszínt munkamenetben!
2. Az előző feladatsorban szereplő webáruházazas alkalmazást (minishop) egészítsd ki az alábbi funkciókkal:
    - a. A termékválasztó oldalon ne kelljen a nevet és címet megadni. E helyett a kiválasztott termékek kerüljenek bele egy kosárba, amelynek állapota mindig megjelenik az oldalon egy lista formájában.
    - b. A termékek oldalról egy hivatkozás segítségével menjünk arra az oldalra, ahol a megrendelést véglegesíthetjük. Itt listázzuk ki a kosár tartalmát, itt kérjük be a nevet és a címet, majd az adatokat elküldve sikeres ellenőrzés után mentsük el fájlba a rendelést.
    - c. Az előző oldalt csak úgy érjük el, hogy a felhasználó be van jelentkezve. Ha nincs, akkor irányítsuk át a bejelentkezési oldalra. Ha nincs még regisztrálva, akkor egy külön oldalon legyen lehetősége a regisztrálásra. A belépési adatokat fájlban tároljuk.
3. Az előző feladatsorban szereplő névjegyzékkezelő alkalmazást egészítsük ki hitelesítési funkciókkal!
    - a. Legyen lehetőség az alkalmazásba regisztrálni! Ez azt jelenti, hogy egy űrlapon keresztül felvesszük a bejelentkező felhasználónevét és jelszavát.
    - b. Legyen egy bejelentkező oldal, ahol a felhasználónevet és jelszót kell megadni, és sikeres azonosítás után a listaoldalra kerülünk.
    - c. A listaoldal legyen védett, azaz bejelentkezés nélkül irányítson át a bejelentkező oldalra!
    - d. Ha be vagyunk jelentkezve, akkor jelenjen meg a listaoldal. Ezen írjuk ki a felhasználó nevét, és legyen egy kijelentkezés gomb/link is.
    - e. A kijelentkezésre kattintva az alkalmazás kijelentkeztet, és átirányít a bejelentkezés oldalra!
    - f. Minden egyéb oldalunkat védjük le, hogy csak bejelentkezett felhasználó érhesse el!
    - g. Új névjegy felvételekor tároljuk el a névjegynél a bejelentkezett felhasználó azonosítóját is!
    - h. A lista oldalon csak azokat a névjegyeket listázzuk ki, amelyek a bejelentkezett felhasználóhoz tartoznak!
    - i. A módosít és töröl oldalon csak azokat a névjegyeket engedjük módosítani/törölni, amelyek a bejelentkezett felhasználóhoz tartoznak!