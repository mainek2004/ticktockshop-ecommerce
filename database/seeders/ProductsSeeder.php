<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        // ❌ Xoá toàn bộ dữ liệu bảng products trước khi thêm lại
        Product::truncate();
// ---------Casio nữ-----------------
        $category = Category::where('name', 'Nữ')->first();
        $brand  = Brand::where('name', 'Casio')->first();

            if (!$category || !$brand) {
                $this->command->error('Không tìm thấy categories "Nữ" hoặc brands "Casio"!');
                return;
            }

            $products = [
                ['Casio LTP-VT01L-1B2UDF', 'Casio1.jpg', 1100000, 'Thiết kế cổ điển với dây da đen, phù hợp phong cách thanh lịch, giản dị.'],
                ['Casio LTP-V007L-7B', 'Casio2.webp', 1130000, 'Mặt vuông nhỏ gọn, dây da nâu tinh tế cho quý cô yêu nét hoài cổ.'],
                ['Casio LTP-VT01D-2B', 'Casio3.webp', 1160000, 'Tone xanh navy dịu mắt kết hợp dây kim loại sáng bóng, nữ tính và hiện đại.'],
                ['Casio LTP-E157MR-9ADF', 'Casio4.webp', 1190000, 'Màu vàng hồng nổi bật, dây kim loại dạng lưới cho phong cách thời thượng.'],
                ['Casio LTP-V002GL-7BUDF', 'Casio5.webp', 1220000, 'Kiểu mặt tròn cổ điển, dây da nâu và mặt trắng trang nhã, dễ phối đồ.'],
                ['Casio LTP-V300L-7A', 'Casio6.webp', 1250000, 'Đồng hồ 3 kim phụ với dây da trắng sang trọng, nữ tính và đa dụng.'],
                ['Casio LTP-1358D-2AVDF', 'Casio7.webp', 1280000, 'Phong cách năng động với mặt xanh lam cá tính, vỏ và dây thép không gỉ.'],
                ['Casio LTP-V300D-7A2', 'Casio8.webp', 1310000, 'Thiết kế đa năng với lịch thứ, ngày và 24 giờ, dây kim loại bạc.'],
                ['Casio LTP-E414SG-9ADF', 'Casio9.jpeg', 1340000, 'Viền vàng phối dây bạc sang trọng, tôn lên nét tinh tế của cổ tay.'],
                ['Casio SHE-4052PGL-7AUDF', 'Casio10.png', 1370000, 'Mặt số được đính đá pha lê, dây da nâu nhã nhặn, thanh lịch và thời trang.'],
                ['Casio LTP-V002D-7BUDF', 'Casio11.png', 1400000, 'Dây kim loại truyền thống, mặt trắng nền xanh dịu dàng, phù hợp đi làm.'],
                ['Casio LTP-E157D-1ADF', 'Casio12.png', 1430000, 'Tông đen bạc cá tính, thiết kế mỏng nhẹ, đơn giản nhưng nổi bật.'],
                ['Casio LTP-V300L-2A2', 'Casio13.jpg', 1460000, 'Dây da xanh pastel lạ mắt, mặt số đa chức năng cho quý cô hiện đại.'],
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
            ['Casio LTP-V002GL-9AUDF', 'Casio24.png', 1790000, 'Màu vàng đồng chủ đạo, mặt số cổ điển, thích hợp mọi lứa tuổi.'],
        ];

        foreach ($products as [$name, $image, $price, $description]) {
            Product::create([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
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
            Product::create([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image' => $image,
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'warranty_months' => 12,
            ]);
        }   
    }
}
