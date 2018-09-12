<?php

namespace App\Services;

use App\Stock;
use Exception;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;

class StockUploadService
{
    public function upload(){
        $config = new LexerConfig();
        $lexer = new Lexer($config->setIgnoreHeaderLine(true));
        $interpreter = new Interpreter();
        $interpreter->unstrict();
        $rows = 1;
        $interpreter->addObserver(function (array $row){
            try {
                $vat = 0;
                if ($row[4] == 'Zero Rated') {
                    $vat = 0;
                } else {
                    $vat = 15;
                }

                Stock::create([
                    'stock_code'             => $row[0],
                    'item_description'       => $row[1],
                    'size'                   => $row[2],
                    'department_description' => $row[3],
                    'vat'                    => $vat,
                    'price'                  => 10,
                ]);

                global $rows;
                $rows = $rows + 1;
                echo $rows . "added \n";

            } catch (Exception $exception) {
                return $exception;
                global $countExceptions;
                $countExceptions = $countExceptions + 1;
                echo $countExceptions;
            }
        });
        $lexer->parse('stocks.csv', $interpreter);
    }
}