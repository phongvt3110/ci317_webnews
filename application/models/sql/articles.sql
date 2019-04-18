-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2018 at 11:38 PM
-- Server version: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci317`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `content`, `catid`, `created_at`, `updated_at`) VALUES
(1, 'Thắng Jordan, Việt Nam có thể vào nhóm hạt giống số 2 Asian Cup 2019', 'Trận đấu giữa Việt Nam và Jordan không chỉ dừng lại ở tính chất thủ tục. Một thắng lợi trước đối thủ Trung Đông có thể giúp Việt Nam nhảy vào nhóm hạt giống số 2 VCK Asian Cup 2019. ', 'HLV Park Hang Seo cho biết, kết quả trận đấu giữa Việt Nam và Jordan sẽ không ảnh hưởng gì đến việc phân chia nhóm hạt giống VCK Asian Cup 2019. Tuy nhiên, quan điểm của ông không đúng hoàn toàn. Bởi một chiến thắng trước Jordan sẽ tác động đáng kể đến việc lọt vào nhóm hạt giống cao hơn cho Việt Nam.\r\n \r\nĐội tuyển Việt Nam và Jordan đã chắc chắn có vé dự VCK Asian Cup 2019. Do đó trận đấu giữa hai đội tại lượt cuối bảng C - vòng loại mang tính chất phân chia ngôi nhất nhì. Thực tế việc đứng đầu hay thứ 2 bảng đấu của vòng loại hoàn toàn không tác động gì đến thể thức phân chia nhóm hạt giống ở VCK Asian Cup 2019. HLV Park Hang Seo đã nói đúng ở điểm này.\r\n \r\nNhưng ông thầy Hàn Quốc đã nói thiếu mất một ý quan trọng trong câu sau đó: “Trận đấu này chỉ ảnh hưởng đến thứ hạng các đội trên BXH FIFA mà thôi”. Trước tiên cần nhấn mạnh, dựa theo công cụ đo lường dự kiến trên trang chủ FIFA, một chiến thắng trước Jordan sẽ giúp Việt Nam tạo nên một buớc nhảy vọt rất ấn tượng.\r\n\r\nĐT Việt Nam sẽ được cộng hơn 100 điểm trên BXH FIFA tháng 4/2018 nếu thắng Jordan\r\n \r\nCụ thể, thầy trò Park Hang Seo sẽ được cộng 108 điểm trên BXH FIFA (từ 293 lên 401 điểm). Đồng nghĩa, thứ hạng của đội tuyển Việt Nam cũng sẽ có một bước nhảy vọt lớn, có thể lọt vào top 90, thậm chí là 80 trên BXH FIFA vào tháng 4 tới đây, khi các đội tuyển trong nhóm này hiện chỉ dao động trong khoảng 390 - 410 điểm. \r\n \r\nPhải nói thêm rằng, thứ hạng của các đội trên BXH FIFA sẽ ảnh hưởng trực tiếp đến việc phân chia nhóm hạt giống cho các đội tham dự giải.\r\n \r\nCòn nhớ tại VCK Asian Cup 2015, khi tổ chức tiến hành bốc thăm phân nhóm hạt giống, chia bảng vào ngày 26/3/2014 tại Nhà hát Opera (Sydney), BTC đã dựa trên thứ hạng các đội tuyển tham dự giải theo BXH FIFA tháng 3 năm ấy. Khi đó, ngoại trừ chủ nhà Australia (dù thứ hạng là 63) được xếp vào nhóm hạt giống số 1 thì 15 đội bóng còn lại được xếp lần lượt vào các nhóm dựa theo thứ hạng từ cao xuống thấp.\r\n\r\n16 đội bóng (trừ chủ nhà Australia) được xếp hạt giống dựa theo thứ hạng BXH FIFA ở VCK Asian Cup 2015\r\n \r\nHiện tại, chưa có quy định nào về cách thức phân chia hạt giống ở VCK Asian Cup 2019. Tuy nhiên rất có thể BTC vẫn sẽ sử dụng khuôn mẫu của VCK Asian Cup 2015 trong việc phân chia 24 đội bóng vào 4 nhóm hạt giống.\r\n \r\nCách sắp xếp trên trang Wikipedia của VCK Asian Cup tạm thời cho 21/24 đội (3 đội vẫn chưa đuợc xác định) cũng đang căn cứ như vậy. Theo đó Việt Nam (hạng 113 thế giới) đang ở nhóm số 3 dựa theo BXH FIFA cập nhật gần nhất. Do việc tiến hành phân hạt giống và bốc thăm chia bảng sẽ tiến hành vào ngày 4/5/2018 tại Dubai nên nếu dựa vào thứ hạng để phân chia thì BTC sẽ căn cứ vào BXH FIFA tháng 4 (được công bố vào 12/4) để làm cơ sở phân chia các nhóm cho 24 đội - khi đó đã được xác định xong sau khi lượt cuối vòng loại kết thúc vào cuối tháng này.\r\n\r\n21/24 đội tham dự VCK Asian Cup 2019 hiện cũng tạm đưọc xếp theo BXH FIFA tháng 2/2018 \r\n \r\nVì vậy nếu thắng Jordan để lọt vào top 80-90 thế giới, Việt Nam sẽ có cơ hội rất lớn lọt vào nhóm hạt giống số 2 của giải, qua đó có được ít nhiều lợi thế trong việc bốc thăm khi phân chia bảng đấu tại VCK Asian Cup 2019.\r\n\r\nTrận đấu giữa Jordan và Việt Nam sẽ diễn ra vào lúc 22h00 ngày 27/3, trực tiếp trên Báo điện tử Bóng Đá.', 1, '2018-03-25 23:18:19', '2018-03-25 23:18:19'),
(2, 'Sân Thiên Trường mang không khí Ngoại hạng Anh đến V.League', 'Bầu không khí lễ hội, nhiều màu sắc đã được hơn 2 vạn khán giả thành Nam tạo ra tại Thiên Trường trong trận đấu đánh dấu sự trở lại của đội nhà sau 7 năm ở V.League. ', ' năm kể từ ngày chia tay V.League, NHM Nam Định mới lại được sống trong bầu không khí lễ hội khi đội nhà thi đấu tại sân chơi cao nhất của bóng đá Việt Nam. 4 mặt khán đài sân Thiên Trường được phủ kín bởi hơn 2 vạn CĐV.\r\n\r\nDo sức hút của trận đấu là rất lớn nên trước giờ bóng lăn khoảng 30 phút, BTC sân đã phải đóng các cửa ra vào ở khu vực khán đài A và yêu cầu khán giả sang khán đài khác tránh quá tải. Tuy vậy, hàng nghìn khán giả phản đối, tìm cách vượt rào để vào bên trong.\r\nDo sức hút của trận đấu là rất lớn nên trước giờ bóng lăn khoảng 30 phút, BTC sân đã phải đóng các cửa ra vào ở khu vực khán đài A và yêu cầu khán giả sang khán đài khác tránh quá tải. Tuy vậy, hàng nghìn khán giả phản đối, tìm cách vượt rào để vào bên trong.\r\n\r\nBên trong sân, cả hai đội bóng thể hiện sự quyết tâm lớn cho trận đấu mở màn mùa giải mới. Chuyến làm khách gặp Nam Định là trận đấu ra mắt của HLV Đinh Hồng Vinh trên cương vị thuyền trưởng của XSKT.Cần Thơ.\r\nBên trong sân, cả hai đội bóng thể hiện sự quyết tâm lớn cho trận đấu mở màn mùa giải mới. Chuyến làm khách gặp Nam Định là trận đấu ra mắt của HLV Đinh Hồng Vinh trên cương vị thuyền trưởng của XSKT.Cần Thơ.\r\n\r\n... Và cũng là trận đấu đầu tieenMinh Nhựt được đăng ký thi đấu sau án phạt kỷ luật phải nhận trong màu áo Long An ở mùa giải năm ngoái. Trong trận đấu này, thủ môn gốc An Giang ngồi dự bị cho Nguyễn Quốc Thiện Esele.\r\nVà cũng là trận đấu đầu tieenMinh Nhựt được đăng ký thi đấu sau án phạt kỷ luật phải nhận trong màu áo Long An ở mùa giải năm ngoái. Trong trận đấu này, thủ môn gốc An Giang ngồi dự bị cho Nguyễn Quốc Thiện Esele.\r\n\r\nNgay sau tiếng còi khai cuộc của trọng tài Nguyễn Hiền Triết, cả hai đội đẩy nhanh tốc độ trận đấu, với nhiều đợt hãm thành về khung thành của nhau.\r\nNgay sau tiếng còi khai cuộc của trọng tài Nguyễn Hiền Triết, cả hai đội đẩy nhanh tốc độ trận đấu, với nhiều đợt hãm thành về khung thành của nhau\r\n\r\nSự quyết tâm được Nam Định và XSKT.Cần Thơ thể hiện qua những pha tranh bóng cực kỳ quyết liệt.\r\nSự quyết tâm được Nam Định và XSKT.Cần Thơ thể hiện qua những pha tranh bóng cực kỳ quyết liệt. Nhưng suốt 90 phút, đã không có bàn thắng nào được ghi\r\n\r\nTuy vậy, nó không ảnh hưởng đến bầu không khí lễ hội được tạo ra bởi hàng vạn NHM thành Nam trên khán đài. Thậm chí, CĐV Nam Định còn tổ chức hầu đồng ngay tại trên khán đài.\r\nTuy vậy, nó không ảnh hưởng đến bầu không khí lễ hội được tạo ra bởi hàng vạn NHM thành Nam trên khán đài. Thậm chí, CĐV Nam Định còn tổ chức hầu đồng ngay tại trên khán đài\r\n\r\nViệc đội nhà quay trở lại với V.League là động lực để Hội CĐV Nam Định đầu tư bài bản, chuyên nghiệp ở trong công tác cổ vũ. CĐV chủ nhà ghi điểm bằng những màn cổ vũ giống như các giải đấu hàng đầu châu Âu và châu Á.\r\nViệc đội nhà quay trở lại với V.League là động lực để Hội CĐV Nam Định đầu tư bài bản, chuyên nghiệp ở trong công tác cổ vũ. CĐV chủ nhà ghi điểm bằng những màn cổ vũ giống như các giải đấu hàng đầu châu Âu và châu Á', 1, '2018-03-25 23:30:31', '2018-03-25 23:30:31'),
(3, 'Bốc thăm tứ kết Champions League: Real vs Juventus, Liverpool vs Man City', 'Vòng 1/8 Champions League đã đi qua được nửa chặng đường và giờ là lúc hướng tới lễ bốc thăm chia cặp tứ kết. ', 'Vòng 1/8 Champions League đã xác định được 8 cái tên sẽ góp mặt ở tứ kết: Real Madrid, Man City, Liverpool, Juventus, Roma, Sevilla, Bayern Munich và Barcelona. \r\n\r\nSau khi loạt trận vòng 1/8 kết thúc, lễ bốc thăm tứ kết Champions League sẽ diễn ra để phân định các cặp đấu. Nó sẽ diễn ra vào 11h00 ngày 16/3 (giờ địa phương, 18h00 ngày 16/3 giờ Việt Nam) tại trụ sở của UEFA tại Nyon, Thụy Sỹ. \r\n\r\nSẽ không có quy tắc nào cho lễ bốc thăm. Bất kỳ đội nào cũng có thể gặp nhau, kể cả cùng giải VĐQG. Vì thế, người hâm mộ có thể thấy đại chiến nội bộ giữa các đội Ngoại hạng Anh hoặc trận Siêu kinh điển ở tứ kết Champions League.\r\n\r\nCác trận lượt đi tứ kết Champions League sẽ diễn ra vào các ngày 3-4/4 và lượt về vào 1 tuần sau đó (10-11/4).', 1, '2018-03-25 23:31:55', '2018-03-25 23:31:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
