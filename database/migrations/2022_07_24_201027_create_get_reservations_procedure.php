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
        //TODO It is fo test, beta procedure. Need to refactor and find way to collect data without copy reservation table
        $procedure = '
            DROP PROCEDURE IF EXISTS `get_reservation`;
            CREATE PROCEDURE get_reservation(IN dateStart DATE, IN daysLong SMALLINT)
            BEGIN
                DECLARE dateCurrent DATE DEFAULT dateStart;
                DECLARE rangeDayCounter SMALLINT DEFAULT 0;
                CREATE TEMPORARY TABLE IF NOT EXISTS reserved_ranges (
                     id INT,
                     room_id INT,
                     room_name VARCHAR(100),
                     name VARCHAR(100),
                     phone VARCHAR(50),
                     email VARCHAR(50),
                     guests TINYINT,
                     date_from DATE,
                     date_to DATE
                );
                CREATE TEMPORARY TABLE IF NOT EXISTS reserved_ranges_tmp (
                    id INT,
                    room_id INT,
                    name VARCHAR(100),
                    phone VARCHAR(50),
                    email VARCHAR(50),
                    guests TINYINT,
                    date_from DATE,
                    date_to DATE
                );
                INSERT INTO reserved_ranges_tmp (
                    SELECT id, room_id, name, phone, email, guests, date_from, date_to
                    FROM reservations ORDER BY date_from
                );
                TRUNCATE reserved_ranges;
                IF daysLong = 0 THEN
                    INSERT INTO reserved_ranges
                        (
                            SELECT
                                   rr.id,
                                   rr.room_id,
                                   rm.name AS room_name,
                                   rr.name,
                                   rr.phone,
                                   rr.email,
                                   rr.guests,
                                   rr.date_from,
                                   rr.date_to
                            FROM reserved_ranges_tmp rr
                            INNER JOIN rooms rm ON rm.id = rr.room_id
                            WHERE date_from <= dateStart AND date_to >= dateStart
                        );
                    DELETE FROM reserved_ranges_tmp WHERE id IN (SELECT id FROM reserved_ranges);
                ELSE
                    WHILE rangeDayCounter <= daysLong DO
                            INSERT INTO reserved_ranges
                                (
                                    SELECT
                                           rr.id,
                                           rr.room_id,
                                           rm.name AS room_name,
                                           rr.name,
                                           rr.phone,
                                           rr.email,
                                           rr.guests,
                                           rr.date_from,
                                           rr.date_to
                                    FROM reserved_ranges_tmp rr
                                    INNER JOIN rooms rm ON rm.id = rr.room_id
                                    WHERE date_from <= dateCurrent AND date_to >= dateCurrent
                                );
                            SET rangeDayCounter = rangeDayCounter + 1;
                            SET dateCurrent = DATE_ADD(dateCurrent, INTERVAL 1 DAY);
                            DELETE FROM reserved_ranges_tmp WHERE id IN (SELECT id FROM reserved_ranges);
                        END WHILE;
                END IF;
                SELECT * FROM reserved_ranges;
                DROP TABLE IF EXISTS reserved_ranges;
                DROP TABLE IF EXISTS reserved_ranges_tmp;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS get_reservation');
    }
};
