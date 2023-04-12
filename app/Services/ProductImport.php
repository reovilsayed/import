<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection,WithHeadingRow,WithChunkReading, ShouldQueue
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Product::updateOrCreate(
                [
                    'id' => $row['id'],
                ],
                [
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'quantity' => $row['quantity'],
                ]
            );
        }
    }
    public function chunkSize(): int
    {
        return 50;
    }
}
