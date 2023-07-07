<?php

namespace Core;

/**
 * Classe pour définir les codes de réponse HTTP communs.
 */
class Response {

    /**
     * @const int NOT_FOUND Le code de statut HTTP pour indiquer qu'une ressource n'a pas été trouvée.
     * @const int FORBIDDEN Le code de statut HTTP pour indiquer que l'accès à une ressource est interdit.
     */
    const NOT_FOUND = 404;
    const FORBIDDEN = 403;
}