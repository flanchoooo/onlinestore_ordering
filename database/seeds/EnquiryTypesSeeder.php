<?php

use App\EnquiryType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnquiryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enquiry_types')->delete();

        EnquiryType::create(array('id' => 1,
                                 'name' => 'Prescription', 'description' => 'project-1'

        ));

        EnquiryType::create(array('id' => 2,
                                 'name' => 'OTC', 'description' => 'project-2'

        ));


        EnquiryType::create(array('id' => 4,
                                 'name' => 'Other Products', 'description' => 'project-3'

        ));
    }
}
