<?php

/**
 * 
 * This class connect and hands database:
 *                                      1. Dish
 *                                      2. Menu_Dish
 *                                      3. Comment
 *                                      4. Coupon
 *                                      5. Post
 *                                      6. Restaurant
 * 
 */
class Restaurant_model extends CI_Model{
    
    public function __construct() {
        
        //  Load model COMMON
        $this->load->model('common/common_enum');
        $this->load->model('common/common_model');
        
        //  Load model RESTAURANT
        $this->load->model('restaurant/assessment_enum');
        $this->load->model('restaurant/comment_enum');
        
        //  Load model USER
        $this->load->model('user/user_enum');
        $this->load->model('user/user_model');
        
        $this->rate_point       = 0;
        $this->rate_service     = 0;
        $this->rate_landscape   = 0;
        $this->rate_taste       = 0;
        $this->rate_price       = 0;
        
    }
    
    public function resetRate() {
        $this->rate_point       = 0;
        $this->rate_service     = 0;
        $this->rate_landscape   = 0;
        $this->rate_taste       = 0;
        $this->rate_price       = 0;
    }
    //  Get rate service
    public function getRateService() {
        return $this->rate_service;
    } 
    //  Set rate service
    public function setRateService($value) {
        $this->rate_service = $value;
    }
    
    //  Get rate landscape
    public function getRateLandscape() {
        return $this->rate_landscape;
    }
    
    //  Set rate landscape
    public function setRateLandscape($value) {
        $this->rate_landscape = $value;
    }
    
    //  Get rate taste
    public function getRateTaste() {
        return $this->rate_taste;
    }
    //  Set rate taste
    public function setRateTaste($value) {
        $this->rate_taste = $value;
    }
    
    //  Get rate price
    public function getRatePrice() {
        return $this->rate_price;
    }
    //  Set rate price
    public function setRatePrice($value) {
        $this->rate_price = $value;
    }
    
    //  Get rate point
    public function getRatePoint() {
        return ($this->rate_service + $this->rate_landscape + $this->rate_taste + $this->rate_price)/4 ;
    }
    
    /**
     * 
     * Get Error
     * 
     * @return String $error
     */
    public function getError() {
        return $this->common_model->getError();
    }
    
    /**
     * 
     * Set Error
     * 
     * @return String $error
     */
    public function setError($e) {
        return $this->common_model->setError($e);
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION ASSESSMENT                  //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Collection Assessment by $id_user
     * 
     * @param String $id_user
     * 
     * @return array collection Assessment
     * 
     */
    public function getAssessmentByIdUser($id_user) {
        
        return $this->common_model->getCollectionByField(Assessment_enum::COLLECTION_ASSESSMENT, array(Assessment_enum::ID_USER => $id_user) );
        
    }
    
    /**
     * 
     * Count Assessment for User
     * 
     * @param String $id_user
     * 
     * @return int
     * 
     */
    public function countAssessmentForUser($id_user){
        return sizeof( $this->getAssessmentByIdUser($id_user) );
    }
    
    /**
     * 
     * Get Collection Assessment by $id_restaurant
     * 
     * @param String $id_restaurant
     * 
     * @return array collection Assessment
     * 
     */
    public function getAssessmentByIdRestaurant($id_restaurant) {
        
        return $this->common_model->getCollectionByField(Assessment_enum::COLLECTION_ASSESSMENT, array(Assessment_enum::ID_RESTAURANT => $id_restaurant), 
                                                         array(Common_enum::CREATED_DATE => -1));
        
    }
    
    /**
     * 
     * Count Assessment for Restaurant
     * 
     * @param String $id_restaurant
     * 
     * @return int
     * 
     */
    public function countAssessmentForRestaurant($id_restaurant) {
        $list_assessment = $this->getAssessmentByIdRestaurant($id_restaurant);
        foreach ($list_assessment as $assessment ) {
            $this->rate_service     = $this->rate_service   + $assessment['rate_service'];
            $this->rate_landscape   = $this->rate_landscape + $assessment['rate_landscape'];
            $this->rate_taste       = $this->rate_taste     + $assessment['rate_taste'];
            $this->rate_price       = $this->rate_price     + $assessment['rate_price'];
        }
        $count = sizeof($list_assessment);
        if($count > 0){
            $this->rate_service     = $this->rate_service   / $count;
            $this->rate_landscape   = $this->rate_landscape / $count;
            $this->rate_taste       = $this->rate_taste     / $count;
            $this->rate_price       = $this->rate_price     / $count;
        }
        return $count;
    }
    
    /**
     * 
     * Get Collection Assessment by $id_post
     * 
     * @param String $id_post
     * 
     * @return array collection Assessment
     * 
     */
    public function getAssessmentByIdPost($id_post) {
        
        return $this->common_model->getCollectionByField(Assessment_enum::COLLECTION_ASSESSMENT, array(Assessment_enum::ID_POST => $id_post) );
        
    }
    
    /**
     * 
     * Count Assessment for Restaurant
     * 
     * @param String $id_restaurant
     * 
     * @return int
     * 
     */
    public function countAssessmentForPost($id_post) {
        $list_assessment = $this->getAssessmentByIdPost($id_post);
        foreach ($list_assessment as $assessment ) {
            $this->rate_service     = $this->rate_service   + $assessment['rate_service'];
            $this->rate_landscape   = $this->rate_landscape + $assessment['rate_landscape'];
            $this->rate_taste       = $this->rate_taste     + $assessment['rate_taste'];
            $this->rate_price       = $this->rate_price     + $assessment['rate_price'];
        }
        $count = sizeof($list_assessment);
        if($count > 0){
            $this->rate_service     = $this->rate_service   / $count;
            $this->rate_landscape   = $this->rate_landscape / $count;
            $this->rate_taste       = $this->rate_taste     / $count;
            $this->rate_price       = $this->rate_price     / $count;
        }
        return $count;
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION MENU DISH                   //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Collection Menu Dish
     * 
     * Return: Array Collection Menu Dish
     * 
     */
    public function getMenuDish() {
        
        return $this->common_model->getCollection(Menu_dish_enum::COLLECTION_MENU_DISH);
        
    }
    
    /**
     * 
     * Get Collection Menu Dish by Id
     * 
     * @param String $id
     * 
     * Return: Collection Menu Dish
     * 
     */
    public function getMenuDishtById($id) {
        
        return $this->common_model->getCollectionById(Menu_dish_enum::COLLECTION_MENU_DISH, $id);
        
    }
    
    /**
     * 
     * Update Menu Dish
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     * 
     */
    public function updateMenuDish($action, $id, $array_value) {
        $this->common_model->updateCollection(Menu_dish_enum::COLLECTION_MENU_DISH, $action, $id, $array_value);
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION RESTAULRANT                 //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Search Collection Restaurant
     * 
     * @param String $where
     * 
     * @return Array collection Restaurant
     * 
     */
    public function searchRestaurant($where) {
        
        //  Collection Restaurant
        $collection = Restaurant_enum::COLLECTION_RESTAURANT;
        $list_restaurant = $this->common_model->searchCollection($collection, $where );
        
        return $list_restaurant;
        
    }
    
    /**
     * 
     * Search Collection Menu Dish
     * 
     * @param String $where
     * 
     * @return Array collection Menu Dish
     * 
     */
    public function searchMenuDish($where) {
        
        //  Collection menu_dish
        $collection = Menu_dish_enum::COLLECTION_MENU_DISH;
        $list_restaurant = $this->common_model->searchCollection($collection, $where );
        
        return $list_restaurant;
        
    }
    
    /**
     * 
     * Search Collection Post
     * 
     * @param String $where
     * 
     * @return Array collection Post
     * 
     */
    public function searchPost($where) {
        
        //  Collection Restaurant
        $collection = Post_enum::COLLECTION_POST;
        $list_post = $this->common_model->searchCollection($collection, $where );
        
        return $list_post;
        
    }
    
    /**
     * 
     * Get All Restaurant
     * 
     * Return: Collection Restaurant
     * 
     */
    public function getAllRestaurant() {
        
        return $this->common_model->getCollection(Restaurant_enum::COLLECTION_RESTAURANT);
        
    }
    
    /**
     * 
     * Get Collection Restaurant by Id
     * 
     * @param String $id
     * 
     * Return: Collection Restaurant
     * 
     */
    public function getRestaurantById($id) {
        
        return $this->common_model->getCollectionById(Restaurant_enum::COLLECTION_RESTAURANT, $id);
        
    }
    
    /**
     * 
     * Get Collection Post
     * 
     * Return: Array Collection Post
     * 
     */
    public function getAllRestauranttSimilar($where) {

        return $this->common_model->searchCollection(Restaurant_enum::COLLECTION_RESTAURANT, $where);
        
    }
    
    /**
     * 
     * @param int $order_by: 1 = ASC | -1 = DESC 
     * @return Array
     * 
     */
    public function orderByRestaurant($order_by) {
        
        // Get collection restaurant
        $collection_name = Restaurant_enum::COLLECTION_RESTAURANT;
        
        //  Feild created_date
        $created_date = Common_enum::CREATED_DATE;
        
        $list_order_by_restaurant = $this->common_model->orderByCollection(
                
                                                            $collection_name,
                                                            $created_date,
                                                            $order_by
                
                                                            );
        
        return $list_order_by_restaurant;
    }
    
    /**
     * 
     * Update Restaurant
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     * 
     */
    public function updateRestaurant($action, $id, $array_value) {
        
        $this->common_model->updateCollection(Restaurant_enum::COLLECTION_RESTAURANT, $action, $id, $array_value);
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION POST                        //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Collection Post
     * 
     * Return: Array Collection Post
     * 
     */
    public function getAllPost() {

        return $this->common_model->getCollection(Post_enum::COLLECTION_POST);
        
    }
    
    /**
     * 
     * Get Collection Post similar
     * 
     * Return: Array Collection Post
     * 
     */
    public function getAllPostSimilar($where) {

        return $this->common_model->searchCollection(Post_enum::COLLECTION_POST, $where);
        
    }
    
    /**
     * 
     * Get Collection Post by Id
     * 
     * @param String $id
     * 
     * Return: Array Collection Post
     * 
     */
    public function getPostById($id) {
        return $this->common_model->getCollectionById(Post_enum::COLLECTION_POST, $id);
    }
    
    /**
     * 
     * Update Collection Post
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updatePost($action, $id, array $array_value) {
        
        $this->common_model->updateCollection(Post_enum::COLLECTION_POST, $action, $id, $array_value);
        
    }
    
    //------------------------------------------------------
    //                                                     /
    //  MENTHODS UDATE COLLECTION COUPON                   /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     * Get Collection Coupon
     * 
     * @param String $id
     * 
     * @return Array collection Coupon
     * 
     */
    public function getCouponById($id) {
        
        return $this->common_model->getCollectionById(Coupon_enum::COLLECTION_COUPON, $id);
        
    }
    
    public function getCouponByRestaurant($id_restaurant) {
        $value = array(
            Coupon_enum::ID_RESTAURANT => $id_restaurant,
        );
        $sort = array(Common_enum::CREATED_DATE => -1);
        return $this->common_model->getCollectionByField(Coupon_enum::COLLECTION_COUPON, $value, $sort);
        
    }
    
    /**
     * 
     * Search Collection Coupon
     * 
     * @param String $where
     * 
     * @return Array collection Coupon
     * 
     */
    public function searchCoupon($where) {
        
        //  Collection Restaurant
        $collection = Coupon_enum::COLLECTION_COUPON;
        $list_coupon = $this->common_model->searchCollection($collection, $where );
        
        return $list_coupon;
        
    }
    
    /**
     * 
     * Update Collection Coupon
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updateCoupon($action, $id, array $array_value) {
        if(strcmp( strtolower($action), Common_enum::EDIT ) == 0){
            $current_date = $this->common_model->getCurrentDate();
            $where = array(
                //  not due date
//                Coupon_enum::DUE_DATE => array('$gt'=>$current_date),
                Common_enum::_ID => new MongoId($id),
                //  is_use=1
                Coupon_enum::IS_USE => 1
            );
//            var_dump($where);
            $value = array(Coupon_enum::IS_USE => 0);
            $options = array('multiple' => true);
            $this->common_model->edit(Coupon_enum::COLLECTION_COUPON, $where, array('$set'=>$value), $options);
        }
        $this->common_model->updateCollection(Coupon_enum::COLLECTION_COUPON, $action, $id, $array_value);
    }
    
    //------------------------------------------------------
    //                                                     /
    //  MENTHODS UDATE COLLECTION SUBCRIBED_EMAIL          /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     * Get all Subcribed Email
     * 
     * Return: Array Collection Post
     * 
     */
    public function getAllSubcribedEmail() {

        return $this->common_model->getCollection(Subscribed_email_enum::COLLECTION_SUBSCRIBED);
        
    }
    
    /**
     * 
     * Get all Subcribed Email by id
     * 
     * Return: Array Collection Post
     * 
     */
    public function getAllSubcribedEmailById($id) {

        return $this->common_model->getCollectionById(Subscribed_email_enum::COLLECTION_SUBSCRIBED, $id);
        
    }
    
    /**
     * 
     * Update Subcribed Email
     * 
     * @param String $id
     * @param String $email
     * 
     * @return error
     * 
     */
    public function updateSubcribedEmail($action, $id, array $array_value) {
        
        $this->common_model->updateCollection(Subscribed_email_enum::COLLECTION_SUBSCRIBED, $action, $id, $array_value);
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION ASSESSMENT                  //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Comment by Id Assessment
     * 
     * @param String $id_assessment
     * 
     * @return Array Comment
     * 
     */
    public function getCommentByIdAssessment($id_assessment) {
        $list_comment = $this->common_model->getCollectionByField(Comment_enum::COLLECTION_COMMENT, 
                                                                  array (Comment_enum::ID_ASSESSMENT => $id_assessment ) );
        $list_comment_detail = array();
//        var_dump($list_comment);
        foreach ($list_comment as $comment) {
            //  Get User of Assessment
            $user = $this->user_model->getUserById($comment['id_user']);
            $approval = $comment[Comment_enum::APPROVAL];
            if( strcmp(strtoupper($approval), Assessment_enum::APPROVAL_YES) == 0){
                $comment_detail = array(
                                        Comment_enum::ID                => $comment['_id']->{'$id'},
                                        //  Infor User
                                        Comment_enum::ID_USER           => $comment[Comment_enum::ID_USER],
                                        User_enum::FULL_NAME             => $user[$comment['id_user']]['full_name'],
                                        User_enum::AVATAR                => $user[$comment['id_user']][User_enum::AVATAR],
                                        User_enum::NUMBER_ASSESSMENT     => $this->countAssessmentForUser($comment['id_user']),
                                        Comment_enum::CONTENT            => $comment[Comment_enum::CONTENT],
                                        //  Number LIKE of Comment
                                        Comment_enum::NUMBER_LIKE        => $this->user_model->countUserLogByAction(array ( User_log_enum::ID_COMMENT => $comment['_id']->{'$id'}, 
                                                                                                                            User_log_enum::ACTION        => Common_enum::LIKE_COMMENT
                                                                                                                            )),
                                        //  Number SHARE of Comment
                                        Comment_enum::NUMBER_SHARE        => $this->user_model->countUserLogByAction(array ( User_log_enum::ID_COMMENT => $comment['_id']->{'$id'}, 
                                                                                                                            User_log_enum::ACTION        => Common_enum::SHARE_COMMENT
                                                                                                                            )),
                                        Common_enum::CREATED_DATE         => $comment[Common_enum::CREATED_DATE],
                                        Common_enum::UPDATED_DATE         => $comment[Common_enum::UPDATED_DATE]        
                );
                $list_comment_detail[] = $comment_detail;
            }
        }
        return $list_comment_detail;
    }
    
    /**
     * 
     * Update Collection Assessemt
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updateAssessment($action, $id, array $array_value) {
        $this->common_model->updateCollection(Assessment_enum::COLLECTION_ASSESSMENT, $action, $id, $array_value);
    }
    
    /**
     * 
     * Update collection comment
     * 
     * @param string $id
     * @param array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updateComment($action, $id, array $array_value) {
        $this->common_model->updateCollection(Comment_enum::COLLECTION_COMMENT, $action, $id, $array_value);
    }
    
}

?>
