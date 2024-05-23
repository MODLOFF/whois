<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WHOIS Sorgulama</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>WHOIS Sorgulama</h1>
    <p>Whois, kaydedilmiş bir domainin ya da IP adresinin kime ait olduğunu gösteren kayıtlardır. Domain kime ait hemen öğren!</p>

    <form id="whois-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" id="domain" name="domain" placeholder="Bir Domain Adresi Girin" required>
        <input type="submit" value="Sorgula">
    </form>

    <div id="result-container" class="result">
        <?php
        if(isset($_POST['domain'])) {
            require_once 'whois.php';
            $domain = $_POST['domain'];
            $result = whois_lookup($domain);
            echo '<div id="whois-result">' . nl2br($result) . '</div>';
        }
        ?>
    </div>
</div>
</body>
</html>
