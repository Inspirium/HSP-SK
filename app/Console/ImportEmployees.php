<?php

namespace Inspirium\Console;

use Illuminate\Console\Command;
use Inspirium\HumanResources\Models\Department;
use Inspirium\HumanResources\Models\Employee;

class ImportEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspirium:import_employees {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import employees from Excel file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file_path = $this->argument('file');

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_path);
        $reader->setReadDataOnly(true);
        $objPHPExcel = $reader->load($file_path);
        //iterate over first row to find all columns
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $i = 0; $fields = []; $employees = [];
        foreach ($objWorksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells( false );
            $j = 0;
            foreach ( $cellIterator as $cell ) {
                $value = $cell->getCalculatedValue();
                if ( $i == 0 ) {
                    $fields[] = $value;
                } else {
                    $employees[$i][ $fields[ $j ] ] = $value;
                }
                $j ++;
            }
            $i ++;
            if ($i>319) {
                break;
            }
        }
        foreach ($employees as $employee) {
            $department = Department::where('name', $employee['department'])->first();
            $this->line($employee['last_name']);
            $new = Employee::create([
                'first_name' => $employee['first_name'],
                'last_name' => $employee['last_name'],
                'department_id' => $department->id,
	            'mobile_pre' => $employee['mobile_pre'],
	            'mobile' => $employee['mobile'],
	            'mobile_vpn' => $employee['mobile_vpn'],
	            'phone_pre' => $employee['phone_pre'],
	            'phone' => $employee['phone'],
	            'phone_vpn' => $employee['phone_vpn'],
	            'address' => $employee['address'],
	            'city' => $employee['city'],
	            'postal_code' => $employee['postal_code'],
	            'room' => $employee['room'],
	            'password' => bcrypt('secret')
            ]);
        }
    }
}
