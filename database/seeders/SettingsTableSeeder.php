<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['display_name_en' => 'Site title', 'display_name' => 'عنوان الموقع', 'key' => 'site_title', 'value' => 'Bloggi System', 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 1, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Site Slogan', 'display_name' => 'شعار الموقع', 'key' => 'site_slogan', 'value' => 'Amazing blog', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 2, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Site Description', 'display_name' => 'وصف الموقع', 'key' => 'site_description', 'value' => 'Bloggi Content management system', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 3, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Site Keywords', 'display_name' => 'كلمات الموقع', 'key' => 'site_keywords', 'value' => 'Bloggi, blog, multi writer', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 4, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Site Email', 'display_name' => 'ايميل الموقع', 'key' => 'site_email', 'value' => 'admin@bloggi.test', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 5, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Site Status', 'display_name' => 'حالة الموقع', 'key' => 'site_status', 'value' => 'Active', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 6, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Admin Title', 'display_name' => 'عنوان المدير', 'key' => 'admin_title', 'value' => 'Bloggi', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 7, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Phone Number', 'display_name' => 'رقم الهاتف', 'key' => 'phone_number', 'value' => '05123456789', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 8, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Address', 'display_name' => 'العنوان',  'key' => 'address', 'value' => 'M57F+QM King Abdulaziz International Airport, Jeddah', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 9, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Map Latitude', 'display_name' => 'خطا الطول على الخريطة', 'key' => 'address_latitude', 'value' => '21.671914', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 10, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Map Longitude', 'display_name' => 'خط العرض على الخريطة', 'key' => 'address_longitude', 'value' => '39.173875', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 11, 'lang' => 'en']);

        Setting::create(['display_name_en' => 'Google Maps API Key', 'display_name' => 'Google Maps API Key', 'key' => 'google_maps_api_key', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 1, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Google Recaptcha API Key', 'display_name' => 'Google Recaptcha API Key', 'key' => 'google_recaptcha_api_key', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 2, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Google Analytics Client ID', 'display_name' => 'Google Analytics Client ID', 'key' => 'google_analytics_client_id', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 3, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Facebook ID', 'display_name' => 'Facebook ID', 'key' => 'facebook_id', 'value' => 'https://www.facebook.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 4, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Twitter ID', 'display_name' => 'Twitter ID', 'key' => 'twitter_id', 'value' => 'https://twitter.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 5, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Instagram ID', 'display_name' => 'Instagram ID', 'key' => 'instagram_id', 'value' => 'https://instagram.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 6, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Patreon ID', 'display_name' => 'Patreon ID', 'key' => 'flickr_id', 'value' => 'https://www.patreon.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 7, 'lang' => 'en']);
        Setting::create(['display_name_en' => 'Youtube ID', 'display_name' => 'Youtube ID', 'key' => 'youtube_id', 'value' => 'https://www.youtube.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 8, 'lang' => 'en']);

        Setting::create(['display_name_en' => 'Site title', 'display_name' => 'عنوان الموقع', 'key' => 'site_title', 'value' => 'Bloggi System', 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 1, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Site Slogan', 'display_name' => 'شعار الموقع', 'key' => 'site_slogan', 'value' => 'Amazing blog', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 2, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Site Description', 'display_name' => 'وصف الموقع', 'key' => 'site_description', 'value' => 'Bloggi Content management system', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 3, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Site Keywords', 'display_name' => 'كلمات الموقع', 'key' => 'site_keywords', 'value' => 'Bloggi, blog, multi writer', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 4, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Site Email', 'display_name' => 'ايميل الموقع', 'key' => 'site_email', 'value' => 'admin@bloggi.test', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 5, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Site Status', 'display_name' => 'حالة الموقع', 'key' => 'site_status', 'value' => 'Active', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 6, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Admin Title', 'display_name' => 'عنوان المدير', 'key' => 'admin_title', 'value' => 'Bloggi', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 7, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Phone Number', 'display_name' => 'رقم الهاتف', 'key' => 'phone_number', 'value' => '05123456789', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 8, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Address', 'display_name' => 'العنوان',  'key' => 'address', 'value' => 'M57F+QM King Abdulaziz International Airport, Jeddah', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 9, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Map Latitude', 'display_name' => 'خطا الطول على الخريطة', 'key' => 'address_latitude', 'value' => '21.671914', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 10, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Map Longitude', 'display_name' => 'خط العرض على الخريطة', 'key' => 'address_longitude', 'value' => '39.173875', 'details' => null, 'type' => 'text', 'section' => 'عام', 'section_en' => 'general', 'ordering' => 11, 'lang' => 'ar']);

        Setting::create(['display_name_en' => 'Google Maps API Key', 'display_name' => 'Google Maps API Key', 'key' => 'google_maps_api_key', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 1, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Google Recaptcha API Key', 'display_name' => 'Google Recaptcha API Key', 'key' => 'google_recaptcha_api_key', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 2, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Google Analytics Client ID', 'display_name' => 'Google Analytics Client ID', 'key' => 'google_analytics_client_id', 'value' => null, 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 3, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Facebook ID', 'display_name' => 'Facebook ID', 'key' => 'facebook_id', 'value' => 'https://www.facebook.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 4, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Twitter ID', 'display_name' => 'Twitter ID', 'key' => 'twitter_id', 'value' => 'https://twitter.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 5, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Instagram ID', 'display_name' => 'Instagram ID', 'key' => 'instagram_id', 'value' => 'https://instagram.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 6, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Patreon ID', 'display_name' => 'Patreon ID', 'key' => 'flickr_id', 'value' => 'https://www.patreon.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 7, 'lang' => 'ar']);
        Setting::create(['display_name_en' => 'Youtube ID', 'display_name' => 'Youtube ID', 'key' => 'youtube_id', 'value' => 'https://www.youtube.com/', 'details' => null, 'type' => 'text', 'section' => 'التواصل الاجتماعي', 'section_en' => 'social_accounts', 'ordering' => 8, 'lang' => 'ar']);
    }
}
