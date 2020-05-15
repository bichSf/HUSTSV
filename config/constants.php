<?php
/**
 * Define const for route name
 */
const USER_TOP = 'user.top';
const USER_HOME = 'user.home';
const USER_TEAM = 'user.team';
const USER_CONTACT = 'user.contact';
const USER_FACULTIES = 'user.faculties';
const REGISTER_SHOW_SCREEN_REGISTER = 'register.show_screen_register';
const REGISTER_SET_DATA_SCREEN_STEP_1 = 'register.set_data_screen_step_1';
const REGISTER_VALIDATE_REGISTER = 'register.validate_register';
const REGISTER_SET_DATA_SCREEN_STEP_2 = 'register.set_data_screen_step_2';
const REGISTER_SEND_MAIL = 'register.send_mail';
const REGISTER_VERIFIED_REGISTER = 'register.verified_register';
const REGISTER_SHOW_SCREEN_1 = 'register.show_screen_1';
const REGISTER_SHOW_SCREEN_2 = 'register.show_screen_2';
const REGISTER_SHOW_SCREEN_3 = 'register.show_screen_3';
const REGISTER_SHOW_SCREEN_4 = 'register.show_screen_4';
const REGISTER_SHOW_SCREEN_NORMAL = 'register.show_screen_normal';
const REGISTER_SHOW_SCREEN_NORMAL_STEP_2 = 'register.show_screen_normal_step2';
const PROFILE_TEAM_CREATE = 'profile_team.create';
const PROFILE_LEADER_STORE = 'profile.leader.store';
const PROFILE_TEAM_STORE = 'profile.team.store';
const LOGIN_USE_FACEBOOK = 'login.use_facebook';
const LOGIN_USE_FACEBOOK_CALLBACK = 'login.use_facebook.callback';
const LOGIN_USE_GOOGLE = 'login.use_google';
const LOGIN_USE_GOOGLE_CALLBACK = 'login.use_google.callback';
const LOGIN = 'user.login';
const LOGIN_INDEX = 'user.login.index';
const LOGOUT = 'user.logout';

const USER_RESET_PASSWORD_INDEX = 'user.reset_password.index';
const USER_RESET_PASSWORD_SEND_MAIL = 'user.reset_password.send_mail';
const USER_RESET_PASSWORD_CONFIRM = 'user.reset_password.confirm';
const USER_RESET_PASSWORD_UPDATE = 'user.reset_password.update';
/**
 *  Define role value
 */
const USER = 0;
const LEADER = 1;
const ADMIN = 2;
const ROLES = [
    USER => 'user',
    LEADER => 'leader',
    ADMIN => 'admin'
];
/**
 * Define status step 3
 */
const EMAIL_SEND_FAIL = 0;
const EMAIL_USER_VERIFIED = 1;
const EMAIL_SEND_SUCCESS = 2;
const EMAIL_SENT = 3;

/**
 * Define status step 4
 */
const ACTIVE_FAIL = 0;
const ACTIVE_SUCCESS = 1;
const ACTIVE_ERROR_USER_ACHIEVED = 2;
const ACTIVE_ERROR_EXPIRY_TIME = 3;
const STATUS_ACTIVE = 1;

/**
 *  Define flag
 */
const FLAG_ONE = 1;
const FLAG_TWO = 2;
const FLAG_THREE = 3;
const FLAG_FOUR = 4;

const START_YEAR = 2000;
const MAX_SIZE_AVATAR = 5242880; //5MB*1024*1024
const EXTENSION_IMAGE = ['jpg','png','jpeg'];
const THUMBNAIL_IMAGE_FIRST_NAME = 'thumbnail_';
//const PASSWORD_DEFAULT = 12345678;

/**
 * Define flash
 */
const STR_FLASH_ERROR = 'error';
const STR_FLASH_SUCCESS = 'success';
const STR_ERROR_FLASH = 'error-flash';
const STR_SUCCESS_FLASH = 'success-flash';

/**
 * Define number
 */
const FLAG_ZERO = 0;
const FLAG_ONE = 1;