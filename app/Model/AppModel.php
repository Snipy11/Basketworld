<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/Model/AppModel.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package       Cake.Model
 */
class AppModel extends Model {
    
    public $actsAs = array('Containable');
    
    /**
     * @param string $value or array $keys or NULL for complete array result
     * @param array $options (actual data)
     * @return mixed string/array
     */
    public static function enum($value, $options, $default = '') {
        if ($value !== null && !is_array($value)) {
            if (array_key_exists($value, $options)) {
                return $options[$value];
            }
            return $default;
        } elseif ($value !== null) {
            $newOptions = array();
            foreach ($value as $v) {
                $newOptions[$v] = $options[$v];
            }
            return $newOptions;
        }
        return $options;
    }
    
    
}
