<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestaurantEnum
 *
 * @author phucnguyen
 */
class Restaurantenum {
 
  const TOTAL = "Total";
  const RESULTS = "Results";
  
  const ID = 'id'; 
  const NAME = 'name'; 
  const STATUS = 'status'; 
  const CREATEED_DATE = 'created_date'; 
  const ADDRESS = 'address'; 
  const RATE_POINT = 'rate_point'; 
  const IMAGE_LINK = 'image_link';
  
  
  const LIMIT_PAGE_RESTAURANT_ALL = 15;
  const LIMIT_SEARCH_POST=10;
  const LIMIT_PAGE_USER_ALL=10;
  const LIMIT_PAGE_SEARCH_COUPON=10;
  
  
  const LIMIT_PAGE_NEWEST_RESTAURANT = 'newest_restaurant';
  const LIMIT_PAGE_ORTHER_RESTAURANT = 'orther_restaurant';
  const LIMIT_PAGE_PROMOTION = 'coupon_restaurant';
  const LIMIT_PAGE_POST = 'post';
  const LIMIT_PAGE_LIST_MEMBER='member';








  /*search -----------------*/
   //meal
   const LIMIT_PAGE_SEARCH_MEAL=10;
  
  /*end search ------------------*/
  
  
}

?>
