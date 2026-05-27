-- ================================================================
-- CẬP NHẬT DỮ LIỆU KHÁCH SẠN — 2025/2026
-- ================================================================

USE TOURDULICH;

-- ----------------------------------------------------------------
-- 1. Xóa dữ liệu test
-- ----------------------------------------------------------------
DELETE FROM hotels WHERE id = 4;

-- ----------------------------------------------------------------
-- 2. Cập nhật khách sạn hiện có → ngày 2025, giá thực tế
-- ----------------------------------------------------------------
UPDATE hotels SET
    h_address  = '97 Bãi Trường, Phú Quốc, Kiên Giang',
    h_phone    = '0297 3989 999',
    h_price    = 4200000,
    h_sale     = 10,
    created_at = '2025-03-10 08:00:00',
    updated_at = '2025-06-01 10:30:00'
WHERE id = 1;

UPDATE hotels SET
    h_price    = 3850000,
    h_sale     = 5,
    created_at = '2025-03-12 09:00:00',
    updated_at = '2025-06-02 11:00:00'
WHERE id = 2;

UPDATE hotels SET
    h_price    = 5500000,
    h_sale     = 15,
    created_at = '2025-03-15 10:00:00',
    updated_at = '2025-06-03 09:00:00'
WHERE id = 3;

-- ----------------------------------------------------------------
-- 3. Thêm khách sạn mới xu hướng 2025/2026
-- ----------------------------------------------------------------

-- H5: InterContinental Danang Sun Peninsula Resort
INSERT INTO hotels
  (h_name, h_image, h_address, h_phone, h_anbum_image, h_price, h_price_contact, h_sale,
   h_description, h_content, h_status, h_location_id, h_user_id, created_at, updated_at)
VALUES (
  'InterContinental Danang Sun Peninsula Resort',
  '2025-06-15__hotel_intercontinental.jpg',
  'Bãi Bắc, Sơn Trà, Đà Nẵng',
  '0236 3938 888',
  NULL,
  7500000, 0, 12,
  '<p><strong>InterContinental Danang Sun Peninsula Resort</strong> là khu nghỉ dưỡng sang trọng bậc nhất Đông Nam Á, tọa lạc trên sườn núi Sơn Trà nhìn ra vịnh Đà Nẵng. Được CNN Travel bình chọn là một trong những resort đẹp nhất thế giới năm 2024.</p>',
  '<p><strong>VỊ TRÍ</strong><br>Nằm trên bán đảo Sơn Trà, cách trung tâm Đà Nẵng 15 phút lái xe. Resort được thiết kế bởi kiến trúc sư Bill Bensley với phong cách nhiệt đới đương đại, hòa mình vào thiên nhiên hoang sơ của rừng nguyên sinh Sơn Trà.</p>
<p><strong>TIỆN NGHI & DỊCH VỤ</strong><br>• 197 phòng suite, villa và penthouse với tầm nhìn ra biển<br>• 5 nhà hàng và bar đẳng cấp quốc tế<br>• Infinity pool vô cực nhìn ra vịnh Đà Nẵng<br>• Spa La Maison 1888 đạt giải thưởng Forbes Travel Guide 2025<br>• Bãi biển riêng tuyệt đẹp<br>• Dịch vụ butler 24/7</p>
<p><strong>DI CHUYỂN</strong><br>Từ sân bay Đà Nẵng: 20 phút (resort hỗ trợ xe đưa đón). Từ trung tâm Đà Nẵng: 15 phút taxi.</p>',
  1, 5, NULL, '2025-04-20 08:00:00', '2025-06-10 10:00:00'
);

-- H6: Six Senses Con Dao
INSERT INTO hotels
  (h_name, h_image, h_address, h_phone, h_anbum_image, h_price, h_price_contact, h_sale,
   h_description, h_content, h_status, h_location_id, h_user_id, created_at, updated_at)
VALUES (
  'Six Senses Con Dao',
  '2025-06-15__hotel_sixsenses.jpg',
  'Đất Thốt, Côn Đảo, Bà Rịa - Vũng Tàu',
  '0254 3831 222',
  NULL,
  9800000, 0, 0,
  '<p><strong>Six Senses Con Dao</strong> — khu nghỉ dưỡng sinh thái cao cấp tại đảo Côn Đảo hoang sơ. Kết hợp hoàn hảo giữa thiên nhiên nguyên sơ, kiến trúc xanh thân thiện môi trường và dịch vụ 5 sao đạt chuẩn quốc tế. Top 10 resort sinh thái đẹp nhất châu Á 2025.</p>',
  '<p><strong>VỊ TRÍ</strong><br>Côn Đảo - hòn đảo thiên đường cách TP.HCM 45 phút bay, nổi tiếng với vẻ đẹp hoang sơ, rừng nguyên sinh và bãi biển trong xanh chưa bị khai thác.</p>
<p><strong>PHONG CÁCH</strong><br>Six Senses Con Dao được xây dựng theo triết lý sống xanh và bền vững. 50 pool villa bằng gỗ tự nhiên nằm ẩn mình giữa rừng nhiệt đới và bãi biển. Mỗi villa đều có hồ bơi riêng và tầm nhìn ra biển.</p>
<p><strong>TIỆN NGHI</strong><br>• 50 pool villas và beachfront villas<br>• Six Senses Spa với liệu pháp trị liệu truyền thống<br>• Nhà hàng Con Dao Restaurant phục vụ ẩm thực hữu cơ<br>• Chương trình lặn biển, kayak, thiền định<br>• Trải nghiệm bảo tồn rùa biển và san hô<br>• Vườn rau organic tự cung cấp cho nhà hàng</p>
<p><strong>DI CHUYỂN</strong><br>Bay từ TP.HCM đến sân bay Côn Đảo: 45 phút. Bay từ Hà Nội: quá cảnh TP.HCM. Resort hỗ trợ đặt vé và đưa đón.</p>',
  1, 4, NULL, '2025-05-01 09:00:00', '2025-06-12 11:00:00'
);

-- H7: Premier Village Phu Quoc Resort
INSERT INTO hotels
  (h_name, h_image, h_address, h_phone, h_anbum_image, h_price, h_price_contact, h_sale,
   h_description, h_content, h_status, h_location_id, h_user_id, created_at, updated_at)
VALUES (
  'Premier Village Phu Quoc Resort',
  '2025-06-15__hotel_premier.jpg',
  'Mũi Ông Đội, An Thới, Phú Quốc, Kiên Giang',
  '0297 3979 000',
  NULL,
  6200000, 0, 20,
  '<p><strong>Premier Village Phu Quoc Resort</strong> — khu biệt thự biển 5 sao tại mũi cực Nam đảo Phú Quốc. Thiết kế độc đáo với các villa nằm ngay trên mỏm đá nhìn ra hai phía biển. Đạt giải "Best Resort in Vietnam" tại World Travel Awards 2025.</p>',
  '<p><strong>VỊ TRÍ ĐỘC ĐÁO</strong><br>Tọa lạc tại Mũi Ông Đội — điểm cực Nam Phú Quốc, resort có tầm nhìn 270° ra biển. Đây là vị trí duy nhất tại Việt Nam có thể ngắm bình minh và hoàng hôn từ cùng một góc resort.</p>
<p><strong>LOẠI PHÒNG</strong><br>• Beach Front Pool Villa: villa mặt biển, hồ bơi riêng<br>• Ocean View Pool Villa: tầm nhìn toàn cảnh biển<br>• Premier Residence: biệt thự gia đình 3-4 phòng ngủ<br>• Overwater Suite: phòng suite trên mặt nước (mới 2025)</p>
<p><strong>TIỆN ÍCH</strong><br>• Chuỗi 5 nhà hàng từ hải sản tươi đến fine dining<br>• Premier Spa & Wellness Center<br>• Watersports center: lặn, snorkeling, kayak<br>• Kids Club & Teen Lounge<br>• Bãi biển riêng dài 800m</p>
<p><strong>DI CHUYỂN</strong><br>Từ sân bay Phú Quốc: 45 phút (xe Resort hỗ trợ đưa đón). Từ thị trấn Dương Đông: 30 phút taxi.</p>',
  1, 4, NULL, '2025-04-15 10:00:00', '2025-06-08 14:00:00'
);

-- H8: Amanoi Resort - Ninh Thuận
INSERT INTO hotels
  (h_name, h_image, h_address, h_phone, h_anbum_image, h_price, h_price_contact, h_sale,
   h_description, h_content, h_status, h_location_id, h_user_id, created_at, updated_at)
VALUES (
  'Amanoi Resort Ninh Thuận',
  '2025-06-15__hotel_amanoi.jpg',
  'Vĩnh Hy, Ninh Hải, Ninh Thuận',
  '0259 3770 888',
  NULL,
  12500000, 0, 0,
  '<p><strong>Amanoi</strong> — khu nghỉ dưỡng ultra-luxury của tập đoàn Aman, ẩn mình trong vườn quốc gia Núi Chúa Ninh Thuận. Một trong những resort đắt giá và đẳng cấp nhất Việt Nam, được Condé Nast Traveler bình chọn Top 5 Resort châu Á 2025.</p>',
  '<p><strong>TRIẾT LÝ AMAN</strong><br>Amanoi (Aman + Noi = bình yên + nơi chốn) là nơi nghỉ ngơi hoàn toàn tách biệt với thế giới bên ngoài. Thiết kế tối giản sang trọng, hòa hợp tuyệt đối với cảnh quan thiên nhiên vịnh Vĩnh Hy.</p>
<p><strong>PHÒNG & VILLA</strong><br>• Pavilion: phòng riêng với sân hiên nhìn ra vịnh<br>• Pool Pavilion: phòng hồ bơi riêng<br>• Aman Villa: biệt thự 2-3 phòng ngủ<br>• Aman Villa with Pool: biệt thự hồ bơi riêng rộng 500m²</p>
<p><strong>TRẢI NGHIỆM ĐỘC ĐÁO</strong><br>• Lặn biển tại vịnh Vĩnh Hy — một trong 4 vịnh đẹp nhất VN<br>• Yoga & thiền định bên bờ biển lúc bình minh<br>• Spa Aman với liệu pháp Ayurveda truyền thống<br>• Trekking rừng nguyên sinh Núi Chúa<br>• Kayak khám phá hang động và san hô</p>
<p><strong>DI CHUYỂN</strong><br>Từ Phan Rang (Ninh Thuận): 45 phút. Từ Nha Trang: 2 tiếng. Resort cung cấp dịch vụ trực thăng từ TP.HCM (60 phút).</p>',
  1, 3, NULL, '2025-03-01 08:00:00', '2025-06-05 09:00:00'
);

-- H9: Novotel Phu Quoc Resort
INSERT INTO hotels
  (h_name, h_image, h_address, h_phone, h_anbum_image, h_price, h_price_contact, h_sale,
   h_description, h_content, h_status, h_location_id, h_user_id, created_at, updated_at)
VALUES (
  'Novotel Phu Quoc Resort',
  '2025-06-15__hotel_novotel.jpg',
  'Đường Trần Hưng Đạo, Dương Tơ, Phú Quốc, Kiên Giang',
  '0297 3666 888',
  NULL,
  1950000, 0, 25,
  '<p><strong>Novotel Phu Quoc Resort</strong> — khu nghỉ dưỡng 4 sao hiện đại nằm ngay trên bãi biển Bãi Trường, Phú Quốc. Lựa chọn lý tưởng cho gia đình và cặp đôi muốn tận hưởng biển xanh cát trắng với mức giá hợp lý. Mới khai trương nâng cấp toàn bộ năm 2025.</p>',
  '<p><strong>VỊ TRÍ</strong><br>Tọa lạc tại bãi Trường — bãi biển dài và đẹp nhất Phú Quốc. Cách trung tâm thị trấn Dương Đông 5 phút, gần trung tâm mua sắm Vincom và Grand World Phú Quốc.</p>
<p><strong>PHÒNG & TIỆN ÍCH</strong><br>• 203 phòng Superior, Deluxe và Suite với ban công nhìn ra biển<br>• 2 hồ bơi ngoài trời (người lớn và trẻ em)<br>• Nhà hàng Latitude 10 phục vụ buffet sáng và à la carte tối<br>• Pool Bar và Beach Bar<br>• Fitness Center & Spa<br>• Kids Club miễn phí cho trẻ 4-12 tuổi</p>
<p><strong>ƯU ĐÃI 2025</strong><br>• Miễn phí bữa sáng cho 2 người lớn<br>• Giảm 25% cho đặt phòng trước 30 ngày<br>• Trẻ em dưới 12 tuổi miễn phí ăn sáng<br>• Shuttle miễn phí đến Vinpearl Safari và Grand World</p>
<p><strong>DI CHUYỂN</strong><br>Từ sân bay Phú Quốc: 15 phút taxi. Resort có dịch vụ cho thuê xe máy, xe đạp và tổ chức các tour tham quan đảo.</p>',
  1, 4, NULL, '2025-06-01 07:00:00', '2025-06-14 16:00:00'
);

-- Kiểm tra kết quả
SELECT id, h_name, h_price, h_sale, DATE(created_at) as created FROM hotels ORDER BY id;
