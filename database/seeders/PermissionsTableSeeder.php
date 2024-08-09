<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $i = 1;
        
        $permissions = [
            [
                'id'    => $i++,
                'title' => 'user_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_create',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_show',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_access',
            ],
            [
                'id'    => $i++,
                'title' => 'role_create',
            ],
            [
                'id'    => $i++,
                'title' => 'role_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'role_show',
            ],
            [
                'id'    => $i++,
                'title' => 'role_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'role_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'user_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_access',
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_create',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_show',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_access',
            ],
            [
                'id'    => $i++,
                'title' => 'frontend_setting_access',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_create',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_show',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_access',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkma_mangment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkam_category_create',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkam_category_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkam_category_show',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkam_category_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkam_category_access',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkma_create',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkma_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkma_show',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkma_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'hawkma_access',
            ],
            [
                'id'    => $i++,
                'title' => 'post_create',
            ],
            [
                'id'    => $i++,
                'title' => 'post_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'post_show',
            ],
            [
                'id'    => $i++,
                'title' => 'post_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'post_access',
            ],
            [
                'id'    => $i++,
                'title' => 'partner_create',
            ],
            [
                'id'    => $i++,
                'title' => 'partner_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'partner_show',
            ],
            [
                'id'    => $i++,
                'title' => 'partner_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'partner_access',
            ],
            [
                'id'    => $i++,
                'title' => 'said_about_us_create',
            ],
            [
                'id'    => $i++,
                'title' => 'said_about_us_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'said_about_us_show',
            ],
            [
                'id'    => $i++,
                'title' => 'said_about_us_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'said_about_us_access',
            ],
            [
                'id'    => $i++,
                'title' => 'project_create',
            ],
            [
                'id'    => $i++,
                'title' => 'project_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'project_show',
            ],
            [
                'id'    => $i++,
                'title' => 'project_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'project_access',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteering_managment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_create',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_show',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_access',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_guide_create',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_guide_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_guide_show',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_guide_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'volunteer_guide_access',
            ],
            [
                'id'    => $i++,
                'title' => 'member_create',
            ],
            [
                'id'    => $i++,
                'title' => 'member_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'member_show',
            ],
            [
                'id'    => $i++,
                'title' => 'member_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'member_access',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_mangment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_create',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_show',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_access',
            ],
            [
                'id'    => $i++,
                'title' => 'subscribe_create',
            ],
            [
                'id'    => $i++,
                'title' => 'subscribe_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'subscribe_show',
            ],
            [
                'id'    => $i++,
                'title' => 'subscribe_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'subscribe_access',
            ],
            [
                'id'    => $i++,
                'title' => 'course_create',
            ],
            [
                'id'    => $i++,
                'title' => 'course_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'course_show',
            ],
            [
                'id'    => $i++,
                'title' => 'course_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'course_access',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_create',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_show',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_access',
            ],
            [
                'id'    => $i++,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => $i++,
                'title' => 'review_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'review_access',
            ],
            [
                'id'    => $i++,
                'title' => 'report_mangment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'report_category_create',
            ],
            [
                'id'    => $i++,
                'title' => 'report_category_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'report_category_show',
            ],
            [
                'id'    => $i++,
                'title' => 'report_category_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'report_category_access',
            ],
            [
                'id'    => $i++,
                'title' => 'report_create',
            ],
            [
                'id'    => $i++,
                'title' => 'report_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'report_show',
            ],
            [
                'id'    => $i++,
                'title' => 'report_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'report_access',
            ],
            [
                'id'    => $i++,
                'title' => 'humanitarian_aid_create',
            ],
            [
                'id'    => $i++,
                'title' => 'humanitarian_aid_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'humanitarian_aid_show',
            ],
            [
                'id'    => $i++,
                'title' => 'humanitarian_aid_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'humanitarian_aid_access',
            ],
            [
                'id'    => $i++,
                'title' => 'donation_system_access',
            ],
            [
                'id'    => $i++,
                'title' => 'donation_create',
            ],
            [
                'id'    => $i++,
                'title' => 'donation_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'donation_show',
            ],
            [
                'id'    => $i++,
                'title' => 'donation_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'donation_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_status_specialist',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_status_manager',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_status_money',
            ], 
            [
                'id'    => $i++,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
