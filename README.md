# Portfolio [wadseth.com](http://wadseth.com)
## **_Tobias Wadseth_**

## Bakgrund
Detta projekt gjors i samband med Webbutveckling 1 på Thorén Innovation School som slutprojekt.

## Planering

### Innehåll
Projektet skall innehålla tidigare verk som kan användas till exempel till ett CV för att visa tidigare verk.

### Layout
Sidan är tänkt att vara upplagd i ett gridformat med "thumbnails" som visar lite vad det är för projekt. Detta syns i [mockup] bilderna. Sidan skall också ha tre ordinare sidor: Hem, Om och Kontakt. Sedan läggs portfolio till för vardera projekt.

[mockup]: https://github.com/wadsethtobias/WU1_ToWa#Mockup

### Färgval
#### Hover - ROSA
##### HEX - #FF8CAA - ![alt-text](https://via.placeholder.com/15/FF8CAA/FF8CAA?Text=%20 "#FF8CAA")

#### Huvudtext - SVART
##### HEX - #111111 - ![alt-text](https://via.placeholder.com/15/111111/111111?Text=%20 "#111111")
För att urskilja huvudtext och brödtext används olika färger. För huvudtext används en svart färg.

#### Brödtext - GRÅ
##### HEX - #888888 - ![alt-text](https://via.placeholder.com/15/888888/888888?Text=%20 "#888888")
För att urskilja huvudtext och brödtext används olika färger. För brödtext används en grå mörkare grå färg.

#### Highlight - MÖRK
##### HEX - #343A40 - ![alt-text](https://via.placeholder.com/15/343A40/343A40?Text=%20 "#343A40")
För att undvika den blåa färgen när användaren markerar text på hemsidan används en mörkare grå färg för att matcha temat på portfoliot.

#### Ram i kontaktformulär - GRÅ
##### HEX - #EEEEEE - ![alt-text](https://via.placeholder.com/15/EEEEEE/EEEEEE?Text=%20 "#EEEEEE")
Ramen för kontaktformulärets inmatningsfält för att visa inmatningsfältets kanter så användaren vet vart hen skall klicka. Färgen grå är för att den skall synas på den vita bakgrunden men inte dra åt sig för mycket uppmärksamhet.

#### Error i kontaktformulär - RÖD
##### HEX - #F8D7DA - ![alt-text](https://via.placeholder.com/15/F8D7DA/F8D7DA?Text=%20 "#F8D7DA")
För ett misslyckat utskick av meddelande genom kontaktformuläret kommer ett meddelande visas på ovanför kontaktförmuläret med en röd bakgrund för att visa att meddelandet inte lyckades skicka iväg.

#### Success i kontaktformulär - GRÖN
##### HEX - #D4EDDA - ![alt-text](https://via.placeholder.com/15/D4EDDA/D4EDDA?Text=%20 "#D4EDDA")
För ett lyckat utskick av meddelande genom kontaktformuläret kommer ett meddelande visas på ovanför kontaktförmuläret med en grön bakgrund för att visa att meddelandet lyckades skicka iväg.

#### Error i validator för kontaktformulär - RÖD
##### HEX - #FF0000 - ![alt-text](https://via.placeholder.com/15/FF0000/FF0000?Text=%20 "#FF0000")
För ett felmeddelande från validatorn för kontaktformulär kommer ett meddelande visas där texten instruerar vad som saknas. Denna texten kommer att vara röd för att visa ett fel.

### Typsnitt
#### [ROBOTO](https://fonts.google.com/specimen/Roboto)

#### [MONTSERRAT](https://fonts.google.com/specimen/Montserrat)

#### Ikoner
##### [IONICONS](https://ionicons.com)

##### [FONT AWESOME](https://fontawesome.com)

### Mockup
#### [MOCKUP](https://github.com/wadsethtobias/WU1_ToWa/tree/master/mockup)

### Tillgänglighet
För att göra portfoliot tillgängligt oberoende av webbläsare och version av webbläsare används de olika "kit" som finns. Eftersom alla webbläsare inte stödjer alla olika css selektorer och har därav en typ av sin egna css selektorer kommer dessa olika för de största och mest använda webbläsare och deras olika versioner att användas. Media queries kommer också att användas för att kunna skala ner eller upp vissa element vid föränding av fönster storlek på webbläsaren.

## Dokumentation

### Vad var uppgiften?
Uppgiften var att skapa ett personligt portfolio eller en personlig blogg i form av en webbplats. Först skulle en mockup, en digital skiss, göras. Sedan skulle en planering skrivas där all information om vad som skall användas skrivs ner så som funktionalitet, typsnitt, färger och ikonbibliotek.

### Hur genomfördes uppgiften?
Webbplatsen genomfördes på det sätt att html filerna skapades först där en struktur skapades för alla de delarna som skulle användas. Till exempel hierarki av element samt klasser och id angavs. Sedan skapades scss filerna för att lättare kunna dela in css elementen i specifika grupper som sedan kompileras till en fill som länkas i html dokumenten. Efter detta lades javascript biblioteken som skulle användas till och konfigureras till preferens. Till sist gjordes kontaktformuläret som skrevs i PHP och kopplades till "tobias@wadseth.com" som alla meddelanden från kontaktformuläret skickas till. För att se till att responsiviteten fungerade som tänkt användes ”developer tools” i både chrome och firefox. Detta för att kunna ändra storlek på fönster på både x-axeln och y-axeln. För padding och margin på element användes oftast pixel som enhet som ändrades i värde med storlek på fönster i tanke. Detta valdes för att se hur det skulle fungera. På grund av detta tog det en stund innan bra mått hittades som passade till de så kallade ”breakpoints” som pekar på när media queries skall agera och ändra storleken.

### Hur blev resultatet?
Projektet följde mockupen till största mån och blev som tänkt. Filstrukturen samt kodstrukturen blev bra. Kontaktformuläret fungerar utmärkt utan några sedda buggar efter mycket jobb. Ett problem som uppstod var att Headern för mejlet glömdes till en början och tog någon dag innan det upptäcktes. Vilket gjorde att mejlet inte skickades korrekt eller överhuvudtaget. Formulärvalidatorn tar bort anglebrackets "<" & ">" för att utesluta XSS (Cross-Site Scripting). Vilket tillåter en säkrare webbplats både för ägaren samt besökarna.

### Vad kunde gjorts bättre?
Något som kunde gjorts bättre är tidsuppdelning. Det vill säga att inte ha stressat så mycket med att få koden skriven så snabbt som möjligt. Även responsiviteten för mindre skärmar kunde gjorts på ett bättre sätt för åtkomlighet av element och länkar.
