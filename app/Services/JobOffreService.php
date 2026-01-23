<?php
namespace App\Services;
class JobOffreService {
    public function validateJobOffre($title, $description) {
        if (empty($title) || empty($description)) {
            return false;
        }
        return true;
    }
}