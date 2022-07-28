<!-- Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche.
L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
BONUS:
Il pagamento avviene con la carta prepagata che deve contenere un saldo sufficiente all'acquisto. -->

<?php
require_once __DIR__ . '/Utente.php';
require_once __DIR__ . '/UtenteAnonimo.php';
require_once __DIR__ . '/UtenteRegistrato.php';
require_once __DIR__ . '/CiboProdotto.php';
require_once __DIR__ . '/Croccantini.php';
require_once __DIR__ . '/Scatolette.php';
require_once __DIR__ . '/GiocattoloProdotto.php';
require_once __DIR__ . '/Pallina.php';

$johndoe = new UtenteRegistrato('John','Doe','johndoe@email.com');
$pallinaSpugna = new Pallina('Gioco cane pallina spugna',4);
var_dump($pallinaSpugna);

?>