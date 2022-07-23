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
        $procedure = 'DROP PROCEDURE IF EXISTS `get_free_rooms`;
                CREATE PROCEDURE get_free_rooms(IN dateStart DATE, IN daysLong TINYINT)
                BEGIN
                    DECLARE dateCurren DATE DEFAULT dateStart;
                    DECLARE dateNext DATE;
                    DECLARE dateCounter TINYINT DEFAULT 0;
                    DECLARE rangeFinalDay DATE DEFAULT DATE_ADD(dateCurren, INTERVAL daysLong DAY);
                    CREATE TEMPORARY TABLE IF NOT EXISTS reserved_rooms_ids (room_id INT);
                    TRUNCATE reserved_rooms_ids;
                       WHILE dateCounter < daysLong DO
                                SET dateNext = DATE_ADD(dateCurren, INTERVAL 1 DAY);
                                INSERT INTO reserved_rooms_ids
                                    (
                                        SELECT room_id FROM reservations
                                            WHERE dateCurren
                                            BETWEEN date_from AND date_to AND dateNext != rangeFinalDay
                                            OR dateNext
                                            BETWEEN date_from AND date_to
                                    );
                                SET dateCounter = dateCounter + 1;
                                SET dateCurren = dateNext;
                            END WHILE;
                    SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM reserved_rooms_ids GROUP BY room_id);
                    DROP TABLE reserved_rooms_ids;
                END;';
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `get_free_rooms`');
    }
};
