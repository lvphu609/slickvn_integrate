<?php

/**
 * 
 * This class support APIs User for client
 *
 * @author Huynh Xinh
 * Date: 8/11/2013
 * 
 */
class user_apis extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        //  Load model USER
        $this->load->model('user/user_model');
        $this->load->model('user/user_enum');
        
        $this->load->model('user/user_log_enum');
        $this->load->model('common/encode_utf8');
        
        $this->load->model('common/list_point_enum');
        
//        $this->load->model('common/city_enum');
//        $this->load->model('common/district_enum');
        
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs User                                         //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API get point of User by id
     * 
     * Menthod: GET
     * @param String $id
     * Response: JSONObject
     * 
     */
    public function get_point_of_user($id) {
        //  Get param from client
//        $id = $this->get('id');
        
        //  Get collection 
        $get_collection = $this->user_model->getUserById($id);
        
        $error = $this->user_model->getError();
//        echo $error;
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){

                    if($value['is_delete'] == 0){
                        $count ++;
                        //  Create JSONObject
                        $jsonobject = array( 

                                    User_enum::ID                => $value['_id']->{'$id'},
                                    User_enum::FULL_NAME         => $value['full_name'],
                                    User_enum::POINT             => $value['point'],
                                    Common_enum::UPDATED_DATE    => $value['updated_date'],
                                    Common_enum::CREATED_DATE    => $value['created_date']

                                   );
                        $results[] = $jsonobject;
                    }
                }
            }
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * API search User by name
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function search_user($limit, $page, $key=null) {
        if(!is_numeric($limit)){
            $get_limit = $this->common_apis->get_config_page_by_key_code($limit);
            if(is_array($get_limit) && sizeof($get_limit)>0){
                $limit = (sizeof($get_limit[Common_enum::RESULTS]) > 0)? $get_limit[Common_enum::RESULTS][0][Config_page_enum::LIMIT] : 1;
            }
        }
        
        $key = Encode_utf8::toUTF8($key);
        
        //  Query
        $where_select_by_name = array(User_enum::FULL_NAME => new MongoRegex('/'.$key.'/i'));
        $where_select_by_email = array(User_enum::EMAIL => new MongoRegex('/'.$key.'/i'));
        $where_select_by_phone = array(User_enum::PHONE_NUMBER => new MongoRegex('/'.$key.'/i'));
        
        $where = array();
        
        if(is_numeric($key)){
            $where = array( '$or'=>array($where_select_by_name, $where_select_by_email, $where_select_by_phone) );
        }else{
            $where = array( '$or'=>array($where_select_by_name, $where_select_by_email) );
        }
        
        
        $list_user = $this->user_model->searchUser($where);
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        //  Array object
        $results = array();
        //  Count object
        $count = 0;
        if(is_array($list_user)){
            foreach ($list_user as $value){
                if($value['is_delete'] == 0){
                    $count ++;
                    if(($count) >= $position_start_get && ($count) <= $position_end_get){
                        //  Create JSONObject
                        $jsonobject = array( 

                                    User_enum::ID                => $value['_id']->{'$id'},
                                    User_enum::FULL_NAME         => $value['full_name'],
                                    User_enum::EMAIL             => $value['email'],        
                                    User_enum::PHONE_NUMBER      => $value['phone_number'],
                                    User_enum::ADDRESS           => $value['address'],
                                    User_enum::LOCATION          => $value['location'],
                                    User_enum::AVATAR            => $value['avatar'],
                                    User_enum::IS_DELETE         => $value['is_delete'],
                                    User_enum::DESC              => $value['desc'],
                                    User_enum::ROLE_LIST         => $value['role_list'],
                                    Common_enum::UPDATED_DATE    => $value['updated_date'],
                                    Common_enum::CREATED_DATE    => $value['created_date']

                                   );
                        $results[] = $jsonobject;
                    }
                }
            }
        }
        $data =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
               'Total'      =>  sizeof($results),
               'Results'    =>$results
        );
        return $data;
    }
    
    /**
     * API Get all User
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_all_user($limit, $page) {
        if(!is_numeric($limit)){
            $get_limit = $this->common_apis->get_config_page_by_key_code($limit);
            if(is_array($get_limit) && sizeof($get_limit)>0){
                $limit = (sizeof($get_limit[Common_enum::RESULTS]) > 0)? $get_limit[Common_enum::RESULTS][0][Config_page_enum::LIMIT] : 1;
            }
        }
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        //  Get collection 
        $get_collection = $this->user_model->getAllUser();
        
        $error = $this->user_model->getError();
//        echo $error;
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){

                    if($value['is_delete'] == 0){
                        $count ++;
                        if(($count) >= $position_start_get && ($count) <= $position_end_get){
                            //  Create JSONObject
                            $jsonobject = array( 

                                        User_enum::ID                => $value['_id']->{'$id'},
                                        User_enum::FULL_NAME         => $value['full_name'],
                                        User_enum::EMAIL             => $value['email'],        
                                        User_enum::PHONE_NUMBER      => $value['phone_number'],
                                        User_enum::ADDRESS           => $value['address'],
                                        User_enum::LOCATION          => $value['location'],
                                        User_enum::AVATAR            => $value['avatar'],
                                        User_enum::POINT             => $value['point'],
                                        User_enum::IS_DELETE         => $value['is_delete'],
                                        User_enum::DESC              => $value['desc'],
                                        User_enum::POINT             => $value['point'],
                                        User_enum::ROLE_LIST         => $value['role_list'],
                                        Common_enum::UPDATED_DATE    => $value['updated_date'],
                                        Common_enum::CREATED_DATE    => $value['created_date']

                                       );
                            $results[] = $jsonobject;
                        }
                    }
                }
            }
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
        
    }
    
    /**
     * API Get User by Id
     * 
     * Menthod: GET
     * 
     * @param String $id
     * 
     * Response: JSONObject
     * 
     */
    public function get_user_by_id($id) {
        
        //  Get param from client
//        $id = $this->get('id');
        
        //  Get collection 
        $get_collection = $this->user_model->getUserById($id);
        
        $error = $this->user_model->getError();
//        echo $error;
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){

                    if($value['is_delete'] == 0){
                        $count ++;
                        //  Create JSONObject
                        $jsonobject = array( 

                                    User_enum::ID                => $value['_id']->{'$id'},
                                    User_enum::FULL_NAME         => $value['full_name'],
                                    User_enum::EMAIL             => $value['email'],        
                                    User_enum::PHONE_NUMBER      => $value['phone_number'],
                                    User_enum::ADDRESS           => $value['address'],
                                    User_enum::LOCATION          => $value['location'],
                                    User_enum::AVATAR            => $value['avatar'],
                                    User_enum::POINT             => $value['point'],
                                    User_enum::ROLE_LIST         => $value['role_list'],
                                    User_enum::DESC              => $value['desc'],
                                    User_enum::POINT             => $value['point'],
                                    User_enum::IS_DELETE         => $value['is_delete'],
                                    Common_enum::UPDATED_DATE    => $value['updated_date'],
                                    Common_enum::CREATED_DATE    => $value['created_date']

                                   );
                        $results[] = $jsonobject;
                    }
                }
            }
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
        
    }
    
    /**
     * API Check permission a user
     * 
     * Menthod: POST
     * 
     * @param String $id_user
     * 
     * Response: JSONObject
     * 
     */
    public function check_permission_user($id_user) {
        //  Get param from client
//        $id_user = $this->post('id_user');
        $array_user = $this->user_model->getUserById($id_user);
        $user = $array_user[$id_user];
//        var_dump($user[User_enum::ROLE_LIST]);
        foreach ($user[User_enum::ROLE_LIST] as $value) {
//            var_dump($value); 
            $array_role = $this->user_model->getRoleById($value);
//            var_dump($array_role);  
            if($array_role != null){
                $role = $array_role[$value];
                $function_list = $role['function_list'];    // id of function
                foreach ($function_list as $p => $id_function) {
                    $function_list[$p]= new MongoId($id_function);
                }
                $where = array(Common_enum::_ID => array('$in' => $function_list) );
    //            var_dump($function_list);
                $check = $this->common_model->checkExistValue(Function_enum::COLLECTION_FUNCTION, $where);
                if($check == TRUE){
                    $data =  array(
                           'Status'     =>  Common_enum::MESSAGE_RESPONSE_TRUE,
                           'Error'      =>''
                    );
                    return $data;
                }
            }
        }
        $data =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
               'Error'      =>''
        );
        return $data;
    }
    
    /**
     * Get Active Members
     * 
     * Menthod: GET
     * 
     * @param int $limit
     * @param int $page
     * 
     * Response: JSONObject
     **/
    public function get_active_members($limit, $page) {
        if(!is_numeric($limit)){
            $get_limit = $this->common_apis->get_config_page_by_key_code($limit);
            if(is_array($get_limit) && sizeof($get_limit)>0){
                $limit = (sizeof($get_limit[Common_enum::RESULTS]) > 0)? $get_limit[Common_enum::RESULTS][0][Config_page_enum::LIMIT] : 1;
            }
        }
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        //  Get collection 
        $get_collection = $this->user_model->getAllUser();
        $results = array();
        $count = 0;
        if(is_array($get_collection)){
            foreach ($get_collection as $value) {
                $number_assessment = $this->user_model->countUserLogByAction(array ( 
                                                                                User_log_enum::ID_USER => $value['_id']->{'$id'}, 
                                                                                User_log_enum::ACTION        => Common_enum::ASSESSMENT_RESTAURANT
                                                                                ));
                if($number_assessment>=Common_enum::LEVEL_ACTIVE_MEMBERS){
                    $count ++;
                    if(($count) >= $position_start_get && ($count) <= $position_end_get){
                        //  Create JSONObject Restaurant
                        $jsonobject = array( 
                                            User_enum::FULL_NAME => $value['full_name'],
                                            User_enum::AVATAR => $value['avatar'],
                                            User_enum::NUMBER_ASSESSMENT => $number_assessment
                                            );
                        $results [] = $jsonobject;
                    }
                }
            }
        }
        //  Response
        $data =  array(
               'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
               'Total'      =>sizeof($results),
               'Results'    =>$results
        );
        return $data;
    }
    
    /**
     * API Update User
     * 
     * Menthod: POST
     * 
     * @param String $action:  insert | edit | delete
     * @param String $full_name
     * @param String $email
     * @param MD5    $password
     * @param String $phone_number
     * @param String $address
     * @param String $location
     * @param String $avatar
     * @param String $created_date
     * @param String $role_list
     * @param String $created_date
     * 
     * Response: JSONObject
     * 
     **/
    public function update_user($action, $id=null, $full_name=null, $email=null,
                                $password=null, $phone_number=null, $address=null,
                                $location=null, $avatar=null, $desc=null, $point=null,
                                $delete=null, $role_list=null,
                                $created_date=null, $updated_date=null
                                ) {
        
        //  Get param from client
//        $action         = $this->post('action');
//        $id             = $this->post('id');
//        $full_name      = $this->post('full_name');
//        $email          = $this->post('email');
//        $password       = $this->post('password');
//        $phone_number   = $this->post('phone_number');
//        $address        = $this->post('address');
//        $location       = $this->post('location');
//        $avatar         = $this->post('avatar');
//        $desc           = $this->post('desc');
//        $point          = $this->post('point');
//        $delete         = $this->post('delete');
//        $created_date   = $this->post('created_date');
//        $updated_date   = $this->post('updated_date');
        
//        $role_list      = $this->post('role_list');// 527b512b3fce119ed62d8599, 527b512b3fce119ed62d8599
        
        $file_temp = Common_enum::ROOT.Common_enum::PATH_TEMP;
        $path_avatar = Common_enum::ROOT.Common_enum::DIR_USER_PROFILE;
        
        (int)$is_insert = strcmp( strtolower($action), Common_enum::INSERT );
        (int)$is_edit = strcmp( strtolower($action), Common_enum::EDIT );
        (int)$is_delete = strcmp( strtolower($action), Common_enum::DELETE );
        
        if($is_insert == 0){
            if($avatar == null){
                $avatar = Common_enum::DEFAULT_AVATAR;
            }
            else{
                //  Create directory $path
                $this->common_model->createDirectory($path_avatar, Common_enum::WINDOWN);
                if(file_exists($file_temp)){
                    $move_file_avatar = $this->common_model->moveFileToDirectory($file_temp.$avatar, $path_avatar.$avatar);
                    if(!$move_file_avatar){
                        $this->common_model->setError('Move file avatar '.$move_file_avatar);
                    }
                }
            }
        }
        else if($is_edit == 0){
            
            $new_old_avatar = explode(Common_enum::MARK, $avatar);
            
            $new_avatar = $new_old_avatar[0];
            $old_avatar = $new_old_avatar[1];
            
            $file_new_avatar = $path_avatar.$new_avatar;
            $file_old_avatar = $path_avatar.$old_avatar;
            
            if(!file_exists($file_new_avatar)){
                unlink($file_old_avatar);
                $move_file_avatar = $this->common_model->moveFileToDirectory($file_temp.$new_avatar, $file_new_avatar);
                if(!$move_file_avatar){
                    $this->common_model->setError('Move file avatar '.$move_file_avatar);
                }
                $avatar = $new_avatar;
            }
            else{
                $avatar = $old_avatar;
            }
        }
        $array_value = ($is_delete != 0) ? 
                array(
                        User_enum::FULL_NAME         => $full_name,
                        User_enum::EMAIL             => $email,        
                        User_enum::PASSWORD          => $password,
                        User_enum::PHONE_NUMBER      => $phone_number,
                        User_enum::ADDRESS           => ($address == null)? '' : $address,
                        User_enum::LOCATION          => ($location == null)? '' : $location,
                        User_enum::AVATAR            => $avatar,
                        User_enum::DESC              => $desc,
                        User_enum::POINT             => ($is_insert == 0)? 0 : null,
                        User_enum::IS_DELETE         => ($delete == null) ? 0 : $delete,
                        User_enum::ROLE_LIST         => ($role_list == null) ? array(User_enum::DEFAULT_ROLE_LIST) : explode(Common_enum::MARK, $role_list),
                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE    => ($created_date == null) ? $this->common_model->getCurrentDate(): $created_date
                ) : array();
        
        if( isset($array_value['password']) && $array_value['password'] == null ){
            unset($array_value['password']);
        }
        if($is_insert != 0){
            unset($array_value[User_enum::POINT]);
        }
        else if($is_edit == 0){
            unset($array_value[Common_enum::CREATED_DATE]);
            unset($array_value[Common_enum::CREATED_DATE]);
        }
//        var_dump($array_value);
        $this->user_model->updateUser($action, $id, $array_value);
        $error = $this->user_model->getError();
        
        if( $is_delete!=0 && $error == null && isset($array_value[Common_enum::_ID])){
            $data = $this->get_user_by_id($array_value[Common_enum::_ID]->{'$id'});
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs User Log                                     //
    //                                                    //
    //----------------------------------------------------//
//    public function update_user_log_post() {
//        //  Get param from client
//        $id_user        = $this->post('id_user');
//        $id_restaurant  = $this->post('id_restaurant');
//        $id_assessment  = $this->post('id_assessment');
//        $id_comment     = $this->post('id_comment');
//        $id_post        = $this->post('id_post');
//        $action         = $this->post('action');
//        $desc           = $this->post('desc');
//        $created_date   = $this->post('created_date');
//        $updated_date   = $this->post('updated_date');
//        
//        $array_value = array(
//            
//                        User_log_enum::ID_USER              => $id_user,
//                        User_log_enum::ID_RESTAURANT        => $id_restaurant,        
//                        User_log_enum::ID_ASSESSMENT        => $id_assessment,
//                        User_log_enum::ID_COMMENT           => $id_comment,
//                        User_log_enum::ID_POST              => $id_post,
//                        User_log_enum::ACTION               => $action,
//                        User_log_enum::DESC                 => $desc,
//                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
//                        Common_enum::CREATED_DATE    => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
//                
//                );
//        
//        $this->user_model->updateUserLog($action, null/*id*/, $array_value);
//        $error = $this->user_model->getError();
//        
//        if($error == null){
//            $data =  array(
//                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
//                   'Error'      =>$error
//            );
//            $this->response($data);
//        }
//        else{
//            $data =  array(
//                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
//                   'Error'      =>$error
//            );
//            $this->response($data);
//        }
//        
//    }
    
    /**
     * 
     * Like for Restaurant
     * 
     * Menthod: POST
     * 
     * @param String $id_user
     * @param String $id_restaurant
     * 
     * Response: JSONObject
     * 
     */
    public function like_restaurant($id_user, $id_restaurant, $created_date=null,
                                    $updated_date=null
            ) {
        //  Get param from client
//        $id_user        = $this->post('id_user');
//        $id_restaurant  = $this->post('id_restaurant');
//        $created_date   = $this->post('created_date');
//        $updated_date   = $this->post('updated_date');
        
        if($id_user == null || $id_restaurant == null){return;}
        
        $array_value = array(
                        User_log_enum::ID_USER              => $id_user,
                        User_log_enum::ID_RESTAURANT        => $id_restaurant,        
                        User_log_enum::ID_ASSESSMENT        => null,
                        User_log_enum::ID_COMMENT           => null,
                        User_log_enum::ID_POST              => null,
                        User_log_enum::ACTION               => Common_enum::LIKE_RESTAURANT,
                        User_log_enum::DESC                 => 'Like for a restaurant',
                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE    => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
        
        $this->user_model->updateUserLog(Common_enum::INSERT, Common_enum::LIKE, $array_value);
        $error = $this->user_model->getError();
        
        if($error == null){
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * 
     * Share for Restaurant
     * 
     * Menthod: POST
     * 
     * @param String $id_user
     * @param String $id_restaurant
     * 
     * Response: JSONObject
     * 
     */
    public function share_restaurant($id_user, $id_restaurant, 
                                    $created_date=null, $updated_date=null
                                    ) {
        //  Get param from client
//        $id_user        = $this->post('id_user');
//        $id_restaurant  = $this->post('id_restaurant');
//        $created_date   = $this->post('created_date');
//        $updated_date   = $this->post('updated_date');
        
        if($id_user == null || $id_restaurant == null){return;}
        
        $array_value = array(
                        User_log_enum::ID_USER              => $id_user,
                        User_log_enum::ID_RESTAURANT        => $id_restaurant,        
                        User_log_enum::ID_ASSESSMENT        => null,
                        User_log_enum::ID_COMMENT           => null,
                        User_log_enum::ID_POST              => null,
                        User_log_enum::ACTION               => Common_enum::SHARE_RESTAURANT,
                        User_log_enum::DESC                 => 'Share for a restaurant',
                        Common_enum::UPDATED_DATE           => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE           => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
                );
        
        $this->user_model->updateUserLog(Common_enum::INSERT, Common_enum::SHARE, $array_value);
        $error = $this->user_model->getError();
        if($error == null){
            $this->common_model->editSpecialField(User_enum::COLLECTION_USER, $id_user, array('$inc' => array(User_enum::POINT => List_point_enum::SHARE) ) );
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * 
     * Like for assessment
     * 
     * Menthod: POST
     * 
     * @param String $id_user
     * @param String $id_assessment
     * 
     * Response: JSONObject
     * 
     */
    public function like_assessment($id_user, $id_assessment, $created_date=null,
                                    $updated_date=null
            ) {
        
        if($id_user == null || $id_assessment == null){return;}
        
        $array_value = array(
                        User_log_enum::ID_USER              => $id_user,
                        User_log_enum::ID_RESTAURANT        => null,        
                        User_log_enum::ID_ASSESSMENT        => $id_assessment,
                        User_log_enum::ID_COMMENT           => null,
                        User_log_enum::ID_POST              => null,
                        User_log_enum::ACTION               => Common_enum::LIKE_ASSESSMENT,
                        User_log_enum::DESC                 => Common_enum::LIKE_ASSESSMENT,
                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE    => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
        
        $this->user_model->updateUserLog(Common_enum::INSERT, Common_enum::LIKE, $array_value);
        $error = $this->user_model->getError();
        
        if($error == null){
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * 
     * Like for comment
     * 
     * Menthod: POST
     * 
     * @param String $id_user
     * @param String $id_comment
     * 
     * Response: JSONObject
     * 
     */
    public function like_comment($id_user, $id_comment, $created_date=null,
                                    $updated_date=null
            ) {
        
        if($id_user == null || $id_comment == null){return;}
        
        $array_value = array(
                        User_log_enum::ID_USER              => $id_user,
                        User_log_enum::ID_RESTAURANT        => null,        
                        User_log_enum::ID_ASSESSMENT        => null,
                        User_log_enum::ID_COMMENT           => $id_comment,
                        User_log_enum::ID_POST              => null,
                        User_log_enum::ACTION               => Common_enum::LIKE_COMMENT,
                        User_log_enum::DESC                 => Common_enum::LIKE_COMMENT,
                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE    => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
        
        $this->user_model->updateUserLog(Common_enum::INSERT, Common_enum::LIKE, $array_value);
        $error = $this->user_model->getError();
        
        if($error == null){
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * 
     * Login
     * 
     * @param String $email
     * @param MD5 $password
     * 
     * Response: JSONObject
     * 
     */
    public function login($email, $password) {
        //  Get param from client
//        $email      = $this->post('email');
//        $password   = $this->post('password');
        $user = $this->user_model->login($email, $password);
        $results= array();
        if(is_array($user)){
            foreach ($user as $value) {
                $results[] = array( 
                            Common_enum::ID              => $value['_id']->{'$id'},
                            User_enum::FULL_NAME         => $value['full_name'],
                            User_enum::EMAIL             => $value['email'],        
                            User_enum::PHONE_NUMBER      => $value['phone_number'],
                            User_enum::ADDRESS           => $value['address'],
                            User_enum::LOCATION          => $value['location'],
                            User_enum::POINT             => $value['point'],
                            User_enum::AVATAR            => $value['avatar'],
                            User_enum::ROLE_LIST         => $value['role_list'],
                            Common_enum::UPDATED_DATE    => $value['updated_date'],
                            Common_enum::CREATED_DATE    => $value['created_date']
                );
            }
        }
//        var_dump($results);
        if(!is_array($results) || sizeof($results) == 0){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'    =>'Login fail'
            );
            return $data;
        }
        else{
            $this->user_model->updateUserLog(Common_enum::INSERT, null, 
                                                array(
                                                    User_log_enum::ID_USER              => $value['_id']->{'$id'},
                                                    User_log_enum::ID_RESTAURANT        => '',        
                                                    User_log_enum::ID_ASSESSMENT        => '',
                                                    User_log_enum::ID_COMMENT           => '',
                                                    User_log_enum::ID_POST              => '',
                                                    User_log_enum::ACTION               => Common_enum::LOGIN,
                                                    User_log_enum::DESC                 => Common_enum::LOGIN,
                                                    Common_enum::CREATED_DATE           => $this->common_model->getCurrentDate()
                                                )
                                            );
            $result = $results[0];
            $this->common_model->editSpecialField(User_enum::COLLECTION_USER, $result['id'], array('$inc' => array(User_enum::POINT => List_point_enum::LOGIN) ) );
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            return $data;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Role                                         //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API All Get Role
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_all_role() {
        
        //  Get collection 
        $get_collection = $this->user_model->getAllRole();
        
        $error = $this->user_model->getError();
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $count ++;
                    //  Create JSONObject
                    $jsonobject = array( 

                                Role_enum::ID                    => $value['_id']->{'$id'},
                                Role_enum::NAME                  => $value['name'],
                                Role_enum::DESC                  => $value['desc'],        
                                Role_enum::FUNCTION_LIST         => $value['function_list'],
                                Common_enum::UPDATED_DATE    => $value['updated_date'],
                                Common_enum::CREATED_DATE    => $value['created_date']

                               );
                    $results[] = $jsonobject;
                }
            }
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>$count,
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * API All Get Role
     * 
     * Menthod: GET
     * 
     * @param String $id
     * 
     * Response: JSONObject
     * 
     */
    public function get_role_by_id($id) {
        
        //  Get param from client
//        $id = $this->get('id');
        
        //  Get collection 
        $get_collection = $this->user_model->getRoleById($id);
        
        $error = $this->user_model->getError();
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $count ++;
                    //  Create JSONObject
                    $jsonobject = array( 

                                Role_enum::ID                    => $value['_id']->{'$id'},
                                Role_enum::NAME                  => $value['name'],
                                Role_enum::DESC                  => $value['desc'],        
                                Role_enum::FUNCTION_LIST         => $value['function_list'],
                                Common_enum::UPDATED_DATE        => $value['updated_date'],
                                Common_enum::CREATED_DATE        => $value['created_date']

                               );
                    $results[] = $jsonobject;
                }
            }
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>$count,
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * API Update Role
     * 
     * Menthod: POST
     * 
     * @param String $action
     * @param String $id
     * @param String $name
     * @param String $desc
     * @param String $function_list id_function_1,id_function_2,...id_function_n
     * @param String $created_date
     * 
     * Response: JSONObject
     * 
     **/
    public function update_role($action, $id=null, $name, $desc=null, $function_list, 
                                $created_date=null, $updated_date=null
                                ) {
        //  Get param from client
//        $action             = $this->post('action');
//        $id                 = $this->post('id');
//        $name               = $this->post('name');
//        $desc               = $this->post('desc');
//        $function_list      = $this->post('function_list');
//        $created_date       = $this->post('created_date');
//        $updated_date       = $this->post('updated_date');
        
        $array_value = array(
                        Role_enum::NAME              => $name,
                        Role_enum::DESC              => $desc,        
                        Role_enum::FUNCTION_LIST     => explode(Common_enum::MARK, $function_list),
                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE    => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                
                );
        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        if($is_edit == TRUE){
            unset($array_value[Common_enum::CREATED_DATE]);
        }
        $this->user_model->updateRole($action, $id, $array_value);
        $error = $this->user_model->getError();
        
        if($error == null){
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Function                                     //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API All Get Function
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_all_function() {
        
        //  Get collection 
        $get_collection = $this->user_model->getAllFunction();
        
        $error = $this->user_model->getError();
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $count ++;
                    //  Create JSONObject
                    $jsonobject = array( 
                                Function_enum::ID                    => $value['_id']->{'$id'},
                                Function_enum::NAME                  => $value['name'],
                                Function_enum::CODE                  => $value['code'],        
                                Function_enum::DESC                  => $value['desc'],        
                                Common_enum::UPDATED_DATE    => $value['updated_date'],
                                Common_enum::CREATED_DATE    => $value['created_date']
                               );
                    $results[] = $jsonobject;
                }
            }
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>$count,
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * API Get function by id
     * 
     * Menthod: GET
     * 
     * @param String $id
     * 
     * Response: JSONObject
     * 
     */
    public function get_function_by_id($id) {
        
        //  Get param from client
//        $id = $this->get('id');
        
        //  Get collection 
        $get_collection = $this->user_model->getFunctionById($id);
        
        $error = $this->user_model->getError();
        if($error == null){
        
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $count ++;
                    //  Create JSONObject
                    $jsonobject = array( 

                                Function_enum::ID                    => $value['_id']->{'$id'},
                                Function_enum::NAME                  => $value['name'],
                                Function_enum::CODE                  => $value['code'],        
                                Function_enum::DESC                  => $value['desc'],        
                                Common_enum::UPDATED_DATE    => $value['updated_date'],
                                Common_enum::CREATED_DATE    => $value['created_date']

                               );
                    $results[] = $jsonobject;
                }
            }
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>$count,
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * API Update Function
     * 
     * Menthod: POST
     * 
     * @param String $action
     * @param String $id
     * @param String $name
     * @param String $desc
     * @param String $created_date
     * 
     * Response: JSONObject
     * 
     **/
    public function update_function($action, $id=null, $name, $code, $desc=null, 
                                    $created_date=null, $updated_date=null
                                    ) {
        
        //  Get param from client
//        $action             = $this->post('action');
//        $id                 = $this->post('id');
//        $name               = $this->post('name');
//        $code               = $this->post('code');
//        $desc               = $this->post('desc');
//        $created_date       = $this->post('created_date');
//        $updated_date       = $this->post('updated_date');
        $array_value = array(
                        Function_enum::NAME              => $name,
                        Function_enum::CODE              => $code,
                        Function_enum::DESC              => $desc,        
                        Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                        Common_enum::CREATED_DATE    => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        if($is_edit == TRUE){
            unset($array_value[Common_enum::CREATED_DATE]);
        }
        $this->user_model->updateFunction($action, $id, $array_value);
        $error = $this->user_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    
    
}
