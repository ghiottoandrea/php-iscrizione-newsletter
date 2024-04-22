<?php
/* 
# iscrizione ad una newsletter.



1. Controllare che la mail passata in GET sia ben formata e contenga un punto e una chiocciola.


2. Se è corretta stampare un messaggio di success in un alert di Bootstrap, altrimenti (sempre in un alert di Bootstrap) mostrare un messaggio di errore.



**Milestone 1**:
scriviamo tutto (logica e layout) in un unico file *index.php*

**Milestone 2:**
verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

Aggiungere anche un po’ di stile alla pagina tramite Bootstrap.

Cosa controlla isset? 
qualsiasi valore diverso da null.

*/
$email_address = $_GET['email'];
if (isset($_GET['email'])) {

    $alert = checkEmailAddress($email_address);
}

function checkEmailAddress(string $email): array
{

    if (str_contains($email, '@') and str_contains($email, '.')) {

        $alert = [
            'color' => 'success',
            'message' => 'Thanks for joining our newsletter!'
        ];
    } else {
        $alert = [
            'color' => 'danger',
            'message' => 'Email Address format incorrect!'
        ];
    }

    return $alert;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form>
            <div class="input-group mb-3">
                <input name="email" id="email" type="text" class="form-control" placeholder="Your email address" aria-label="Your email address" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Join</button>
            </div>
        </form>
    </div>


    <?php if (isset($alert) || $alert !== null) : ?>
        <div class="container my-3">
            <div class="alert alert-<?= $alert['color']; ?>" role="alert">
                <strong>Newsletter: </strong> <?= $alert['message']; ?>
            </div>
        </div>
    <?php endif; ?>

</body>

</html>