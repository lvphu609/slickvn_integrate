<?php

/**
 * 
 * This class connect and hands collection Base
 *                                          
 */
class Common_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        $mongodb = 'mongodb://';
        $user_name = 'xxx';
        $password = '123';
        $host_name = 'localhost';
        $port = '27017';
        $database = 'slickvn_test';
        
        $connect = $mongodb./*$user_name.':'.$password.'@'.*/$host_name.':'.$port;
        
        $this->error = null;
//        var_dump($connect);
        try{
            //  Connect to MogoDB
            $this->connect = new Mongo($connect);

            //  Connect to Restaurant DB
            $this->slickvn_db = $this->connect->selectDB($database);
//            $this->slickvn_db = $this->connect->slickvn;
            
        }catch ( MongoConnectionException $e ){
                
            $this->error  = $e->getMessage();
                
        }catch ( MongoException $e ){
            
            $this->error  = $e->getMessage();
                
        }
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                          COMMON FUNCTON                              //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Move file to new directory
     * 
     * @param type $ol_dir
     * @param type $new_dir
     * 
     * @return boolean
     * 
     */
    public function moveFileToDirectory($ol_dir, $new_dir) {
        return rename($ol_dir, $new_dir);
    }
	
	
    /**
     * 
     * Get Error
     * 
     * @return String $error
     */
    public function getError() {
        return $this->error;
    }
    
    /**
     * 
     * Set Error
     * 
     * @return void
     */
    public function setError($e) {
        $this->error = $e;
    }
    
    /**
     * 
     * Get Connect Data Base
     * 
     * @return database slickvn
     * 
     */
    public function getConnectDataBase() {
        return $this->slickvn_db;
    }
    
    /**
     * 
     * Create Directory
     * 
     * @param String $path
     * @param int $mode
     * 
     */
    public function createDirectory($path, $mode=Common_enum::WINDOWN){
        
        switch ($mode){
            
            case Common_enum::WINDOWN:{
                
                if(!file_exists($path)){
                    mkdir($path, 0, true);
                }
                break;
            }
            case Common_enum::LINUX:{
                
                if(!file_exists($path)){
                    mkdir($path, 0, true);
                }
                break;
            }
            
        }
        
    }

        /**
     * 
     * Remove Element Array Null
     * 
     * @param array $array
     * 
     * @return array
     * 
     */
    public function removeElementArrayNull(array $array) {
        
        foreach ($array as $key => $value) {
            if($value == null){
                unset($array[$key]);
            }
        }
        return $array;
        
    }
    
    public function countAverage(array $array) {
        
        if( ($array == null) || (sizeof($array) == 0) ) return 0;

        $size_array = sizeof($array);
        $count = 0;
        
        
        foreach ($array as $value) {

            $count = $count + $value;

        }
        return ($count/$size_array);
    }
    
    /**
     * 
     * Check Type - Extension Imgage
     * 
     * @param String $file_type
     * @param String $extension
     * 
     * @return boolean
     * 
     */
    public function checkExtensionImage($file_type, $extension) {
        
        $extension = strtolower($extension);

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        
        if ( (  ( $file_type == "image/gif")   || 
                ( $file_type == "image/jpeg")  || 
                ( $file_type == "image/jpg")   || 
                ( $file_type == "image/pjpeg") || 
                ( $file_type == "image/x-png") || 
                ( $file_type == "image/png") )

            && in_array($extension, $allowedExts)){
            
              return true;
        }
        else{
            $this->setError('File type NOT support');
            return false;
        }
        
    }
    
    /**
     * 
     * Upload Image
     * 
     * @param String $type: user_profile | carousel | dish | introduce | restaurant
     * @param type $file_name
     * 
     */
    public function uploadImage($type, $name_retaurant){
        
        /*** the maximum filesize from php.ini ***/
        $ini_max = str_replace('M', '', ini_get('upload_max_filesize'));
        $upload_max = $ini_max;//  MB
        
        //  Path
        $path = Common_enum::ROOT;
        
        if( strcmp( strtolower($type), Common_enum::DIR_USER_PROFILE ) == 0  ){
            $path = $path.Common_enum::TYPE_USER_PROFILE;
        }
        else{
            $path = $path.Common_enum::DIR_RESTAURANT.$name_retaurant.'/'.$type.'/';
        }
        
        //  Create directory $path
        if(!file_exists($path)){
            mkdir($path, 0, true);
        }
        
        if( isset($_FILES["image"]["name"]) ){
            
            for($i=0;$i<count($_FILES["image"]["name"]);$i++){

                //  File type
                $file_type = $_FILES["image"]['type'][$i];
                //  Extension
                $extension = end ( explode(".", $_FILES["image"]["name"][$i]) );
                
                $check_type = $this->checkExtensionImage($file_type, $extension);
                
                if($check_type){
                    
                    // MB
                    $file_size = ($_FILES["image"]["size"][$i]) / 1024 / 1024;
                    
                    if( $file_size > $upload_max ){
                        $this->setError('File size exceeds '.$file_size.' limit');
                        return;
                    }
                    
                    $upload = move_uploaded_file($_FILES["image"]["tmp_name"][$i], $path.$_FILES["image"]["name"][$i]);
                    
                    if(!$upload){
                        $this->setError($_FILES['image']['error'][$i]);
                        return;
                    }
                    
                }
            } 
        }
    }
    
      /**
     * 
     * Search Collection
     * 
     * @param array $where
     * @param array $key
     * 
     * @return Array Restaurant
     * 
     */
    public function searchCollection($collection_name, array $where) {
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else{
                $this->collection = $this->slickvn_db->$collection_name;
        
                $list_restaurant_found = $this->collection->find($where);

                return iterator_to_array($list_restaurant_found);
            }
            
        }catch ( MongoConnectionException $e ){
            $this->setError($e->getMessage());
        }catch ( MongoException $e ){
            $this->setError($e->getMessage());
        }
        
    }
      
    /**
     * 
     * Get Collection
     * 
     * @param String $collection_name
     * 
     * 
     */
    public function getCollection($collection_name){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select all collection_name
                $select_collection = $this->collection->find(array());

                $array=iterator_to_array($select_collection);
                return (is_array($array)) ? $array : array();
            }
            
        }catch ( MongoConnectionException $e ){
            $this->setError($e->getMessage());
        }catch ( MongoException $e ){
            $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Get Collection by Id
     * 
     * @param String $collection_name
     * @param String $id
     * 
     * @return a document
     * 
     */
    public function getCollectionById($collection_name, $id){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($id == null){
                $this->setError('Id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select collection_name by id
                $select_collection = $this->collection->find(array(Common_enum::_ID => new MongoId($id)));

                $array = iterator_to_array($select_collection);
                return (is_array($array)) ? $array : array();
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Get Collection by Special Field
     * 
     * @param String $collection_name
     * @param Array $value
     * 
     * @return a document
     * 
     */
    public function getCollectionByField($collection_name, array $value, $sort=array()){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($value == null){
                $this->setError('Arry id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select collection_name by id
                $select_collection = $this->collection->find( $value )->sort($sort);

                $array = iterator_to_array($select_collection);
                return (is_array($array)) ? $array : array();
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Get Value Feild Name Base Collection by Id
     * 
     * @param String $collection_name
     * @param String $array_id
     * 
     * @return array document
     * 
     */
    public function getValueFeildNameBaseCollectionById($collection_name, array $array_id){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($array_id == null){
                $this->setError('Id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;
                
                $str_doc="";
                
                foreach ($array_id as $id) {
                    
                    //  Query select collection_name by id
                    $select_collection = $this->collection->find(array(Common_enum::_ID => new MongoId($id)));
					
                    $array_ = iterator_to_array($select_collection);
                    if(sizeof($array_) > 0){
						$str_doc = $str_doc.', '.$array_[$id][Common_enum::NAME];
					}
                
                }
                
                return $str_doc;
                
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Get Value Feild Id Base Collection
     * 
     * @param String $collection_name
     * @param String $array_id
     * 
     * @return array document
     * 
     */
    public function getValueFeildIdBaseCollectionById($collection_name, array $array_id){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($array_id == null){
                $this->setError('Id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;
                
                $str_doc="";
                
                foreach ($array_id as $id) {
                    
                    //  Query select collection_name by id
                    $select_collection = $this->collection->find(array(Common_enum::_ID => new MongoId($id)));
					
                    $array_ = iterator_to_array($select_collection);
                    if(sizeof($array_) > 0){
						$str_doc = $str_doc.', '.$array_[$id][Common_enum::NAME];
					}
                
                }
                
                return $str_doc;
                
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Update Collection
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updateCollection($collection_name, $action, $id, array $array_value) {
        
        try{
            if($action == null){ 
                $this->setError('Action is null'); return;
            }
            else if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                //  Action insert
                if( strcmp( strtolower($action), Common_enum::INSERT ) == 0 ) {
                    
                    $this->collection ->insert( $array_value );
                    
                }
                //  Action edit
                else if( strcmp( strtolower($action), Common_enum::EDIT ) == 0 ){

                    if($id == null){$this->setError('Id is null'); return;}
                    
                    $where = array(
                                    Common_enum::_ID => new MongoId($id)
                                );
                    
                    $this->collection ->update($where, array('$set' => $array_value) );
                }

                //  Action delete
                else if( strcmp( strtolower($action), Common_enum::DELETE ) == 0 ){
                    
                    if($id == null){$this->setError('Is is null'); return;}
                    
                    $where = array(
                                    Common_enum::_ID => new MongoId($id)
                                );
//                                var_dump($array_value);
                    ($array_value == null)? $this->collection ->remove( $where )
                            :
                    $this->collection ->update($where, array('$set' => $array_value) );
                }
                else{
                    $this->setError('Action '.$action.' NOT support');
                }
                
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Edit Special Field Collection
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * 
     **/
    public function editSpecialField($collection_name, $id, array $array_value) {
        try{
            if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;

                    if($id == null){$this->setError('Id Is is null'); return;}
                    
                    $where = array( Common_enum::_ID => new MongoId($id) );
                    
                    $this->collection ->update($where, $array_value );
                
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Edit Doc Collection
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * 
     **/
    public function edit($collection_name, $where = array(), $value = array(), $options = null) {
        try{
            if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                    
                    $this->collection ->update($where, $value, $options);
                
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Remove an document
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * 
     **/
    public function removeDoc($collection_name, $id) {
        
        try{
            if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                if($id == null){$this->setError('Id is is null'); return;}
                $where = array( Common_enum::_ID => new MongoId($id) );
                $this->collection ->remove($where);
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Remove documents by special field
     * 
     * @param String $collection_name
     * @param Array $array_value
     * 
     * @return bool if remove successful then return TRUE else FALSE
     * 
     **/
    public function removeDocByFile($collection_name, $where=array()) {
        $result = FALSE;
        try{
            if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                $this->collection ->remove($where);
                $result = TRUE;
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
        return $result;
    }
    
    /**
     * 
     * Get Special a Field Collection by Id
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * 
     **/
    public function getSpecialField($collection_name, $field_name) {
        
        try{
            if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                

                    if($id == null){$this->setError('Is is null'); return;}
                    
                    $where = array( Common_enum::$field_name => 1);
                    
                    $this->collection ->find($where, $array_value );
                
                    
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     *
     * Get Interval
     * 
     * @param String $d1
     * @param String $d2
     * 
     * @return int
     */
    public function getInterval($d1, $d2) {
        $start  = strtotime($d1);
        $end    = strtotime($d2);
        $days_between = ceil($end - $star);
        return $days_between;
    }
    
    public function getCurrentDate() {
        
        $UTC = new DateTimeZone("UTC");
        $newTZ = new DateTimeZone("Asia/Ho_Chi_Minh");
        $date = new DateTime( date("d-m-Y H:i:s"), $UTC );
        $date->setTimezone( $newTZ );
        return $date->format('d-m-Y H:i:s');
        
    }
    
    /**
     * 
     * Order By Collection
     * 
     * @param String $collection_name
     * @param String $field_name
     * @param int $order_by_key
     * 
     * Return: Array
     * 
     */
    public function orderByCollection($collection_name, 
                                      /* Feild need to sort */
                                      $field_name,
                                      /* order_by_key: 1 <=> ASC ? -1 <=> DESC */
                                      $order_by_key) {
        try{
            if($collection_name == null){
                $this->setError('Collection is null');
            }
            else if($field_name == null){
                $this->setError('Field is null');
            }
            else if($order_by_key == null){
                $order_by_key = 1;
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;
                //  Query select all collection_name
                $select_collection = $this->collection->find()->sort( array($field_name => $order_by_key) );
                $array=iterator_to_array($select_collection);
                return (is_array($array)) ? $array : array();
            }
        }catch ( MongoConnectionException $e ){
            $this->setError($e->getMessage());
        }catch ( MongoException $e ){
            $this->setError($e->getMessage());
        }
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                      FUNCTION FOR COLLECTION BASE                    //
    //                                                                      //
    //                      1. meal_type                                    //
    //                      2. favourite                                    //
    //                      3. payment_type                                 //
    //                      4. other_criteria                               //
    //                      5. mode_use                                     //
    //                      6. price_person                                 //
    //                      7. landscape                                    //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Update Collection Base
     * 
     * @param String $collection_name
     * @param String $id
     * @param String $name
     * @param String $action:  insert | edit | delete
     * 
     * 
     */
    public function updateBaseCollection($action, $collection_name, $id, array $array_value) {
        
        try{
            
            if($action == null){ 
                $this->setError('Action is null'); return;
            }
            else if($collection_name == null){ 
                $this->setError('Collection name is null'); return;
            }
            else{
                // Connect collection 
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;

                //  Action insert
                if( strcmp( strtolower($action), Common_enum::INSERT  ) == 0 ) {

                    if($array_value['name'] == null){ $this->setError('Name is null');return;}

//                    $new = array(
//                                    Common_enum::NAME => $name
//                            );

                    $this->collection ->insert( $array_value );
                }

                //  Action edit
                else if( strcmp( strtolower($action), Common_enum::EDIT  ) == 0 ){

                    if($id == null){ 
                        $this->setError('Id is null');
                        return;
                    }

                    $where = array(
                                    Common_enum::_ID => new MongoId($id)
                                );
                    
                    $this->collection ->update($where, array( '$set' => $array_value ));
                }

                //  Action delete
                else if( strcmp( strtolower($action), Common_enum::DELETE  ) == 0 ){

                    if($id == null){ 
                        $this->setError('Id is null');
                        return;
                    }

                    $where = array(
                                    Common_enum::_ID => new MongoId($id)
                                );

                    $this->collection ->remove( $where );
                }
                else{
                    $this->setError('Action '.$action.' NOT support');return;
                }
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
        
    }
    
    /**
     * 
     * Check Exist Value in a collecstion by $field => $value
     * 
     * @param String $collection_name
     * @param Array $array_value
     * 
     * @return Array collection
     * 
     **/
    public function checkExistValue($collection_name, $array_value = array()) {
        
        try{
            // Connect collection 
            $collection = $collection_name;
            $this->collection = $this->slickvn_db->$collection;
            
            $result = iterator_to_array( $this->collection->find($array_value) );

            return ((sizeof($result) > 0)? TRUE : FALSE);
            
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
        
    }
    
    /**
     * 
     * checkLogin
     * 
     * @param String $collection_name
     * @param Array $array_value
     * 
     * @return Array collection
     * 
     **/
    public function checkLogin($collection_name, $array_value = array()) {
        
        try{
            // Connect collection 
            $collection = $collection_name;
            $this->collection = $this->slickvn_db->$collection;
            
            $result = iterator_to_array( $this->collection->find($array_value) );

            return ($result != null && is_array($result))? $result : array();
            
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
        
    }
    
    /**
     * checkAction
     * 
     * @param type $action
     * @return boolean
     */
    public function checkAction($action, $is_action) {
        
        $l_action = strtolower($action);
        $l_is_action = strtolower($is_action);
        
        if(strcasecmp($l_action, $l_is_action) == 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function encapsulationDataResponseGet($status, $total, $resultes) {
        return array( Common_enum::STATUS => $status,
                      Common_enum::TOTAL => $total,
                      Common_enum::RESULTS => $resultes
                      );
    }
    
    /**
     * 
     * @param string $status
     * @param string $error
     * 
     * @return array
     * 
     */
    public function encapsulationDataResponsePost($status, $error) {
        return array(Common_enum::STATUS => $status, Common_enum::ERROR => $error);
    }
    
    /**
     * getCollectionSort
     * 
     * @param string $collection_name
     * @param array $order_by
     * 
     * @return array
     */
    public function getCollectionSort($collection_name, $order_by = array()) {
        try{
            if($collection_name == null){
                $this->setError('Collection is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;
                //  Query select all collection_name
                $select_collection = $this->collection->find()->sort( $order_by );
                $array=iterator_to_array($select_collection);
                return (is_array($array)) ? $array : array();
            }
        }catch ( MongoConnectionException $e ){
            $this->setError($e->getMessage());
        }catch ( MongoException $e ){
            $this->setError($e->getMessage());
        }
    }
    
    public function nonUtf8Convert($str) {
	    if(!$str) return false;
	    $utf8 = array(
	            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
	            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	            );
	    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
	return $str;
	}
    
}

?>
