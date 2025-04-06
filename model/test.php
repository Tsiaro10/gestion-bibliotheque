<?php
require_once("reserver.php");

$reservation = new Reserver();

$reservation->setIdl(1);
$reservation->setIde(1);
$reservation->setDate_reserve(date("Y-m-d"));
$reservation->setHeure_reserve(date("H:i:s"));
$reservation->setRetour(0);
$reservation->create();

$liste_reservations = $reservation->readAll();
echo "Liste des réservations : <br>";
print_r($liste_reservations);
echo "<br><br>";

$id_reservation = 1;
$reservation_by_id = $reservation->readById($id_reservation);
echo "Réservation avec l'ID $id_reservation : <br>";
print_r($reservation_by_id);
echo "<br><br>";

$reservation_to_update = $reservation->readById($id_reservation);
if ($reservation_to_update) {
    $reservation_to_update['date_reserve'] = date("Y-m-d");
    $reservation_to_update['heure_reserve'] = date("H:i:s");
    $reservation_to_update['retour'] = 1;
    $reservation->setIdl($reservation_to_update['idl']);
    $reservation->setIde($reservation_to_update['ide']);
    $reservation->setDate_reserve($reservation_to_update['date_reserve']);
    $reservation->setHeure_reserve($reservation_to_update['heure_reserve']);
    $reservation->setRetour($reservation_to_update['retour']);
    $reservation->update();
    echo "Réservation mise à jour avec succès.<br>";
} else {
    echo "Réservation introuvable.<br>";
}

$id_reservation_a_supprimer = 2;
$reservation->delete($id_reservation_a_supprimer);
echo "Réservation avec l'ID $id_reservation_a_supprimer supprimée avec succès.<br>";
?>
