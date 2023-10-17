# Sprint4

S'implementarà una aplicació web per a la gestió d'una lliga de futbol, 
per la qual cosa entitats esportives com escoles o clubs podran gestionar 
de manera senzilla tots els seus equips i partits. 

En el nivell 1 dissenyarem i programarem totes les funcionalitats de l'aplicació. 
Al nivell 2 afegirem la capa d'autenticació d'usuaris/àries i privilegis segons els seus rols. 
Per últim, al nivell 3 podrem aplicar un template de Tailwind i 
crearem la vista per defecte en l'error 404 de la nostra aplicació.

Implementar el patró de disseny de programari MVC (Model-Vista-Controlador).
Crear els models i migracions que necessitarà la nostra aplicació.
Utilitzar Eloquent l'ORM de Laravel per interactuar amb la base de dades.
Aplicar mecanismes bàsics d'autenticació i autorització d'usuaris/es en Laravel.
Definir rols i permisos per als usuaris/àries de l'aplicació.
Gestió d'errors.
Aplicar una template de Tailwind en un projecte Laravel.

Nivell 1

Dissenya el model complet de la base de dades del teu projecte (MER). 
És important tenir clar quines són les entitats de les quals emmagatzemarem informació, 
així com dels seus atributs i relacions. Pots usar l'eina de la teva preferència. 
(MySQL Workbench, Diagrams.net, Creately...). 
Crea un nou projecte amb Laravel 8. Soluciona els errors que puguin aparèixer.
Definir les rutes que tindrà el nostre projecte web. 
El domini ha de tenir el CRUD complet per gestionar equips i partits.
Defineix les migracions i els models de dades d'equips i partits.
Crea els controladors i els mètodes que consideris necessaris per gestionar equips i partits.
Estableix les vistes utilitzant Blade i Tailwind.css (es tindrà en compte el maquetat). 
Associar-les amb les rutes o els controladors corresponents.
Crea els formularis necessaris per poder fer els CRUDs d'equips i partits. 
Hauràs de validar que la informació introduïda per l'usuari/ària sigui correcta tant a la vista com al controlador.
Has de fer servir un repositori GitHub seguint la seqüència gitflow i utilitzant pull-request.

Nivell 2

Implementa el sistema d'autenticació amb la paqueteria de Breeze i 
habilita l'enviament de correu electrònic per recuperar contrasenya i de registre d'usuari/ària.

 Important

Les rutes que breeze fa servir per al login/registre es troben al fitxer routes/auth.php i 
quant a les rutes que no requereixen autenticació a routes/web.php. 
Ves amb compte per això, ja que podria sobreescriure aquestes rutes i podries perdre part de la teva feina. 
El millor és realitzar un backup preferentment a GitHub previ a la instal·lació del paquet o 
instal·lar-lo des del principi en el teu projecte.


Crea un sistema que adapti la vista de l'error 404 a nivell de projecte. 
Pots utilitzar la funció Resposta i la redirecció de Laravel.

Nivell 3

Ara tractarem de donar una mica més de vida a la nostra aplicació afegint algun efecte dinàmic. 
Per això, necessitarem instal·lar la llibreria LiveWire.
Pensa en algun ús pràctic que podries donar a aquesta llibreria dins la teva aplicació i llavors, aplica-ho.
Posa la funcionalitat que hagis creat als comentaris de l’entrega.
