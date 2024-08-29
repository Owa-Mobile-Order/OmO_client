<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImportCsvData extends Command
{
  protected $signature = 'import:csv {filename}';
  protected $description = 'Import data from a CSV file and run migration';

  public function handle()
  {
    $filename = $this->argument('filename');
    $path = Storage::path($filename);

    if (!file_exists($path)) {
      $this->error("File not found: {$path}");
      return;
    }

    $csv = array_map('str_getcsv', file($path));
    array_shift($csv); // Remove header row

    DB::beginTransaction();

    try {
      foreach ($csv as $row) {
        DB::table('student_codes')->insert([
          'id' => $row[0],
          'code' => $row[1],
        ]);
      }

      DB::commit();
      $this->info('CSV data imported and migrated successfully.');
    } catch (\Exception $e) {
      DB::rollBack();
      $this->error('An error occurred: ' . $e->getMessage());
    }
  }
}
