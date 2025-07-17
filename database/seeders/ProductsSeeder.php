<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // ❌ Xoá toàn bộ dữ liệu bảng products trước khi thêm lại
        DB::table('products')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ---------Casio nữ-----------------
        $category = Category::where('name', 'Nữ')->first();
        $brand  = Brand::where('name', 'Casio')->first();

            if (!$category || !$brand) {
                $this->command->error('Không tìm thấy categories "Nữ" hoặc brands "Casio"!');
                return;
            }

            $products = [
                ['Casio LTP-VT01L-1B2UDF', 'Casio1.jpg', 970000, 'Thiết kế cổ điển với dây da đen, phù hợp phong cách thanh lịch, giản dị.'],
                ['Casio LTP-V007L-7B', 'Casio2.webp', 1130000, 'Mặt vuông nhỏ gọn, dây da nâu tinh tế cho quý cô yêu nét hoài cổ.'],
                ['Casio LTP-VT01D-2B', 'Casio3.webp', 2160000, 'Tone xanh navy dịu mắt kết hợp dây kim loại sáng bóng, nữ tính và hiện đại.'],
                ['Casio LTP-E157MR-9ADF', 'Casio4.webp', 3190000, 'Màu vàng hồng nổi bật, dây kim loại dạng lưới cho phong cách thời thượng.'],
                ['Casio LTP-V002GL-7BUDF', 'Casio5.webp', 12200000, 'Kiểu mặt tròn cổ điển, dây da nâu và mặt trắng trang nhã, dễ phối đồ.'],
                ['Casio LTP-V300L-7A', 'Casio6.webp', 5250000, 'Đồng hồ 3 kim phụ với dây da trắng sang trọng, nữ tính và đa dụng.'],
                ['Casio LTP-1358D-2AVDF', 'Casio7.webp', 880000, 'Phong cách năng động với mặt xanh lam cá tính, vỏ và dây thép không gỉ.'],
                ['Casio LTP-V300D-7A2', 'Casio8.webp', 610000, 'Thiết kế đa năng với lịch thứ, ngày và 24 giờ, dây kim loại bạc.'],
                ['Casio LTP-E414SG-9ADF', 'Casio9.jpeg', 13400000, 'Viền vàng phối dây bạc sang trọng, tôn lên nét tinh tế của cổ tay.'],
                ['Casio SHE-4052PGL-7AUDF', 'Casio10.png', 1370000, 'Mặt số được đính đá pha lê, dây da nâu nhã nhặn, thanh lịch và thời trang.'],
                ['Casio LTP-V002D-7BUDF', 'Casio11.png', 1400000, 'Dây kim loại truyền thống, mặt trắng nền xanh dịu dàng, phù hợp đi làm.'],
                ['Casio LTP-E157D-1ADF', 'Casio12.png', 1430000, 'Tông đen bạc cá tính, thiết kế mỏng nhẹ, đơn giản nhưng nổi bật.'],
                ['Casio LTP-V300L-2A2', 'Casio13.jpg', 14600000, 'Dây da xanh pastel lạ mắt, mặt số đa chức năng cho quý cô hiện đại.'],
                ['Casio LTP-V002GL-1BUDF', 'Casio14.jpg', 1490000, 'Mặt trắng, dây da đen và viền vàng cổ điển, thích hợp phong cách công sở.'],
                ['Casio LTP-V005D-1AUDF', 'Casio15.png', 1520000, 'Mặt đen kết hợp dây thép không gỉ bạc, đơn giản nhưng cuốn hút.'],
                ['Casio LTP-V002L-7B3UDF', 'Casio16.png', 1550000, 'Dây da nâu sáng cùng mặt số trắng nhẹ nhàng, phù hợp phong cách nữ tính.'],
                ['Casio LTP-VT01GL-9BUDF', 'Casio17.png', 1580000, 'Viền vàng hồng sang trọng, dây da nâu đậm, thanh lịch và quý phái.'],
                ['Casio LTP-V007SG-9EUDF', 'Casio18.webp', 1610000, 'Dây kim loại 2 tông màu, mặt vuông thanh lịch, phù hợp đi làm, đi tiệc.'],
                ['Casio LTP-E406GL-7A', 'Casio19.png', 1640000, 'Mặt số đơn giản, dây da nâu mềm mại, tạo cảm giác nhẹ nhàng, thoải mái.'],
                ['Casio LTP-V007D-7E', 'Casio20.png', 1670000, 'Kiểu dáng truyền thống, mặt số rõ ràng, dây kim loại sáng bóng.'],
                ['Casio LTP-V300L-1A', 'Casio21.png', 1700000, 'Mặt đen huyền bí, dây da đen cho phong cách mạnh mẽ, cá tính.'],
                ['Casio LTP-VT01D-1BUDF', 'Casio22.png', 1730000, 'Sự kết hợp hoàn hảo giữa nét cổ điển và hiện đại với tone đen bạc.'],
                ['Casio LTP-V005L-2BUDF', 'Casio23.jpg', 1760000, 'Dây da xanh navy trẻ trung, thiết kế đơn giản dễ đeo.'],
                ['Casio LTP-V002GL-9AUDF', 'Casio24.png', 5790000, 'Màu vàng đồng chủ đạo, mặt số cổ điển, thích hợp mọi lứa tuổi.'],
            ]; 
            foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    
   
        // -----------Rolex nữ----------
        $category = Category::where('name', 'Nữ')->first();
        $brand  = Brand::where('name', 'Rolex')->first();

        if (!$category || !$brand) {
        $this->command->error('Không tìm thấy categories "Nữ" hoặc brands "Rolex"!');
        return;
        }   

        $products = [
            ['Rolex Lady-Datejust 28', 'Rolex1.jpg', 265000000, 'Đồng hồ Rolex Lady-Datejust 28 thiết kế thanh lịch với viền khía và dây Jubilee sang trọng.'],
            ['Rolex Oyster Perpetual 31', 'Rolex2.jpg', 195000000, 'Mẫu Rolex Oyster Perpetual 31 mang lại sự trẻ trung và tinh tế với mặt số bạc tinh khiết.'],
            ['Rolex Datejust 31 Rose Gold', 'Rolex3.jpg', 315000000, 'Datejust 31 vàng hồng phối dây Oyster tôn lên vẻ nữ tính và quyền lực.'],
            ['Rolex Pearlmaster 34', 'Rolex4.jpg', 680000000, 'Chiếc Pearlmaster 34 đính kim cương cao cấp, đỉnh cao của nghệ thuật chế tác Rolex.'],
            ['Rolex Lady-Datejust 31 Dark Rhodium', 'Rolex5.jpg', 238000000, 'Thiết kế cổ điển với mặt số xám đậm, Lady-Datejust 31 mang lại vẻ đẹp vượt thời gian.'],
            ['Rolex Datejust 31 Chocolate Dial', 'Rolex6.jpg', 325000000, 'Mặt số màu chocolate độc đáo kết hợp với dây Oyster nữ tính và sang trọng.'],
            ['Rolex Lady-Datejust 28 Champagne Dial', 'Rolex7.jpg', 255000000, 'Tông vàng champagne quyến rũ tạo điểm nhấn nổi bật cho phong cách của bạn.'],
            ['Rolex Oyster Perpetual 34 Silver Dial', 'Rolex8.jpg', 180000000, 'Phiên bản mặt số bạc đơn giản nhưng đầy tinh tế, phù hợp với mọi dịp.'],
            ['Rolex Datejust 36 Two-Tone', 'Rolex9.jpg', 298000000, 'Sự kết hợp giữa thép và vàng tạo nên chiếc Rolex cổ điển pha nét hiện đại.'],
            ['Rolex Lady-Datejust 31 Blue Dial', 'Rolex10.jpg', 245000000, 'Thiết kế mặt số xanh navy mang phong cách mạnh mẽ nhưng vẫn nữ tính.'],
            ['Rolex Datejust 31 Green Olive', 'Rolex11.jpg', 339000000, 'Mặt số xanh olive độc đáo tạo nên điểm nhấn khác biệt và đẳng cấp.'],
            ['Rolex Pearlmaster 39 Diamond', 'Rolex12.jpg', 760000000, 'Đồng hồ đính kim cương toàn bộ mang đậm phong cách hoàng gia và quý phái.'],
            ['Rolex Lady-Datejust 28 Everose Gold', 'Rolex13.jpg', 289000000, 'Thiết kế vàng Everose tôn vinh làn da và nét đẹp sang trọng cho phái nữ.'],
            ['Rolex Datejust 31 Sundust Dial', 'Rolex14.jpg', 279000000, 'Mặt số ánh hồng sunburst nhẹ nhàng cho những ai yêu sự dịu dàng và tinh tế.'],
            ['Rolex Oyster Perpetual 31 Turquoise Blue', 'Rolex15.jpg', 199000000, 'Màu xanh ngọc nổi bật kết hợp dây thép Oyster mạnh mẽ, trẻ trung.'],
            ['Rolex Datejust 31 Floral Motif', 'Rolex16.jpg', 348000000, 'Họa tiết hoa độc đáo dành riêng cho quý cô yêu vẻ đẹp nhẹ nhàng, nghệ thuật.'],
            ['Rolex Lady-Datejust 28 Pink Dial', 'Rolex17.jpg', 259000000, 'Mặt số hồng dịu dàng phù hợp với mọi cô gái yêu thích sự thanh lịch.'],
            ['Rolex Datejust 31 Roman Numerals', 'Rolex18.jpg', 305000000, 'Chữ số La Mã truyền thống tạo nên điểm nhấn cổ điển cho chiếc Datejust.'],
            ['Rolex Oyster Perpetual 36 Coral Red', 'Rolex19.jpg', 215000000, 'Màu đỏ san hô nổi bật mang đậm tính cá nhân và gu thời trang riêng biệt.'],
            ['Rolex Datejust 31 Silver Roman', 'Rolex20.jpg', 270000000, 'Tông bạc và chỉ số La Mã mang đến sự tinh tế, dễ phối cùng nhiều trang phục.'],
            ['Rolex Lady-Datejust 28 Jubilee', 'Rolex21.jpg', 250000000, 'Dây đeo Jubilee nổi tiếng với sự thoải mái và vẻ ngoài cực kỳ sang trọng.'],
            ['Rolex Datejust 36 Mother of Pearl', 'Rolex22.jpg', 388000000, 'Mặt số xà cừ tự nhiên phản chiếu ánh sáng tạo nên hiệu ứng độc đáo.'],
            ['Rolex Oyster Perpetual 31 Candy Pink', 'Rolex23.jpg', 195000000, 'Màu hồng kẹo ngọt dễ thương, phù hợp với phong cách trẻ trung.'],
            ['Rolex Datejust 31 Gold Diamond', 'Rolex24.jpg', 430000000, 'Vàng nguyên khối kết hợp kim cương thiên nhiên mang đến đỉnh cao sang trọng.'],
        ];
        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
        // -----------Citizen nữ----------
        $category = Category::where('name', 'Nữ')->first();
        $brand  = Brand::where('name', 'Citizen')->first();

        if (!$category || !$brand) {
        $this->command->error('Không tìm thấy categories "Nữ" hoặc brands "Citizen"!');
        return;
        }   
        $products = [
            ['Citizen Eco-Drive Silhouette', 'Citizen1.png', 4900000, 'Đồng hồ Eco-Drive Silhouette với dây kim loại mạ vàng hồng, mặt số khảm trai sang trọng, hoạt động bằng ánh sáng.'],
            ['Citizen Eco-Drive Bianca', 'Citizen2.jpg', 5300000, 'Thiết kế nữ tính với dây da trắng, mặt số xanh navy ánh trai, công nghệ ánh sáng không cần thay pin.'],
            ['Citizen L Ambiluna', 'Citizen3.jpg', 8600000, 'Đồng hồ Citizen L với triết lý tối giản, vỏ titanium siêu nhẹ và mặt số đá bán quý.'],
            ['Citizen Eco-Drive EM0686-01A', 'Citizen4.jpg', 4500000, 'Thiết kế tinh tế, dây da nâu, vỏ vàng hồng và mặt số bạc trắng dịu dàng.'],
            ['Citizen L EM0576-80A', 'Citizen5.jpg', 5950000, 'Đồng hồ dây thép không gỉ, mặt số ánh xà cừ với điểm nhấn kim vàng hồng hiện đại.'],
            ['Citizen Silhouette Crystal', 'Citizen6.webp', 6250000, 'Dây kim loại đính pha lê Swarovski, mặt số khảm trai, phù hợp dự tiệc và công sở.'],
            ['Citizen L Sunrise', 'Citizen7.webp', 8700000, 'Thiết kế đột phá với mặt số 3D, đính đá tự nhiên, dây da màu nude thời thượng.'],
            ['Citizen Eco-Drive EM0500-73L', 'Citizen8.jpg', 3990000, 'Mặt số xanh đậm chải tia, dây thép không gỉ tông bạc, hoạt động bằng ánh sáng.'],
            ['Citizen L Carina', 'Citizen9.webp', 7400000, 'Mẫu đồng hồ lấy cảm hứng từ chòm sao Carina, mặt số khảm trai cùng chi tiết lấp lánh.'],
            ['Citizen EM0930-80D', 'Citizen10.jpg', 5800000, 'Dây kim loại mảnh, mặt số xà cừ với họa tiết hoa tinh tế, phù hợp cổ tay nhỏ.'],
            ['Citizen Eco-Drive EM0683-58P', 'Citizen11.webp', 5100000, 'Thiết kế vàng champagne, mặt số đơn giản dễ nhìn, phong cách cổ điển nhẹ nhàng.'],
            ['Citizen L Gaia', 'Citizen12.webp', 9900000, 'Đồng hồ thân thiện môi trường, vỏ thép không gỉ tái chế, mặt số xà cừ xanh biển độc đáo.'],
            ['Citizen EQ9064-52D', 'Citizen13.jpg', 4150000, 'Vẻ đẹp tối giản, mặt số trắng bạc, dây kim loại vàng kết hợp bạc trẻ trung.'],
            ['Citizen EM0680-53D', 'Citizen14.jpg', 4880000, 'Mặt số khảm trai trắng, dây thép sáng bóng, phù hợp phong cách công sở hiện đại.'],
            ['Citizen Eco-Drive xC', 'Citizen15.jpg', 10600000, 'Kết hợp giữa công nghệ hiện đại và thiết kế thanh lịch Nhật Bản, mặt kính sapphire chống xước.'],
            ['Citizen EM0993-82X', 'Citizen16.jpg', 5600000, 'Dây kim loại vàng , mặt số la mã đơn giản, thiết kế thanh lịch hàng ngày.'],
            ['Citizen Eco-Drive EM0843-51D', 'Citizen17.webp', 6400000, 'Đính đá pha lê quanh viền, mặt số khảm trai trắng với hiệu ứng chuyển sắc tinh tế.'],
            ['Citizen L Ceci', 'Citizen18.jpg', 9200000, 'Thiết kế tinh xảo với dây da đen và mặt số được trang trí bằng các đường cong nghệ thuật.'],
            ['Citizen Eco-Drive EM0572-58P', 'Citizen19.webp', 5200000, 'Phong cách cổ điển, dây thép mạ vàng, mặt số đơn sắc nhẹ nhàng, thanh lịch.'],
            ['Citizen EM0896-89Y', 'Citizen20.jpg', 5900000, 'Dây kim loại rose gold, mặt số khảm trai hồng pastel, điểm nhấn kim xanh cá tính.'],
            ['Citizen Eco-Drive EM0492-02A', 'Citizen21.jpg', 4700000, 'Dây da nâu cổ điển, mặt số trắng tinh tế, phù hợp phong cách vintage nữ tính.'],
            ['Citizen EW1676-52D', 'Citizen22.webp', 6150000, 'Dây kim loại tông vàng phối bạc, mặt số khảm trai với cọc số ánh vàng sang trọng.'],
            ['Citizen EM0990-53L', 'Citizen23.png', 5650000, 'Thiết kế dây thép hiếm có, mặt số tông xanh – bạc tạo sự nổi bật.'],
            ['Citizen L Crystal Garden', 'Citizen24.jpg', 8900000, 'Đồng hồ đính pha lê Swarovski, họa tiết hoa mờ trên mặt số tạo hiệu ứng huyền ảo.'],
        ];      
        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 

        // -----------Rado nữ----------
        $category = Category::where('name', 'Nữ')->first();
        $brand = Brand::where('name', 'Rado')->first();

        if (!$category || !$brand) {
            $this->command->error('Không tìm thấy categories "Nữ" hoặc brands "Rado"!');
            return;
        }

        $products = [
            ['Rado Chic Quartz', 'Rado1.jpg', 15800000, 'Thiết kế sang trọng với viền đính kim cương và dây ceramic trắng.'],
            ['Rado Centrix Automatic Diamonds Open Heart', 'Rado2.jpg', 42100000, 'Thiết kế lộ cơ tinh tế, đính kim cương, dây thép phủ PVD vàng hồng.'],
            ['Rado Anatom Automatic Diamonds', 'Rado3.jpg', 26800000, 'Mặt kính vát cạnh liền dây ceramic, lộ cơ, đính kim cương.'],
            ['Rado DiaStar Original Automatic', 'Rado4.jpg', 33700000, 'Dây lưới bạc nhẹ tay, thiết kế thoáng khí, hiện đại.'],
            ['Rado DiaStar Original 60-Year Edition', 'Rado5.jpg', 11700000, 'Thiết kế kỷ niệm 60 năm, mặt số xám, 2 dây đeo cao cấp.'],
            ['Rado Centrix Automatic', 'Rado6.jpg', 46300000, 'Thiết kế lộ cơ lớn, đính kim cương, dây thép và ceramic sang trọng.'],
            ['Rado True Round Automatic Open Heart', 'Rado7.jpg', 18500000, 'Vỏ ceramic trắng bóng, mặt lộ cơ, phối viền vàng hồng.'],
            ['Rado True Square Automatic Open Heart', 'Rado8.jpg', 24900000, 'Vỏ vuông ceramic nguyên khối, thiết kế lộ cơ nghệ thuật.'],
            ['Rado Anatom Automatic', 'Rado9.jpg', 31200000, 'Kính sapphire vát, dây cao su đỏ, mặt số chuyển sắc độc đáo.'],
            ['Rado Captain Cook Over-Pole Limited Edition', 'Rado10.jpg', 40100000, 'Phiên bản giới hạn, máy lên cót tay, dây thép mạ vàng.'],
            ['Rado Florence Diamonds', 'Rado11.jpg', 12700000, 'Thiết kế thanh lịch, mặt đen đính kim cương, bộ máy quartz chính xác.'],
            ['Rado DiaStar X Tej Chauhan Special Edition', 'Rado12.jpg', 35800000, 'Thiết kế neon phá cách, dây cao su, máy tự động R764.'],
            ['Rado DiaStar Original Open Heart', 'Rado13.jpg', 19400000, 'Thiết kế lộ cơ, mặt guilloche, máy tự động dự trữ 80 giờ.'],
            ['Rado DiaStar Original Automatic', 'Rado14.jpg', 10100000, 'Viền Ceramos™ vàng, mặt đính zirconia xanh, dây thép mạ vàng.'],
            ['Rado DiaStar Original', 'Rado15.jpg', 27400000, 'Mặt xanh ngọc chải xước, kim phủ dạ quang, dây thép không gỉ.'],
            ['Rado Minimal Gold-Tone', 'Rado16.jpg', 49900000, 'Mặt số vàng chải xước, dây thép phối vàng, sang trọng.'],
            ['Rado LaCoupole Diamonds', 'Rado17.jpg', 13500000, 'Vỏ ceramic đen bóng, mặt khắc sóng, đính kim cương.'],
            ['Rado Centrix Diamonds', 'Rado18.jpg', 38800000, 'Mặt sơn mài đen đính kim cương, dây thép và ceramic.'],
            ['Rado True Square Skeleton', 'Rado19.jpg', 22800000, 'Thiết kế skeleton lộ cơ, dây cao su, vỏ ceramic đen nhám.'],
            ['Rado True Square Thinline', 'Rado20.jpg', 30900000, 'Thiết kế xanh bóng thanh lịch, máy quartz chính xác.'],
            ['Rado True Square Formafantasma', 'Rado21.jpg', 19200000, 'Thiết kế tối giản đặc biệt, phong cách vượt thời gian.'],
            ['Rado True Square Undigital', 'Rado22.jpg', 43300000, 'Lấy cảm hứng từ đồng hồ số, thiết kế hiện đại táo bạo.'],
            ['Rado Anatom Automatic', 'Rado23.jpg', 25300000, 'Dây ceramic phối thép mạ vàng, mặt đen sọc, máy R766.'],
            ['Rado Captain Cook x Marina Heartbeat', 'Rado24.jpg', 14700000, 'Phiên bản đặc biệt, mặt đính đá cầu vồng, dây đổi được.']
        ];

        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // -----------Seiko nữ----------
        $category = Category::where('name', 'Nữ')->first();
        $brand = Brand::where('name', 'Seiko')->first();

        if (!$category || !$brand) {
        $this->command->error('Không tìm thấy categories "Nữ" hoặc brands "Seiko"!');
        return;
        }       

        $products = [
            ['Seiko Classic White Dial', 'Seiko1.webp', 1250000, 'Mặt số trắng đơn giản, dây thép không gỉ, phù hợp đi làm hoặc đi học.'],
            ['Seiko Lady Two-Tone', 'Seiko2.webp', 2750000, 'Thiết kế phối màu vàng - bạc, mặt số nhỏ gọn, lịch sự và nữ tính.'],
            ['Seiko Quartz Leather Strap', 'Seiko3.jpg', 980000, 'Dây da đen mềm mại, mặt số đen cổ điển, phù hợp phong cách thanh lịch.'],
            ['Seiko Dress Silver Dial', 'Seiko4.jpg', 3190000, 'Vỏ thép bạc sáng, mặt trắng đính cọc số mảnh – trang nhã, dễ phối đồ.'],
            ['Seiko Solar Elegant', 'Seiko5.jpg', 6980000, 'Máy năng lượng mặt trời, mặt số hoa văn tinh tế, dây kim loại mỏng nhẹ.'],
            ['Seiko Petite Pink', 'Seiko6.jpg', 2450000, 'Mặt số hồng pastel, dây thép nhỏ gọn – dễ thương và trẻ trung.'],
            ['Seiko Basic Quartz Black', 'Seiko7.jpg', 1090000, 'Thiết kế tối giản với dây da đen, mặt trắng, phù hợp mọi dịp.'],
            ['Seiko Fashion Slim', 'Seiko8.jpg', 3720000, 'Dây thép ánh bạc, vỏ siêu mỏng nhẹ, thời trang và hiện đại.'],
            ['Seiko White Ceramic Accent', 'Seiko9.webp', 5490000, 'Dây phối ceramic trắng sáng, mặt số đính đá nhỏ, cao cấp.'],
            ['Seiko Vintage Champagne', 'Seiko10.jpg', 2950000, 'Mặt số ánh vàng champagne, dây kim loại kiểu mắt nhỏ cổ điển.'],
            ['Seiko Trendy Mesh Strap', 'Seiko11.jpg', 1890000, 'Dây lưới kim loại thời trang, mặt số xám đậm cá tính.'],
            ['Seiko Gold Plated Quartz', 'Seiko12.jpg', 4550000, 'Dây và vỏ mạ vàng, mặt trắng đơn giản – sang trọng, phù hợp đi tiệc.'],
            ['Seiko Casual Everyday', 'Seiko13.jpg', 1580000, 'Thiết kế đơn giản, dễ sử dụng hằng ngày, dây da nâu, mặt trắng.'],
            ['Seiko Rose Gold Tone', 'Seiko14.jpg', 3980000, 'Dây thép vàng hồng phối mặt trắng – nữ tính, hiện đại.'],
            ['Seiko Mini Dial Square', 'Seiko15.jpg', 990000, 'Mặt vuông nhỏ xinh, dây kim loại, phong cách Hàn Quốc nhẹ nhàng.'],
            ['Seiko Elegant Sunray Blue', 'Seiko16.jpg', 3280000, 'Mặt xanh ánh kim vân tia, dây kim loại bạc – cuốn hút và độc đáo.'],
            ['Seiko Silver Slim Date', 'Seiko17.webp', 2680000, 'Vỏ mỏng nhẹ, hiển thị ngày rõ ràng, tiện dụng và thanh lịch.'],
            ['Seiko Red Wine Leather', 'Seiko18.webp', 2190000, 'Dây da màu đỏ rượu, mặt trắng cổ điển, cho nàng phong cách chín chắn.'],
            ['Seiko Titanium Light', 'Seiko19.webp', 6990000, 'Chất liệu titanium siêu nhẹ, dây kim loại cao cấp, chống dị ứng.'],
            ['Seiko Blue Dial Crystal', 'Seiko20.jpg', 3590000, 'Mặt xanh dương đậm, cọc số đính đá, dây thép mắt nhỏ thanh lịch.'],
            ['Seiko Gold Mesh Limited', 'Seiko21.jpg', 6090000, 'Dây lưới vàng thời trang, mặt số khảm đá nhỏ, thiết kế giới hạn.'],
            ['Seiko Casual Pink Leather', 'Seiko22.webp', 1320000, 'Dây da hồng dễ thương, phù hợp với học sinh – sinh viên.'],
            ['Seiko Modern Line Black', 'Seiko23.jpg', 2790000, 'Mặt đen nhám, dây thép mờ xám – hiện đại, hợp xu hướng.'],
            ['Seiko SSA880 Sportura', 'Seiko24.webp', 6790000, 'Dây thép tích hợp ceramic trắng, mặt đơn giản với cửa sổ lộ cơ nhỏ, kiểu dáng thanh lịch và hiện đại.'],
        ];

            foreach ($products as [$name, $image, $price, $description]) {
                DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        //---------------------------Casio cặp--------------------------
        $category = Category::where('name', 'Cặp đôi')->first();
        $brand = Brand::where('name', 'Casio')->first();

        if (!$category || !$brand) {
            $this->command->error('Không tìm thấy categories "Cặp đôi" hoặc brands "Casio"!');
            return;
        }

        $products = [
            ['Casio Couple Classic Black', 'CasioCouple1.jpg', 3120000, 'Thiết kế tối giản, dây cao su đen bền bỉ – thích hợp cho cặp đôi yêu thích sự giản dị.'],
            ['Casio His & Her Silver', 'CasioCouple2.jpg', 4650000, 'Cặp đôi dây kim loại bạc sang trọng, mặt số đơn giản phù hợp đi làm và hẹn hò.'],
            ['Casio Romantic Rose Gold', 'CasioCouple3.jpg', 5920000, 'Thiết kế viền vàng hồng thời thượng, dành cho cặp đôi yêu phong cách nhẹ nhàng.'],
            ['Casio Sporty Duo Black-Gold', 'CasioCouple4.jpg', 5290000, 'Cặp đôi phong cách thể thao, mặt đen viền vàng khỏe khoắn và cá tính.'],
            ['Casio Minimal Brown Leather', 'CasioCouple5.jpg', 3890000, 'Dây da nâu thanh lịch, mặt số gọn nhẹ – dành cho cặp đôi yêu thích sự cổ điển.'],
        ];

        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    



//---------------------------Rolex cặp--------------------------
        $category = Category::where('name', 'Cặp đôi')->first();
        $brand = Brand::where('name', 'Rolex')->first();

        if (!$category || !$brand) {
            $this->command->error('Không tìm thấy categories "Cặp đôi" hoặc brands "Casio"!');
            return;
        }

        $products = [
            ['Rolex Couple Oyster Perpetual', 'RolexCouple1.jpg', 755000000, 'Thiết kế tối giản, dây thép không gỉ, mặt số xanh lam cho nam và trắng cho nữ – biểu tượng cho sự đồng điệu.'],
            ['Rolex Datejust Silver Duo', 'RolexCouple2.jpg', 628000000, 'Cặp đôi dây Jubilee cổ điển, mặt số bạc sang trọng – phù hợp với cặp đôi yêu sự thanh lịch vượt thời gian.'],
            ['Rolex Everose Gold Harmony', 'RolexCouple3.webp', 845000000, 'Màu vàng hồng Everose đặc trưng, phối dây kim loại demi – dành cho những cặp đôi đam mê sự sang trọng.'],
            ['Rolex Two-Tone Datejust Pair', 'RolexCouple4.jpg', 699000000, 'Cặp đôi phối vàng và thép không gỉ, mặt số viền khía sang trọng, đồng điệu nhưng vẫn cá tính riêng.'],
            ['Rolex Elegant Blue & Pink Set', 'RolexCouple5.webp', 705000000, 'Mặt số xanh cho nam và hồng cho nữ, kết hợp dây Oyster truyền thống – thể hiện sự khác biệt hài hòa.'],
        ];


        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    



//---------------------------Rado cặp--------------------------
        $category = Category::where('name', 'Cặp đôi')->first();
        $brand = Brand::where('name', 'Rado')->first();

        if (!$category || !$brand) {
            $this->command->error('Không tìm thấy categories "Cặp đôi" hoặc brands "Casio"!');
            return;
        }

        $products = [
            ['Rado Couple Centrix Black', 'RadoCouple1.webp', 47800000, 'Cặp đôi Centrix mặt đen sang trọng, dây ceramic – biểu tượng hiện đại và bền bỉ.'],
            ['Rado True Square Pair', 'RadoCouple2.jpg', 52400000, 'Thiết kế mặt vuông độc đáo với dây ceramic trắng, dành cho cặp đôi yêu sự phá cách tinh tế.'],
            ['Rado Florence Classic Duo', 'RadoCouple3.jpg', 45200000, 'Dòng Florence thanh lịch với mặt số tối giản, dây thép không gỉ, phù hợp phong cách trang nhã.'],
        ];


        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    




//---------------------------Citizen cặp--------------------------
        $category = Category::where('name', 'Cặp đôi')->first();
        $brand = Brand::where('name', 'Citizen')->first();

        if (!$category || !$brand) {
            $this->command->error('Không tìm thấy categories "Cặp đôi" hoặc brands "Casio"!');
            return;
        }

        $products = [
            ['Citizen Couple Eco-Drive AW1234-83P', 'CitizenCouple.jpg', 8350000, 'Nam AW1234 mặt đen, nữ AW1234 mặt bạc – bộ đôi Citizen Eco‑Drive sạc năng lượng ánh sáng, không dùng pin.'],
            ];


        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    




//---------------------------Citizen cặp--------------------------
        $category = Category::where('name', 'Cặp đôi')->first();
        $brand = Brand::where('name', 'Seiko')->first();

        if (!$category || !$brand) {
            $this->command->error('Không tìm thấy categories "Cặp đôi" hoặc brands "Casio"!');
            return;
        }

       $products = [
    ['Seiko 5 Classic Black-Gold Pair', 'SeikoCouple1.jpg', 3000000, 'Nam mặt đen, nữ mặt vàng demi, dây thép mạ vàng và bạc – phong cách trang nhã.'],
    ['Seiko 5 Silver-Gold Two-Tone Set', 'SeikoCouple2.webp', 3200000, 'Mặt trắng & trắng, dây thép hai tầng vàng‑bạc – đôi hoàn hảo cho mọi sự kiện.'],
    ['Seiko SUR525P1 & SUR531P1', 'SeikoCouple3.jpg', 2800000, 'Nam SUR525P1 xanh dương và nữ SUR531P1 trắng, thiết kế nhẹ nhàng, kính sapphire chất lượng cao.' ],
    ['Seiko SRP/SRP His & Hers Military', 'SeikoCouple4.jpg', 3500000, 'Nam SRP227 & nữ SRP189 – phong cách quân đội, tự động (automatic), đồng bộ dây và bộ máy.' ],
];



        foreach ($products as [$name, $image, $price, $description]) {
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }   
    }
}