<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'setting_create',
            ],
            [
                'id'    => 24,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 25,
                'title' => 'setting_show',
            ],
            [
                'id'    => 26,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 27,
                'title' => 'setting_access',
            ],
            [
                'id'    => 28,
                'title' => 'frontend_setting_access',
            ],
            [
                'id'    => 29,
                'title' => 'slider_create',
            ],
            [
                'id'    => 30,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 31,
                'title' => 'slider_show',
            ],
            [
                'id'    => 32,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 33,
                'title' => 'slider_access',
            ],
            [
                'id'    => 34,
                'title' => 'hawkma_mangment_access',
            ],
            [
                'id'    => 35,
                'title' => 'hawkam_category_create',
            ],
            [
                'id'    => 36,
                'title' => 'hawkam_category_edit',
            ],
            [
                'id'    => 37,
                'title' => 'hawkam_category_show',
            ],
            [
                'id'    => 38,
                'title' => 'hawkam_category_delete',
            ],
            [
                'id'    => 39,
                'title' => 'hawkam_category_access',
            ],
            [
                'id'    => 40,
                'title' => 'hawkma_create',
            ],
            [
                'id'    => 41,
                'title' => 'hawkma_edit',
            ],
            [
                'id'    => 42,
                'title' => 'hawkma_show',
            ],
            [
                'id'    => 43,
                'title' => 'hawkma_delete',
            ],
            [
                'id'    => 44,
                'title' => 'hawkma_access',
            ],
            [
                'id'    => 45,
                'title' => 'post_create',
            ],
            [
                'id'    => 46,
                'title' => 'post_edit',
            ],
            [
                'id'    => 47,
                'title' => 'post_show',
            ],
            [
                'id'    => 48,
                'title' => 'post_delete',
            ],
            [
                'id'    => 49,
                'title' => 'post_access',
            ],
            [
                'id'    => 50,
                'title' => 'partner_create',
            ],
            [
                'id'    => 51,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 52,
                'title' => 'partner_show',
            ],
            [
                'id'    => 53,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 54,
                'title' => 'partner_access',
            ],
            [
                'id'    => 55,
                'title' => 'said_about_us_create',
            ],
            [
                'id'    => 56,
                'title' => 'said_about_us_edit',
            ],
            [
                'id'    => 57,
                'title' => 'said_about_us_show',
            ],
            [
                'id'    => 58,
                'title' => 'said_about_us_delete',
            ],
            [
                'id'    => 59,
                'title' => 'said_about_us_access',
            ],
            [
                'id'    => 60,
                'title' => 'project_create',
            ],
            [
                'id'    => 61,
                'title' => 'project_edit',
            ],
            [
                'id'    => 62,
                'title' => 'project_show',
            ],
            [
                'id'    => 63,
                'title' => 'project_delete',
            ],
            [
                'id'    => 64,
                'title' => 'project_access',
            ],
            [
                'id'    => 65,
                'title' => 'volunteering_managment_access',
            ],
            [
                'id'    => 66,
                'title' => 'volunteer_create',
            ],
            [
                'id'    => 67,
                'title' => 'volunteer_edit',
            ],
            [
                'id'    => 68,
                'title' => 'volunteer_show',
            ],
            [
                'id'    => 69,
                'title' => 'volunteer_delete',
            ],
            [
                'id'    => 70,
                'title' => 'volunteer_access',
            ],
            [
                'id'    => 71,
                'title' => 'volunteer_guide_create',
            ],
            [
                'id'    => 72,
                'title' => 'volunteer_guide_edit',
            ],
            [
                'id'    => 73,
                'title' => 'volunteer_guide_show',
            ],
            [
                'id'    => 74,
                'title' => 'volunteer_guide_delete',
            ],
            [
                'id'    => 75,
                'title' => 'volunteer_guide_access',
            ],
            [
                'id'    => 76,
                'title' => 'member_create',
            ],
            [
                'id'    => 77,
                'title' => 'member_edit',
            ],
            [
                'id'    => 78,
                'title' => 'member_show',
            ],
            [
                'id'    => 79,
                'title' => 'member_delete',
            ],
            [
                'id'    => 80,
                'title' => 'member_access',
            ],
            [
                'id'    => 81,
                'title' => 'contact_mangment_access',
            ],
            [
                'id'    => 82,
                'title' => 'contact_create',
            ],
            [
                'id'    => 83,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 84,
                'title' => 'contact_show',
            ],
            [
                'id'    => 85,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 86,
                'title' => 'contact_access',
            ],
            [
                'id'    => 87,
                'title' => 'subscribe_create',
            ],
            [
                'id'    => 88,
                'title' => 'subscribe_edit',
            ],
            [
                'id'    => 89,
                'title' => 'subscribe_show',
            ],
            [
                'id'    => 90,
                'title' => 'subscribe_delete',
            ],
            [
                'id'    => 91,
                'title' => 'subscribe_access',
            ],
            [
                'id'    => 92,
                'title' => 'course_create',
            ],
            [
                'id'    => 93,
                'title' => 'course_edit',
            ],
            [
                'id'    => 94,
                'title' => 'course_show',
            ],
            [
                'id'    => 95,
                'title' => 'course_delete',
            ],
            [
                'id'    => 96,
                'title' => 'course_access',
            ],
            [
                'id'    => 97,
                'title' => 'course_student_create',
            ],
            [
                'id'    => 98,
                'title' => 'course_student_edit',
            ],
            [
                'id'    => 99,
                'title' => 'course_student_show',
            ],
            [
                'id'    => 100,
                'title' => 'course_student_delete',
            ],
            [
                'id'    => 101,
                'title' => 'course_student_access',
            ],
            [
                'id'    => 102,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 103,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 104,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 105,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 106,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 107,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 108,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 109,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 110,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 111,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 112,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 113,
                'title' => 'task_create',
            ],
            [
                'id'    => 114,
                'title' => 'task_edit',
            ],
            [
                'id'    => 115,
                'title' => 'task_show',
            ],
            [
                'id'    => 116,
                'title' => 'task_delete',
            ],
            [
                'id'    => 117,
                'title' => 'task_access',
            ],
            [
                'id'    => 118,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 119,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
