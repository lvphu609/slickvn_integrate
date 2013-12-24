<?php

/**
 * 
 *
 * @author Huynh Xinh
 * 
 * 
 */
class Common_enum {
    
    const _ID                       = '_id';
    const ID                        = 'id';
    const NAME                      = 'name';
    const UPDATED_DATE              = 'updated_date';
    const CREATED_DATE              = 'created_date';
    
    //  NAME BASE COLLECTION
    const MEAL_TYPE                 = 'meal_type';
    const FAVOURITE_TYPE            = 'favourite_type';
    const PAYMENT_TYPE              = 'payment_type';
    const OTHER_CRITERIA            = 'other_criteria';
    const MODE_USE                  = 'mode_use';
    const PRICE_PERSON              = 'price_person';
    const LANDSCAPE                 = 'landscape';
    const CULINARY_STYLE            = 'culinary_style';
    
    //  ACTION
    const SELECT                    = 'select';
    const INSERT                    = 'insert';
    const EDIT                      = 'edit';
    const DELETE                    = 'delete';
    
    //  MORE
    const INTERVAL_NEWST_RESTAURANT = 7;
    const DOMAIN_NAME               = 'http://192.168.1.194/slickvn_api_project_xinh/slickvn_api/';
    const URL_USER_PROFILE          = 'users_profile/';
    const URL_RESTAURANT_PROFILE    = 'restaurant_profile/';
    const FIELD = 'field';
    const ARRAY_ID = 'array_id';
    
    //  TYPE UPLOAD IMAGE
    const DIR_USER_PROFILE          = 'user_profile/';
    const TYPE_USER_PROFILE         = 'USER_PROFILE';
    
    const DIR_POST                  = 'posts/';
    const TYPE_POST                 = 'POST';
    
    const DIR_RESTAURANT            = 'restaurant_profile/';
    const TYPE_RESTAURANT           = 'RESTAURANT';
    const TYPE_CAROUSEL             = 'carousel/';
    const TYPE_DISH                 = 'dish/';
    const TYPE_INTRODUCE            = 'introduce/';
    
    const DEFAULT_AVATAR            = 'DEFAULT_AVATAR.png';
    
    //  ROOT
    const ROOT                      = './';
    
    const MARK                      = ',';
    const MARK_                      = '#';
    
    const MARK_DETAIL_DISH          = '*100#';
    const MARK_DISH                 = ' *101# ';
    
    //  UPLOAD
    const FILE                      = 'file';
    
    //  ACTION OF USER: LOGIN | VISIT | LIKE | SHARE | ASSESSMENT | COMMENT
    const LOGIN                     = 'LOGIN';
    const ASSESSMENT                = 'ASSESSMENT';
    const COMMENT                   = 'COMMENT';
    const LIKE                      = 'LIKE';
    const SHARE                     = 'SHARE';
    const ASSESSMENT_RESTAURANT     = 'ASSESSMENT_RESTAURANT';
    const COMMENT_ASSESSMENT        = 'COMMENT_ASSESSMENT';
    const VISIT_RESTAURANT          = 'VISIT_RESTAURANT';
    const LIKE_RESTAURANT           = 'LIKE_RESTAURANT';
    const LIKE_ASSESSMENT           = 'LIKE_ASSESSMENT';
    const LIKE_COMMENT              = 'LIKE_COMMENT';
    const SHARE_RESTAURANT          = 'SHARE_RESTAURANT';
    const SHARE_ASSESSMENT          = 'SHARE_ASSESSMENT';
    const SHARE_COMMENT             = 'SHARE_COMMENT';
    
    const LOCALHOST                 = 'http://localhost/';
    const PATH_TEMP                 = 'include/modul_upload/upload_temp/';
    
    const LEVEL_ACTIVE_MEMBERS      = 1;
    
    //  MESSAGE RESPONSE
    const STATUS = 'Status';
    const TOTAL = 'Total';
    const RESULT = 'Result';
    const RESULTS = 'Results';
    const ERROR = 'Error';
    
    const MESSAGE_RESPONSE_SUCCESSFUL      = 'SUCCESSFUL';
    const MESSAGE_RESPONSE_TRUE           = 'TRUE';
    const MESSAGE_RESPONSE_FALSE           = 'FALSE';
    const MESSAGE_RESPONSE_ALLOWED         = 'ALLOWED';
    const MESSAGE_RESPONSE_DENY            = 'DENY';
    
    //  OS
    const WINDOWN = 1;
    const LINUX = 2;
    
}

?>