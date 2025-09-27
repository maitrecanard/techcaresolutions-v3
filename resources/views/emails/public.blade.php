<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Votre message sur le site techcaresolutions.fr</h2>
    <p>Cher {{ $data['name'] }}</p>
    <p>Merci d'avoir pris le temps de nous contacter via notre site.<br> Nous avons bien reçu votre message et nous vous en remercions.</p>
    <p>Nous revenons vers vous dans les plus brefs délais et restons à votre disposition pour toute question supplémentaire.</p>
    <p>Cordialement</p>
    <p>Mathieu Siaudeau gérant de TechCare Solutions</p>

    <ul style="margin-top:20px">
    <p>Contenu de votre message :</p>
        <li>Nom : {{ $data['name'] }}</li>
        <li>email : {{ $data['email'] }}</li>
        <li>email : {{ $data['message'] }}</li>
    </ul>
    <p>TechCare Solutions développement logiciel & maintenance informatique, société domicilié à Valdivienne Poitou-Charente<br>SIREN : 922818547</p>
    <a href="https://mathieusiaudeau.fr">techcaresolutions.fr</a>
</body>
</html>