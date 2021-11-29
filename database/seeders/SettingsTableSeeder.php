<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key' =>  'company_name',
            'value' =>  'Delivery Application',
        ],
        [
            'key' =>  'site_title',
            'value' =>  'Delivery',
        ],
        [
            'key' =>  'company_email_address',
            'value' =>  'admin@admin.com',
        ],
        [
            'key' =>  'company_phone',
            'value' =>  '+9999999999999',
        ],
        [
            'key' =>  'company_address',
            'value' =>  'Street , City, Zip, Country',
        ],
        [
            'key' =>  'currency_code',
            'value' =>  'MAD',
        ],
        [
            'key' =>  'currency_symbol',
            'value' =>  'DH',
        ],
        [
            'key' =>  'site_logo',
            'value' =>  '',
        ],
        [
            'key' =>  'site_favicon',
            'value' =>  '',
        ],
        [
            'key' =>  'page_status',
            'value' =>  '1',
        ],
        [
            'key' =>  'footer_copyright_text',
            'value' =>  '',
        ],
        [
            'key' =>  'seo_meta_title',
            'value' =>  'delivery management',
        ],
        [
            'key' =>  'seo_meta_description',
            'value' =>  'delivery management',
        ],
        [
            'key' =>  'social_facebook',
            'value' =>  '#',
        ],
        [
            'key' =>  'social_twitter',
            'value' =>  '#',
        ],
        [
            'key' =>  'social_instagram',
            'value' =>  '#',
        ],
        [
            'key' =>  'social_linkedin',
            'value' =>  '#',
        ],
        [
            'key' =>  'social_whatsapp',
            'value' =>  '#',
        ],
        [
            'key' =>  'head_tags',
            'value' =>  '',
        ],
        [
            'key' =>  'body_tags',
            'value' =>  '',
        ],
        [
            'key' =>  'enableRegistrationTerms',
            'value' =>  '1',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}