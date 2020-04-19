<?php
/**
 * Define const for route name
 */
const USER_HOME = 'user.home';
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