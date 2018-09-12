<?php

namespace App\Console\Commands;

use App\Services\StockUploadService;
use Illuminate\Console\Command;

/**
 * @property StockUploadService stock_upload_service
 */
class UploadStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stocks:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uploads Stocks Data';

    /**
     * Create a new command instance.
     *
     * @param StockUploadService $stock_upload_service
     */
    public function __construct(StockUploadService $stock_upload_service)
    {
        parent::__construct();
        $this->stock_upload_service = $stock_upload_service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->stock_upload_service->upload();
        $this->info('Upload Complete!');


    }
}
