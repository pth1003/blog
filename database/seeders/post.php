<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class post extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post')->insert([
            'title' => 'Robot vệ sinh pin Mặt Trời có thể leo dốc 45 độ',
            'image' => 'img-post2.jpg',
            'content' => 'Công ty Blade Ranger của Israel giới thiệu robot lau bụi tự động Pleco có thể làm tăng 30% hiệu quả chuyển đổi năng lượng của pin Mặt Trời.

Khi thế giới hướng đến các giải pháp năng lượng tái tạo, pin mặt trời nổi lên là lựa chọn hàng đầu vì chi phí sản xuất pin đã giảm theo thời gian và hiệu suất ngày càng được cải thiện. Mặc dù vậy, việc mở rộng quy mô vẫn còn nhiều thách thức, chẳng hạn như bụi bẩn. Theo Cơ quan Năng lượng Quốc tế, các tấm pin mặt trời phủ bụi có thể gây thiệt hại hàng tỷ USD hàng năm do làm giảm sản lượng điện.

Tại các trang trại quang năng khổng lồ, nơi có những tấm pin mặt trời trải dài hàng kilomet, việc làm sạch chúng theo cách thủ công tốn nhiều công sức, tiền bạc và tiềm ẩn rủi ro, từ thương tích tại nơi làm việc đến nguy hiểm nghề nghiệp cho đội vệ sinh.

Blade Ranger đã đưa ra một giải pháp thay thế đơn giản. Tất cả những gì người dùng cần làm là "đặt lệnh" dọn dẹp cho robot Pleco trên bảng điều khiển và nhấn nút bắt đầu. Robot sẽ tự thực hiện công việc mà không cần sự can thiệp của con người, Interesting Engineering hôm 30/1 đưa tin.
Mỗi robot Pleco có thể làm sạch tới 400 m2 pin mặt trời mỗi giờ. Nhờ được trang bị công nghệ hút chân không, chúng có thể leo dốc 45 độ mà không bị trượt. Đây còn là robot nhẹ nhất thuộc loại này trên thị trường khi chỉ nặng 20 kg. Blade Ranger gần đây cũng đã thử nghiệm thành công việc vận chuyển robot bằng thiết bị bay không người lái.

Một trong những tính năng quan trọng khác của Pleco là nó không sử dụng nước, góp phần vào tính bền vững của toàn bộ quá trình làm sạch. Ngoài ra, Blade Ranger đã phát triển một nền tảng chuyên dụng để theo dõi và phân tích dữ liệu thời gian thực về quá trình vệ sinh pin mặt trời. Theo tuyên bố của công ty, giải pháp của họ có thể giúp thu hoạch thêm 30% năng lượng.',
            'category_id' => '5',
            'user_id' => '1'
        ]);


    }
}
