<?php

namespace App\Services;

use App\Wallet;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    public function processPayment(int $customerId, float $amount)
    {
        return DB::transaction(function () use ($customerId, $amount) {
            $wallet = Wallet::where('customer_id', $customerId)->lockForUpdate()->first();

            if (!$wallet) {
                throw new \InvalidArgumentException('Wallet not found');
            }

            if ($wallet->balance < $amount) {
                throw new \InvalidArgumentException('Insufficient balance');
            }

            try {
                $wallet->update(['balance' => $wallet->balance - $amount]);
                return true;
            } catch (QueryException $e) {
                throw new \RuntimeException('Failed to process payment', 0, $e);
            }
        });
    }

    public function processTopUp(int $customerId, float $amount)
    {
        return DB::transaction(function () use ($customerId, $amount) {
            $wallet = Wallet::where('customer_id', $customerId)->lockForUpdate()->first();

            if (!$wallet) {
                throw new \InvalidArgumentException('Wallet not found');
            }

            try {
                $wallet->update(['balance' => $wallet->balance + $amount]);
                return true;
            } catch (QueryException $e) {
                throw new \RuntimeException('Failed to top up wallet', 0, $e);
            }
        });
    }
}
