<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['policy'] = 'Policy/index';
$route['privacypolicy'] = 'Policy/index';
$route['register'] = 'Register/index';

$route['employer_register'] = 'Recruiter/index';
$route['employer_login'] = 'Recruiter_login/index';
$route['employer_dashboard'] = 'Recruiter_dashboard/index';
$route['employer_job_post'] = 'Recruiter_job_post/index';
$route['employer_manage_jobs'] = 'Employer_controller/manage_jobs';
$route['employer_manage_applications'] = 'Employer_controller/manage_candidates';
$route['employer_profile'] = 'Employer_controller/manage_profile';

$route['login/google_callback'] = 'Login/google_callback';
$route['register/google_callback'] = 'Register/google_callback';
$route['recruiter/google_callback'] = 'Recruiter/google_callback';
$route['recruiter_login/google_callback'] = 'Recruiter_login/google_callback';
$route['admin/login'] = 'Admin_Dashboard/login';
$route['admin/dashboard'] = 'Admin_Dashboard/dashboard';
$route['job_search'] = 'Jobsearch/index';
$route['candidate_job_search'] = 'Candidate_jobsearch/index';
$route['profile'] = 'Profile/index';
$route['jobpreferences'] = 'JobPreferences/index';
$route['jobpreferences/(:any)'] = 'JobPreferences/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// Routes for the main footer links
$route['about-us'] = 'Static_pages/about_us';
$route['careers'] = 'Static_pages/careers';
$route['employer-home'] = 'Static_pages/employer_home';

// Routes for the help and support links
$route['FAQ'] = 'Static_pages/help_center';
$route['report-issue'] = 'Static_pages/report_issue';

// Routes for the legal and safety links
$route['privacy-policy'] = 'Static_pages/privacy_policy';
$route['cookie-policy'] = 'Static_pages/cookie_policy';
$route['terms-and-conditions'] = 'Static_pages/terms_and_conditions';
$route['trust-safety'] = 'Static_pages/trust_safety';



$route['admin/dashboard'] = 'Admin_Dashboard/dashboard';
$route['admin/candidate_management'] = 'Admin_Dashboard/candidate_management';
$route['admin/employer_management'] = 'Admin_Dashboard/employer_management';
$route['admin/job_post_management'] = 'Admin_Dashboard/job_post_management';
$route['admin/featured_companies'] = 'Admin_Dashboard/featured_companies';
$route['admin/sitemap_settings'] = 'admin/Sitemap_settings/index';
$route['admin/comments_management'] = 'admin/Comments';

$route['employer_login/forgot'] = 'Recruiter_login/forgot';
$route['employer_login/verify_email'] = 'Recruiter_login/verify_email';
$route['employer_login/update_password'] = 'Recruiter_login/update_password';

$route['knowledge-based'] = 'KnowledgeBase/index';
$route['admin/posts_add'] = 'admin/Posts/posts_add';
$route['admin/posts_categories'] = 'admin/Posts_categories';
$route['admin/posts_manage'] = 'admin/Posts/posts_manage';

$route['admin/post_details'] = 'admin/Post_details/index';
$route['admin/post_details/index/(:num)'] = 'admin/Post_details/index/$1';

$route['sitemap2709.xml'] = 'admin/Sitemap_settings/xml';