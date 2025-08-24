<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Web';
$route['frontp']  =  'Web/frontp';
$route['game-play/(:num)'] = 'Web/game_play/$1';
$route['jodi'] = 'Web/jodi';
$route['single-patti'] = 'Web/single_patti';
$route['double-patti'] = 'Web/double_patti';
$route['triple-patti'] = 'Web/triple_patti';
$route['halfsangam/(:num)'] = 'Web/halfsangam/$1';
$route['fullsangam/(:num)'] = 'Web/fullsangam/$1';
$route['kalyanstarline'] = 'Web/kalyanstarline';
$route['mumbaistarline'] = 'Web/mumbaistarline';
$route['gamerate'] = 'Web/gamerate';
$route['how'] = 'Web/how';
$route['login'] = 'Web/login';
$route['register'] = 'Web/register';
$route['user-logout'] = 'Web/logout';
$route['myacc'] = 'Web/myacc';
$route['my_bid'] = 'Web/my_bids';
$route['transaction'] = 'Web/transaction';
$route['withdrawdepo'] = 'Web/withdrawdepo';
$route['profile'] = 'Web/profile';
$route['change'] = 'Web/change';
$route['change-pass'] = 'Web/change_pass';
$route['withdepo'] = 'Web/insert_withdepo';

//User
$route['user-register'] = 'Web/register_enter';
$route['login-allow'] = 'Web/login_enter';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin-login']   = 'LoginController/index';
$route['login-accsess'] = 'LoginController/login_submit';
$route['admin-dashboard']     = 'Admin/dashboard';
$route['subadmin-dashboard']  = 'SubAdmin/dashboard';

$route['subadmin-add_result']    = 'SubAdmin/add_result';
$route['subadmin-delete-result/(:num)'] = "SubAdmin/delete_result/$1";
$route['subadmin-edit-result']      = "SubAdmin/edit_result";

$route['logout']              = 'Admin/logout';
$route['admin-add_fund']   	  = 'Admin/add_fund';
$route['admin-add_result']    = 'Admin/add_result';
$route['admin-delete-result/(:num)'] = "Admin/delete_result/$1";
$route['admin-edit-result']      = "Admin/edit_result";
$route['admin-all_bid']   = 'Admin/all_bid';
$route['admin-bid_type']   = 'Admin/bid_type';
$route['admin-create_game']   = 'Admin/create_game';
$route['admin-sended_amt']   = 'Admin/sended_amt';
$route['admin-users-list']   = 'Admin/users_list';
$route['admin-winner_res']   = 'Admin/winner_res';
$route['admin-withdraw_fund']   = 'Admin/withdraw_fund';
$route['admin-winner_res']   = 'Admin/winner_res';
$route['admin-add-game']   = 'Admin/add_game';
$route['admin-user_detail/(:num)'] = 'Admin/user_detail/$1';
$route['admin-create_bid'] = 'Admin/create_bid';
$route['admin-credit/(:num)'] = 'Admin/credit/$1';
$route['admin-debit/(:num)'] = 'Admin/debit/$1';
$route['admin-create_game2'] = 'Admin/create_game2';
$route['admin-setting']		 = 'Admin/setting';
$route['update_setting']     = 'Admin/update_setting';
$route['notification'] = 'Admin/send_notification';
$route['send_notification'] = 'Admin/submit_notification';


$route['insert_game']     =  "Admin/insert_game";
$route['home-select_view'] = 'Home/select_view';

$route['admin/change-user-status/(:num)/(:any)'] = 'Admin/changeUserStatus/$1/$2';
$route['admin/edit-game/(:num)'] = 'Admin/editGame/$1';
$route['admin/update-game/(:num)'] = 'Admin/updateGame/$1';
$route['admin/delete-game/(:num)'] = 'Admin/deleteGame/$1';

$route['admin/game-type'] = 'Admin/gameType';
$route['admin/game-type/bet/numbers/(:num)'] = 'Admin/betNumbers/$1';
$route['admin/add-game-result'] = 'Admin/addGameResult';
$route['admin/add-game-type'] = 'Admin/addGameType';
$route['admin/add-bet-number'] = 'Admin/addBetNumber';
$route['admin/edit-game-type'] = 'Admin/editGameType';
$route['delete-numbers/(:num)/(:num)'] = 'Admin/delete_number/$1/$2';

$route['admin/change_game_status/(:num)/(:num)'] = 'Admin/change_game_status/$1/$2';


// P Starts
$route['admin/search-user-detail/(:any)'] = 'Admin/searchUserDetail/$1';
$route['admin/add-wallet-amount'] = 'Admin/addWalletAmount';
$route['admin/add-refund'] = 'Admin/addRefund';
$route['admin/withdrawal-request'] = 'Admin/withdrawalRequest';
$route['admin/change_password']	   = 'Admin/change_password';
$route['admin/change_password_submit'] = 'Admin/change_password_submit';
$route['admin/video_upload'] = 'Admin/video_view';
$route['admin/video_upload_submit'] = 'Admin/videoUpload';

$route['subadmin/change_password']  = 'SubAdmin/change_password';

$route['subadmin/change_password_submit']  = 'SubAdmin/change_password_submit';
// P Ends

$route['web/save_game_bid']    =  'Web/save_bid_date';

$route['web/save_game_bid_hs'] = "Web/save_bid_halfsanagam";

$route['web/save_game_bid_fs'] = "Web/save_bid_fullsanagam";
$route['privacy_policy']   = "Web/privacy_policy";
$route['payment-gateway'] = "Web/payment";



// MOBILE APIs.
$route['api/register']								= 'Api/register';
$route['api/login']									= 'Api/login';
$route['api/forgot-password']						= 'Api/forgotPassword';
$route['api/new-password']							= 'Api/newPassword';
$route['api/user-profile/(:num)']					= 'Api/getUserProfile/$1';
$route['api/update-user-password/(:num)']			= 'Api/updateUserPassword/$1';
$route['api/update-profile/(:num)']					= 'Api/updateProfile/$1';
$route['api/add-transaction-request/(:num)']		= 'Api/addTransactionRequest/$1';
$route['api/add-transaction-deposit/(:num)']		= 'Api/addTransactionDeposit/$1';
$route['api/get-transactions_deposit/(:num)']		= 'Api/getWalletTransactions/$1';
$route['api/get-transactions_withdrawal/(:num)']	= 'Api/getWalletTransactionsWithdrawal/$1';
$route['api/game_types']							= 'Api/game_types';
$route['api/games']                             	= 'Api/games';
$route['api/bid-numbers/(:num)']					= 'Api/bid_numbers/$1';
$route['api/set_bid']								= 'Api/set_bid_number';
$route['api/set_bid_hf']							= 'Api/set_bid_number_hf';
$route['api/my_bids/(:num)']						= 'Api/my_bids/$1';
$route['api/setting']								= 'Api/settings';
$route['api/payment_initiate']						= 'Payment/payment_start';
$route['api/payment_success']						= 'Payment/payment_success';
$route['api/payment_confirm']						= 'Payment/confirm_payment';
$route['payment_web']								= 'Payment/payment_submit';
$route['api/get_transactions/(:num)']				= 'Api/get_transactions/$1';
$route['api/get_notifications/(:num)']				= 'Api/get_notifications/$1';
$route['api/video']									= 'Api/video';
$route['api/home_api']								= 'Api/home_api';
$route['api/add-payment-request']					= 'Api/addPaymentRequest';
$route['api/withdraw-payment-request']				= 'Api/withdrawPaymentRequest';
$route['api/send_notification_crud']				= 'Api/sendNotificationCrud'; // CRUD OPERATION
$route['api/payg/order/create']	        			= 'Api/payGOrderCreate';
$route['api/payg/order/success']                    = 'Api/payGOrderSuccess';

