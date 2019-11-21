<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'team_create',
            ],
            [
                'id'    => '18',
                'title' => 'team_edit',
            ],
            [
                'id'    => '19',
                'title' => 'team_show',
            ],
            [
                'id'    => '20',
                'title' => 'team_delete',
            ],
            [
                'id'    => '21',
                'title' => 'team_access',
            ],
            [
                'id'    => '22',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '23',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '24',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '25',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '26',
                'title' => 'content_management_access',
            ],
            [
                'id'    => '27',
                'title' => 'content_category_create',
            ],
            [
                'id'    => '28',
                'title' => 'content_category_edit',
            ],
            [
                'id'    => '29',
                'title' => 'content_category_show',
            ],
            [
                'id'    => '30',
                'title' => 'content_category_delete',
            ],
            [
                'id'    => '31',
                'title' => 'content_category_access',
            ],
            [
                'id'    => '32',
                'title' => 'content_tag_create',
            ],
            [
                'id'    => '33',
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => '34',
                'title' => 'content_tag_show',
            ],
            [
                'id'    => '35',
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => '36',
                'title' => 'content_tag_access',
            ],
            [
                'id'    => '37',
                'title' => 'content_page_create',
            ],
            [
                'id'    => '38',
                'title' => 'content_page_edit',
            ],
            [
                'id'    => '39',
                'title' => 'content_page_show',
            ],
            [
                'id'    => '40',
                'title' => 'content_page_delete',
            ],
            [
                'id'    => '41',
                'title' => 'content_page_access',
            ],
            [
                'id'    => '42',
                'title' => 'ahli_kariah_access',
            ],
            [
                'id'    => '43',
                'title' => 'negeri_create',
            ],
            [
                'id'    => '44',
                'title' => 'negeri_edit',
            ],
            [
                'id'    => '45',
                'title' => 'negeri_show',
            ],
            [
                'id'    => '46',
                'title' => 'negeri_delete',
            ],
            [
                'id'    => '47',
                'title' => 'negeri_access',
            ],
            [
                'id'    => '48',
                'title' => 'masjid_create',
            ],
            [
                'id'    => '49',
                'title' => 'masjid_edit',
            ],
            [
                'id'    => '50',
                'title' => 'masjid_show',
            ],
            [
                'id'    => '51',
                'title' => 'masjid_delete',
            ],
            [
                'id'    => '52',
                'title' => 'masjid_access',
            ],
            [
                'id'    => '53',
                'title' => 'profil_ahli_create',
            ],
            [
                'id'    => '54',
                'title' => 'profil_ahli_edit',
            ],
            [
                'id'    => '55',
                'title' => 'profil_ahli_show',
            ],
            [
                'id'    => '56',
                'title' => 'profil_ahli_delete',
            ],
            [
                'id'    => '57',
                'title' => 'profil_ahli_access',
            ],
            [
                'id'    => '58',
                'title' => 'jantina_create',
            ],
            [
                'id'    => '59',
                'title' => 'jantina_edit',
            ],
            [
                'id'    => '60',
                'title' => 'jantina_delete',
            ],
            [
                'id'    => '61',
                'title' => 'jantina_access',
            ],
            [
                'id'    => '62',
                'title' => 'jenis_pengenalan_diri_create',
            ],
            [
                'id'    => '63',
                'title' => 'jenis_pengenalan_diri_edit',
            ],
            [
                'id'    => '64',
                'title' => 'jenis_pengenalan_diri_delete',
            ],
            [
                'id'    => '65',
                'title' => 'jenis_pengenalan_diri_access',
            ],
            [
                'id'    => '66',
                'title' => 'master_data_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
