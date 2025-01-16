<?php

namespace App\Services;

use App\Models\Plan;

class PlanService
{
    /**
     * @throws \Exception
     */
    public function create(array $data): ?Plan
    {
        try {
            return Plan::query()->create($data);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function getById(int $id): ?Plan
    {
        return Plan::query()->with('features')->find($id);
    }
}