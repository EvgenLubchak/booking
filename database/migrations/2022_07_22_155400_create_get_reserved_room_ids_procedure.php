<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = '
            DROP PROCEDURE IF EXISTS `get_reserved_rooms_ids`;
            CREATE PROCEDURE get_reserved_rooms_ids(IN dateStart DATE, IN daysLong SMALLINT)
            BEGIN
                DECLARE dateCurrent DATE DEFAULT dateStart;
                DECLARE rangeDayCounter SMALLINT DEFAULT 0;
                CREATE TEMPORARY TABLE IF NOT EXISTS reserved_rooms_ids (room_id INT);
                TRUNCATE reserved_rooms_ids;
                IF daysLong = 0 THEN
                    INSERT INTO reserved_rooms_ids
                        (
                            SELECT room_id FROM reservations
                            WHERE date_from <= dateStart AND date_to >= dateStart
                        );
                ELSE
                    WHILE rangeDayCounter <= daysLong DO
                            INSERT INTO reserved_rooms_ids
                                (
                                    SELECT room_id FROM reservations
                                    WHERE date_from <= dateCurrent AND date_to >= dateCurrent
                                );
                            SET rangeDayCounter = rangeDayCounter + 1;
                            SET dateCurrent = DATE_ADD(dateCurrent, INTERVAL 1 DAY);
                        END WHILE;
                END IF;
                SELECT room_id FROM reserved_rooms_ids GROUP BY room_id;
                DROP TABLE reserved_rooms_ids;
            END;
        ';
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS get_reserved_rooms_ids');
    }
};
