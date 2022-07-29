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
require_once __DIR__ . '/CartaPrepagata.php';
require_once __DIR__ . '/NormeSanitarie.php';

// array degli utenti nello store
$myUsers = [];

// dati utente anonimo
$johndoe = new UtenteAnonimo('johndoe@email.com');
$myUsers [] = $johndoe;

// dati utente registrato
$frankwhite = new UtenteRegistrato('Frank','White','frankwhite@email.com');
$frankwhite->gender = 'male';
$frankwhite->age = '25';
$myUsers [] = $frankwhite;


// dati croccantini
$royalcanin = new Croccantini('Royal Canin',5);
$royalcanin->productType = 'cibo secco';
$royalcanin->productConsumer = 'gatti';

// dati Scatolette
$sheeba= new Scatolette('Sheeba',7);
$sheeba->productType = 'cibo umido';
$sheeba->productConsumer = 'gatti';

// dati giocattolo
$pallinaSpugna = new Pallina('Gioco cane pallina spugna',4);
$pallinaSpugna->productType = 'gioco morbido';
$pallinaSpugna->productConsumer = 'cani';

// dati carrello
$johndoe->addProduct($royalcanin);
$frankwhite->addProduct($pallinaSpugna);
$frankwhite->addProduct($sheeba);

// dati carta prepagata
$cartaPrepagata = new CartaPrepagata;

// dati saldo carta prepagata
$cartaPrepagata->saldo = 6;

$johndoe->totalPrice();
$johndoe->selectedProductsList();
$frankwhite->totalPrice();
$frankwhite->selectedProductsList();


/* var_dump($myUsers);
var_dump($johndoe);
var_dump($johndoe->totalPrice());
var_dump($frankwhite);
var_dump($frankwhite->totalPrice());
var_dump($frankwhite->selectedProductsList()); */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarcadisoldiPlanet</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="utente">
            <?php foreach($myUsers as $user) { ?>
                <div class="singolo">
                    <!-- dati di ciascun utente -->
                    <h2>Utente</h2>
                    <div><?php echo $user->getInfo(); ?></div>
                    <h3>Lista prodotti in carrello</h3>
                    <div><?php echo $user->selectedProductsList(); ?></div>
                    <!-- prezzo totale dei prodotti in carrello -->
                    <h3>Prezzo totale</h3>
                    <div><?php echo $user->totalPrice() . ' '. 'euro'; ?></div>
                    <h3>Esito pagamento</h3>
                    <div><?php 
                        try {
                            if($user->effettuaPagamento($cartaPrepagata) === 'ok') {
                                echo "<h2>Grazie per aver completato il tuo acquisto</h2>";
                            }
                        } catch(Exception $e) {
                        // Salvare nel log l'errore (serve al programmatore per tenere
                        // traccia di ciò che succede nel sito)
                        error_log($e->getMessage());
                    
                        // Stampare in pagina un messaggio per l'utente
                        echo 'L\'operazione non è andata a buon fine, controlla il saldo sulla tua carta e riprova';
                        }
                    ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        
    </main>
</body>
</html>