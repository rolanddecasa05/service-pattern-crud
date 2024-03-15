<?php
namespace App\Commude\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait DBtransactionHandler {

    public static function execute($query)
    {
        DB::beginTransaction();
        try {
            $query;
            DB::commit();
            return $query;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}