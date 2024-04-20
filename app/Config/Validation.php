<?php

namespace Config;

use App\Validation\CustomValidation;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        CustomValidation::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    // public $rules = [
    //     // Aturan validasi lainnya...
    //     'time_start' => 'required|validateTimeRange[time_start,time_end]',
    //     'time_end' => 'required',
    // ];

    // public $aliases = [
    //     'time_start' => 'Waktu Mulai',
    //     'time_end' => 'Waktu Selesai',
    // ];

    // public $customErrors = [
    //     'validateTimeRange' => [
    //         'default' => '{field} harus lebih kecil dari {param}.',
    //     ],
    // ];

    // public function validateTimeRange(string $str, string $fields, array $data)
    // {
    //     [$startField, $endField] = explode(',', $fields);

    //     $startTime = strtotime($data[$startField]);
    //     $endTime = strtotime($data[$endField]);

    //     return ($startTime < $endTime);
    // }
}
