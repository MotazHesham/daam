<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'phone_number'             => 'Phone Number',
            'phone_number_helper'      => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'website_name'                => 'Website Name',
            'website_name_helper'         => ' ',
            'email'                       => 'Email',
            'email_helper'                => ' ',
            'phone_number'                => 'Phone Number',
            'phone_number_helper'         => ' ',
            'facebook'                    => 'Facebook',
            'facebook_helper'             => ' ',
            'instagram'                   => 'Instagram',
            'instagram_helper'            => ' ',
            'logo'                        => 'Logo',
            'logo_helper'                 => ' ',
            'address'                     => 'Address',
            'address_helper'              => ' ',
            'description'                     => 'About Daam',
            'description_helper'              => ' ',
            'vision'                     => 'Vision',
            'vision_helper'              => ' ',
            'mission'                     => 'Mission',
            'mission_helper'              => ' ',
            'whatsapp'                      => 'Whatsapp',
            'whatsapp_helper'               => ' ',
            'twitter'                     => 'Twitter',
            'twitter_helper'              => ' ',
            'divorced_count'              => 'Divorced Count',
            'divorced_count_helper'       => ' ',
            'widow_count'                 => 'Widow Count',
            'widow_count_helper'          => ' ',
            'child_count'                 => 'Child Count',
            'child_count_helper'          => ' ',
            'unit_count'                  => 'Unit Count',
            'unit_count_helper'           => ' ',
            'building_count'              => 'Building Count',
            'building_count_helper'       => ' ',
            'beneficiary_count'           => 'Beneficiary Count',
            'beneficiary_count_helper'    => ' ',
            'volunteer_count'           => 'Volunteer Count',
            'volunteer_count_helper'    => ' ',
            'hours_count'           => 'Hours Count',
            'hours_count_helper'    => ' ',
            'chairman_description'        => 'Chairman Description',
            'chairman_description_helper' => ' ',
            'chairman_image'              => 'Chairman Image',
            'chairman_image_helper'       => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'about_image'                 => 'About Image',
            'about_image_helper'          => ' ',
            'vision_image'                => 'Vision Image',
            'vision_image_helper'         => ' ',
            'mission_image'               => 'Mission Image',
            'mission_image_helper'        => ' ',
            'iskan_description'           => 'Iskan Description',
            'iskan_description_helper'    => ' ',
            'iskan_terms'                 => 'Iskan Terms',
            'iskan_terms_helper'          => ' ',
            'iskan_info'                  => 'Iskan Info',
            'iskan_info_helper'           => ' ',
            'iskan_tutorial'              => 'Iskan Tutorial',
            'iskan_tutorial_helper'       => ' ',
            'profile'                     => 'Profile',
            'profile_helper'              => ' ',
        ],
    ],
    'frontendSetting' => [
        'title'          => 'Frontend Settings',
        'title_singular' => 'Frontend Setting',
    ],
    'slider' => [
        'title'          => 'Sliders',
        'title_singular' => 'Slider',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'text_1'             => 'Text 1',
            'text_1_helper'      => ' ',
            'text_2'             => 'Text 2',
            'text_2_helper'      => ' ',
            'image'              => 'Image',
            'image_helper'       => '1920 x 870',
            'published'          => 'Published',
            'published_helper'   => ' ',
            'link'               => 'Link',
            'link_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'button_name'        => 'Button Name',
            'button_name_helper' => ' ',
        ],
    ],
    'hawkmaMangment' => [
        'title'          => 'Hawkma Mangment',
        'title_singular' => 'Hawkma Mangment',
    ],
    'hawkamCategory' => [
        'title'          => 'Hawkam Categories',
        'title_singular' => 'Hawkam Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'hawkma' => [
        'title'          => 'Hawkma',
        'title_singular' => 'Hawkma',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'file'              => 'File',
            'file_helper'       => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'published'         => 'Published',
            'published_helper'  => ' ',
        ],
    ],
    'post' => [
        'title'          => 'Posts',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'type'               => 'Type',
            'type_helper'        => ' ',
            'date'               => 'Date',
            'date_helper'        => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'writer'              => 'Writer',
            'writer_helper'       => ' ',
            'short_description'              => 'Short Description',
            'short_description_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => '440 x 440',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'head_line'          => 'Head Line',
            'head_line_helper'   => ' ',
            'published'          => 'Published',
            'published_helper'   => ' ',
            'featured'           => 'Featured',
            'featured_helper'    => ' ',
        ],
    ],
    'partner' => [
        'title'          => 'Partners',
        'title_singular' => 'Partner',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'saidAboutUs' => [
        'title'          => 'Said About Us',
        'title_singular' => 'Said About Us',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'position'          => 'Position',
            'position_helper'   => ' ',
            'review'            => 'Review',
            'review_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'project' => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'date'                     => 'Date',
            'date_helper'              => ' ',
            'collected'                => 'Collected',
            'collected_helper'         => ' ',
            'goal'                     => 'Goal',
            'goal_helper'              => ' ',
            'image'                    => 'Image',
            'image_helper'             => '440 x 440',
            'file'                     => 'File',
            'file_helper'              => ' ',
            'short_description'        => 'Short Description',
            'short_description_helper' => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'published'                => 'Published',
            'published_helper'         => ' ',
            'head_line'                => 'Head Line',
            'head_line_helper'         => ' ',
            'featured'                 => 'Featured',
            'featured_helper'          => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'volunteeringManagment' => [
        'title'          => 'Volunteering Managment',
        'title_singular' => 'Volunteering Managment',
    ],
    'volunteer' => [
        'title'          => 'Volunteers',
        'title_singular' => 'Volunteer',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'identity_num'           => 'Identity Num',
            'identity_num_helper'    => ' ',
            'email'                  => 'Email',
            'email_helper'           => ' ',
            'phone_number'           => 'Phone Number',
            'phone_number_helper'    => ' ',
            'interest'               => 'Interest',
            'interest_helper'        => ' ',
            'initiative_name'        => 'Initiative Name',
            'initiative_name_helper' => ' ',
            'prev_experience'        => 'Prev Experience',
            'prev_experience_helper' => ' ',
            'cv'                     => 'Cv',
            'cv_helper'              => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'volunteerGuide' => [
        'title'          => 'Volunteer Guides',
        'title_singular' => 'Volunteer Guide',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'published'         => 'Published',
            'published_helper'  => ' ',
            'file'              => 'File',
            'file_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => ' ',
        ],
    ],
    'member' => [
        'title'          => 'Members',
        'title_singular' => 'Member',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'type'                   => 'Type',
            'type_helper'            => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'job'                    => 'Job',
            'job_helper'             => ' ',
            'nationality'            => 'Nationality',
            'nationality_helper'     => ' ',
            'phone_number'           => 'Phone Number',
            'phone_number_helper'    => ' ',
            'email'                  => 'Email',
            'email_helper'           => ' ',
            'civial_registry'        => 'Civial Registry',
            'civial_registry_helper' => ' ',
            'qualification'          => 'Qualification',
            'qualification_helper'   => ' ',
            'date_of_birth'          => 'Date Of Birth',
            'date_of_birth_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'contactMangment' => [
        'title'          => 'Contact Mangment',
        'title_singular' => 'Contact Mangment',
    ],
    'contact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'type'                => 'Type',
            'type_helper'         => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'job'                 => 'Job',
            'job_helper'          => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'phone_number'        => 'Phone Number',
            'phone_number_helper' => ' ',
            'message'             => 'Message',
            'message_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'subscribe' => [
        'title'          => 'Subscribe',
        'title_singular' => 'Subscribe',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'course' => [
        'title'          => 'Courses',
        'title_singular' => 'Course',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'trainer'                  => 'Trainer',
            'trainer_helper'           => ' ',
            'start_at'                 => 'start at',
            'start_at_helper'          => ' ',
            'end_at'                   => 'End At',
            'end_at_helper'            => ' ',
            'published'                => 'Published',
            'published_helper'         => ' ',
            'photo'                    => 'Photo',
            'photo_helper'             => '440 x 440',
            'description'              => 'description',
            'description_helper'       => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'attend_type'              => 'Attend Type',
            'attend_type_helper'       => ' ',
            'certificate'              => 'Certificate',
            'certificate_helper'       => ' ',
            'short_description'        => 'Short Description',
            'short_description_helper' => ' ',
        ],
    ],
    'courseStudent' => [
        'title'          => 'Course Students',
        'title_singular' => 'Course Student',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'identity_num'         => 'Identity Num',
            'identity_num_helper'  => ' ',
            'phone_number'         => 'Phone Number',
            'phone_number_helper'  => ' ',
            'date_of_birth'        => 'Date Of Birth',
            'date_of_birth_helper' => ' ',
            'registered'           => 'Registered',
            'registered_helper'    => ' ',
            'certificate'          => 'Certificate',
            'certificate_helper'   => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'course'               => 'Course',
            'course_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'taskManagement' => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task' => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'attachment'         => 'Attachment',
            'attachment_helper'  => ' ',
            'due_date'           => 'Due date',
            'due_date_helper'    => ' ',
            'assigned_to'        => 'Assigned to',
            'assigned_to_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tasksCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'review' => [
        'title'          => 'Reviews',
        'title_singular' => 'Review',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'identity_number'        => 'Identity Number',
            'identity_number_helper' => ' ',
            'phone_number'           => 'Phone Number',
            'phone_number_helper'    => ' ',
            'review'                 => 'Review',
            'review_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'role'                   => 'Role',
            'role_helper'            => ' ',
        ],
    ],

    'reportMangment' => [
        'title'          => 'Report Mangment',
        'title_singular' => 'Report Mangment',
    ],
    'reportCategory' => [
        'title'          => 'Report Categories',
        'title_singular' => 'Report Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'published'         => 'Published',
            'published_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'report' => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'file'              => 'File',
            'file_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'published'         => 'Published',
            'published_helper'  => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];