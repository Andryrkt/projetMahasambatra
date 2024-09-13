<?php
include_once '../../Model/Service/ajoutServiceModel.php';
$services = afficherService($ajoutService);

if (!empty($services)) {
    echo "<optgroup label=\"" . htmlspecialchars($services[0]) . "\">";

    // Le premier service dans l'optgroup
    echo "<option value=\"" . htmlspecialchars($services[0]) . "\">" . htmlspecialchars($services[0]) . "</option>";

    // Les autres services dans les options
    for ($i = 1; $i < count($services); $i++) {
        echo "<option value=\"" . htmlspecialchars($services[$i]) . "\">" . htmlspecialchars($services[$i]) . "</option>";
    }
    echo "</optgroup>";
}