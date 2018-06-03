<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 19-04-2017
 * Time: 21:38
 */

namespace ArmoredCore\Adapters\Database;


use Tracy\Debugger;

class PHPActiveRecordAdapter extends \ActiveRecord\Model
{
    private static $_tracyPanelCreated = false;

    public function __construct(array $attributes=array(), $guard_attributes=true, $instantiating_via_find=false, $new_record=true) {

        parent::__CONSTRUCT( $attributes=array(), $guard_attributes=true, $instantiating_via_find=false, $new_record=true);

        if (!self::$_tracyPanelCreated) {

            $conn = Parent::connection();

            $db1Panel = new \Filisko\PDOplus\Tracy\BarPanel( $conn->connection );
            $db1Panel->title = "DB SQL";
            Debugger::getBar()->addPanel( $db1Panel );

            self::$_tracyPanelCreated = true;
        }
    }

}