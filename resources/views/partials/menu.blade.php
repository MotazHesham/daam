<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }} {{ request()->is('admin/audit-logs*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.audit-logs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('hawkma_mangment_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/hawkam-categories*') ? 'c-show' : '' }} {{ request()->is('admin/hawkmas*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hawkmaMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('hawkam_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.hawkam-categories.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/hawkam-categories') || request()->is('admin/hawkam-categories/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hawkamCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hawkma_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.hawkmas.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/hawkmas') || request()->is('admin/hawkmas/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-clipboard c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hawkma.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('memperships')
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.memperships.index') }}"
                class="c-sidebar-nav-link {{ request()->is('admin/memperships') || request()->is('admin/memperships/*') ? 'c-active' : '' }}">
                <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                </i>
                عضوية الجمعية العمومية
            </a>
        </li>
        @endcan
        @can('donation_system_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/donations*") ? "c-show" : "" }} {{ request()->is("admin/beneficiaries*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fab fa-500px c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.donationSystem.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('donation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.donations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/donations") || request()->is("admin/donations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.donation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiaries") || request()->is("admin/beneficiaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiary.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('questionnaire')
        <li
            class="c-sidebar-nav-dropdown {{ request()->is('admin/questionnaire*') ? 'c-show' : '' }} ">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-chart-bar c-sidebar-nav-icon">

                </i>
                الاستبيانات
            </a>
            <ul class="c-sidebar-nav-dropdown-items"> 
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.questionnaire.traning') }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/questionnaire/traning') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                        </i>
                        قياس أثر التدريب للموظف

                    </a>
                </li>  
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.questionnaire.volunteers') }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/questionnaire/volunteers') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                        </i>
                        قياس رضا المتطوعين

                    </a>
                </li>  
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.questionnaire.courses') }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/questionnaire/courses') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                        </i>
                        تقييم دورة تدريبية<br> بمكتب التطوير المؤسسي
                    </a>
                </li>  
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.questionnaire.courses.type',['course_type' => '2']) }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/questionnaire/courses/type') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                        </i>
                        تقييم دورة تدريبية
                        <br> بمكتب التطوير المؤسسي
                        <br> قسم الجودة
                    </a>
                </li>  
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.questionnaire.members') }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/questionnaire/members') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                        </i>
                        استبيان قياس رأي
                        <br>
                        أعضاء الجمعية العمومية
                    </a>
                </li>  
            </ul>
        </li>
        @endcan
        @can('post_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.posts.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-pen-square c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.post.title') }}
                </a>
            </li>
        @endcan
        @can('project_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.projects.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-chalkboard-teacher c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.project.title') }}
                </a>
            </li>
        @endcan
        @can('volunteering_managment_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/volunteers*') ? 'c-show' : '' }} {{ request()->is('admin/volunteer-guides*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fab fa-hire-a-helper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.volunteeringManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('volunteer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.volunteers.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/volunteers') || request()->is('admin/volunteers/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user-astronaut c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.volunteer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('volunteer_guide_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.volunteer-guides.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/volunteer-guides') || request()->is('admin/volunteer-guides/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.volunteerGuide.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('report_mangment_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/report-categories*') ? 'c-show' : '' }} {{ request()->is('admin/reports*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('report_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.report-categories.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/report-categories') || request()->is('admin/report-categories/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-barcode c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.reports.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.report.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('member_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.members.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/members') || request()->is('admin/members/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.member.title') }}
                </a>
            </li>
        @endcan
        @can('course_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.courses.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.course.title') }}
                </a>
            </li>
        @endcan
        @can('contact_mangment_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/contacts*') ? 'c-show' : '' }} {{ request()->is('admin/subscribes*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contactMangment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.contacts.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contact.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('subscribe_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.subscribes.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/subscribes') || request()->is('admin/subscribes/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subscribe.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.user-alerts.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('frontend_setting_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/settings*') ? 'c-show' : '' }} {{ request()->is('admin/sliders*') ? 'c-show' : '' }} {{ request()->is('admin/partners*') ? 'c-show' : '' }} {{ request()->is('admin/said-about-uss*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.frontendSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.settings.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.sliders.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('partner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.partners.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/partners') || request()->is('admin/partners/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.partner.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('said_about_us_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.said-about-uss.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/said-about-uss') || request()->is('admin/said-about-uss/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-star-half-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.saidAboutUs.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('humanitarian_aid_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.humanitarian-aids.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/humanitarian-aids') || request()->is('admin/humanitarian-aids/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-hands-helping c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.humanitarianAid.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/task-statuses*') ? 'c-show' : '' }} {{ request()->is('admin/task-tags*') ? 'c-show' : '' }} {{ request()->is('admin/tasks*') ? 'c-show' : '' }} {{ request()->is('admin/tasks-calendars*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.task-statuses.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.task-tags.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/task-tags') || request()->is('admin/task-tags/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.tasks.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.tasks-calendars.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/tasks-calendars') || request()->is('admin/tasks-calendars/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('review_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.reviews.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/reviews') || request()->is('admin/reviews/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-star-half-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.review.title') }}
                </a>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.messenger.index') }}"
                class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'c-active' : '' }} c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                </i>
                <span>{{ trans('global.messages') }}</span>
                @if ($unread > 0)
                    <strong>( {{ $unread }} )</strong>
                @endif

            </a>
        </li>
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
