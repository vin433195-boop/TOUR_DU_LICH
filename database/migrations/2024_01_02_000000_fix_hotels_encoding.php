<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class FixHotelsEncoding extends Migration
{
    /**
     * Một số khách sạn bị lưu với encoding CP437 mojibake:
     * byte UTF-8 gốc bị interpret thành ký tự CP437 rồi lưu lại thành UTF-8.
     * Cách fix: convert UTF-8 → CP437 để lấy lại byte gốc (chính là UTF-8 tiếng Việt đúng).
     */
    public function up()
    {
        $hotels = DB::table('hotels')->get();
        foreach ($hotels as $hotel) {
            $updates = [];
            $fields = ['h_name', 'h_address', 'h_phone', 'h_description', 'h_content'];
            foreach ($fields as $field) {
                $value = $hotel->$field ?? '';
                if (!empty($value) && $this->isGarbled($value)) {
                    $fixed = $this->fixEncoding($value);
                    if ($fixed !== null) {
                        $updates[$field] = $fixed;
                    }
                }
            }
            if (!empty($updates)) {
                DB::table('hotels')->where('id', $hotel->id)->update($updates);
            }
        }
    }

    public function down()
    {
        // Không thể rollback (sẽ mất dữ liệu gốc bị lỗi)
    }

    private function isGarbled(string $str): bool
    {
        // Box-drawing characters (U+2500–U+257F) chỉ xuất hiện khi bị CP437 mojibake
        return preg_match('/[\x{2500}-\x{257F}\x{2591}-\x{2593}]/u', $str) === 1;
    }

    private function fixEncoding(string $str): ?string
    {
        // Convert từ UTF-8 → CP437 để lấy lại byte gốc (UTF-8 tiếng Việt)
        // Encoding gốc là CP850 (MS-DOS Latin 1), iconv hỗ trợ
        $fixed = iconv('UTF-8', 'CP850//IGNORE', $str);
        if ($fixed !== false && mb_check_encoding($fixed, 'UTF-8')) {
            return $fixed;
        }
        return null;
    }
}
