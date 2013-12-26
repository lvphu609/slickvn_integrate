<?php


/**
 * 
 * This class support APIs Common for client
 * 
 */
class Common_apis extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        //  Load model COMMON
        $this->load->model('common/common_model');
        $this->load->model('common/common_enum');
        
        $this->load->model('common/info_website_enum');
        $this->load->model('common/communications_enum');
        
        $this->load->model('common/card_enum');
        $this->load->model('common/information_inquiry_enum');
        $this->load->model('common/member_card_enum');
        $this->load->model('common/my_favourites_enum');
        $this->load->model('common/quote_enum');
        $this->load->model('common/list_point_enum');
        $this->load->model('common/city_enum');
        $this->load->model('common/district_enum');
        $this->load->model('common/email_config_enum');
        $this->load->model('common/config_page_enum');
        
    }
    //----------------------------------------------------//
    //                                                    //
    //  APIs Common                                       //
    //                                                    //
    //----------------------------------------------------//
    
//    public function upload_image_post() {
//        
//        //  Get param from client
//        $type           = $this->post('type');
//        $name_retaurant = $this->post('name_retaurant');
//        
//        $this->common_model->uploadImage($type, $name_retaurant);
//        $error = $this->common_model->getError();
//        
//        if($error == null){
//            $data =  array(
//                   'Status'     =>'SUCCESSFUL',
//                   'Error'      =>$error
//            );
//            $this->response($data);
//        }
//        else{
//            $data =  array(
//                   'Status'     =>'FALSE',
//                   'Error'      =>$error
//            );
//            $this->response($data);
//        }
//        
//    }
    
    /**
     * 
     * Check permisstion of user
     * 
     * @param arry $
     * 
     * @return boolean
     * 
     **/
//    public function check_permisstion_post() {
//        
//        //  Get param from client
//        $collection_name = $this->post('collection_name');
//        $field           = $this->post('field');
//        $value           = $this->post('value');
//        
//        
//        
//        if($collection_name != null && $field != null && $value != null){
//            
//            $result = $this->common_model->checkExistValue($collection_name, array($field => $value) );
//            
//            $data =  array(
//                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
//                   'Result'      =>$result
//            );
//            $this->response($data);
//            
//        }
//        else{
//            $data =  array(
//                   'Status'     =>Common_enum::MESSAGE_RESPONSE_FALSE,
//                   'Error'      =>'Param is null'
//            );
//            $this->response($data);
//        }
//        
//    }
    
    /**
     * 
     * Check Exist Value in a collecstion by $field => $value
     * 
     * @param String $collection_name
     * @param String $field
     * @param String $value
     * 
     * @return boolean
     * 
     **/
//    public function check_exist_value_post() {
//        
//        //  Get param from client
//        $collection_name = $this->post('collection_name');
//        $field           = $this->post('field');
//        $value           = $this->post('value');
//        
//        
//        
//        if($collection_name != null && $field != null && $value != null){
//            
//            $result = $this->common_model->checkExistValue($collection_name, array($field => $value) );
//            
//            $data =  array(
//                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
//                   'Result'      =>$result
//            );
//            $this->response($data);
//            
//        }
//        else{
//            $data =  array(
//                   'Status'     =>Common_enum::MESSAGE_RESPONSE_FALSE,
//                   'Error'      =>'Param is null'
//            );
//            $this->response($data);
//        }
//        
//    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Infor Website                                //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Info website
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_info_website() {
        $collection = Info_website_enum::COLLECTION_INFO_WEBSITE;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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
                                Info_website_enum::ID                   => $value['_id']->{'$id'},
                                Info_website_enum::SECURITY_POLICIES    => $value['security_policies'],
                                Info_website_enum::TERMS_OF_USE         => $value['terms_of_use'],
                                Info_website_enum::CAREER_OPPORTUNITIES => $value['career_opportunities'],
                                Common_enum::UPDATED_DATE               => $value['updated_date'],
                                Common_enum::CREATED_DATE               => $value['created_date']
                               );
                    $results[] = $jsonobject;
                }
            }
            
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>$count,
                   'Results'    =>$results
            );
            return $data;
            
        }else{
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * 
     * Update Collection Info website
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_info_website_post($action, $id=null, $security_policies=null,
                                             $terms_of_use=null, $career_opportunities=null,
                                             $updated_date=null, $created_date=null
                                            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        $security_policies          = $this->post('security_policies');
//        $terms_of_use               = $this->post('terms_of_use');
//        $career_opportunities       = $this->post('career_opportunities');
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        
        $array_value = array(
                        Info_website_enum::SECURITY_POLICIES    => $security_policies,
                        Info_website_enum::TERMS_OF_USE         => $terms_of_use,
                        Info_website_enum::CAREER_OPPORTUNITIES => $career_opportunities,
                        Common_enum::UPDATED_DATE               => ($updated_date == null ) ? $this->common_model->getCurrentDate(): $updated_date,
                        Common_enum::CREATED_DATE               => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Info_website_enum::COLLECTION_INFO_WEBSITE, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Communications                                //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Communications
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_communications() {
        $collection = Communications_enum::COLLECTION_COMMUNICATIONS;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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
                                Communications_enum::ID             => $value['_id']->{'$id'},
                                Communications_enum::TITLE          => $value['title'],
                                Communications_enum::CONTENT        => $value['content'],
                                Communications_enum::FULL_NAME      => $value['full_name'],
                                Communications_enum::EMAIL          => $value['email'],
                                Communications_enum::PHONE          => $value['phone'],
                                Common_enum::UPDATED_DATE           => $value['updated_date'],
                                Common_enum::CREATED_DATE           => $value['created_date']
                               );
                    $results[] = $jsonobject;
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
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    /**
     * 
     * Update Collection Communications
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_communications($action, $id=null,
            $title=null, $content=null, $full_name=null,
            $email=null, $phone=null, $updated_date=null,
            $created_date=null
            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        $title                      = $this->post('title');
//        $content                    = $this->post('content');
//        $full_name                  = $this->post('full_name');
//        $email                      = $this->post('email');
//        $phone                      = $this->post('phone');
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        Communications_enum::TITLE          => $title,
                        Communications_enum::CONTENT        => $content,
                        Communications_enum::FULL_NAME      => $full_name,
                        Communications_enum::EMAIL          => $email,
                        Communications_enum::PHONE          => $phone,
                        Common_enum::UPDATED_DATE           => ($updated_date == null ) ? $this->common_model->getCurrentDate(): $updated_date,
                        Common_enum::CREATED_DATE           => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Info_website_enum::COLLECTION_INFO_WEBSITE, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Error'      =>$error
            );
            return $data;
        }
        else{
            $data =  array(
                   'Status'     =>Common_enum::MESSAGE_RESPONSE_FALSE,
                   'Error'      =>$error
            );
            return $data;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Quote                                        //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Quote
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_quote() {
        
        $collection = Quote_enum::COLLECTION_QUOTE;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        //  TODO

                        );

                    $results[] = $jsonobject;
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
     * 
     * Update Collection Quote
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_quote($action=null, $id=null, 
                                $updated_date=null, $created_date=null
                                ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        
//        //  param
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        //  TODO
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Quote_enum::COLLECTION_QUOTE, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Information Inquiry                          //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Information Inquiry
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_information_inquiry() {
        
        $collection = Information_inquiry_enum::COLLECTION_INFORMATION_INQUIRY;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        Information_inquiry_enum::ID => $value['_id']->{'$id'},
                        Information_inquiry_enum::QUESTION => $value['question'],
                        Information_inquiry_enum::ANSWER => $value['answer'],
                        Common_enum::UPDATED_DATE => $value['updated_date'],
                        Common_enum::CREATED_DATE => $value['created_date']

                        );

                    $results[] = $jsonobject;
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
     * 
     * Update Collection Quote
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_information_inquiry($action=null, $id=null, $question=null,
                                                $answer=null, $updated_date=null, 
                                                $created_date=null
            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        $question                   = $this->post('question');
//        $answer                     = $this->post('answer');
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        Information_inquiry_enum::QUESTION  => $question,
                        Information_inquiry_enum::ANSWER    => $answer,
                        Common_enum::UPDATED_DATE           => ($updated_date == null ) ? $this->common_model->getCurrentDate(): $updated_date,
                        Common_enum::CREATED_DATE           => ($created_date == null ) ? $this->common_model->getCurrentDate(): $created_date
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Information_inquiry_enum::COLLECTION_INFORMATION_INQUIRY, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Card Slickvn                                 //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Card
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_card() {
        
        $collection = Card_enum::COLLECTION_CARD;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        //  TODO

                        );

                    $results[] = $jsonobject;
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
     * 
     * Update Collection Card
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_card($action=null, $id=null,
                                $updated_date=null, $created_date=null
            ){
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        //  param
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        //  TODO
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Card_enum::COLLECTION_CARD, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Member Card                                  //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Member Card
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_member_card() {
        
        $collection = Member_card_enum::COLLECTION_MEMBER_CARD;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        //  TODO

                        );

                    $results[] = $jsonobject;
                }
            }
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
     * 
     * Update Collection Member Card
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_member_card($action=null, $id=null,
                                        $updated_date=null, $created_date=null
            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        //  param
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        //  TODO
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Member_card_enum::COLLECTION_MEMBER_CARD, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs My Favourite                                 //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection My Favourite
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_my_favourite() {
        
        $collection = My_favourites_enum::COLLECTION_MY_FAVOURITES;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        //  TODO

                        );

                    $results[] = $jsonobject;
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
     * 
     * Update Collection My Favourite
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_my_favourite($action=null, $id=null,
                                        $updated_date=null, $created_date=null
            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        //  param
//        $updated_date                = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        //  TODO
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(My_favourites_enum::COLLECTION_MY_FAVOURITES, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Booking                                      //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Booking
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_booking() {
        
        $collection = Booking_enum::COLLECTION_BOOKING_ENUM;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        //  TODO

                        );

                    $results[] = $jsonobject;
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
     * 
     * Update Collection Booking
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_booking($action=null, $id=null,
                                    $updated_date=null, $created_date=null
            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        //  param
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        //  TODO
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Booking_enum::COLLECTION_BOOKING_ENUM, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Introduce                                    //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Collection Introduce
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     * 
     */
    public function get_introduce() {
        
        $collection = Introduce_enum::COLLECTION_INTRODUCE;
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
        $error = $this->common_model->getError();
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

                        //  TODO

                        );

                    $results[] = $jsonobject;
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
     * 
     * Update Collection Introduce
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     * 
     */
    public function update_introduce($action=null, $id=null,
                                     $updated_date=null, $created_date=null
            ) {
        //  Get param from client
//        $action                     = $this->post('action');
//        $id                         = $this->post('id');
//        //  param
//        $updated_date               = $this->post('updated_date');
//        $created_date               = $this->post('created_date');
        $array_value = array(
                        //  TODO
                );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateCollection(Introduce_enum::COLLECTION_INTRODUCE, $action, $id, $array_value);
        $error = $this->common_model->getError();
        if($error == null){
            $data =  array(
                   'Status'     => Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
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
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Base                                         //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API Get Collection Base
     * 
     * Menthod: GET
     * 
     * @param String $collection_name
     * 
     * Response: JSONObject
     * 
     */
    public function get_base_collection($collection) {
        //  Get param from client
//        $collection = $this->get('collection_name');
        //  Get collection 
        $get_collection = $this->common_model->getCollection($collection);
//        $error = $this->common_model->getError();
//        if($error == null){
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $count ++;
                    //  Create JSONObject
                    $jsonobject = array( 
                                Common_enum::ID              => $value['_id']->{'$id'},
                                Common_enum::NAME            => $value['name'],
                                Common_enum::UPDATED_DATE    => $value['updated_date'],
                                Common_enum::CREATED_DATE    => $value['created_date']
                               );
                    $results[] = $jsonobject;
                }
            }
            $data =  array(
                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            return $data;
//        }else{
//            $data =  array(
//                   'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
//                   'Error'      =>$error
//            );
//            return $data;
//        }
    }
    
    /**
     * API Get Collection Base by Id
     * 
     * Menthod: GET
     * 
     * @param String $collection_name
     * @param String $id
     * Response: JSONObject
     * 
     */
    public function get_base_collection_by_id($collection=null, $id=null 
                                                ) {
        //  Get param from client
//        $collection = $this->get('collection_name');
//        $id         = $this->get('id');
        //  Get collection 
        $get_collection = $this->common_model->getCollectionById($collection, $id);
        $error = $this->common_model->getError();
        if($error == null){
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $approval = (isset($value[Common_enum::APPROVAL]))? $value[Common_enum::APPROVAL]:1;
                    if($approval == 1){
                        $count ++;
                        //  Create JSONObject
                        $jsonobject = array( 
                                    Common_enum::ID              => $value['_id']->{'$id'},
                                    Common_enum::NAME            => $value['name'],
                                    Common_enum::UPDATED_DATE    => $value['updated_date'],
                                    Common_enum::CREATED_DATE    => $value['created_date']
                                   );
                        $results[] = $jsonobject;
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
     * 
     * API Update Collection Base
     * 
     * Menthod: POST
     * 
     * @param String $action    insert | edit | delete
     * @param String $collection_name
     * @param String $id
     * @param String $name
     * 
     * Response: JSONObject
     */
    public function update_base_collection($action, $collection=null, $id=null,
                                            $name=null, $approval = null, $updated_date=null, $created_date=null
                                           ){
        //  Get param from client
//        $action         = $this->post('action');
//        $collection     = $this->post('collection_name');
//        $id             = $this->post('id');
//        $name           = $this->post('name');
//        $updated_date   = $this->post('updated_date');
        $created_date   = $this->post('created_date');
        if($name == null){
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
               'Error'      =>'Name is null'
            );
            $this->response($resulte);
            return;
        }
        (int)$is_insert = strcmp( strtolower($action), Common_enum::INSERT );
//        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        (int)$is_delete = strcmp( strtolower($action), Common_enum::DELETE );
        //  Array value
        $array_value = ($is_delete != 0) ? array(
            Common_enum::NAME            => $name,
            Common_enum::APPROVAL        => ($approval==null)?0:1,
            Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
            Common_enum::CREATED_DATE    => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
        ) : array();
        
//        if($is_edit == TRUE){
//            unset($array_value[Common_enum::CREATED_DATE]);
//        }
        $this->common_model->updateBaseCollection($action, $collection, $id, $array_value);
        $error = $this->common_model->getError();
        if( $error == null ){
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
               'Error'      =>$error
            );
            return $resulte;
        }else{
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
               'Error'      =>$error
            );
            return $resulte;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs LIST_POINT                                   //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API Get Collection List Point
     * 
     * Menthod: GET
     * 
     * Response: JSONObject
     */
    public function get_all_list_point() {
        //  Get collection 
        $get_collection = $this->common_model->getCollection(List_point_enum::COLLECTION_LIST_POINT);
        $error = $this->common_model->getError();
        if($error == null){
            //  Array object
            $results = array();
            //  Count object
            $count = 0;
            if(is_array($get_collection)){
                foreach ($get_collection as $value){
                    $is_use = $value['is_use'];
                    if($is_use == 1){
                        $count ++;
                        //  Create JSONObject
                        $jsonobject = array( 
                                    List_point_enum::ID              => $value['_id']->{'$id'},
                                    List_point_enum::POINT            => $value['point'],
                                    List_point_enum::DESC            => $value['desc'],
                                    List_point_enum::KEY_CODE            => $value['key_code'],
                                    Common_enum::UPDATED_DATE    => $value['updated_date'],
                                    Common_enum::CREATED_DATE    => $value['created_date']
                                   );
                        $results[] = $jsonobject;
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
     * API Update Collection List Point
     * 
     * Menthod: POST
     * 
     * Response: JSONObject
     */
    public function update_list_point($action, $id=null, $point=null, $key_code=null,
                                      $desc=null, $is_use=null, $updated_date=null,
                                      $created_date=null
                                     ) {
        //  Get param from client
        $action         = $this->post('action');
        $id             = $this->post('id');
        $point          = $this->post('point');
        $key_code       = $this->post('key_code');
        $desc           = $this->post('desc');
        $is_use         = $this->post('is_use');
        $updated_date   = $this->post('updated_date');
        $created_date   = $this->post('created_date');
        if($point == null || $key_code == null || $desc == null){
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
               'Error'      =>'Param is null'
            );
            return $resulte;
        }
        (int)$is_insert = strcmp( strtolower($action), Common_enum::INSERT );
        (int)$is_edit = strcmp( strtolower($action), Common_enum::EDIT );
        (int)$is_delete = strcmp( strtolower($action), Common_enum::DELETE );
        //  Array value
        $array_value = ($is_delete != 0) ? array(
            List_point_enum::POINT            => (int)$point,
            List_point_enum::KEY_CODE            => $key_code,
            List_point_enum::DESC            => $desc,
            List_point_enum::IS_USE           => ($is_use != null)? $is_use : 1,
            Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
            Common_enum::CREATED_DATE    => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
        ) : array();
        
        if($is_edit == TRUE){
            unset($array_value[Common_enum::CREATED_DATE]);
        }
        
        $this->common_model->updateCollection(List_point_enum::COLLECTION_LIST_POINT, $action, $id, 
                                              $this->common_model->removeElementArrayNull($array_value));
        $error = $this->common_model->getError();
        if( $error == null ){
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
               'Error'      =>$error
            );
            return $resulte;
        }else{
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
               'Error'      =>$error
            );
            return $resulte;
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs city                                         //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API get_all_city
     * 
     * @return  array
     */
    public function get_all_city() {
        //  Get collection 
        $get_collection = $this->common_model->getCollectionSort(City_enum::COLLECTION_CITY);
        $error = $this->common_model->getError();
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
                                City_enum::ID              => $value[Common_enum::_ID]->{'$id'},
                                City_enum::NAME            => $value[City_enum::NAME],
                                City_enum::DESC            => $value[City_enum::DESC],
                                Common_enum::UPDATED_DATE    => $value[Common_enum::UPDATED_DATE],
                                Common_enum::CREATED_DATE    => $value[Common_enum::CREATED_DATE]
                               );
                    $results[] = $jsonobject;
                }
            }
            return $this->common_model->encapsulationDataResponseGet(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                                                                     sizeof($results),
                                                                     $results
                                                                     );
        }else{
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
        }
    }
    
    /**
     * API update_city
     * 
     * @return array
     */
    public function update_city($action, $id=null, $name=null, $desc=null, 
                                $updated_date=null, $created_date=null
                                ) {
        
        $is_insert = $this->common_model->checkAction( $action, Common_enum::INSERT );
        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        $is_delete = $this->common_model->checkAction( $action, Common_enum::DELETE );
        
        if($is_delete == TRUE){
            $remove_child = $this->common_model->removeDocByFile(District_enum::COLLECTION_DISTRICT, array(District_enum::ID_CITY => $id) );
            if($remove_child == TRUE){
                $remove_parent = $this->common_model->removeDocByFile( City_enum::COLLECTION_CITY, array(Common_enum::_ID => MongoId($id)) );
                if($remove_parent == TRUE){
                    return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL, '');
                }
            }
            else{
                $error = $this->common_model->getError();
                return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
            }
        }
        else{
            //  Array value
            $array_value = array(
                City_enum::ID              => $id,
                City_enum::NAME            => $name,
                City_enum::DESC            => $desc,
                Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                Common_enum::CREATED_DATE    => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
            );

            if($is_edit == TRUE){
                unset($array_value[Common_enum::CREATED_DATE]);
            }
            $this->common_model->updateCollection(City_enum::COLLECTION_CITY, $action, $id, $array_value);
            $error = $this->common_model->getError();
            if( $error == null ){
                return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL, $error);
            }else{
                return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
            }
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs district                                     //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * API get_district_by_city
     * 
     * @return  array
     */
    public function get_district_by_city($id_city=null) {
        //  Get collection 
        $get_collection = $this->common_model->getCollectionById(District_enum::COLLECTION_DISTRICT, $id_city);
        $error = $this->common_model->getError();
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
                                District_enum::ID              => $value[Common_enum::_ID]->{'$id'},
                                District_enum::NAME            => $value[City_enum::NAME],
                                District_enum::DESC            => $value[City_enum::DESC],
                                Common_enum::UPDATED_DATE    => $value[Common_enum::UPDATED_DATE],
                                Common_enum::CREATED_DATE    => $value[Common_enum::CREATED_DATE]
                               );
                    $results[] = $jsonobject;
                }
            }
            return $this->common_model->encapsulationDataResponseGet(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
                                                                     sizeof($results),
                                                                     $results
                                                                     );
        }else{
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
        }
    }
    
    /**
     * API update_district
     * 
     * @return array
     */
    public function update_district($action, $id=null, $id_city=null, $name=null, $desc=null, 
                                    $updated_date=null, $created_date=null
                                    ) {
        $is_insert = $this->common_model->checkAction( $action, Common_enum::INSERT );
        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        $is_delete = $this->common_model->checkAction( $action, Common_enum::DELETE );
        if($is_delete == TRUE){
            $remove = $this->common_model->removeDocByFile(District_enum::COLLECTION_DISTRICT, array(Common_enum::_ID => MongoId($id)) );
            if($remove == TRUE){
                return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL, '');
            }
            else{
                $error = $this->common_model->getError();
                return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
            }
        }
        else{
            $array_value = array(
                City_enum::ID              => $id,
                City_enum::NAME            => $name,
                City_enum::DESC            => $desc,
                Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                Common_enum::CREATED_DATE    => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
            );
            if($is_edit == TRUE){
                unset($array_value[Common_enum::CREATED_DATE]);
            }
            $this->common_model->updateCollection(District_enum::COLLECTION_DISTRICT, $action, $id, $array_value);
        }
        $error = $this->common_model->getError();
        if( $error == null ){
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL, $error);
        }else{
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs email_config                                 //
    //                                                    //
    //----------------------------------------------------//
    
    public function get_all_email_config() {
        $results = array();
        $list_email_config = $this->common_model->getCollection(Email_config_enum::COLLECTION_EMAIL_CONFIG);
        if(is_array($list_email_config) && sizeof($list_email_config)){
            foreach ($list_email_config as $value) {
                $doc = array(
                             Email_config_enum::ID => $value[Common_enum::_ID]->{'$id'},
                             Email_config_enum::EMAIL_SOURCE => $value[Email_config_enum::EMAIL_SOURCE],
                             Email_config_enum::PASSWORD => $value[Email_config_enum::PASSWORD],
                             Email_config_enum::PROTOCOL => $value[Email_config_enum::PROTOCOL],
                             Email_config_enum::HOST => $value[Email_config_enum::HOST],
                             Email_config_enum::PORT => $value[Email_config_enum::PORT],
                             Email_config_enum::MAIL_TYPE => $value[Email_config_enum::MAIL_TYPE],
                             Common_enum::CREATED_DATE => $value[Common_enum::CREATED_DATE],
                             Common_enum::UPDATED_DATE => $value[Common_enum::UPDATED_DATE]
                );
                $results[]=$doc;
            }
        }
        return $results;
    }
    
    public function get_email_config_by_id($id) {
        $results = array();
        $list_email_config = $this->common_model->getCollectionById(Email_config_enum::COLLECTION_EMAIL_CONFIG, $id);
        if(is_array($list_email_config) && sizeof($list_email_config)){
            foreach ($list_email_config as $value) {
                $doc = array(
                             Email_config_enum::ID => $value[Common_enum::_ID]->{'$id'},
                             Email_config_enum::EMAIL_SOURCE => $value[Email_config_enum::EMAIL_SOURCE],
                             Email_config_enum::PASSWORD => $value[Email_config_enum::PASSWORD],
                             Email_config_enum::PROTOCOL => $value[Email_config_enum::PROTOCOL],
                             Email_config_enum::HOST => $value[Email_config_enum::HOST],
                             Email_config_enum::PORT => $value[Email_config_enum::PORT],
                             Email_config_enum::MAIL_TYPE => $value[Email_config_enum::MAIL_TYPE],
                             Common_enum::CREATED_DATE => $value[Common_enum::CREATED_DATE],
                             Common_enum::UPDATED_DATE => $value[Common_enum::UPDATED_DATE]
                );
                $results[]=$doc;
            }
        }
        return $results;
    }
    
    public function update_email_config($action, $id = null, $email_source,
                                        $password, $protocol, $host, $port,
                                        $mail_type, $created_date=null, $updated_date=null
                                       ) {
        $is_insert = $this->common_model->checkAction( $action, Common_enum::INSERT );
        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        $is_delete = $this->common_model->checkAction( $action, Common_enum::DELETE );
        
        if($is_delete == TRUE){
            $this->common_model->removeDocByFile(Email_config_enum::COLLECTION_EMAIL_CONFIG, array(Common_enum::_ID => MongoId($id)) );
        }
        else{
            $array_value = array(
                Email_config_enum::ID => $id,
                Email_config_enum::EMAIL_SOURCE => $email_source,
                Email_config_enum::PASSWORD => $password,
                Email_config_enum::PROTOCOL => $protocol,
                Email_config_enum::HOST => $host,
                Email_config_enum::PORT => $port,
                Email_config_enum::MAIL_TYPE => $mail_type,
                Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                Common_enum::CREATED_DATE    => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
            );
            if($is_edit == TRUE){
                unset($array_value[Common_enum::CREATED_DATE]);
            }
            $this->common_model->updateCollection(Email_config_enum::COLLECTION_EMAIL_CONFIG, $action, $id, $array_value);
        }
        $error = $this->common_model->getError();
        if( $error == null ){
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL, $error);
        }else{
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
        }
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs config_page                                  //
    //                                                    //
    //----------------------------------------------------//

    public function get_config_page() {
        $results = array();
        $list_config_page = $this->common_model->getCollection(Config_page_enum::COLLECTION_CONFIG_PAGE);
        if(is_array($list_config_page) && sizeof($list_config_page)){
            foreach ($list_config_page as $value) {
                $doc = array(
                             Config_page_enum::ID => $value[Common_enum::_ID]->{'$id'},
                             Config_page_enum::KEY_CODE => $value[Config_page_enum::KEY_CODE],
                             Config_page_enum::DESC => $value[Config_page_enum::DESC],
                             Config_page_enum::LIMIT => $value[Config_page_enum::LIMIT],
                             Common_enum::CREATED_DATE => $value[Common_enum::CREATED_DATE],
                             Common_enum::UPDATED_DATE => $value[Common_enum::UPDATED_DATE]
                );
                $results[]=$doc;
            }
        }
        return $results;
    }
    
    public function get_config_page_by_id($id) {
        $results = array();
        $list_config_page = $this->common_model->getCollectionById(Config_page_enum::COLLECTION_CONFIG_PAGE, $id);
        if(is_array($list_config_page) && sizeof($list_config_page)){
            foreach ($list_config_page as $value) {
                $doc = array(
                             Config_page_enum::ID => $value[Common_enum::_ID]->{'$id'},
                             Config_page_enum::KEY_CODE => $value[Config_page_enum::KEY_CODE],
                             Config_page_enum::DESC => $value[Config_page_enum::DESC],
                             Config_page_enum::LIMIT => $value[Config_page_enum::LIMIT],
                             Common_enum::CREATED_DATE => $value[Common_enum::CREATED_DATE],
                             Common_enum::UPDATED_DATE => $value[Common_enum::UPDATED_DATE]
                );
                $results[]=$doc;
            }
        }
        return $results;
    }
    
    public function upage_config_page($action, $id = null, $key_code, $desc,
                                        $limit = null, 
                                        $created_date=null, $updated_date=null
                                       ) {
        
        $is_insert = $this->common_model->checkAction( $action, Common_enum::INSERT );
        $is_edit = $this->common_model->checkAction( $action, Common_enum::EDIT );
        $is_delete = $this->common_model->checkAction( $action, Common_enum::DELETE );
        
        if($is_delete == TRUE){
            $this->common_model->removeDocByFile(Config_page_enum::COLLECTION_CONFIG_PAGE, array(Common_enum::_ID => MongoId($id)) );
        }
        else{
            $array_value = array(
                Config_page_enum::ID => $id,
                Config_page_enum::KEY_CODE => $key_code,
                Config_page_enum::DESC => $desc,
                Config_page_enum::LIMIT => ($limit == null)? 5: $limit,
                Common_enum::UPDATED_DATE    => ($updated_date==null) ? $this->common_model->getCurrentDate() : $updated_date,
                Common_enum::CREATED_DATE    => ($created_date==null) ? $this->common_model->getCurrentDate() : $created_date
            );
            if($is_edit == TRUE){
                unset($array_value[Common_enum::CREATED_DATE]);
            }
            $this->common_model->updateCollection(Config_page_enum::COLLECTION_CONFIG_PAGE, $action, $id, $array_value);
        }
        $error = $this->common_model->getError();
        if( $error == null ){
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_SUCCESSFUL, $error);
        }else{
            return $this->common_model->encapsulationDataResponsePost(Common_enum::MESSAGE_RESPONSE_FALSE, $error);
        }
    }
    
    /**
     * 
     * API Send email
     * 
     * Menthod: POST
     * 
     * @param type $from_mail
     * @param type $pass
     * @param type $full_name
     * @param type $to_mail
     * @param type $subject
     * @param type $message
     * 
     * @return array
     */
    public function send_mail($from_mail, $pass, $full_name=null, $to_mail,
                              $subject = null, $message
            ){
        //  Get param from client
//        $from_mail = $this->post('from_mail');
//        $pass = $this->post('password');
//        $full_name = $this->post('full_name');
//        $to_mail = $this->post('to_mail');
//        $subject = $this->post('subject');
//        $message = $this->post('message');
                
        $TAG = 'sendMail';
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $from_mail,
            'smtp_pass' => $pass,
            'mailtype' => 'html'
        );
 
        // load the email library that provided by CI
        $this->load->library('email', $config);
        // this will bind your attributes to email library
        $this->email->set_newline("\r\n");
        $this->email->from($from_mail, $full_name);
        $this->email->to($to_mail);
        $this->email->subject($subject);
        $this->email->message($message);
 
        // send your email. if it produce an error it will print 'Fail to send your message!' for you
        $send = $this->email->send();
        
        if($send){
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_SUCCESSFUL,
               'Error'      =>''
            );
            $this->response($resulte);
        }else{
            //  Response
            $resulte =  array(
               'Status'     =>  Common_enum::MESSAGE_RESPONSE_FALSE,
               'Error'      =>'Send email fail'
            );
            $this->response($resulte);
        }
    }
    
}

?>
