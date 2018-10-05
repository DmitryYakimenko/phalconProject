<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.2
 */

/**
 * Database `phalcon`
 */

/* `phalcon`.`categories` */
$categories = array(
  array('id_category' => '1','name' => 'Игровой'),
  array('id_category' => '2','name' => 'Универсальный'),
  array('id_category' => '3','name' => 'Для работы'),
  array('id_category' => '4','name' => 'Флагман')
);

/* `phalcon`.`goods` */
$goods = array(
  array('id_good' => '1','name' => 'ASUS X570UD-E4037 (90NB0HS1-M00460) Black','img' => 'copy_asus_x570ud_e4026_5a6ef38f49ec7_images_2751817615.jpg','id_good_type' => '1'),
  array('id_good' => '2','name' => 'Dell Inspiron 7577 (i75581S0DL-418) Black','img' => 'copy_dell_inspiron_7577_i75581s2dl_418_5a67d47126ab8_images_2656406375.jpg','id_good_type' => '1'),
  array('id_good' => '3','name' => 'HP 255 G6 (2EW01ES) Dark Ash','img' => 'copy_hp_255_g6_2hg33es_59e5ed03f3de6_images_2271600422.jpg','id_good_type' => '1'),
  array('id_good' => '4','name' => 'Lenovo V110 (80TG00AJRK) Black','img' => 'copy_lenovo_80th001ark_5b0415db1d993_images_4675567408.jpg','id_good_type' => '1'),
  array('id_good' => '5','name' => 'Everest Home 4070 (4070_9414)','img' => 'everest_home_4070_9414_images_7691758248.jpg','id_good_type' => '3'),
  array('id_good' => '6','name' => 'Everest MSI Dragon PC 9057 (9057_6410)','img' => 'everest_msi_dragon_pc_9057_6410_images_6814830614.jpg','id_good_type' => '3'),
  array('id_good' => '7','name' => 'ARTLINE Business B29 v02 (B29v02)','img' => 'artline_business_b29_v02_images_508808317.jpg','id_good_type' => '3'),
  array('id_good' => '8','name' => 'Artline Gaming X26 v01 (X26v01)','img' => 'artline_x26v01_images_7016809194.jpg','id_good_type' => '3'),
  array('id_good' => '9','name' => 'Samsung Galaxy Note 9 6/128GB Midnight Black','img' => 'samsung_sm_n960fzkdsek_images_6520779374.jpg','id_good_type' => '2'),
  array('id_good' => '10','name' => 'Samsung Galaxy A7 2017 Duos SM-A720 Gold','img' => 'samsung_sm_a720fzddsek_images_1828064742.jpg','id_good_type' => '2')
);

/* `phalcon`.`good_category` */
$good_category = array(
  array('id_good_category' => '1','id_good' => '1','id_category' => '1'),
  array('id_good_category' => '2','id_good' => '1','id_category' => '4'),
  array('id_good_category' => '3','id_good' => '2','id_category' => '1'),
  array('id_good_category' => '4','id_good' => '3','id_category' => '3'),
  array('id_good_category' => '5','id_good' => '3','id_category' => '2'),
  array('id_good_category' => '6','id_good' => '4','id_category' => '3'),
  array('id_good_category' => '7','id_good' => '5','id_category' => '1'),
  array('id_good_category' => '8','id_good' => '6','id_category' => '1'),
  array('id_good_category' => '9','id_good' => '6','id_category' => '4'),
  array('id_good_category' => '10','id_good' => '7','id_category' => '3'),
  array('id_good_category' => '11','id_good' => '8','id_category' => '2'),
  array('id_good_category' => '12','id_good' => '9','id_category' => '4'),
  array('id_good_category' => '13','id_good' => '10','id_category' => '3'),
  array('id_good_category' => '14','id_good' => '10','id_category' => '2')
);

/* `phalcon`.`good_types` */
$good_types = array(
  array('id_good_type' => '1','name' => 'Ноутбук'),
  array('id_good_type' => '2','name' => 'Телефон'),
  array('id_good_type' => '3','name' => 'Компьютер')
);
