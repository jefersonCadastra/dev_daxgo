<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class ProductsImport implements OnEachRow
{
    /**
     * @param \Maatwebsite\Excel\Row $row
     *
     * @return void
     */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        try {
            DB::beginTransaction();

            $product = Product::firstOrCreate([
                'sku'   => $row[0],
                'name'  => $row[1],
                'price' => $row[2],
            ]);

            $product->goals()->create([
                'average_price' => $row[3],
                'percentage_goal' => $row[4],
                'price_goal' => $row[5],
                'price_u'   => $row[6],
                'month'     => $row[7],
                'year'      => $row[8]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();
    }
}
