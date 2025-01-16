<?php

namespace App\Services;

use App\Models\Feature;

class FeatureService
{
    /**
     * @throws \Exception
     */
    public function create(array $data): ?Feature
    {
        try {
            return Feature::query()->create($data);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}