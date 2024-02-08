<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW books_info AS
            SELECT
                b.book_id AS book_id,
                b.title,
                b.price,
                m.major_name AS Majors,
                f.faculty_name AS Faculty,
                y.year_number AS Years,
                s.sem_number AS Semester,
                i.quantity AS Quantity,
                b.Image
            FROM
                table_books b
            LEFT JOIN table_majors m ON b.major_id = m.major_id
            LEFT JOIN table_faculties f ON b.faculty_id = f.faculty_id
            LEFT JOIN table_years y ON b.year_id = y.year_id
            LEFT JOIN table_semesters s ON b.sem_id = s.sem_id
            LEFT JOIN table_instocks i ON b.book_id = i.book_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_view_all_books');
    }
};
